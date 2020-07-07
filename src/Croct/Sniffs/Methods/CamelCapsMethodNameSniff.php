<?php

declare(strict_types=1);

namespace Croct\Sniffs\Methods;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Standards\PSR1\Sniffs\Methods\CamelCapsMethodNameSniff as Psr1CamelCapsMethodNameSniff;

class CamelCapsMethodNameSniff extends Psr1CamelCapsMethodNameSniff
{
    /**
     * @param File $phpcsFile The file being processed.
     * @param int  $stackPtr  The position where this token was found.
     * @param int  $currScope The position of the current scope.
     */
    protected function processTokenWithinScope(File $phpcsFile, $stackPtr, $currScope): void
    {
        $methodName = $phpcsFile->getDeclarationName($stackPtr);

        if ($methodName === null || \preg_match('/^[A-Z][A-Z0-9]+(_[A-Z0-9]+)*$/', $methodName) !== 0) {
            // Ignore constant-like methods
            return;
        }

        parent::processTokenWithinScope($phpcsFile, $stackPtr, $currScope);
    }
}
