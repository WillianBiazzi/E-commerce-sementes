@extends('adminlte::page')
@section('plugins.Sweetalert2', true)
@section('content')
    @if(Session::has('message'))
        <p class="alert alert-danger">{{ Session::get('message') }}</p>
    @endif

    <div class="card-header" style="background: rgb(205, 205, 205)">
        <h3>Novo Pedido</h3>
    </div>

    <div class="card-body">
        {!! Form::open(['route' => 'pedidos.store']) !!}
            <div class="form-group">
                {!! Form::label('dataPedido', 'Data do Pedido:') !!}
                {!! Form::text('dataPedido', null, ['class' => 'form-control', 'required']) !!}
            </div>
            <hr>
            <h4>Produtos</h4>
            <div class="input_fields_wrap"></div>
            <br>

            <button style="float: right" class="add_field_button btn btn-default">
                Adicionar Produto
            </button>
            <br>
            <hr>

            <div class="form-group">
                {!! Form::submit('Criar Pedido', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            var wrapper = $(".input_fields_wrap");
            var add_button = $(".add_field_button");
            var x = 0;

            var myarray = [];
            var previousValue = 0;
            var previousIndex = 0;

            $(add_button).click(function(e) {
                x++;
                var newField = '<div><div style="width:94%; float:left" id="ator">{!! Form::select("atores[]", \App\Produto::orderBy("NomeProduto")->pluck("NomeProduto", "IdProduto")->toArray(), null, ["class"=>"form-control", "required", "placeholder"=>"Selecione um Produto"]) !!}</div><button type="button" class="remove_field btn btn-danger btn-circle"><i class="fa fa-times"></i></button></div>';
                $(wrapper).append(newField);
            });

            $(wrapper).on("click", ".remove_field", function(e) {
                e.preventDefault();

                selectedValue = $(this).parent('div').find(":selected").val();
                var myIndex = myarray.indexOf(selectedValue);
                if (myIndex !== -1)
                    myarray.splice(myIndex, 1);

                $(this).parent('div').remove();
                x--;
            });

            $(wrapper).on("focus", "select", function(e) {
                e.preventDefault();
                previousValue = $(this).find(":selected").val();
                previousIndex = $(this).find(":selected").index();
            });

            $(wrapper).on("change", "select", function(e) {
                e.preventDefault();
                selectedValue = $(this).find(":selected").val();
                if(myarray.find(element => element == selectedValue)) {
                    Swal.fire('Produto já se encontra na lista de produtos do Pedido!',
                    'Por favor, selecione outro produto.',
                    'warning');
                    $(this).prop('selectedIndex', previousIndex);
                }
                else {
                    if(myarray.length < x && previousValue == "") {
                        myarray.push(selectedValue);
                    }
                    else {
                        var index = myarray.indexOf(previousValue);
                        if(index !== -1) {
                            myarray[index] = selectedValue;
                            previousValue = selectedValue;
                        }
                    }
                }
                /* Exemplo para imprimir log e inspecionar funcionamento
                do código no browser */
                //for (i = 0; i < myarray.length; i++)
                //    console.log((i+1) + ": " + myarray[i]);
                //console.log("---");
            });

        });
    </script>
@stop
