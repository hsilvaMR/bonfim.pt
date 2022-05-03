@extends('backoffice/layouts/default')

@section('content')
  @if($funcao=='new')<?php $arrayCrumbs = [ trans('backoffice.Website') => route('websitePageB'), 'Adicionar Imagem' => route('addImgProjetoB') ]; ?>@else
  <?php $arrayCrumbs = [ trans('backoffice.Website') => route('websitePageB'), 'Editar Imagem' => route('editImgProjetoB',['id'=>$projeto->id]) ]; ?>@endif
  @include('backoffice/includes/crumbs')

  <div class="page-titulo">
    @if($funcao=='new') Adicionar Imagem @else Editar Imagem @endif
  </div>



  <form id="newForm" method="POST" enctype="multipart/form-data" action="{{ route('addImgProjetoPost') }}">
    {{ csrf_field() }}
    <input type="hidden" id="id" name="id_img" value="@if(isset($projeto->id)){{ $projeto->id }}@endif">

    <div class="row">
      <div class="col-lg-6">
        <label class="lb">{{ trans('backoffice.Description') }} (PT)</label>
        <input class="ip" type="text" name="descricao_pt" value="@if(isset($projeto->descricao_pt)){{ $projeto->descricao_pt }}@endif">

        <label class="lb">{{ trans('backoffice.Description') }} (EN)</label>
        <input class="ip" type="text" name="descricao_en" value="@if(isset($projeto->descricao_en)){{ $projeto->descricao_en }}@endif">
      </div>
      <div class="col-lg-6">
        <label class="lb">{{ trans('backoffice.Image') }} (PT)</label>
        <input type="hidden" id="imagem_antiga" name="imagem_antiga" value="@if(isset($projeto->imagem_pt)){{ $projeto->imagem_pt }}@endif">
        <div>
          <div class="div-50">
            <div class="div-50" id="imagem">
              @if(isset($projeto->imagem_pt) && $projeto->imagem_pt)<img src="{{ $projeto->imagem_pt }}" class="height-40 margin-top10">@else<label class="a-dotted-white" id="uploads">&nbsp;</label>@endif
            </div>
            <label for="selecao-arquivo" class="lb-40 bt-azul float-right"><i class="fas fa-upload"></i></label>
            <input id="selecao-arquivo" type="file" name="ficheiro" onchange="lerFicheiros(this,'uploads');" accept="image/*">
          </div>
          <label class="lb-40 bt-azul float-right" onclick="limparFicheiros();"><i class="fa fa-trash-alt"></i></label>          
        </div>

        <label class="lb">{{ trans('backoffice.Image') }} (EN)</label>
        <input type="hidden" id="imagem_antiga_en" name="imagem_antiga_en" value="@if(isset($projeto->imagem_en)){{ $projeto->imagem_en }}@endif">
        <div>
          <div class="div-50">
            <div class="div-50" id="imagem_en">
              @if(isset($projeto->imagem_en) && $projeto->imagem_en)<img src="{{ $projeto->imagem_en }}" class="height-40 margin-top10">@else<label class="a-dotted-white" id="uploads_en">&nbsp;</label>@endif
            </div>
            <label for="selecao-arquivo_en" class="lb-40 bt-azul float-right"><i class="fas fa-upload"></i></label>
            <input id="selecao-arquivo_en" type="file" name="ficheiro_en" onchange="lerFicheiros(this,'uploads_en');" accept="image/*">
          </div>
          <label class="lb-40 bt-azul float-right" onclick="limparFicheiros_en();"><i class="fa fa-trash-alt"></i></label>          
        </div>

      </div>
    </div>
   
    <label class="lb">{{ trans('backoffice.Online') }}</label>
    <div class="clearfix height-10"></div>
    <input type="checkbox" name="online" id="check1" value="1" @if(isset($projeto->online) && ($projeto->online=='1')) checked @endif>
    <label for="check1"><span></span>{{ trans('backoffice.Online') }}</label>
     

 
   
    <div class="clearfix height-20"></div>
    <div id="botoes">
      <button class="bt bt-verde float-right" type="submit"><i class="fas fa-check"></i> {{ trans('backoffice.Save') }}</button>
      <label class="width-10 height-40 float-right"></label>
      <a href="{{ route('websitePageB') }}" class="abt bt-vermelho float-right"><i class="fas fa-times"></i> {{ trans('backoffice.Cancel') }}</a>
    </div>
    <div id="loading" class="loading"><i class="fas fa-sync fa-spin"></i> {{ trans('backoffice.SavingR') }}</div>
    <div class="clearfix"></div>
    <div class="height-20"></div>
    <label id="labelSucesso" class="av-100 av-verde display-none"><span id="spanSucesso">{{ trans('backoffice.savedSuccessfully') }}</span> <i class="fas fa-times" onclick="$(this).parent().hide();"></i></label>
    <label id="labelErros" class="av-100 av-vermelho display-none"><span id="spanErro"></span> <i class="fas fa-times" onclick="$(this).parent().hide();"></i></label>
  </form>

  <!-- Modal Save -->
  <div class="modal fade" id="myModalSave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <input type="hidden" name="id_modal" id="id_modal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header"><h4 class="modal-title" id="myModalLabel">{{ trans('backoffice.Saved') }}</h4></div>
        <div class="modal-body">{!! trans('backoffice.savedSuccessfully') !!}</div>
        <div class="modal-footer">
          <a href="{{ route('websitePageB') }}" class="abt bt-cinza"><i class="fas fa-arrow-left"></i> {{ trans('backoffice.Back') }}</a>&nbsp;
          <a href="javascript:;" class="abt bt-verde" data-dismiss="modal"><i class="fas fa-check"></i> {{ trans('backoffice.Ok') }}</a>
        </div>
      </div>
    </div>
  </div>
@stop

@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet">
@stop

@section('javascript')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/i18n/pt.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/i18n/en.js"></script>

<script type="text/javascript">
  function lerFicheiros(input,id) {
    var quantidade = input.files.length;
    var nome = input.value;
    if(quantidade==1){$('#'+id).html(nome);}
    else{$('#'+id).html(quantidade+' {{ trans('backoffice.selectedFiles') }}');}
  }
  function limparFicheiros() {
    $('#selecao-arquivo').val('');
    $('#uploads').html('&nbsp;');
    $('#imagem_antiga').val('');
    $('#imagem').html('<label class="a-dotted-white" id="uploads">&nbsp;</label>');
  }

  function limparFicheiros_en() {
    $('#selecao-arquivo_en').val('');
    $('#uploads_en').html('&nbsp;');
    $('#imagem_antiga_en').val('');
    $('#imagem_en').html('<label class="a-dotted-white" id="uploads">&nbsp;</label>');
  }

  $('#newForm').on('submit',function(e) {
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
        //$('#myModalSave').modal('show');
        console.log(resposta);
        resp = $.parseJSON(resposta);
        if(resp.estado=='sucesso'){          
          $('#id').val(resp.id);
          limparFicheiros();
          
          if(resp.imagem){
            $('#imagem_antiga').val(resp.imagem);
            $('#imagem').html('<img src="'+resp.imagem+'" class="height-40 margin-top10">');
          }

          if(resp.imagem_en){
            $('#imagem_antiga_en').val(resp.imagem_en);
            $('#imagem_en').html('<img src="'+resp.imagem_en+'" class="height-40 margin-top10">');
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