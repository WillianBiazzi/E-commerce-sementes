@extends('adminlte::page')

@section('content')
    <h3>Editando Estoque: {{ $estoque->IdEstoque }}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('estoques.update', $estoque->IdEstoque) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="Qtd">Quantidade:</label>
            <input type="number" name="Qtd" id="Qtd" class="form-control" value="{{ $estoque->Qtd }}" required>
        </div>

        <div class="form-group">
            <label for="IdEstoque">ID do Estoque:</label>
            <input type="text" name="IdEstoque" id="IdEstoque" class="form-control" value="{{ $estoque->IdEstoque }}" readonly>
        </div>

        <button type="submit" class="btn btn-primary">Editar Estoque</button>
        <button type="reset" class="btn btn-default">Limpar</button>
    </form>
@stop
