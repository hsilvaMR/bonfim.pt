@extends('backoffice/layouts/default')

@section('content')
	<?php $arrayCrumbs = [ trans('backoffice.finishMap') => route('mapPageB',['id'=> $acabamentos->id_lote]), $acabamentos->divisao_pt => route('mapEditPageB',['id'=> $id_aca])]; ?>
  	@include('backoffice/includes/crumbs')

	<div class="page-titulo">
	  	{{ trans('backoffice.editMap') }} <i class="fas fa-chevron-right"></i> {{ $acabamentos->divisao_pt }}
	  	<div class="page-informacao" data-toggle="modal" data-target="#myModalInformation"><i class="fas fa-info"></i></div>
	</div>

	<form id="mapEditForm" method="POST" enctype="multipart/form-data" action="{{ route('mapEditFormB') }}">
		{{ csrf_field() }}
		<input class="ip" type="hidden" name="id_acabamento" value="{{ $id_aca }}">
		
		<div class="height-20"></div>
		<div>
			<div class="row">
				<div class="col-md-6">
					<label class="lb">{{ trans('backoffice.Division') }} (PT)</label>
	    			<input id="divisao_ip" class="ip" type="text" name="divisao_pt" value="{{ $acabamentos->divisao_pt }}" placeholder="por exemplo: (Hall de entrada, Sala comum, Cozinha, ...)">
				</div>
				<div class="col-md-6">
					<label class="lb">{{ trans('backoffice.Division') }} (EN)</label>
	    			<input id="divisao_ip" class="ip" type="text" name="divisao_en" value="{{ $acabamentos->divisao_en }}" placeholder="por exemplo: (Hall de entrada, Sala comum, Cozinha, ...)">
				</div>
			</div>
		</div>
		
		<div class="height-40"></div>
	    <div id="div_acabamento">
	    	@foreach($acabamentos_tipo as $tipo)
	    		<div id="acabamento_div_{{ $tipo->id }}">

	    			<div class="row">
	    				<div class="col-md-6">
	    					<div>
					    		<label class="lb">Tipo de acabamento (PT)</label>
					    	</div>
			        		<input class="ip" type="text" name="pt_acabamento_{{ $tipo->id }}" value="{{ $tipo->tipo_pt}}" placeholder="por exemplo: (Pavimento, Paredes, Teto, Porta de entrada, ...)">

			        		<textarea name="pt_descricao_{{ $tipo->id }}" class="tx" placeholder="por exemplo: (Em madeira tábua corrida à cor natural envernizada, Porta de segurança forrada a painel de madeira á cor natural, ...)">{!! $tipo->descricao_pt !!}</textarea>
	    				</div>
	    				<div class="col-md-6">
	    					<div>
					    		<label class="lb">Tipo de acabamento (EN)</label>
					    		<span style="margin-top:10px;" class="table-opcao float-right" onclick="$('#id_modal').val({{ $tipo->id }});" data-toggle="modal" data-target="#myModalDelete">
			                  		<i class="fas fa-trash-alt"></i>&nbsp;{{trans('backoffice.Delete')}}
			                	</span>
					    	</div>
			        		<input class="ip" type="text" name="en_acabamento_{{ $tipo->id }}" value="{{ $tipo->tipo_en}}" placeholder="por exemplo: (Pavimento, Paredes, Teto, Porta de entrada, ...)">

			        		<textarea name="en_descricao_{{ $tipo->id }}" class="tx" placeholder="por exemplo: (Em madeira tábua corrida à cor natural envernizada, Porta de segurança forrada a painel de madeira á cor natural, ...)">{!! $tipo->descricao_en !!}</textarea>
	    				</div>
	    				
	    			</div>
			    	
		        </div>
	      	@endforeach
	    </div>

	    <div id="categorias_div_" class="display-none"></div>

	    <div id="new_Acabamento" class="display-none" style="background-color:#fff;padding:7px 10px;margin-top:50px;">
	    	<div class="page-titulo">Adicionar acabamento</div>
	    	<div style="padding:7px 10px;">
	    		<label class="lb">Local de aplicação do acabamento (PT)</label>
		    	<input id="categoria_pt" class="ip" type="text" name="acabamento_pt" value="" placeholder="por exemplo: (Pavimento, Paredes, Teto, Porta de entrada, ...)">

		    	<label class="lb">Local de aplicação do acabamento (EN)</label>
		    	<input id="categoria_en" class="ip" type="text" name="acabamento_en" value="" placeholder="por exemplo: (Pavimento, Paredes, Teto, Porta de entrada, ...)">

		    	<label class="lb">Descrição de acabamento (PT)</label>
		    	<textarea id="categoria_txt_pt" name="descricao_pt" class="tx" placeholder="por exemplo: (Em madeira tábua corrida à cor natural envernizada, Porta de segurança forrada a painel de madeira á cor natural, ...)"></textarea>

		    	<label class="lb">Descrição de acabamento (EN)</label>
		    	<textarea id="categoria_txt_en" name="descricao_en" class="tx" placeholder="por exemplo: (Em madeira tábua corrida à cor natural envernizada, Porta de segurança forrada a painel de madeira á cor natural, ...)"></textarea>
	    	</div>
	    	
	    </div>
	      	

	    <div><button class="bt bt-azul" onclick="$('#new_Acabamento').show();" type="button"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar novo acabamento</button></div>

	    <div class="clearfix height-20"></div>
	    <div id="botoes">
	      <button class="bt bt-verde float-right" type="submit"><i class="fas fa-check"></i> Guardar</button>
	      <label class="width-10 height-40 float-right"></label>
	      <a href="{{ route('mapPageB',$acabamentos->id_lote) }}" class="abt bt-vermelho float-right"><i class="fas fa-times"></i> {{ trans('backoffice.Cancel') }}</a>
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
        		<div class="modal-body">Tem a certeza que deseja apagar este acabamento?</div>
        		<div class="modal-footer">
          			<button type="button" class="bt bt-cinza" data-dismiss="modal"><i class="fas fa-times"></i> {{ trans('backoffice.Cancel') }}</button>&nbsp;
          			<button type="button" class="bt bt-vermelho" data-dismiss="modal" onclick="apagarAcabamento();"><i class="fas fa-trash-alt"></i> {{ trans('backoffice.Delete') }}</button>
        		</div>
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
		  	data: { tabela:'bonfim_lotes_acabamentos_tipo', id:id },
		  	headers:{ 'X-CSRF-Token':'{!! csrf_token() !!}' }
		})
		.done(function(resposta) {
		  	if(resposta=='sucesso'){
		    	$('#acabamento_div_'+id).remove();
		    	$.notific8('{{ trans('backoffice.savedSuccessfully') }}');
		  	}else{ $.notific8(resposta, {color:'ruby'}); }
		});
	}

    $('#mapEditForm').on('submit',function(e) {
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
        	$('#div_acabamento').show();
        	if ((resp.tipo != '') && (resp.descricao!='')) {
        		$('#categorias_div_').show();
        		$('#categorias_div_').append('<div id="acabamento_div_'+resp.id_tipo+'"><div><div class="row"><div class="col-md-6"><label class="lb">Tipo de acabamento (PT)</label><input class="ip" type="text" name="pt_acabamento_'+resp.id_tipo+'" value="'+resp.tipo+'" placeholder="por exemplo: (Pavimento, Paredes, Teto, Porta de entrada, ...)"><textarea name="pt_descricao_'+resp.id_tipo+'" class="tx" placeholder="por exemplo: (Em madeira tábua corrida à cor natural envernizada, Porta de segurança forrada a painel de madeira á cor natural, ...)">'+resp.descricao+'</textarea></div><div class="col-md-6"><label class="lb">Tipo de acabamento (EN)</label><span style="margin-top:10px;" class="table-opcao float-right" onclick="$(\'#id_modal\').val('+resp.id_tipo+');" data-toggle="modal" data-target="#myModalDelete"><i class="fas fa-trash-alt"></i>&nbsp;{{trans('backoffice.Delete')}}</span><input class="ip" type="text" name="en_acabamento_'+resp.id_tipo+'" value="'+resp.tipo_en+'" placeholder="por exemplo: (Pavimento, Paredes, Teto, Porta de entrada, ...)"><textarea name="en_descricao_'+resp.id_tipo+'" class="tx" placeholder="por exemplo: (Em madeira tábua corrida à cor natural envernizada, Porta de segurança forrada a painel de madeira á cor natural, ...)">'+resp.descricao_en+'</textarea></div></div></div></div>');
        		$('#categoria_pt').val('');
        		$('#categoria_txt_pt').val('');
        		$('#categoria_en').val('');
        		$('#categoria_txt_en').val('');
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