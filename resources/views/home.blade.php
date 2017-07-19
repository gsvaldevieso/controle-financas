@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Suas contas</div>

                <div class="panel-body">
                    @foreach($accounts as $account)
                        <div class="row">
                            <div class="col-md-12" style="margin:5px;">
                                <a style="width:100%;" href="/account/{{$account->id}}" class="btn btn-{{$account->balance() < 10 ? 'danger' : 'default'}}">
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
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="col-md-12">
                           <a style="width:100%;" href="/account/create" class="btn btn-default">
                                <h3><span class="glyphicon glyphicon-plus"></span> Adicionar nova conta</h3>
                        </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
