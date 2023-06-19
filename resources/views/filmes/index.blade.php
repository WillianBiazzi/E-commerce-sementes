@extends('layouts.default')

@section('content')
    <div class="container-fluid">
        <h3>Listagem de Filmes</h3>
    </div>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <th>Filme</th>
            <th>Categoria</th>
            <th>Atores</th>
        </thead>
        <tbody>
            @foreach ($filmes as $filme)
                <tr>
                    <td>{{ $filme->nome }}</td>
                    <td>{{ $filme->categoria }}</td>
                    <td>
                        @foreach ($filme->atores as $a)
                            <li>{{ $a->ator->nome }}</li>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('filmes.create', []) }}" class="btn btn-info">Adicionar</a>
@stop
