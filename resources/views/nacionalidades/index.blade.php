@extends('layouts.default')

@section('content')
    <h3>Listagem de Nacionalidades</h3>
    {!! Form::open(['name'=>'form_name', 'route'=>'nacionalidades']) !!}
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
            <th>Descrição</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($nacionalidades as $nacionalidade)
                <tr>
                    <td>{{ $nacionalidade->descricao }}</td>
                    <td>
                        <a href="{{ route('nacionalidades.edit', ['id' => \Crypt::encrypt($nacionalidade->id)]) }}" class="btn-sm btn-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao('{{ \Crypt::encrypt($nacionalidade->id) }}')" class="btn-sm btn-danger">Remover</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $nacionalidades->links() }}

    <a href="{{ route('nacionalidades.create', []) }}" class="btn btn-info">Adicionar</a>
@stop
@section('table-delete')
"nacionalidades"
@endsection

