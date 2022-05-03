@extends('backoffice/layouts/default')

@section('content')
	<?php $arrayCrumbs = [ trans('backoffice.Newsletter') => route('newsletterEmailsPageB') ]; ?>
  	@include('backoffice/includes/crumbs')

	<div class="page-titulo">
	  	{{ trans('backoffice.Newsletter') }}
	  	<div class="page-informacao" data-toggle="modal" data-target="#myModalInformation"><i class="fas fa-info"></i></div>
	</div>

	<a href="{{ route('newsletterSendPageB') }}" class="abt bt-verde modulo-botoes"><i class="fas fa-plus"></i> Criar Newsletter</a>


	<div class="modulo-table">
  		<div class="modulo-scroll">
  	  		<table class="modulo-body" id="sortable">
  	    		<thead>
  	      			<tr>
            			<th class="display-none"></th>
    		    		<th>#</th>
			            <th>{{ trans('backoffice.Name') }}</th>
			            <th>{{ trans('backoffice.Date') }}</th>
			            <th>{{ trans('backoffice.Option') }}</th>
    		  		</tr>
    			</thead>
        		@foreach($news as $val)
      				<tbody>
            			<tr id="linha_{{ $val->id }}">
			            	<td class="display-none"></td>
			              	<td>{{ $val->id }}</td>
			              	<td>{{ $val->identificacao }}</td>
			              	<td>{{ date('Y-m-d',$val->data) }}</td>
			            
			              	<td class="table-opcao">
			              		<span class="table-opcao" onclick="$('#id_modal').val({{ $val->id }});" data-toggle="modal" data-target="#myModalSend">
			                  		<i class="fas fa-paper-plane"></i>&nbsp;Enviar
			                	</span>&ensp;

			              		<a href="{{ route('newsletterViewPageB',[$val->id,'pt']) }}"><span class="table-opcao">
			                  		<i class="fas fa-eye"></i>&nbsp;Ver PT
			                	</span></a>&ensp;

                        <a href="{{ route('newsletterViewPageB',[$val->id,'en']) }}"><span class="table-opcao">
                            <i class="fas fa-eye"></i>&nbsp;Ver EN
                        </span></a>&ensp;

			                	<span class="table-opcao" onclick="$('#id_modal').val({{ $val->id }});" data-toggle="modal" data-target="#myModalDelete">
			                  		<i class="fas fa-trash-alt"></i>&nbsp;{{trans('backoffice.Delete')}}
			                	</span>
			              	</td>
            			</tr>
      	  			</tbody>
        		@endforeach
  	  		</table>
  		</div>
  	</div>

  
  	<!-- Modal Information -->
  	<div class="modal fade" id="myModalInformation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    	<div class="modal-dialog" role="document">
      		<div class="modal-content">
        		<div class="modal-header"><h4 class="modal-title">{{ trans('backoffice.dashboardTt') }}</h4></div>
        		<div class="modal-body">{!! trans('backoffice.newsletterTx') !!}</div>
        		<div class="modal-footer"><button type="button" class="bt bt-azul" data-dismiss="modal"><i class="fas fa-check"></i> {{ trans('backoffice.Ok') }}</button></div>
      		</div>
    	</div>
  	</div>

  	<!-- Modal Envio -->
  	<div class="modal fade" id="myModalSend" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    	<input type="hidden" name="id_modal" id="id_modal">
    	<div class="modal-dialog" role="document">
      		<div class="modal-content">
        		<div class="modal-header"><h4 class="modal-title" id="myModalLabel">{{ trans('backoffice.sendNewsletter') }}</h4></div>
        		<div class="modal-body">{!! trans('backoffice.sendLine') !!}</div>
        		<div class="modal-footer">
          			<button type="button" class="bt bt-cinza" data-dismiss="modal"><i class="fas fa-times"></i> {{ trans('backoffice.Cancel') }}</button>&nbsp;
          			<button type="button" class="bt bt-verde" data-dismiss="modal" onclick="enviarNews();"><i class="fas fa-paper-plane"></i> {{ trans('backoffice.Send') }}</button>
        		</div>
      		</div>
    	</div>
  	</div>

  	<!-- Modal Delete -->
  	<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    	<input type="hidden" name="id_modal" id="id_modal">
    	<div class="modal-dialog" role="document">
      		<div class="modal-content">
        		<div class="modal-header"><h4 class="modal-title" id="myModalLabel">{{ trans('backoffice.Delete') }}</h4></div>
        		<div class="modal-body">{!! trans('backoffice.DeleteLine') !!}</div>
        		<div class="modal-footer">
          			<button type="button" class="bt bt-cinza" data-dismiss="modal"><i class="fas fa-times"></i> {{ trans('backoffice.Cancel') }}</button>&nbsp;
          			<button type="button" class="bt bt-vermelho" data-dismiss="modal" onclick="apagarLinha();"><i class="fas fa-trash-alt"></i> {{ trans('backoffice.Delete') }}</button>
        		</div>
      		</div>
    	</div>
  	</div>
@stop

@section('css')
<!-- PAGINAR -->
<link href="{{ asset('backoffice/vendor/datatables/jquery.dataTables.css') }}" rel="stylesheet">
@stop

@section('javascript')
<!-- PAGINAR -->
<script src="{{ asset('backoffice/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript">  
  //<!-- PAGINAR -->
  	$(document).ready(function(){
    	$('#sortable').dataTable({
      		aoColumnDefs: [{ "bSortable": false, "aTargets": [ 0,4 ] }],
      		lengthMenu: [[20,50,-1], [20,50,'{{ trans('backoffice.All') }}']],
    	});
  	});

	function apagarLinha(){
		var id = $('#id_modal').val();

		$.ajax({
			type: "POST",
		  	url: '{{ route('newsletterDeletePostB') }}',
		  	data: { id:id },
		  	headers:{ 'X-CSRF-Token':'{!! csrf_token() !!}' }
		})
		.done(function(resposta) {
		  	if(resposta=='sucesso'){
		    	$('#linha_'+id).slideUp();
		    	$.notific8('{{ trans('backoffice.savedSuccessfully') }}');
		  	}else{ $.notific8(resposta, {color:'ruby'}); }
		});
	}



  	function enviarNews(){
  		var id = $('#id_modal').val();
  		
	    $.ajax({
	    	type: "POST",
	      	url: '{{ route('newsletterSendEmailPostB') }}',
	      	data: { id:id },
	      	headers:{ 'X-CSRF-Token':'{!! csrf_token() !!}' }
	    })
	    .done(function(resposta) {
	    	console.log(resposta);
	      	if(resposta=='sucesso'){
	        	$.notific8('{{ trans('backoffice.sendSuccessfully') }}');
	      	}else{
	      		console.log(resposta);
	        	//$.notific8(resposta, {color:'ruby'});
	      	}
	    });
  	}
</script>
@stop