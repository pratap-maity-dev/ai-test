<?php
/**
 * Tests for OptionsRepository.
 *
 * @package WpAiTest\Tests\Unit
 */

declare(strict_types=1);

namespace WpAiTest\Tests\Unit;

use PHPUnit\Framework\TestCase;
use WpAiTest\Settings\OptionsRepository;

/**
 * Options repository tests.
 *
 * @covers \WpAiTest\Settings\OptionsRepository
 */
final class OptionsRepositoryTest extends TestCase {
	private OptionsRepository $repository;

	protected function setUp(): void {
		parent::setUp();

		$this->repository = new OptionsRepository();
	}

	public function test_sanitize_returns_defaults_for_invalid_input(): void {
		self::assertSame(
			OptionsRepository::DEFAULT_OPTIONS,
			$this->repository->sanitize('invalid')
		);
	}

	public function test_sanitize_normalizes_enabled_value(): void {
		self::assertSame(
			['enabled' => true],
			$this->repository->sanitize(['enabled' => '1'])
		);

		self::assertSame(
			['enabled' => false],
			$this->repository->sanitize([])
		);
	}
}
