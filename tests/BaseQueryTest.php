<?php namespace ClanCats\Hydrahon\Test;
/**
 * Hydrahon base query test 
 ** 
 *
 * @package 		Hydrahon
 * @copyright 		Mario Döring
 *
 * @group Hydrahon
 * @group Hydrahon_BaseQuery
 */

use ClanCats\Hydrahon\BaseQuery;
use ClanCats\Hydrahon\Query\Sql\Table;
use ClanCats\Hydrahon\Query\Sql\Select;

class BaseQueryTest extends \PHPUnit_Framework_TestCase
{
	public function testFlags()
	{
		$query = new BaseQuery;

		$this->assertNull($query->getFlag('foo'));
		$this->assertEquals('bar', $query->getFlag('foo', 'bar'));

		$query->setFlag('number', 42);
		$this->assertEquals(42, $query->getFlag('number'));
		$this->assertEquals(42, $query->getFlag('number', 'nope'));
	}

	public function testFlagInheritence()
	{
		$query = new Table;
		$query->setFlag('foo', 'bar');

		$select = $query->select();
		$this->assertInstanceOf(Select::class, $select);

		$this->assertEquals('bar', $select->getFlag('foo'));
	}
}