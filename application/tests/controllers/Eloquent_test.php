<?php
/**
 * Part of ci-phpunit-test
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/ci-phpunit-test
 */

class EloquentTest extends TestCase
{
	public function test_do_testow()
	{
            $output = $this->request('GET', 'eloquent/do_testow/1');
            
            $this->assertContains(
                'michal', $output
            );

	}
}
