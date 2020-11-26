<?php

namespace Tests\Feature;

use App\Models\Group;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /** @test */
    public function create_product()
    {
        $beforeInserting = Product::all()->count();

        Product::create([
            "group_id" => "1",
            "user_id" => "1",
            "amount" => "111",
            "description" => "unitTest",
            "consumption_at" => "2020-10-21"
        ]);

        $afterInserting = Product::all();

        $this->assertCount($beforeInserting + 1, $afterInserting);
    }

    /** @test */
    public function only_fillable_attributes()
    {
        $product = new Product();

        $this->assertEquals([
            'group_id', 'user_id', 'description',
            'amount', 'detail', 'consumption_at',
        ], $product->getFillable());
    }

    /** @test */
    public function has_relationship_with_group()
    {
        $product = new Product();
        $group = new Group();

        $gg = $product->group()->getRelated();

        $this->assertEquals($group, $product->group()->getRelated());
    }

}
