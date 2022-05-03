@extends('backoffice/layouts/default')

@section('content')
	<?php $arrayCrumbs = [ trans('backoffice.finishMap') => route('mapPageB',['id'=> $id_apartamento]) ]; ?>
  	@include('backoffice/includes/crumbs')

	<div class="page-titulo">
	  	{{ trans('backoffice.finishMap') }}
	  	<div class="page-informacao" data-toggle="modal" data-target="#myModalInformation"><i class="fas fa-info"></i></div>
	</div>

	<form id="mapForm" method="POST" enctype="multipart/form-data" action="{{ route('mapFormB') }}">
		{{ csrf_field() }}
		<input class="ip" type="hidden" name="id_apartamento" value="{{ $id_apartamento }}">
		<input class="ip" type="hidden" id="id_divisao" name="id_divisao" value="">
		
		<div><button id="bt_new" class="bt bt-azul" onclick="$('#divisao_new').show();$('#bt_new').hide();" type="button"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar nova divisão</button></div>
		<div class="clearfix height-20"></div>
		

		@if($acabamentos_tipo != '')
			@foreach($acabamentos_tipo as $tipo)

				<div id="acabamento_div_{{ $tipo['id_divisao'] }}" style="background-color:#fff;padding:7px 10px;margin-bottom:40px;">
					<div class="tx-verde" style="border-bottom: 1px solid #b2dae9;line-height:50px;">
						<label style="text-transform:uppercase;"> {{ trans('backoffice.Division') }} <i class="fas fa-chevron-right"></i> </label> 
						<span>{{ $tipo['divisao_pt'] }}</span>

						<span class="table-opcao float-right" onclick="$('#id_modal').val({{ $tipo['id_divisao'] }});" data-toggle="modal" data-target="#myModalDelete">
	                  		<i class="fas fa-trash-alt"></i>&nbsp;{{trans('backoffice.Delete')}}
	                	</span>

	                	<a href="{{ route('mapEditPageB',$tipo['id_divisao']) }}"><label class="tx-azul"style="float:right;margin-right:15px;"><i class="fas fa-pencil-alt"></i>&nbsp; Editar</label></a>

						<input type="checkbox" name="online" id="check3{{ $tipo['id_divisao'] }}" value="1" onchange="updateOnOffTM({{ $tipo['id_divisao'] }});" @if($tipo['online']) checked @endif>
					    <label class="tx-azul" style="float:right;margin-right:15px;" for="check3{{ $tipo['id_divisao'] }}"><span></span>Online</label>

						
						
					</div>
					
					@foreach($tipo['acabamentos'] as $val)
						<div><label class="lb" style="text-transform:uppercase;">{{ $val['acabamento_pt'] }} <i class="fas fa-chevron-right"></i> </label> {{ $val['descricao_pt'] }}</div>
						
					@endforeach

				</div>
				

				
			@endforeach
		@endif

		
		<div class="height-40"></div>
		<div id="divisao_new" class="display-none">
			<label class="lb">{{ trans('backoffice.Division') }}</label>
	    	<input id="divisao_ip" class="ip" type="text" name="divisao" value="" placeholder="por exemplo: (Hall de entrada, Sala comum, Cozinha, ...)">
		</div>
		



	    <input class="ip display-none" id="divisao" name="divisao_update" value="">

	    <div id="categorias_div_" class="display-none">
	    	<div class="row">
	    		<div class="col-md-3" id="show_acabamento">
	    			<label class="lb">Local de aplicação do acabamento</label>
	    		</div>
	    		<div class="col-md-9" id="show_descricao">
	    			<label class="lb">Descrição de acabamento</label>
	    		</div>
	    	</div>
	    </div>

	    <div id="div_acabamento" class="display-none">
	    	<label class="lb">Local de aplicação do acabamento</label>
	        <input id="categoria" class="ip" type="text" name="acabamento" value="" placeholder="por exemplo: (Pavimento, Paredes, Teto, Porta de entrada, ...)">

	        <label class="lb">Descrição do acabamento</label>
	        <textarea id="categoria_txt" name="descricao" class="tx" placeholder="por exemplo: (Em madeira tábua corrida à cor natural envernizada, Porta de segurança forrada a painel de madeira á cor natural, ...)"></textarea>
	      	
	      	<div><button class="bt bt-azul" onclick="window.location.reload();" type="button"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar nova divisão</button></div>
	    </div>

	    

	    <div class="clearfix height-20"></div>
	    <div id="botoes">
	      <button class="bt bt-verde float-right" type="submit"><i class="fas fa-check"></i> Guardar</button>
	      <label class="width-10 height-40 float-right"></label>
	      <a href="{{ route('apartmentsPageB') }}" class="abt bt-vermelho float-right"><i class="fas fa-times"></i> {{ trans('backoffice.Cancel') }}</a>
	    </div>
	    <div id="loading" class="loading"><i class="fas fa-sync fa-spin"></i> {{ trans('backoffice.SavingR') }}</div>
	    <div class="clearfix"></div>
	    <div class="height-20"></div>
	    <label id="labelSucesso" class="av-100 av-verde display-none"><span id="spanSucesso">{{ trans('backoffice.savedSuccessfully') }}</span> <i class="fas fa-times" onclick="$(this).parent().hide();"></i></label>
	    <label id="labelErros" class="av-100 av-vermelho display-none"><span id="spanErro"></span> <i class="fas fa-times" onclick="$(this).parent().hide();"></i></label>
    </form>

    <!-- Modal Delete -->
  	<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    	<input type="hidden" name="id_modal" id="id_modal">
    	<div class="modal-dialog" role="document">
      		<div class="modal-content">
        		<div class="modal-header"><h4 class="modal-title" id="myModalLabel">{{ trans('backoffice.Delete') }}</h4></div>
        		<div class="modal-body">Tem a certeza que deseja apagar esta divisão?</div>
        		<div class="modal-footer">
          			<button type="button" class="bt bt-cinza" data-dismiss="modal"><i class="fas fa-times"></i> {{ trans('backoffice.Cancel') }}</button>&nbsp;
          			<button type="button" class="bt bt-vermelho" data-dismiss="modal" onclick="apagarAcabamento();"><i class="fas fa-trash-alt"></i> {{ trans('backoffice.Delete') }}</button>
        		</div>
      		</div>
    	</div>
  	</div>


  	<!-- Modal Information -->
  	<div class="modal fade" id="myModalInformation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    	<div class="modal-dialog" role="document">
      		<div class="modal-content">
        		<div class="modal-header"><h4 class="modal-title">{{ trans('backoffice.dashboardTt') }}</h4></div>
        		<div class="modal-body">{!! trans('backoffice.mapTx') !!}</div>
        		<div class="modal-footer"><button type="button" class="bt bt-azul" data-dismiss="modal"><i class="fas fa-check"></i> {{ trans('backoffice.Ok') }}</button></div>
      		</div>
    	</div>
  	</div>


