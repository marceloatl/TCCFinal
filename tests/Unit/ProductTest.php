<?php

namespace Tests\Unit;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_a_product_has_many_workorders()
    {
        $produto = new Produto;
        $this->assertInstanceOf(Collection::class, $produto->workorders);
    }
}
