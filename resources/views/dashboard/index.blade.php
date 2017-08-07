@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Relatórios</div>
                	<div class="panel-body">
                		<div class="row">
                			<div class="col-md-12">
                				<h4 class="page-header">Últimos lançamentos que você realizou</h4>		
                			</div>	
                			<div class="col-md-12">
                				<table class="table">
                					<thead></thead>
                					<tbody>
                						@foreach($movements as $movement)
	                						<tr>
                                    			<td><span class="glyphicon glyphicon-{{ $movement->type === 'EN' ? 'arrow-up text-success' : 'arrow-down text-danger'}}" aria-hidden="true"></span></td>
	                							<td>{{$movement->description}}</td>
	                							<td>R$ {{ number_format($movement->value, 2, ',', '.' ) }}</td>
	                						</tr>
                						@endforeach
                					</tbody>
                				</table>
                			</div>
                		</div>
                		<div class="row">
                			<div class="col-md-12">
                				<h4 class="page-header">Balanço atual de suas contas</h4>		
                			</div>	
                			<div class="col-md-12">
                				<table class="table">
                					<thead></thead>
                					<tbody>
                						@foreach($accounts as $account)
	                						<tr>
	                							<td>
	                								@if ($account->balance() <= 0)
	                									<span class="glyphicon glyphicon-thumbs-down"></span>
	                								@else
	                									<span class="glyphicon glyphicon-thumbs-up"></span>
	                								@endif
	                							</td>
	                							<td>{{$account->bank}}</td>
	                							<td>{{$account->agency}} / {{$account->number}}</td>
	                							<td>R$ {{ number_format($account->balance(), 2, ',', '.' ) }}</td>
	                						</tr>
                						@endforeach
                					</tbody>
                				</table>
                			</div>
                		</div>
						<div class="row">
                			<div class="col-md-12">
                				<h4 class="page-header">Maiores entradas em suas contas</h4>
                			</div>	
                			<div class="col-md-12">
                				<table class="table">
                					<thead></thead>
                					<tbody>
                						@foreach($credits as $credit)
                							@if ($credit)
		                						<tr>
		                							<td>{{$credit->description}}</td>
		                							<td>R$ {{ number_format($credit->value, 2, ',', '.' ) }}</td>
		                						</tr>
		                					@else
		                						<p>Não há créditos em suas contas</p>
                							@endif
                						@endforeach
                					</tbody>
                				</table>
                			</div>
                		</div>
						<div class="row">
                			<div class="col-md-12">
                				<h4 class="page-header">Maiores débitos em suas contas</h4>		
                			</div>	
                			<div class="col-md-12">
                				<table class="table">
                					<thead></thead>
                					<tbody>
                						@foreach($debits as $debit)
                							@if ($debit)
		                						<tr>
		                							<td>{{$debit->description}}</td>
		                							<td>R$ {{ number_format($debit->value, 2, ',', '.' ) }}</td>
		                						</tr>
		                					@else
		                						<p>Não há débitos em suas contas</p>
	                						@endif
                						@endforeach
                					</tbody>
                				</table>
                			</div>
                		</div>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
