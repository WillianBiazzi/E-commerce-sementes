@extends('adminlte::page')

@section('content')

    <h3>Editando Estoque: {{ $estoque->Qtd }}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('estoques.update', $estoque->idEstoque) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="qtd">Quantidade:</label>
            <input type="number" name="qtd" id="qtd" class="form-control" value="{{ $estoque->qtd }}" required>
        </div>

        <div class="form-group">
            <label for="idEstoque">ID do Estoque:</label>
            <input type="text" name="idEstoque" id="idEstoque" class="form-control" value="{{ $estoque->idEstoque }}" readonly>
        </div>

        <button type="submit" class="btn btn-primary">Editar Estoque</button>
        <button type="reset" class="btn btn-default">Limpar</button>
    </form>

@stop
