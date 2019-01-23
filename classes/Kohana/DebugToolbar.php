<?php
/**
 * Koseven Debug Toolbar
 *
 * @author Aaron Forsander <http://grimhappy.com/>
 * @author Ivan Brotkin (BIakaVeron) <BIakaVeron@gmail.com>
 * @author Sergei Gladkovskiy <smgladkovskiy@gmail.com>
 * @copyright since 2019 Koseven Team
 */
class Kohana_DebugToolbar {

	/**
	 * Queries container
	 * @var array
	 */
	protected static $_queries;

	/**
	 * Benchmarks container
	 * @var array
	 */
	protected static $_benchmarks;

	/**
	 * Custom tabs container
	 * @var array
	 */
	protected static $_custom_tabs = [];

	/**
	 * Custom sections container
	 * @var array
	 */
    protected static $_custom_sections = [];

	/**
	 * Can we render toolbar?
	 * @var bool
	 */
	protected static $_enabled = TRUE;

	/**
	 * Benchmark name
	 * @var string
	 */
	public static $benchmark_name = 'debug_toolbar';

	/**
	 * Renders the Debug Toolbar
	 *
	 * @param  bool  $print  return DT's template (FALSE, by default) or render it (TRUE)
	 *
	 * @return bool|string
	 * @throws Kohana_Exception
	 */
	public static function render($print = NULL)
	{
		// Initialize (Check if enabled and assign $print)
		if ( ! self::is_enabled())
		{
			return FALSE;
		}
		if ($print === NULL)
		{
			$print = FALSE;
		}

		// Start Profiler
		$token = Profiler::start('custom', self::$benchmark_name);

		$template = new View('debug_toolbar');

		$config = Kohana::$config->load('debug_toolbar');

		// Database panel
		if ($config->panels['database'] === TRUE)
		{
			$queries = self::get_queries();
			$template
				->set('queries', $queries['data'])
				->set('query_count', $queries['count'])
				->set('total_time', $queries['time'])
				->set('total_memory', $queries['memory']);
		}

		// Configs panel
		if ($config->panels['configs'] === TRUE)
		{
			$template->set('configs', self::get_configs());
		}

		// Files panel
		if ($config->panels['files'] === TRUE)
		{
			$files = get_included_files();
			sort($files);
			$template->set('files', $files);
		}

		// Modules panel
		if ($config->panels['modules'] === TRUE)
		{
			$template->set('modules', Kohana::modules());
		}

		// Routes panel
		if ($config->panels['routes'] === TRUE)
		{
			$template->set('routes', Route::all());
		}

		// Custom data
		if ($config->panels['customs'] === TRUE)
		{
			$template->set('customs', self::get_customs());
            $template->set('sections', self::get_custom_sections());
		}

		// Set alignment for toolbar
		switch ($config->align)
		{
			case 'right':
			case 'center':
			case 'left':
				$template->set('align', $config->align);
				break;
			default:
				$template->set('align', 'left');
		}

		Profiler::stop($token);

		// Benchmarks panel
		if ($config->panels['benchmarks'] === TRUE)
		{
			$template->set('benchmarks', self::get_benchmarks());
		}

		$result = $template->render();

		if ($print === TRUE)
		{
			echo $result;
			return FALSE;
		}
		return $result;
	}

	/**
	 * Adds custom data to render in a separate tab
	 *
	 * @param  string $tab_name
	 * @param  mixed  $data
	 *
	 * @return void
	 */
	public static function add_custom(string $tab_name, $data)
	{
		self::$_custom_tabs[$tab_name] = $data;
	}

	/**
	 * Register additional sections. Supports callbacks for title or content params
	 *
	 * @param  mixed   $title  section title (string or callback)
	 * @param  mixed   $data   section content (string or callback)
	 */
	public static function add_section($title, $data)
	{
		self::$_custom_sections[] = [$title, $data];
	}

	/**
	 * Disable toolbar
	 */
	public static function disable()
	{
		self::$_enabled = FALSE;
	}

	/**
	 * Enable toolbar
	 */
	public static function enable()
	{
		self::$_enabled = TRUE;
	}

	/**
	 * Get user vars
	 * @return array
	 */
	public static function get_customs() : array
	{
		$result = [];

		foreach (self::$_custom_tabs as $tab => $data)
		{
			if (is_array($data) || is_object($data) || is_bool($data))
			{
				$data = Debug::dump($data);
			}

			$result[$tab] = $data;
		}

		return $result;
	}

	/**
	 * Get custom sections
	 * @return array
	 */
	public static function get_custom_sections() : array
	{
		$result = [];
		foreach(self::$_custom_sections as list($title, $data))
		{
			if ( ! is_string($data) && is_callable($data))
			{
				$data = $data();
			}

			$result[] = [
				'title'    => ! is_string($title) && is_callable($title) ? $title() : $title,
				'content'  => is_string($data) ? $data : Debug::dump($data)
			];
		}

		return $result;
	}

