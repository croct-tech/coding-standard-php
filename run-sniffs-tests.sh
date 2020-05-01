#!/bin/bash

GREEN_BOLD='\033[1;32m'
RED='\033[00;31m'
GREEN='\033[00;32m'
WHITE='\033[0;37m';
RED_BG='\033[41m';

BLINK='\033[5m'
RESTORE='\033[0m'
CLEAR='\033[K'

indent() {
    cr=$'\r'
    while IFS= read -r line; do
        line=${line/${cr}/"${cr}    "}
        echo "    ${line}"
    done <<< "${1}"
}

# Configs
standard=src/Croct/ruleset.xml
testDir=tests/Integration
schema=vendor/squizlabs/php_codesniffer/phpcs.xsd

echo -e "\n${GREEN_BOLD}Croct Sniffs Test Runner${RESTORE}"

# Validate XML
echo -e "\n1. XML Validation"
echo -en "${BLINK}- Running validation...${RESTORE}"

output=$(xmllint --noout --schema ${schema} ${standard} 2>&1)

if [ $? -eq 0 ];then
    echo -e "\r${CLEAR}${GREEN}✓ Ruleset ${standard} is valid!${RESTORE}"
else
    echo -e "\r${CLEAR}${RED}✗ Ruleset ${standard} is invalid!${RESTORE}"
    echo -e "\n${WHITE}${RED_BG}Result:${RESTORE}"
    indent "${output}"
    exit 1
fi

# Run inspection tests
echo -e "\n2. Inspection tests"
echo -en "${BLINK}- Running tests...${RESTORE}"

report=$(./vendor/bin/phpcs $(find ${testDir}/input/* | sort) --standard=${standard} --basepath=${testDir}/input --report-width=80 --report=summary --report-file=phpcs.log 2>&1)
output=$(diff ${testDir}/expected_report.txt phpcs.log 2>&1)

if [ $? -eq 0 ];then
    echo -e "\r${CLEAR}${GREEN}✓ Inspection tests passed!${RESTORE}"
else
    echo -e "\r${CLEAR}${RED}✗ Inspection tests failed!${RESTORE}"
    echo -e "\n${WHITE}${RED_BG}Result:${RESTORE}"
    indent "${output}"
    exit 1
fi

# Run test fixes
echo -e "\n3. Fix tests"

echo -en "${BLINK}- Running tests...${RESTORE}"

cp -R ${testDir}/input/ ${testDir}/tmp/
report=$(vendor/bin/phpcbf --standard=${standard} ${testDir}/tmp 2>&1)
output=$(diff ${testDir}/tmp ${testDir}/fixed 2>&1)

if [ $? -eq 0 ];then
    echo -e "\r${CLEAR}${GREEN}✓ Fix tests passed!${RESTORE}"
else
    echo -e "\r${CLEAR}${RED}✗ Fix tests failed!${RESTORE}"
    echo -e "\n${WHITE}${RED_BG}Result:${RESTORE}"
    indent "${output}"
    exit 1
fi
