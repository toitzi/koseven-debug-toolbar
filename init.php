<?php
// Render Debug Toolbar on the end of application execution
if (Kohana::$config->load('debug_toolbar.auto_render') === TRUE)
{
	register_shutdown_function('DebugToolbar::render', TRUE);
}
