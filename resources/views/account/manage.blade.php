@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Novo lançamento para {{$account->agency}}/{{$account->number}}</div>
                <div class="panel-body">
                <form action="/movement/" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <label for="description">Descrição:</label>
                            <input class="form-control" type="text" name="description" autofocus>
                        </div>
                        <div class="col-md-6">
                            <label for="value">Valor:</label>
                            <input class="form-control" type="number" step="0.01" id="value" name="value">
                        </div>
                        <div class="col-md-2">
                            <label for="type">Tipo:</label>
                            <div class="input-group">
                                <input type="radio" name="type" value="EN" checked> Entrada<br>
                                <input type="radio" name="type" value="SA"> Saída
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="date">Data:</label>
                            <input class="form-control" type="date" name="date" value="<?php echo date("Y-m-d"); ?>">
                        </div>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Lançar">
                    <input type="hidden" name="account" value="{{$account->id}}">
                </form>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Últimos lançamentos ({{$account->movements->count()}})</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <th>#</th>  
                            <th>Descrição</th>
                            <th>Valor</th>
                            <th>Data</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($account->movements as $movement)
                                <tr>
                                    <td><span class="glyphicon glyphicon-{{ $movement->type === 'EN' ? 'plus-sign' : 'minus-sign'}}" aria-hidden="true"></span></td>
                                    <td>{{ $movement->description }}</td>
                                    <td>R$ {{ number_format($movement->value, 2, ',', '.' ) }}</td>
                                    <td>{{ date('d/m/Y', strtotime($movement->date)) }}</td>
                                    <td><a href="#" onclick="deleteMovement({{$movement->id}});"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td></a>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h4>Saldo atual: R$ {{ number_format($account->balance(), 2, ',', '.' ) }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var deleteMovement = function(movementId){
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/movement/' + movementId,
            type: 'DELETE',
            success: function(result) {
                location.reload();
            }
        });
    }
</script>

@endsection
