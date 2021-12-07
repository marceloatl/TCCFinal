<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\Workorder;
use Illuminate\Http\Request;

class WorkorderController extends Controller
{

    public function index()
    {
        $workorders = Workorder::all();
        return view('admin.workorders.index',compact('workorders'));
    }

    public function create()
    {
        $produtos = Produto::all();
        return view('admin.workorders.create',compact('produtos'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'produto_id' => 'required',
            'quantidade' => 'required',
            'bill' => 'required',
            'fornecedor' => 'required'
        ]);

        $workorder = new Workorder();

        $workorder->produto_id = $request->produto_id;
        $workorder->quantidade = $request->quantidade;
        $workorder->fornecedor= $request->fornecedor;
        $workorder->bill = $request->bill;
        $workorder->observacoes = $request->observacoes;

        $workorder->save();

        $produto = Produto::where('id',$request->produto_id)->first();
        $quantidade = $produto->quantidade + $request->quantidade;

        Produto::where('id',$request->produto_id)->update([
            'quantidade' => $quantidade
        ]);

        return redirect()->route('workorders.index')->with(
            'success','Workorder Cadastrado com sucesso'
        );
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $workorder = Workorder::where('id',$id)->first();
        $produtos = Produto::all();
        return view('admin.workorders.edit',compact('workorder','produtos'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'produto_id' => 'required',
            'quantidade' => 'required',
            'bill' => 'required',
            'cliente' => 'required'
        ]);

        Workorder::where('id',$id)->update([
            'produto_id' => $request->produto_id,
            'quantidade' => $request->quantidade,
            'cliente'=> $request->cliente,
            'bill' => $request->bill,
            'observacoes' => $request->observacoes,
        ]);

        return redirect()->route('workorders.index')->with(
            'success','Workorder Editado com sucesso'
        );
    }

    public function destroy($id)
    {
        $workorder = Workorder::where('id',$id)->first();
        $produto = Produto::where('id',$workorder->produto_id)->first();
        $quantidade = $produto->quantidade - $workorder->quantidade;

        Produto::where('id',$workorder->produto_id)->update([
            'quantidade' => $quantidade
        ]);

        Workorder::where('id',$id)->delete();

        return redirect()->route('workorders.index')->with(
            'success','workorder Apagada com Successo'
        );
    }
}
