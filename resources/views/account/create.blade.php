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
                        <div class="row">
                            <div class="col m6">
                                <label for="agency">Agência:</label>
                                <input class="form-control" type="text" name="agency" autofocus>
                            </div>    
                            <div class="col m6">
                                <label for="number">Número da conta:</label>
                                <input class="form-control" type="text" name="number">        
                            </div>
                            <div class="col m6">
                                <label for="bank">Banco:</label>                                
                                <select class="form-control" name="bank">
                                    <option value="Itaú">Itaú</option>
                                    <option value="Banco do Brasil">Banco do Brasil</option>
                                    <option value="Bradesco">Bradesco</option>
                                    <option value="Caixa Econômica Federal">Caixa Econômica Federal</option>
                                    <option value="BNDES">BNDES</option>
                                    <option value="Santander">Santander</option>
                                    <option value="HSBC">HSBC</option>
                                    <option value="Banco Safra">Banco Safra</option>
                                    <option value="Banco Votorantim">Banco Votorantim</option>
                                    <option value="Banrisul">Banrisul</option>
                                    <option value="Citibank">Citibank</option>
                                    <option value="Banco do Nordeste">Banco do Nordeste</option>
                                </select>    
                            </div>
                            <div class="col m6">
                                <label for="owner">Titular:</label>
                                <input class="form-control" type="text" name="owner">       
                            </div>
                        </div>
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                            <br>
                                <input class="btn blue" type="submit" value="Criar conta">    
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
