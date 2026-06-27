<?php
/**
 * Plugin composition root.
 *
 * @package WpAiTest
 */

declare(strict_types=1);

namespace WpAiTest;

use WpAiTest\Admin\SettingsPage;
use WpAiTest\Infrastructure\Activator;
use WpAiTest\Infrastructure\Deactivator;
use WpAiTest\Rest\StatusController;
use WpAiTest\Settings\OptionsRepository;

/**
 * Builds plugin services and exposes lifecycle callbacks.
 */
final class PluginFactory {
	/**
	 * Create the plugin instance.
	 */
	public static function create(): Plugin {
		$options_repository = new OptionsRepository();

		return new Plugin(
			new I18n(),
			new SettingsPage($options_repository),
			new StatusController($options_repository)
		);
	}

	/**
	 * Run activation tasks.
	 */
	public static function activate(): void {
		( new Activator() )->activate();
	}

	/**
	 * Run deactivation tasks.
	 */
	public static function deactivate(): void {
		( new Deactivator() )->deactivate();
	}
}
