<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();
        return view('admin.produtos.index',compact('produtos'));
    }

    public function create()
    {
        return view('admin.produtos.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'codigo' => 'required',
            'descricao' => 'required',
            'estado' => 'required',
            'condicao' => 'required',
            'propriedade' => 'required',
            'quantidade' => 'required',
            'local_origem' => 'required',
            'local_estoque' => 'required',
            'custo' => 'required',
            'status' => 'required',
            'fornecedor' => 'required',
        ]);

        $produto = new Produto;

        $produto->codigo = $request->codigo;
        $produto->descricao = $request->descricao;
        $produto->estado = $request->estado;
        $produto->condicao = $request->condicao;
        $produto->propriedade = $request->propriedade;
        $produto->quantidade = $request->quantidade;
        $produto->local_origem = $request->local_origem;
        $produto->local_estoque = $request->local_estoque;
        $produto->custo = $request->custo;
        $produto->status = $request->status;
        $produto->fornecedor = $request->fornecedor;

        $produto->save();

        return redirect()->route('produtos.index')->with(
            'success','Produto Cadastrado com sucesso'
        );
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $produto = Produto::where('id',$id)->first();
        return view('admin.produtos.edit',compact('produto'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'codigo' => 'required',
            'descricao' => 'required',
            'estado' => 'required',
            'condicao' => 'required',
            'propriedade' => 'required',
            'quantidade' => 'required',
            'local_origem' => 'required',
            'local_estoque' => 'required',
            'custo' => 'required',
            'status' => 'required',
            'fornecedor' => 'required',
        ]);

        Produto::where('id',$id)->update([
            'codigo' => $request->codigo,
            'descricao' => $request->descricao,
            'estado' => $request->estado,
            'condicao' => $request->condicao,
            'propriedade' => $request->propriedade,
            'quantidade' => $request->quantidade,
            'local_origem' => $request->local_origem,
            'local_estoque' => $request->local_estoque,
            'custo' => $request->custo,
            'status' => $request->status,
            'fornecedor' => $request->fornecedor,
        ]);

        return redirect()->route('produtos.index')->with(
            'success','Produto Editado com sucesso'
        );
    }

    public function destroy($id)
    {
        Produto::where('id',$id)->delete();

        return redirect()->route('produtos.index')->with(
            'success','Produto Apagado com Successo'
        );
    }
}
