@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Novo lançamento para {{$account->agency}}/{{$account->number}}</div>
                <div class="panel-body">
                    <form action="/movement/" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <label for="description">Descrição:</label>
                                <input class="form-control" data-provide="typeahead" type="text" name="description" autofocus>
                            </div>
                            <div class="col-md-5">
                                <label for="value">Valor:</label>
                                <input class="form-control" type="number" step="0.01" id="value" name="value">
                            </div>
                            <div class="col-md-7">
                                <label for="date">Data:</label>
                                <input class="form-control" type="date" name="date" value="<?php echo date("Y-m-d"); ?>">
                            </div>
                            <div class="col-md-12">
                                <label for="type">Tipo:</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="radio" name="type" value="EN" checked> Entrada
                                            
                                        </div>
                                        <div class="col-md-6">
                                            <input type="radio" name="type" value="SA"> Saída    
                                        </div>
                                </div>                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <br>
                                <input style="width:100%;" class="btn btn-primary" type="submit" value="Lançar">
                            </div>
                        </div>
                        <input type="hidden" name="account" value="{{$account->id}}">
                    </form>
                    <div class="row">
                        <form method="GET">
                            <div class="col-md-12">
                                <h4 class="page-header">Filtros</h4>
                            </div>
                            <div class="col-md-12">
                                <label for="filtro">Mês</label>
                                <select class="form-control" name="month">
                                    @foreach ($monthDescriptions as $monthNum => $monthDesc)
                                        @if($monthNum == $month)
                                            <option value="{{$monthNum}}" selected="selected">{{$monthDesc}}</option>
                                        @else
                                            <option value="{{$monthNum}}">{{$monthDesc}}</option>
                                        @endif
                                    @endforeach
                                    <!-- <option value="1">Janeiro</option>
                                    <option value="2">Fevereiro</option>
                                    <option value="3">Março</option>
                                    <option value="4">Abril</option>
                                    <option value="5">Maio</option>
                                    <option value="6">Junho</option>
                                    <option value="7">Julho</option>
                                    <option value="8">Agosto</option>
                                    <option value="9">Setembro</option>
                                    <option value="10">Outubro</option>
                                    <option value="11">Novembro</option>
                                    <option value="12">Dezembro</option> -->
                                </select>
                            </div>
                            <div class="col-md-6">
                                <br>
                                <input style="width:100%" class="btn btn-success" type="submit" value="Filtrar">
                            </div>  
                        </form>
                            <div class="col-md-6">
                                <form method="GET">
                                    <br>
                                    <input  style="width:100%" class="btn btn-danger" type="submit" value="Limpar">
                                </form>
                            </div> 
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Últimos lançamentos do mês de {{$monthDescription}} ({{count($movements)}})</div>
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
                            @foreach ($movements as $movement)
                                <tr>
                                    <td><span class="glyphicon glyphicon-{{ $movement->type === 'EN' ? 'arrow-up text-success' : 'arrow-down text-danger'}}" aria-hidden="true"></span></td>
                                    <td>{{ $movement->description }}</td>
                                    <td>R$ {{ number_format($movement->value, 2, ',', '.' ) }}</td>
                                    <td>{{ date('d/m/Y', strtotime($movement->date)) }}</td>
                                    <td><a href="#" onclick="deleteMovement({{$movement->id}});"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td></a>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h4 class="col-md-6">Saldo mensal: R$ {{ number_format($account->balanceInMonth($month), 2, ',', '.' ) }}</h4>
                    <h4 class="col-md-6">Saldo total da conta: R$ {{ number_format($account->balance($month), 2, ',', '.' ) }}</h4>
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
