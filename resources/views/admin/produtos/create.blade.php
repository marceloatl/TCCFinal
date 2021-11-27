@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Produtos')

@section('css')

@stop

@section('content_header')
<div class="row">
    <div class="col-md-6">
        <h1>Cadastro Produto</h1>
        <span>Prueba de Texto</span>
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
        <h3 class="card-title">Cadastro Produtos</h3>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <form action="{{route('produtos.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Código</label>
                        <input type="text" name="codigo" class="form-control" placeholder="Insira Código" value="{{old('codigo')}}"></input>
                    </div>
                    <div class="col-md-9">
                        <label for="">Descrição do Produto</label>
                        <input type="text" name="descricao" class="form-control" placeholder="Insira Descrição" value="{{old('descricao')}}"></input>
                    </div>
                    <div class="col-md-3">
                        <label for="">Estado do Produto</label>
                        <select class="form-control" name="estado" id="">
                            <option selected="true" disabled="disabled">Selecione um Estado</option>
                            <option value="Usado">Usado</option>
                            <option value="Novo">Novo</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Condiçao</label>
                        <input type="text" name="condicao" class="form-control" placeholder="Insira Condição" value="{{old('condicao')}}"></input>
                    </div>
                    <div class="col-md-3">
                        <label for="">Propriedade</label>
                        <select class="form-control" name="propriedade" id="">
                            <option selected="true" disabled="disabled">Selecione uma Propriedade</option>
                            <option value="Cliente">Cliente</option>
                            <option value="Empresa">Empresa</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="">Quantidade</label>
                        <input type="number" name="quantidade" class="form-control" placeholder="Insira Quantidade" value="{{old('quantidade')}}"></input>
                    </div>
                    <div class="col-md-3">
                        <label for="">Local Origem</label>
                        <input type="text" name="local_origem" class="form-control" placeholder="Insira Local de Origem" value="{{old('local_origem')}}"></input>
                    </div>
                    <div class="col-md-3">
                        <label for="">Local Estoque</label>
                        <input type="text" name="local_estoque" class="form-control" placeholder="Insira Local de Estoque" value="{{old('local_estoque')}}"></input>
                    </div>
                    <div class="col-md-2">
                        <label for="">Custo</label>
                        <input type="number" name="custo" class="form-control" placeholder="Insira Custo" value="{{old('custo')}}"></input>
                    </div>
                    <div class="col-md-2">
                        <label for="">Status</label>
                        <select class="form-control" name="status" id="">
                            <option selected="true" disabled="disabled">Selecione um Status do Produto</option>
                            <option value="1">Ativo</option>
                            <option value="0">Inativo</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="">Fornecedor</label>
                        <input type="text" name="fornecedor" class="form-control" placeholder="Insira Fornecedor" value="{{old('fornecedor')}}"></input>
                    </div>
                    <div class="mr-1 ml-2 mt-0">
                        <label for=""> </label>
                        <button type="submit" class="form-control btn btn-primary">Cadastrar</button>
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
