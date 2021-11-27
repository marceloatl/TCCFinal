@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Workorders')

@section('css')

@stop

@section('content_header')
<div class="row">
    <div class="col-md-6">
        <h1>Cadastro Workorders</h1>
        
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
        <a href="{{route('workorders.index')}}">
            <button class="btn btn-danger">Voltar</button>
        </a>
    </div>
</div>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Cadastro Workorders</h3>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <form action="{{route('workorders.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Produto</label>
                        <select class="form-control" name="produto_id" id="">
                            <option selected="true" disabled="disabled">Selecione um Produto</option>
                            @foreach($produtos as $produto)
                                <option value="{{$produto->id}}" {{old('produto_id') == $produto->id ? 'selected' : ''}}>{{$produto->descricao}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">Quantidade</label>
                        <input type="number" name="quantidade" class="form-control" placeholder="Informe  Quantidade" value="{{old('quantidade')}}"></input>
                    </div>

                    <div class="col-md-3">
                        <label for="">Bill</label>
                        <input type="text" name="bill" class="form-control" placeholder="Insira Bill" value="{{old('bill')}}"></input>
                    </div>
                    <div class="col-md-12">
                        <label for="">Fornecedor</label>
                        <input type="text" name="fornecedor" class="form-control" placeholder="Insira fornecedor" value="{{old('fornecedor')}}"></input>
                    </div>
                    <div class="col-md-12">
                        <label for="">Observações</label>
                        <input type="text" name="observacoes" class="form-control" placeholder="Insira observacoes" value="{{old('observacoes')}}"></input>
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
