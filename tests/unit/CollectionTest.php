<?php

use App\Support\Collection;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    /** @test */
    public function empty_instantiated_collection_returns_no_items()
    {
        $collection = new Collection;

        $this->assertEmpty($collection->get());
    }

    /** @test */
    public function count_is_correct_for_items_passed_in()
    {
        $collection = new Collection([
            'one', 'two', 'three'
        ]);

        $this->assertEquals(3, $collection->count());
    }

    /** @test */
    public function items_returned_match_items_passed_in()
    {
        $collection = new Collection([
            'one', 'two', 'three'
        ]);

        $this->assertCount(3, $collection->get());
        $this->assertEquals('one', $collection->get()[0]);
        $this->assertEquals('two', $collection->get()[1]);
        $this->assertEquals('three', $collection->get()[2]);
    }

    /** @test */
    public function collection_is_instance_of_iterator_aggregate()
    {
        $collection = new Collection;

        $this->assertInstanceOf(IteratorAggregate::class, $collection);
    }

    /** @test */
    public function collection_can_be_iterated()
    {
        $collection = new Collection([
            'one', 'two', 'three'
        ]);

        $this->assertCount(3, $collection);
    }

    /** @test */
    public function collection_getIterator_is_instance_of_arrayIterator()
    {
        $collection = new Collection([
            'one', 'two', 'three'
        ]);

        $this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
    }

    /** @test */
    public function collection_can_be_merged_with_another()
    {
        $collection1 = new Collection(['one']);
        $collection2 = new Collection(['two']);
        $collection1->merge($collection2);

        $this->assertCount(2, $collection1->get());
    }

    /** @test */
    public function can_add_to_existing_collection()
    {
        $collection = new Collection(['one']);
        $collection->add(['two', 'three']);

        $this->assertCount(3, $collection->get());
    }

    /** @test */
    public function returns_json_encoded_items()
    {
        $collection = new Collection([
            'username' => 'ibad'
        ]);

        $this->assertEquals('{"username":"ibad"}', $collection->toJson());
    }

    /** @test */
    public function json_encoding_a_collection_object_returns_json()
    {
        $collection = new Collection([
            'username' => 'ibad'
        ]);

        $encoded = json_encode($collection);

        $this->assertEquals('{"username":"ibad"}', $encoded);
    }
}