	/**
	 * Retrieves query benchmarks from Database
	 * @return  array
	 */
	protected static function get_queries() : array
	{
		$result = [];
		$count  = $time = $memory = 0;

		$groups = Profiler::groups();
		foreach (Database::$instances as $name => $db)
		{
			$group_name = 'database ('.strtolower($name).')';
			$group = arr::get($groups, $group_name, FALSE);

			if ($group)
			{
				$sub_time = $sub_memory = $sub_count = 0;
				foreach ($group as $query => $tokens)
				{
					$sub_count += count($tokens);
					foreach ($tokens as $token)
					{
						$total = Profiler::total($token);
						$sub_time += $total[0];
						$sub_memory += $total[1];
						$result[$name][] = [
							'name'   => $query,
							'time'   => $total[0],
							'memory' => $total[1]
						];
					}
				}

				$count += $sub_count;
				$time += $sub_time;
				$memory += $sub_memory;

				$result[$name]['total'] = [$sub_count, $sub_time, $sub_memory];
			}
		}
		return [
			'count'  => $count,
			'time'   => $time,
			'memory' => $memory,
			'data'   => $result
		];
	}

	/**
	 * Creates a formatted array of all Benchmarks
	 * @return array formatted benchmarks
	 */
	protected static function get_benchmarks() : array
	{
		$result = [];

		if (! Kohana::$profiling)
		{
			return $result;
		}

		$groups = Profiler::groups();

		foreach (array_keys($groups) as $group)
		{
			if (strpos($group, 'database (') === FALSE)
			{
				foreach ($groups[$group] as $name => $marks)
				{
					$stats = Profiler::stats($marks);
					$result[$group][] = [
						'name'         => $name,
						'count'        => count($marks),
						'total_time'   => $stats['total']['time'],
						'avg_time'     => $stats['average']['time'],
						'total_memory' => $stats['total']['memory'],
						'avg_memory'   => $stats['average']['memory'],
					];
				}
			}
		}

		// add total stats
		$total = Profiler::application();
		$result['application'] = [
			'count'        => 1,
			'total_time'   => $total['current']['time'],
			'avg_time'     => $total['average']['time'],
			'total_memory' => $total['current']['memory'],
			'avg_memory'   => $total['average']['memory'],

		];

		return $result;
	}

	/**
	 * Collect custom and module configs
	 *
	 * @return array
	 * @throws Kohana_Exception
	 */
	protected static function get_configs() : array
	{
		$inc_paths = Kohana::include_paths();

		// Remove default configurations (SYSPATH)
		array_pop($inc_paths);

		$configs = [];

		// Loop through paths
		foreach ($inc_paths as $inc_path)
		{
			foreach ((array)glob($inc_path.'/config/*.php') as $filename)
			{
				$filename = pathinfo($filename, PATHINFO_FILENAME);

				if (in_array($filename, (array)Kohana::$config->load('debug_toolbar.skip_configs'), TRUE))
				{
					continue;
				}

				if ( ! isset($configs[$filename]))
				{
					try
					{
						$configs[$filename] = Kohana::$config->load($filename)->as_array();
					}
					catch (Exception $e)
					{
						$configs[$filename] = NULL;
					}
				}
			}
		}

		ksort($configs);

		return $configs;
	}

	/**
	 * Determines if all the conditions are correct to display the toolbar
	 *
	 * @return bool
	 * @throws Kohana_Exception
	 */
	protected static function is_enabled() : bool
	{
		// Disabled with DebugToolbar::disable() call
		if (!self::$_enabled)
		{
			return FALSE;
		}

		$config = Kohana::$config->load('debug_toolbar');

		// If Access Key is set, only allow access with it
		if ($config->access_key !== FALSE)
		{
			if (isset($_GET[$config->access_key]))
			{
				return TRUE;
			}
			return FALSE;
		}

		// Don't render when in PRODUCTION (this can obviously be
		// overridden by the above access key)
		if (Kohana::$environment === Kohana::PRODUCTION)
		{
			return FALSE;
		}

		// Don't render toolbar for cli and ajax requests
		if (PHP_SAPI === 'cli' || Request::initial() === NULL || Request::initial()->is_ajax())
		{
			return FALSE;
		}

		// Don't auto render toolbar if $_GET['debug'] = 'false'
		if (isset($_GET['debug']) && strtolower($_GET['debug']) === 'false')
		{
			return FALSE;
		}

		if ( ! empty($config->excluded_routes))
		{
			$route = Request::initial()->route();
			if ($route && in_array(Route::name($route), $config->excluded_routes, TRUE))
			{
				return FALSE;
			}
		}

		// Default is Render if non above applies
		return TRUE;
	}
}
