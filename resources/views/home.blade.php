@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Página inicial</div>

                <div class="panel-body">
                    <h4>Suas contas</h4>
                    <hr>
                    <a class="btn btn-primary">
                        <b>Número: 13123123-123</b>
                        <br>
                        <b>Banco: Itaú</b>
                        <br>
                        Titular: Guilherme Soares Valdevieso
                        <br>
                        Saldo: R$ 10,00
                    </a>
                    <a class="btn btn-success">
                        <h1>+</h1>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
