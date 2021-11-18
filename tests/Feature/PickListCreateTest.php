<?php

namespace Tests\Feature;

use App\Models\Picklist;
use App\Models\Produto;
use App\Models\User;
use App\Models\Workorder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class PickListCreatetest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_picklist_can_be_created()
    {
        Picklist::create([
            'produto_id' => 1,
            'quantidade' => '50',
            'cliente' => 'New-Cliente',
            'bill' => 'Bill',
            'observacoes' => 'Observacoes 1',
        ]);
        //Guarda na variabel $user o usuario autenticado com id 1
        $user = User::where('id',1)->first();
        $this->actingAs($user)->get('admin/workorders')->assertStatus(200)->assertSee('New-Fornecedor');

    }
}
