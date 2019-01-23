<?php
return [
	// Auto Render after Application execution. Disable if you want to use it only in certain controller
	'auto_render' => TRUE,

	// Enabled Debug Panels
	'panels'  => [
		'benchmarks' => TRUE,
		'database'	 => TRUE,
		'vars'		 => TRUE,
		'ajax'		 => TRUE,
		'configs'	 => TRUE, // depends on 'vars'
		'files'		 => TRUE,
		'modules'	 => TRUE,
		'routes'	 => TRUE,
		'customs'    => TRUE,
	],

	// Toolbar Alignment (left, center, right)
	'align'	  	   => 'right',

	// Access key. If defined this access key needs to be sent as $_GET variable to display toolbar
	'access_key'   => FALSE,

	// Skip displaying the following configurations Caution! Removing this will result your database and encrypt
	// credentials being visible in the debug toolbar
	'skip_configs' => [
		'database',
		'encrypt'
	],

	// Routes to exclude from rendering
	'excluded_routes' => [
		'docs/media'
	]
];
