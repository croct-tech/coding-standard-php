<?php

declare(strict_types=1);

$string = 'Croct' . 'rulez';
$string = 'Croct'. 'rulez';
$string = 'Croct' .'rulez';
$string = 'Croct'.'rulez';

$croct = 'Croct';
$rulez    = 'rulez';
$string   = $croct . $rulez;
$string   = $croct. $rulez;
$string   = $croct .$rulez;
$string   = $croct.$rulez;

$string = 'Croct' . $rulez;
$string = 'Croct'. $rulez;
$string = 'Croct' .$rulez;
$string = 'Croct'.$rulez;

$string = $croct . 'rulez';
$string = $croct .           'rulez';
$string = $croct. 'rulez';
$string = $croct .'rulez';
$string = $croct.'rulez';

$string = $croct . $rulez. 'even' .'more'.$string;

$string.=$croct;
$string .= $croct;
$string .=$croct;

$string = $croct.
    $rulez .
    'all'
    .$string;
