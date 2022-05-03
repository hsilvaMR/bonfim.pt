@extends('site/emails/layouts/default')

@section('content')
@include('site/emails/includes/header')

<table style="padding-top:20px;" border="0" cellpadding="0" width="100%">
   <tr>
	    <td   width="100%" style="color:#58595b;font-size:14px;line-height:20px;text-align: justify;">
	    	@if(isset($dados['id_lote'])) Este cliente pretende saber mais informações do apartamento fração {{ $dados['id_lote'] }} @endif
	    	<br><br>
	        {!! trans('emails.Nome') !!}: {{ $dados['nome'] }}
	        <br>{!! trans('emails.Telefone') !!}: {{ $dados['telefone'] }}
		    <br>{!! trans('emails.Email') !!}: {{ $dados['email'] }}
		    <br><br>{!! trans('emails.Mensagem') !!}: {{ $dados['mensagem'] }}	  
		</td>
	</tr>
</table>
	
@stop