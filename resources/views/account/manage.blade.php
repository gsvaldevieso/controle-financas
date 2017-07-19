@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Novo lançamento para {{$account->agency}}/{{$account->number}}</div>
                <div class="panel-body">
                    {{ csrf_field() }}
<!--
                                $table->increments('id');
            $table->string('description');
            $table->decimal('value', 6, 2);
            $table->char('type', 2);
            $table->date('date');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');-->

                    <label for="description">Descrição:</label>
                    <input class="form-control" type="text" name="description">
                    <label for="value">Valor:</label>
                    <input class="form-control" type="text" name="value">
                    <label for="type">Tipo:</label>
                    <input class="form-control" type="text" value="EN" name="type">
                    <label for="date">Data:</label>
                    <input class="form-control" type="date" name="date">
                    <input class="btn btn-primary" type="submit" value="Lançar">
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Últimos lançamentos</div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <th>Descrição</th>
                            <th>Valor</th>
                            <th>Tipo</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
