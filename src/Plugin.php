<?php
/**
 * Main plugin orchestrator.
 *
 * @package WpAiTest
 */

declare(strict_types=1);

namespace WpAiTest;

use WpAiTest\Admin\SettingsPage;
use WpAiTest\Rest\StatusController;

/**
 * Registers WordPress hooks for plugin services.
 */
final class Plugin {
	public function __construct(
		private readonly I18n $i18n,
		private readonly SettingsPage $settings_page,
		private readonly StatusController $status_controller
	) {}

	/**
	 * Register all runtime hooks.
	 */
	public function register(): void {
		$this->i18n->register();
		$this->settings_page->register();
		$this->status_controller->register();
	}
}
