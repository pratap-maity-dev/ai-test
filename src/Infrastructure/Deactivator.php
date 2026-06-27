<?php
/**
 * Deactivation behavior.
 *
 * @package WpAiTest
 */

declare(strict_types=1);

namespace WpAiTest\Infrastructure;

/**
 * Performs deactivation tasks.
 */
final class Deactivator {
	/**
	 * Flush rewrite rules on deactivation.
	 */
	public function deactivate(): void {
		flush_rewrite_rules();
	}
}
