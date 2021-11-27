@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Editar Produtos')

@section('css')

@stop

@section('content_header')
<div class="row">
    <div class="col-md-6">
        <h1>Editar Produto</h1>
        
        @if ($errors->any())
            <div class="alert alert-red" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(Session::has('danger'))
            <div class="alert alert-red" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{Session::get('danger')}}
            </div>
        @endif
    </div>
    <div class="col-md-6 text-right pt-2">
        <a href="{{route('produtos.index')}}">
            <button class="btn btn-danger">Voltar</button>
        </a>
    </div>
</div>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Editar Produtos</h3>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <form action="{{route('produtos.update',$produto->id)}}" method="post">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Código</label>
                        <input type="text" name="codigo" class="form-control" placeholder="Insira Código" value="{{old('codigo',$produto->codigo)}}"></input>
                    </div>
                    <div class="col-md-9">
                        <label for="">Descrição do Produto</label>
                        <input type="text" name="descricao" class="form-control" placeholder="Insira Descrição" value="{{old('descricao',$produto->descricao)}}"></input>
                    </div>
                    <div class="col-md-3">
                        <label for="">Estado do Produto</label>
                        <select class="form-control" name="estado" id="">
                            <option selected="true" disabled="disabled">Selecione um Estado</option>
                            <option value="Usado"{{old('estado') == 'Usado' ? 'selected' : ''}} @if($produto->estado=='Usado') selected @endif>Usado</option>
                            <option value="Novo"{{old('estado') == 'Novo' ? 'selected' : ''}} @if($produto->estado=='Novo') selected @endif>Novo</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Condiçao</label>
                        <input type="text" name="condicao" class="form-control" placeholder="Insira Condição" value="{{old('condicao',$produto->condicao)}}"></input>
                    </div>
                    <div class="col-md-3">
                        <label for="">Propriedade</label>
                        <select class="form-control" name="propriedade" id="">
                            <option selected="true" disabled="disabled">Selecione uma Propriedade</option>
                            <option value="Cliente" {{old('propriedade') == 'Cliente' ? 'selected' : ''}} @if($produto->propriedade=='Cliente') selected @endif>Cliente</option>
                            <option value="Empresa" {{old('propriedade') == 'Empresa' ? 'selected' : ''}} @if($produto->propriedade=='Empresa') selected @endif>Empresa</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="">Quantidade</label>
                        <input readonly type="number" name="quantidade" class="form-control" placeholder="Insira Quantidade" value="{{old('quantidade',$produto->quantidade)}}"></input>
                    </div>
                    <div class="col-md-3">
                        <label for="">Local Origem</label>
                        <input type="text" name="local_origem" class="form-control" placeholder="Insira Local de Origem" value="{{old('local_origem',$produto->local_origem)}}"></input>
                    </div>
                    <div class="col-md-3">
                        <label for="">Local Estoque</label>
                        <input type="text" name="local_estoque" class="form-control" placeholder="Insira Local de Estoque" value="{{old('local_estoque',$produto->local_estoque)}}"></input>
                    </div>
                    <div class="col-md-2">
                        <label for="">Custo</label>
                        <input type="number" name="custo" class="form-control" placeholder="Insira Custo" value="{{old('custo',$produto->custo)}}"></input>
                    </div>
                    <div class="col-md-2">
                        <label for="">Status</label>
                        <select class="form-control" name="status" id="">
                            <option selected="true" disabled="disabled">Selecione um Status do Produto</option>
                            <option value="1" {{old('status') == '1' ? 'selected' : ''}} @if($produto->status=='1') selected @endif>Ativo</option>
                            <option value="0" {{old('status') == '0' ? 'selected' : ''}} @if($produto->status=='0') selected @endif>Inativo</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="">Fornecedor</label>
                        <input type="text" name="fornecedor" class="form-control" placeholder="Insira Fornecedor" value="{{old('fornecedor',$produto->fornecedor)}}"></input>
                    </div>
                    <div class="mr-1 ml-2 mt-0">
                        <label for=""> </label>
                        <button type="submit" class="form-control btn btn-primary">Editar</button>
                    </div>
                    <div class="mr-1 mt-0">
                        <label for=""> </label>
                        <a href="{{route('produtos.index')}}"><button type="button" class="form-control btn btn-danger">Cancelar</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('footer')
<div class="layout-footer-fixed">
    <span>Furniture</span>
</div>
@endsection
