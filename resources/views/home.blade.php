@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col m12">
            <div class="panel panel-default">
                <div class="panel-heading">Suas contas <a style="float:right;" href="/account/create"><span class="glyphicon glyphicon-plus"></span> Adicionar nova conta</a></div>
                <div class="panel-body">
                    @foreach($accounts as $account)
                            <div class="col s6 m6">
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
                                  <a href="#" onclick="deleteAccount({{$account->id}})">Excluir</a>
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


<script type="text/javascript">
    var deleteAccount = function(accountId){
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/account/' + accountId,
            type: 'DELETE',
            success: function(result) {
                location.reload();
            }
        });
    }
</script>
