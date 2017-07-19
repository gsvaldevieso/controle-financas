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
                    <label for="description">Descrição:</label>
                    <input class="form-control" type="text" name="description">
                    <label for="value">Valor:</label>
                    <input class="form-control" type="text" name="value">
                    <label for="type">Tipo:</label>
                    <input class="form-control" type="text" value="EN" name="type">
                    <label for="date">Data:</label>
                    <input class="form-control" type="date" name="date">
                    <input class="btn btn-primary" type="submit" value="Lançar">
                    <input type="hidden" name="account" value="{{$account->id}}">
                </form>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Últimos lançamentos ({{$account->movements->count()}})</div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <th>#</th>  
                            <th>Descrição</th>
                            <th>Valor</th>
                            <th>Tipo</th>
                            <th>Data</th>
                        </thead>
                        <tbody>
                            @foreach ($account->movements as $movement)
                                <tr>
                                    <td><span class="glyphicon glyphicon-{{ $movement->type === 'plus-sign' ? 'green' : 'minus-sign'}}" aria-hidden="true"></span></td>
                                    <td>{{ $movement->description }}</td>
                                    <td>R$ {{money_format('%n', $movement->value ) }}</td>
                                    <td>{{ $movement->type }}</td>
                                    <td>{{ $movement->date }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
