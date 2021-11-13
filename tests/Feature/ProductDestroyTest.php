<?php

namespace Tests\Feature;

use App\Models\Produto;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductDestroyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_product_can_be_deleted()
    {
        $produto = Produto::where('codigo','AABBCCDD')->first();
        $produto->delete();

        $user = User::where('id',1)->first();
        //Esse usuario chama a url dos produtos e verifica se o codigo do produto já não existe.
        $this->actingAs($user)->get('admin/produtos')->assertStatus(200)->assertDontSee('AABBCCDD');
    }
}