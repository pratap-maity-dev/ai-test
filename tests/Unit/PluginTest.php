<?php
/**
 * Tests for plugin hook registration.
 *
 * @package WpAiTest\Tests\Unit
 */

declare(strict_types=1);

namespace WpAiTest\Tests\Unit;

use Brain\Monkey;
use Brain\Monkey\Actions;
use PHPUnit\Framework\TestCase;
use WpAiTest\Admin\SettingsPage;
use WpAiTest\I18n;
use WpAiTest\Plugin;
use WpAiTest\Rest\StatusController;
use WpAiTest\Settings\OptionsRepository;

/**
 * Plugin registration tests.
 *
 * @covers \WpAiTest\Plugin
 */
final class PluginTest extends TestCase {
	protected function setUp(): void {
		parent::setUp();
		Monkey\setUp();
	}

	protected function tearDown(): void {
		Monkey\tearDown();
		parent::tearDown();
	}

	public function test_register_adds_expected_wordpress_hooks(): void {
		$repository = new OptionsRepository();
		$plugin     = new Plugin(
			new I18n(),
			new SettingsPage($repository),
			new StatusController($repository)
		);

		Actions\expectAdded('init')->once();
		Actions\expectAdded('admin_menu')->once();
		Actions\expectAdded('admin_init')->once();
		Actions\expectAdded('rest_api_init')->once();

		$plugin->register();

		$this->addToAssertionCount(4);
	}
}
