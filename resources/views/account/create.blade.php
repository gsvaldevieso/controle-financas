@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Adicionar nova conta</div>
                <div class="panel-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <form class="form-horizontal" method="POST" action="/account/">
                        {{ csrf_field() }}
                        <label for="number">Agência:</label>
                        <input class="form-control" type="text" name="agency">
                        <label for="number">Número da conta:</label>
                        <input class="form-control" type="text" name="number">
                        <label for="number">Banco:</label>
                        <input class="form-control" type="text" name="bank">
                        <label for="number">Titular:</label>
                        <input class="form-control" type="text" name="owner">
                        <input class="btn btn-primary" type="submit" value="Criar conta">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
