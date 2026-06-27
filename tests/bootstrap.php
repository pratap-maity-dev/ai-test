<?php
/**
 * PHPUnit bootstrap.
 *
 * @package WpAiTest\Tests
 */

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

if ( ! defined('ABSPATH')) {
	define('ABSPATH', dirname(__DIR__) . '/');
}

if ( ! defined('WP_AI_TEST_PLUGIN_FILE')) {
	define('WP_AI_TEST_PLUGIN_FILE', dirname(__DIR__) . '/wp-ai-test.php');
}
