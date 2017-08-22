@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Suas contas <a style="float:right;" href="/account/create"><span class="glyphicon glyphicon-plus"></span> Adicionar nova conta</a></div>

                <div class="panel-body">
                    @foreach($accounts as $account)
                        <div class="row">
                        <div class="col s12 m6">
                            <div class="card white">
                            <div class="card-content black-text">
                              <span class="card-title">R$ {{ number_format($account->balance(), 2, ',', '.' ) }}</span>
                              <p>
                                  <b>Agência</b> {{$account->agency}} 
                                    <br>
                                    <b>Número:</b> {{$account->number}}
                                    <br>
                                    <b>Banco:</b> {{$account->bank}}
                                    <br>
                                    <b>Titular:</b> {{$account->owner}}
                                    <br>
                              </p>
                            </div>
                            <div class="card-action">
                              <a href="/account/{{$account->id}}">Gerenciar</a>
                              <a href="#">Excluir</a>
                            </div>
                          </div>
                        </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
