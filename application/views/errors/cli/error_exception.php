<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

An uncaught Exception was encountered

Type: <?= filter_var(get_class($exception), FILTER_DEFAULT), "\n"; ?>
Message: <?= filter_var($message, FILTER_DEFAULT), "\n"; ?>
Filename: <?= filter_var($exception->getFile(), FILTER_DEFAULT), "\n"; ?>
Line Number: <?= filter_var($exception->getLine(), FILTER_DEFAULT); ?>

<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE) : ?>

	Backtrace:
	<?php foreach ($exception->getTrace() as $error) : ?>
		<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0) : ?>
			File: <?= filter_var($error['file'], FILTER_DEFAULT), "\n"; ?>
			Line: <?= filter_var($error['line'], FILTER_DEFAULT), "\n"; ?>
			Function: <?= filter_var($error['function'], FILTER_DEFAULT), "\n\n"; ?>
		<?php endif ?>
	<?php endforeach ?>

<?php endif ?>