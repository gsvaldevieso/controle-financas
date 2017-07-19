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
                    @foreach($accounts as $account)
                        <a href="/account/{{$account->id}}" class="btn btn-primary">
                            <b>Agência {{$account->agency}} </b>
                            <br>
                            <b>Número: {{$account->number}}</b>
                            <br>
                            <b>Banco: {{$account->bank}}</b>
                            <br>
                            Titular: {{$account->owner}}
                            <br>
                            Saldo: R$ 0,00
                        </a>
                    @endforeach
                    <a href="/account/create" class="btn btn-success">
                        <h1>+</h1>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
