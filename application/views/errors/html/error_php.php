<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

	<h4>A PHP Error was encountered</h4>
	<p>Severity: <?= filter_var($severity, FILTER_DEFAULT); ?></p>
	<p>Message: <?= filter_var($message, FILTER_DEFAULT); ?></p>
	<p>Filename: <?= filter_var($filepath, FILTER_DEFAULT); ?></p>
	<p>Line Number: <?= filter_var($line, FILTER_DEFAULT); ?></p>

	<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE) : ?>

		<p>Backtrace:</p>
		<?php foreach (debug_backtrace() as $error) : ?>

			<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0) : ?>

				<p style="margin-left:10px">
					File: <?= filter_var($error['file'], FILTER_DEFAULT) ?><br />
					Line: <?= filter_var($error['line'], FILTER_DEFAULT) ?><br />
					Function: <?= filter_var($error['function'], FILTER_DEFAULT) ?>
				</p>

			<?php endif ?>

		<?php endforeach ?>

	<?php endif ?>

</div>