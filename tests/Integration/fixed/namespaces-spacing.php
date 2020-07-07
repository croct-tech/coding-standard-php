<?php

declare(strict_types=1);

namespace Foo;

\strrev(
    (new \DateTimeImmutable('@' . \time(), new \DateTimeZone('UTC')))
        ->sub(new \DateInterval('P1D'))
        ->format(\DATE_RFC3339),
);