@stop

@section('css')
@stop

@section('javascript')
<script type="text/javascript">  

	function apagarAcabamento(){
		var id = $('#id_modal').val();
		
		$.ajax({
			type: "POST",
		  	url: '{{ route('deleteLineTMB') }}',
		  	data: { tabela:'bonfim_lotes_acabamentos', id:id },
		  	headers:{ 'X-CSRF-Token':'{!! csrf_token() !!}' }
		})
		.done(function(resposta) {
		  	if(resposta=='sucesso'){
		    	$('#acabamento_div_'+id).remove();
		    	$.notific8('{{ trans('backoffice.savedSuccessfully') }}');
		  	}else{ $.notific8(resposta, {color:'ruby'}); }
		});
	}

	function updateOnOffTM(id){
	    $.ajax({
	    	type: "POST",
	      	url: '{{ route('updateOnOffTMB') }}',
	      	data: { tabela:'bonfim_lotes_acabamentos', id:id },
	      	headers:{ 'X-CSRF-Token':'{!! csrf_token() !!}' }
	    })
	    .done(function(resposta) {
	      	if(resposta=='sucesso'){
	        	$.notific8('{{ trans('backoffice.savedSuccessfully') }}');
	      	}else{
	        	$.notific8(resposta, {color:'ruby'});
	      	}
	    });
  	}


    $('#mapForm').on('submit',function(e) {
      $("#labelSucesso").hide();
      $("#labelErros").hide();
      $('#loading').show();
      $('#botoes').hide();
      var form = $(this);
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: form.attr('action'),
        data: new FormData(this),
        contentType: false,
        processData: false,
        cache: false
      })
      .done(function(resposta) {
       console.log(resposta);
       resp = $.parseJSON(resposta);
        if(resp.estado=='sucesso'){  
        	$('#id_divisao').val(resp.id_divisao);
        	$('#divisao').val(resp.divisao);
        	$('#divisao').show();
        	$('#divisao_ip').hide();
        	$('#div_acabamento').show();
        	if ((resp.tipo != '') && (resp.descricao!='')) {
        		$('#categorias_div_').show();
        		$('#show_acabamento').append('<input style="background-color:#f3f3f3;" class="ip" type="text" name="acabamento_'+resp.id_tipo+'" value="'+resp.tipo+'">');
        		$('#show_descricao').append('<textarea name="descricao_'+resp.id_tipo+'" style="background-color:#f3f3f3;" class="tx">'+resp.descricao+'</textarea>');
        		$('#categoria').val('');
        		$('#categoria_txt').val('');
        	}
        	
	        $('#loading').hide();
	        $('#botoes').show();
	        $("#labelSucesso").show();    
        }else if(resp.estado=='erro'){
          $("#spanErro").html(resp.mensagem);
          $("#labelErros").show();
          $('#loading').hide();
          $('#botoes').show();
        }else if(resposta){
          $("#spanErro").html(resposta);
          $("#labelErros").show();
          $('#loading').hide();
          $('#botoes').show();
        }
      });
    });
</script>
@stop