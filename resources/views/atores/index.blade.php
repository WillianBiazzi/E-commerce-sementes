@extends('layouts.default')

@section('content')
    <h3>Listagem de Atores</h3>
    {!! Form::open(['name'=>'form_name', 'route'=>'atores']) !!}
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
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>Nacionalidade</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($atores as $ator)
                <tr>
                    <td>{{ $ator->nome }}</td>
                    <td>{{ Carbon\Carbon::parse($ator->dt_nascimento)->format('d/m/Y') }}</td>
                    <td>{{ isset($ator->descricao) ? $ator->descricao : "Nacionalidade não informada" }}
                    </td>

                    <td>
                        <a href="{{ route('atores.edit', ['id' => \Crypt::encrypt($ator->id)]) }}" class="btn-sm btn-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao('{{ \Crypt::encrypt($ator->id) }}')" class="btn-sm btn-danger">Remover</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $atores->links() }}

    <a href="{{ route('atores.create', []) }}" class="btn btn-info">Adicionar</a>
@stop
@section('table-delete')
"atores"
@endsection

