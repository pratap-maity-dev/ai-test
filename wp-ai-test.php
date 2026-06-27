<?php
/**
 * Plugin Name:       WP AI Test
 * Plugin URI:        https://example.com/wp-ai-test
 * Description:       A production-ready WordPress plugin scaffold using Composer, PSR-4, OOP, WPCS, PHPUnit, and GitHub Actions.
 * Version:           1.0.0
 * Requires at least: 6.5
 * Requires PHP:      8.1
 * Author:            WP AI Test
 * Author URI:        https://example.com
 * Text Domain:       wp-ai-test
 * Domain Path:       /languages
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package WpAiTest
 */

declare(strict_types=1);

use WpAiTest\PluginFactory;

defined('ABSPATH') || exit;

if ( ! defined('WP_AI_TEST_PLUGIN_FILE')) {
	define('WP_AI_TEST_PLUGIN_FILE', __FILE__);
}

$wp_ai_test_autoload = __DIR__ . '/vendor/autoload.php';

if (file_exists($wp_ai_test_autoload)) {
	require_once $wp_ai_test_autoload;
}

if ( ! class_exists(PluginFactory::class)) {
	add_action(
		'admin_notices',
		static function (): void {
			if ( ! current_user_can('activate_plugins')) {
				return;
			}

			printf(
				'<div class="notice notice-error"><p>%s</p></div>',
				esc_html__(
					'WP AI Test requires Composer dependencies. Run "composer install" in the plugin directory.',
					'wp-ai-test'
				)
			);
		}
	);

	return;
}

register_activation_hook(WP_AI_TEST_PLUGIN_FILE, [PluginFactory::class, 'activate']);
register_deactivation_hook(WP_AI_TEST_PLUGIN_FILE, [PluginFactory::class, 'deactivate']);

add_action(
	'plugins_loaded',
	static function (): void {
		PluginFactory::create()->register();
	}
);
