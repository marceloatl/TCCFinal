<?php

namespace Tests\Feature;

use App\Models\Produto;
use App\Models\Picklist;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductCreateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_product_can_be_created()
    {
        //Cria o Produto
        Pickklist::create([
            'codigo' => 'AABBCCDD',
            'descricao' => 'Table',
            'estado' => 'New',
            'condicao' => 'Oka',
            'propriedade' => 'Client',
            'quantidade' => '200',
            'local_origem' => 'Brasil',
            'local_estoque' => 'USA',
            'custo' => 12.30,
            'status' => '1',
            'fornecedor' => 'Fornecedor 1',
        ]);
        //Guarda na variabel $user o usuario autenticado com id 1
        $user = User::where('id',1)->first();
        //Esse usuario chama a url dos produtos e verifica se o codigo do produto existe.
        $this->actingAs($user)->get('admin/produtos')->assertStatus(200)->assertSee('AABBCCDD');
    }
}