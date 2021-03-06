@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Produtos')

@section('css')
<style type="text/css">
    .alert-red{
        color: #721c24;
        background: #f8d7da;
        border-color: #f5c6cb;
    }
    .alert-green{
        color: #155724;
        background: #d4edda;
        border-color: #c3e6cb;
    }
</style>
@stop

@section('content_header')
<div class="row">
    <div class="col-md-6">
        <h1>Picklist</h1>
        
        @if(Session::has('success'))
            <div class="alert alert-green" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{Session::get('success')}}
            </div>
        @endif
    </div>
    <div class="col-md-6 text-right pt-2">
        <a href="{{route('picklists.create')}}">
            <button class="btn btn-success">Criar Picklist</button>
        </a>
    </div>
</div>
@stop

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Picklists</h3>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <table id="tabela" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Produto</th>
                                <th>Quantidade</th>
                                <th>Cliente</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($picklists as $picklist)
                            <tr>
                                <td>{{$picklist->id}}</td>
                                <td>{{$picklist->produto->descricao}}</td>
                                <td>{{$picklist->quantidade}}</td>
                                <td>{{$picklist->cliente}}</td>
                                <td style="width:12%;">
                                    <a href="{{route('picklists.show', $picklist->id)}}">
                                        <button class="btn btn-sm btn-info btn-show"><i class="fas fa-eye"></i></button>
                                    </a>
                                    <a href="{{route('picklists.edit', $picklist->id)}}">
                                        <button class="btn btn-sm btn-success btn-edit"><i class="far fa-edit"></i></button>
                                    </a>
                                    <button class="btn btn-sm btn-danger btn-delete" type="submit" data-toggle="modal" data-target="#apagarmodal" id="apagarbotao" data-id="{{$picklist->id}}"><i class="fas fa-minus-circle"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="apagarmodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Confirma excluir este ITEM?</p>
                <div class="row">
                    <form action="" method="post" id="apagarpicklist">
                        {{ method_field('DELETE') }}
                        @csrf
                        <button class="btn btn-danger" type="submit">Apagar</button>
                    </form>
                    <button type="button" class="btn btn-primary col-md-3 ml-1" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer')
<div class="layout-footer-fixed">
    <span>Estoque</span>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#tabela').DataTable({
                responsive: true,
                autoWidth: false,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json'
            }
            });
        } );
        $(document).on('click', '#apagarbotao', function() {
            var id = $(this).data("id");
            console.log(id);
            $('#apagarpicklist').attr("action", `{{url('/admin/picklists/${id}')}}`);
        });
    </script>
@stop
