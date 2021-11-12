@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Usuarios')

@section('css')

@stop

@section('content_header')
<div class="row">
    <div class="col-md-6">
        <h1>Cadastro de Usuarios</h1>
       
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
        <h3 class="card-title">Cadastro Usuarios</h3>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <form id="basic-form" enctype="multipart/form-data" method="post" action="{{route('users.store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Nome <span id="text-red">*</span></label>
                                <input type="text" value="{{old('name')}}" class="form-control" name="name">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email <span id="text-red">*</span></label>
                                <input type="email" value="{{old('email')}}" class="form-control" name="email">
                            </div>

                            <div class="form-group col-md-6">
                                <label>Rol <span id="text-red">*</span></label>
                                <select class="form-control" name="role_id" id="">
                                    <option selected="true" disabled="disabled">Selecione um Rol</option>
                                    @foreach($roles as $rol)
                                        <option value="{{$rol->id}}">{{$rol->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-success">Cadastrar Usuario</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script>
    $("#cpf").mask("000.000.000-00");
    $("#telefone").mask("(00)0000-0000");
    $("#whatsapp").mask("(00)00000-0000");
</script>
@endsection
