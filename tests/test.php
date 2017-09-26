<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class SupportArrTest extends TestCase
{
    public function testAccessible()
    {
        $this->assertTrue(array_is_accessible(array()));
        $this->assertTrue(array_is_accessible(array(1, 2)));
        $this->assertTrue(array_is_accessible(array('a' => 1, 'b' => 2)));
        $this->assertFalse(array_is_accessible(null));
        $this->assertFalse(array_is_accessible('abc'));
        $this->assertFalse(array_is_accessible(new stdClass));
        $this->assertFalse(array_is_accessible((object)array('a' => 1, 'b' => 2)));
    }

    public function testAdd()
    {
        $array = array_add(array('name' => 'Desk'), 'price', 100);
        $this->assertEquals(array('name' => 'Desk', 'price' => 100), $array);
    }

    public function testCollapse()
    {
        $data = array(array('foo', 'bar'), array('baz'));
        $this->assertEquals(array('foo', 'bar', 'baz'), array_collapse($data));
    }

    public function testCrossJoin()
    {
        // Single dimension
        $this->assertSame(
            array(array(1, 'a'), array(1, 'b'), array(1, 'c')),
            array_cross_join(array(1), array('a', 'b', 'c'))
        );
        // Square matrix
        $this->assertSame(
            array(array(1, 'a'), array(1, 'b'), array(2, 'a'), array(2, 'b')),
            array_cross_join(array(1, 2), array('a', 'b'))
        );
        // Rectangular matrix
        $this->assertSame(
            array(array(1, 'a'), array(1, 'b'), array(1, 'c'), array(2, 'a'), array(2, 'b'), array(2, 'c')),
            array_cross_join(array(1, 2), array('a', 'b', 'c'))
        );
        // 3D matrix
        $this->assertSame(
            array(
                array(1, 'a', 'I'), array(1, 'a', 'II'), array(1, 'a', 'III'),
                array(1, 'b', 'I'), array(1, 'b', 'II'), array(1, 'b', 'III'),
                array(2, 'a', 'I'), array(2, 'a', 'II'), array(2, 'a', 'III'),
                array(2, 'b', 'I'), array(2, 'b', 'II'), array(2, 'b', 'III'),
            ),
            array_cross_join(array(1, 2), array('a', 'b'), array('I', 'II', 'III'))
        );
        // With 1 empty dimension
        $this->assertSame(array(), array_cross_join(array(), array('a', 'b'), array('I', 'II', 'III')));
        $this->assertSame(array(), array_cross_join(array(1, 2), array(), array('I', 'II', 'III')));
        $this->assertSame(array(), array_cross_join(array(1, 2), array('a', 'b'), array()));
        // With empty arrays
        $this->assertSame(array(), array_cross_join(array(), array(), array()));
        $this->assertSame(array(), array_cross_join(array(), array()));
        $this->assertSame(array(), array_cross_join(array()));
        // Not really a proper usage, still, test for preserving BC
        $this->assertSame(array(array()), array_cross_join());
    }

    public function testDivide()
    {
        list($keys, $values) = array_divide(array('name' => 'Desk'));
        $this->assertEquals(array('name'), $keys);
        $this->assertEquals(array('Desk'), $values);
    }

    public function testDot()
    {
        $array = array_dot(array('foo' => array('bar' => 'baz')));
        $this->assertEquals(array('foo.bar' => 'baz'), $array);
        $array = array_dot(array());
        $this->assertEquals(array(), $array);
        $array = array_dot(array('foo' => array()));
        $this->assertEquals(array('foo' => array()), $array);
        $array = array_dot(array('foo' => array('bar' => array())));
        $this->assertEquals(array('foo.bar' => array()), $array);
    }

    public function testExcept()
    {
        $array = array('name' => 'Desk', 'price' => 100);
        $array = array_except($array, array('price'));
        $this->assertEquals(array('name' => 'Desk'), $array);
    }

    public function testExists()
    {
        $this->assertTrue(array_exists(array(1), 0));
        $this->assertTrue(array_exists(array(null), 0));
        $this->assertTrue(array_exists(array('a' => 1), 'a'));
        $this->assertTrue(array_exists(array('a' => null), 'a'));
        $this->assertFalse(array_exists(array(1), 1));
        $this->assertFalse(array_exists(array(null), 1));
        $this->assertFalse(array_exists(array('a' => 1), 0));
    }

    public function testFirst()
    {
        $array = array(100, 200, 300);
        $value = array_first($array, function ($value) {
            return $value >= 150;
        });
        $this->assertEquals(200, $value);
        $this->assertEquals(100, array_first($array));
    }

    public function testLast()
    {
        $array = array(100, 200, 300);

        $last = array_last($array, function ($value) {
            return $value < 250;
        });

        $this->assertEquals(200, $last);
        $last = array_last($array, function ($value, $key) {
            return $key < 2;
        });

        $this->assertEquals(200, $last);
        $this->assertEquals(300, array_last($array));
    }

    public function testFlatten()
    {
        // Flat arrays are unaffected
        $array = array('#foo', '#bar', '#baz');
        $this->assertEquals(array('#foo', '#bar', '#baz'), array_flatten(array('#foo', '#bar', '#baz')));
        // Nested arrays are flattened with existing flat items
        $array = array(array('#foo', '#bar'), '#baz');
        $this->assertEquals(array('#foo', '#bar', '#baz'), array_flatten($array));
        // Flattened array includes "null" items
        $array = array(array('#foo', null), '#baz', null);
        $this->assertEquals(array('#foo', null, '#baz', null), array_flatten($array));
        // Sets of nested arrays are flattened
        $array = array(array('#foo', '#bar'), array('#baz'));
        $this->assertEquals(array('#foo', '#bar', '#baz'), array_flatten($array));
        // Deeply nested arrays are flattened
        $array = array(array('#foo', array('#bar')), array('#baz'));
        $this->assertEquals(array('#foo', '#bar', '#baz'), array_flatten($array));
    }

    public function testFlattenWithDepth()
    {
        // No depth flattens recursively
        $array = array(array('#foo', array('#bar', array('#baz'))), '#zap');
        $this->assertEquals(array('#foo', '#bar', '#baz', '#zap'), array_flatten($array));
        // Specifying a depth only flattens to that depth
        $array = array(array('#foo', array('#bar', array('#baz'))), '#zap');
        $this->assertEquals(array('#foo', array('#bar', array('#baz')), '#zap'), array_flatten($array, 1));
        $array = array(array('#foo', array('#bar', array('#baz'))), '#zap');
        $this->assertEquals(array('#foo', '#bar', array('#baz'), '#zap'), array_flatten($array, 2));
    }

    public function testGet()
    {
        $array = array('products.desk' => array('price' => 100));
        $this->assertEquals(array('price' => 100), array_get($array, 'products.desk'));
        $array = array('products' => array('desk' => array('price' => 100)));
        $value = array_get($array, 'products.desk');
        $this->assertEquals(array('price' => 100), $value);
        // Test null array values
        $array = array('foo' => null, 'bar' => array('baz' => null));
        $this->assertNull(array_get($array, 'foo', 'default'));
        $this->assertNull(array_get($array, 'bar.baz', 'default'));
        // Test direct ArrayAccess object
        $array = array('products' => array('desk' => array('price' => 100)));
        $arrayAccessObject = new ArrayObject($array);
        $value = array_get($arrayAccessObject, 'products.desk');
        $this->assertEquals(array('price' => 100), $value);
        // Test array containing ArrayAccess object
        $arrayAccessChild = new ArrayObject(array('products' => array('desk' => array('price' => 100))));
        $array = array('child' => $arrayAccessChild);
        $value = array_get($array, 'child.products.desk');
        $this->assertEquals(array('price' => 100), $value);
        // Test array containing multiple nested ArrayAccess objects
        $arrayAccessChild = new ArrayObject(array('products' => array('desk' => array('price' => 100))));
        $arrayAccessParent = new ArrayObject(array('child' => $arrayAccessChild));
        $array = array('parent' => $arrayAccessParent);
        $value = array_get($array, 'parent.child.products.desk');
        $this->assertEquals(array('price' => 100), $value);
        // Test missing ArrayAccess object field
        $arrayAccessChild = new ArrayObject(array('products' => array('desk' => array('price' => 100))));
        $arrayAccessParent = new ArrayObject(array('child' => $arrayAccessChild));
        $array = array('parent' => $arrayAccessParent);
        $value = array_get($array, 'parent.child.desk');
        $this->assertNull($value);
        // Test missing ArrayAccess object field
        $arrayAccessObject = new ArrayObject(array('products' => array('desk' => null)));
        $array = array('parent' => $arrayAccessObject);
        $value = array_get($array, 'parent.products.desk.price');
        $this->assertNull($value);
        // Test null ArrayAccess object fields
        $array = new ArrayObject(array('foo' => null, 'bar' => new ArrayObject(array('baz' => null))));
        $this->assertNull(array_get($array, 'foo', 'default'));
        $this->assertNull(array_get($array, 'bar.baz', 'default'));
        // Test null key returns the whole array
        $array = array('foo', 'bar');
        $this->assertEquals($array, array_get($array, null));
        // Test $array not an array
        $this->assertSame('default', array_get(null, 'foo', 'default'));
        $this->assertSame('default', array_get(false, 'foo', 'default'));
        // Test $array not an array and key is null
        $this->assertSame('default', array_get(null, null, 'default'));
        // Test $array is empty and key is null
        $this->assertSame(array(), array_get(array(), null));
        $this->assertSame(array(), array_get(array(), null, 'default'));
    }

    public function testHas()
    {
        $array = array('products.desk' => array('price' => 100));
        $this->assertTrue(array_has($array, 'products.desk'));
        $array = array('products' => array('desk' => array('price' => 100)));
        $this->assertTrue(array_has($array, 'products.desk'));
        $this->assertTrue(array_has($array, 'products.desk.price'));
        $this->assertFalse(array_has($array, 'products.foo'));
        $this->assertFalse(array_has($array, 'products.desk.foo'));
        $array = array('foo' => null, 'bar' => array('baz' => null));
        $this->assertTrue(array_has($array, 'foo'));
        $this->assertTrue(array_has($array, 'bar.baz'));
        $array = new ArrayObject(array('foo' => 10, 'bar' => new ArrayObject(array('baz' => 10))));
        $this->assertTrue(array_has($array, 'foo'));
        $this->assertTrue(array_has($array, 'bar'));
        $this->assertTrue(array_has($array, 'bar.baz'));
        $this->assertFalse(array_has($array, 'xxx'));
        $this->assertFalse(array_has($array, 'xxx.yyy'));
        $this->assertFalse(array_has($array, 'foo.xxx'));
        $this->assertFalse(array_has($array, 'bar.xxx'));
        $array = new ArrayObject(array('foo' => null, 'bar' => new ArrayObject(array('baz' => null))));
        $this->assertTrue(array_has($array, 'foo'));
        $this->assertTrue(array_has($array, 'bar.baz'));
        $array = array('foo', 'bar');
        $this->assertFalse(array_has($array, null));
        $this->assertFalse(array_has(null, 'foo'));
        $this->assertFalse(array_has(false, 'foo'));
        $this->assertFalse(array_has(null, null));
        $this->assertFalse(array_has(array(), null));
        $array = array('products' => array('desk' => array('price' => 100)));
        $this->assertTrue(array_has($array, array('products.desk')));
        $this->assertTrue(array_has($array, array('products.desk', 'products.desk.price')));
        $this->assertTrue(array_has($array, array('products', 'products')));
        $this->assertFalse(array_has($array, array('foo')));
        $this->assertFalse(array_has($array, array()));
        $this->assertFalse(array_has($array, array('products.desk', 'products.price')));
        $this->assertFalse(array_has(array(), array(null)));
        $this->assertFalse(array_has(null, array(null)));
    }

    public function testIsAssoc()
    {
        $this->assertTrue(array_is_assoc(array('a' => 'a', 0 => 'b')));
        $this->assertTrue(array_is_assoc(array(1 => 'a', 0 => 'b')));
        $this->assertTrue(array_is_assoc(array(1 => 'a', 2 => 'b')));
        $this->assertFalse(array_is_assoc(array(0 => 'a', 1 => 'b')));
        $this->assertFalse(array_is_assoc(array('a', 'b')));
    }

    public function testOnly()
    {
        $array = array('name' => 'Desk', 'price' => 100, 'orders' => 10);
        $array = array_only($array, array('name', 'price'));
        $this->assertEquals(array('name' => 'Desk', 'price' => 100), $array);
    }

    public function testPluck()
    {
        $array = array(
            array('developer' => array('name' => 'Taylor')),
            array('developer' => array('name' => 'Abigail')),
        );
        $array = array_pluck($array, 'developer.name');
        $this->assertEquals(array('Taylor', 'Abigail'), $array);
    }

    public function testPluckWithArrayValue()
    {
        $array = array(
            array('developer' => array('name' => 'Taylor')),
            array('developer' => array('name' => 'Abigail')),
        );
        $array = array_pluck($array, array('developer', 'name'));
        $this->assertEquals(array('Taylor', 'Abigail'), $array);
    }

    public function testPluckWithKeys()
    {
        $array = array(
            array('name' => 'Taylor', 'role' => 'developer'),
            array('name' => 'Abigail', 'role' => 'developer'),
        );

        $test1 = array_pluck($array, 'role', 'name');
        $this->assertEquals(array(
            'Taylor' => 'developer',
            'Abigail' => 'developer',
        ), $test1);

        $test2 = array_pluck($array, null, 'name');
        $this->assertEquals(array(
            'Taylor' => array('name' => 'Taylor', 'role' => 'developer'),
            'Abigail' => array('name' => 'Abigail', 'role' => 'developer'),
        ), $test2);
    }

    public function testPrepend()
    {
        $array = array_prepend(array('one', 'two', 'three', 'four'), 'zero');
        $this->assertEquals(array('zero', 'one', 'two', 'three', 'four'), $array);
        $array = array_prepend(array('one' => 1, 'two' => 2), 0, 'zero');
        $this->assertEquals(array('zero' => 0, 'one' => 1, 'two' => 2), $array);
    }

    public function testPull()
    {
        $array = array('name' => 'Desk', 'price' => 100);
        $name = array_pull($array, 'name');
        $this->assertEquals('Desk', $name);
        $this->assertEquals(array('price' => 100), $array);
        // Only works on first level keys
        $array = array('joe@example.com' => 'Joe', 'jane@localhost' => 'Jane');
        $name = array_pull($array, 'joe@example.com');
        $this->assertEquals('Joe', $name);
        $this->assertEquals(array('jane@localhost' => 'Jane'), $array);
        // Does not work for nested keys
        $array = array('emails' => array('joe@example.com' => 'Joe', 'jane@localhost' => 'Jane'));
        $name = array_pull($array, 'emails.joe@example.com');
        $this->assertNull($name);
        $this->assertEquals(array('emails' => array('joe@example.com' => 'Joe', 'jane@localhost' => 'Jane')), $array);
    }

    public function testRandom()
    {
        $random = array_random(array('foo', 'bar', 'baz'));
        $this->assertContains($random, array('foo', 'bar', 'baz'));
        $random = array_random(array('foo', 'bar', 'baz'), 0);
        $this->assertInternalType('array', $random);
        $this->assertCount(0, $random);
        $random = array_random(array('foo', 'bar', 'baz'), 1);
        $this->assertInternalType('array', $random);
        $this->assertCount(1, $random);
        $this->assertContains($random[0], array('foo', 'bar', 'baz'));
        $random = array_random(array('foo', 'bar', 'baz'), 2);
        $this->assertInternalType('array', $random);
        $this->assertCount(2, $random);
        $this->assertContains($random[0], array('foo', 'bar', 'baz'));
        $this->assertContains($random[1], array('foo', 'bar', 'baz'));
        $random = array_random(array('foo', 'bar', 'baz'), '0');
        $this->assertInternalType('array', $random);
        $this->assertCount(0, $random);
        $random = array_random(array('foo', 'bar', 'baz'), '1');
        $this->assertInternalType('array', $random);
        $this->assertCount(1, $random);
        $this->assertContains($random[0], array('foo', 'bar', 'baz'));
        $random = array_random(array('foo', 'bar', 'baz'), '2');
        $this->assertInternalType('array', $random);
        $this->assertCount(2, $random);
        $this->assertContains($random[0], array('foo', 'bar', 'baz'));
        $this->assertContains($random[1], array('foo', 'bar', 'baz'));
    }

    public function testRandomOnEmptyArray()
    {
        $random = array_random(array(), 0);
        $this->assertInternalType('array', $random);
        $this->assertCount(0, $random);
        $random = array_random(array(), '0');
        $this->assertInternalType('array', $random);
        $this->assertCount(0, $random);
    }

    public function testRandomThrowsAnErrorWhenRequestingMoreItemsThanAreAvailable()
    {
        $exceptions = 0;
        try {
            array_random(array());
        } catch (\InvalidArgumentException $e) {
            ++$exceptions;
        }
        try {
            array_random(array(), 1);
        } catch (\InvalidArgumentException $e) {
            ++$exceptions;
        }
        try {
            array_random(array(), 2);
        } catch (\InvalidArgumentException $e) {
            ++$exceptions;
        }
        $this->assertSame(3, $exceptions);
    }

    public function testSet()
    {
        $array = array('products' => array('desk' => array('price' => 100)));
        array_set($array, 'products.desk.price', 200);
        $this->assertEquals(array('products' => array('desk' => array('price' => 200))), $array);
    }


    public function testWhere()
    {
        $array = array(100, '200', 300, '400', 500);
        if (version_compare(PHP_VERSION, '5.6.0') >= 0) {
            $array = array_where($array, function ($value, $key) {
                return is_string($value);
            });
        } else {
            $array = array_where($array, function ($value) {
                return is_string($value);
            });
        }

        $this->assertEquals(array(1 => 200, 3 => 400), $array);
    }

    public function testWhereKey()
    {
        if (version_compare(PHP_VERSION, '5.6.0') >= 0) {
            $array = array('10' => 1, 'foo' => 3, 20 => 2);
            $array = array_where($array, function ($value, $key) {
                return is_numeric($key);
            });

            $this->assertEquals(array('10' => 1, 20 => 2), $array);
        }
    }

    public function testForget()
    {
        $array = array('products' => array('desk' => array('price' => 100)));
        array_forget($array, null);
        $this->assertEquals(array('products' => array('desk' => array('price' => 100))), $array);
        $array = array('products' => array('desk' => array('price' => 100)));
        array_forget($array, array());
        $this->assertEquals(array('products' => array('desk' => array('price' => 100))), $array);
        $array = array('products' => array('desk' => array('price' => 100)));
        array_forget($array, 'products.desk');
        $this->assertEquals(array('products' => array()), $array);
        $array = array('products' => array('desk' => array('price' => 100)));
        array_forget($array, 'products.desk.price');
        $this->assertEquals(array('products' => array('desk' => array())), $array);
        $array = array('products' => array('desk' => array('price' => 100)));
        array_forget($array, 'products.final.price');
        $this->assertEquals(array('products' => array('desk' => array('price' => 100))), $array);
        $array = array('shop' => array('cart' => array(150 => 0)));
        array_forget($array, 'shop.final.cart');
        $this->assertEquals(array('shop' => array('cart' => array(150 => 0))), $array);
        $array = array('products' => array('desk' => array('price' => array('original' => 50, 'taxes' => 60))));
        array_forget($array, 'products.desk.price.taxes');
        $this->assertEquals(array('products' => array('desk' => array('price' => array('original' => 50)))), $array);
        $array = array('products' => array('desk' => array('price' => array('original' => 50, 'taxes' => 60))));
        array_forget($array, 'products.desk.final.taxes');
        $this->assertEquals(array('products' => array('desk' => array('price' => array('original' => 50, 'taxes' => 60)))), $array);
        $array = array('products' => array('desk' => array('price' => 50), null => 'something'));
        array_forget($array, array('products.amount.all', 'products.desk.price'));
        $this->assertEquals(array('products' => array('desk' => array(), null => 'something')), $array);
        // Only works on first level keys
        $array = array('joe@example.com' => 'Joe', 'jane@example.com' => 'Jane');
        array_forget($array, 'joe@example.com');
        $this->assertEquals(array('jane@example.com' => 'Jane'), $array);
        // Does not work for nested keys
        $array = array('emails' => array('joe@example.com' => array('name' => 'Joe'), 'jane@localhost' => array('name' => 'Jane')));
        array_forget($array, array('emails.joe@example.com', 'emails.jane@localhost'));
        $this->assertEquals(array('emails' => array('joe@example.com' => array('name' => 'Joe'))), $array);
    }

    public function testWrap()
    {
        $string = 'a';
        $array = array('a');
        $object = new stdClass;
        $object->value = 'a';
        $this->assertEquals(array('a'), array_wrap($string));
        $this->assertEquals($array, array_wrap($array));
        $this->assertEquals(array($object), array_wrap($object));
    }
}