<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Produto;


class ProdutoCreateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_produto_create()
    {
        $produto = Produto::create([
            'codigo' => '123',
            'descricao' => 'Hello',
            'estado' => 'usado',
            'condicao' => 'oka',
            'propriedade' => 'cliente',
            'quantidade' => 200,
            'local_origem' => '1',
            'local_estoque' => '2',
            'custo' => 23.00,
            'status' => 1,
            'forncedor' => 'Fornecedor 1'
        ]);
        $produto->assertStatus(200);
    }
}

