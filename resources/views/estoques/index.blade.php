@extends('layouts.default')

@section('content')
    <h3>Listagem de Estoque</h3>
    {!! Form::open(['name' => 'estoques', 'route' => 'estoques']) !!}
    <div class="sidebar-form">
        <div class="input-group">
            <input type="text" name="desc_filtro" class="form-control" style="width:80% !important;" placeholder="Pesquisa...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-default">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </div>
    {!! Form::close() !!}
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estoques as $estoque)
                <tr>
                    <td>{{ $estoque->IdEstoque }}</td>
                    <td>{{ $estoque->Qtd }}</td>
                    <td>
                        <a href="{{ route('estoques.edit', ['IdEstoque' => \Crypt::encrypt($estoque->IdEstoque)]) }}" class="btn-sm btn-success">Editar</a>
                        <a href="{{ route('estoques.destroy', ['IdEstoque' => \Crypt::encrypt($estoque->IdEstoque)]) }}" onclick="return confirm('Tem certeza de que deseja excluir este item?')" class="btn-sm btn-danger">Remover</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $estoques->links() }}

    <a href="{{ route('estoques.create', []) }}" class="btn btn-info">Criar novo estoque</a>
@stop

@section('table-delete')
    "Estoques"
@endsection
