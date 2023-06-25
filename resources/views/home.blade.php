    @extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Painel</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Você está logado!
                </div>
<!--
                <div class="card-header">
                    <h3 class="card-title">Projeto Laravel</h3>
                    <div class="card-body">
                        <div class="card card-dark">
                            <a href="{{ route('atores', []) }}" class="btn btn-dark">
                                Clique aqui para ir à página de Atores</a>
                        </div>
                    </div>
                </div>
-->
            </div>
        </div>
    </div>
</div>
@endsection
