<?php

namespace Tests\Feature;

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

}
