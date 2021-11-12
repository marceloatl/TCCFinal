<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Picklist;
use App\Models\Produto;
use Illuminate\Http\Request;

class PicklistController extends Controller
{

    public function index()
    {
        $picklists = Picklist::all();
        return view('admin.picklists.index',compact('picklists'));
    }

    public function create()
    {
        $produtos = Produto::all();
        return view('admin.picklists.create',compact('produtos'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'produto_id' => 'required',
            'quantidade' => 'required',
            'bill' => 'required',
            'cliente' => 'required'
        ]);

        $picklist = new Picklist;

        $picklist->produto_id = $request->produto_id;
        $picklist->quantidade = $request->quantidade;
        $picklist->cliente= $request->cliente;
        $picklist->bill = $request->bill;
        $picklist->observacoes = $request->observacoes;

        $picklist->save();

        $produto = Produto::where('id',$request->produto_id)->first();
        $quantidade = $produto->quantidade - $request->quantidade;

        Produto::where('id',$request->produto_id)->update([
            'quantidade' => $quantidade
        ]);

        return redirect()->route('picklists.index')->with(
            'success','Picklist Cadastrado com sucesso'
        );
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $produtos = Produto::all();
        $picklist = Picklist::where('id',$id)->first();
        return view('admin.picklists.edit',compact('picklist','produtos'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'produto_id' => 'required',
            'quantidade' => 'required',
            'bill' => 'required',
            'fornecedor' => 'required'
        ]);

        Picklist::where('id',$id)->update([
            'produto_id' => $request->produto_id,
            'quantidade' => $request->quantidade,
            'fornecedor'=> $request->fornecedor,
            'bill' => $request->bill,
            'observacoes' => $request->observacoes,
        ]);

        return redirect()->route('picklists.index')->with(
            'success','Picklist Editado com sucesso'
        );
    }

    public function destroy($id)
    {
        $picklist = Picklist::where('id',$id)->first();
        $produto = Produto::where('id',$picklist->produto_id)->first();
        $quantidade = $produto->quantidade + $picklist->quantidade;

        Produto::where('id',$picklist->produto_id)->update([
            'quantidade' => $quantidade
        ]);

        Picklist::where('id',$id)->delete();

        return redirect()->route('picklists.index')->with(
            'success','Picklist Apagado com Successo'
        );

    }
}
