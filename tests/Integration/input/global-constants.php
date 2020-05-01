<?php

declare(strict_types=1);

namespace Foo;

use const FILTER_VALIDATE_INT;

\filter_var(1, FILTER_VALIDATE_INT);
