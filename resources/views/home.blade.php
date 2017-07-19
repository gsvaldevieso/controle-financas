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
                        <a href="/account/{{$account->id}}" class="btn btn-{{$account->balance() < 10 ? 'danger' : 'primary'}}">
                            <b>Agência</b> {{$account->agency}} 
                            <br>
                            <b>Número:</b> {{$account->number}}
                            <br>
                            <b>Banco:</b> {{$account->bank}}
                            <br>
                            <b>Titular:</b> {{$account->owner}}
                            <br>
                            <b>Saldo:</b> R$ {{ number_format($account->balance(), 2, ',', '.' ) }}
                        </a>
                    @endforeach
                    <a href="/account/create" class="btn">
                        <h1 class="green">+</h1>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
