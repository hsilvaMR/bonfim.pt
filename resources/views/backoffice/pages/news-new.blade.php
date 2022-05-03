@extends('backoffice/layouts/default')

@section('content')
  @if($funcao=='new')<?php $arrayCrumbs = [ trans('backoffice.News') => route('newsPageB'), trans('backoffice.New_news') => route('newNewsPageB') ]; ?>@else
  <?php $arrayCrumbs = [ trans('backoffice.News') => route('newsPageB'), trans('backoffice.Edit_news') => route('editNewsPageB',['id'=>$news->id]) ]; ?>@endif
  @include('backoffice/includes/crumbs')

  <div class="page-titulo">
    @if($funcao=='new'){{ trans('backoffice.New_news') }}@else{{ trans('backoffice.Edit_news') }}@endif
  </div>

  <div style="height:500px;background-size:contain;background-repeat:no-repeat;background-image:url('/backoffice/img/image_new.png');">
  
  </div>

  <form id="newForm" method="POST" enctype="multipart/form-data" action="{{ route('newFormB') }}">
    {{ csrf_field() }}
    <input type="hidden" id="id" name="id_new" value="@if(isset($news->id)){{ $news->id }}@endif">

    <label class="lb">{{ trans('backoffice.Title') }} (PT)</label>
    <input class="ip" type="text" name="titulo_pt" value="@if(isset($news->titulo_pt)){{ $news->titulo_pt }}@endif">

    <label class="lb">{{ trans('backoffice.Title') }} (EN)</label>
    <input class="ip" type="text" name="titulo_en" value="@if(isset($news->titulo_en)){{ $news->titulo_en }}@endif">

    <label class="lb">{{ trans('backoffice.First_text') }} (PT)</label>
    <textarea class="tx" name="primeiro_texto_pt">@if(isset($news->primeiro_texto_pt)){!! $news->primeiro_texto_pt  !!}@endif</textarea>

    <label class="lb">{{ trans('backoffice.First_text') }} (EN)</label>
    <textarea class="tx" name="primeiro_texto_en">@if(isset($news->primeiro_texto_en)){!! $news->primeiro_texto_en  !!}@endif</textarea>

    <label class="lb">{{ trans('backoffice.Second_text') }} (PT)</label>
    <textarea class="tx" name="segundo_texto_pt">@if(isset($news->segundo_texto_pt)){!! $news->segundo_texto_pt !!}@endif</textarea>

    <label class="lb">{{ trans('backoffice.Second_text') }} (EN)</label>
    <textarea class="tx" name="segundo_texto_en">@if(isset($news->segundo_texto_en)){!! $news->segundo_texto_en !!}@endif</textarea>

    <label class="lb">Hiperligação (PT) </label>
    <input class="ip" type="text" name="link_pt" value="@if(isset($news->link_pt)){{ $news->link_pt }}@endif">

    <label class="lb">Hiperligação (EN) </label>
    <input class="ip" type="text" name="link_en" value="@if(isset($news->link_en)){{ $news->link_en }}@endif">


    <div class="row">
      <div class="col-lg-6">
        <label class="lb">{{ trans('backoffice.Image') }}</label>
        <input type="hidden" id="imagem" name="imagem" value="@if(isset($news->imagem)){{ $news->imagem }}@endif">
        <div>
          <div class="div-50">
            <div class="div-50" id="imagem_selecao_arquivo">
              @if(isset($news->imagem) && $news->imagem)<img src="{{ $news->imagem }}" class="height-40 margin-top10">@else<label class="a-dotted-white" id="uploads">&nbsp;</label>@endif
            </div>
            <label for="selecao_arquivo" class="lb-40 bt-azul float-right"><i class="fas fa-upload"></i></label>
            <input id="selecao_arquivo" type="file" name="ficheiro" onchange="lerFicheiros(this,'uploads');" accept="image/*">
          </div>
          <label class="lb-40 bt-azul float-right" onclick="limparFicheiros();"><i class="fa fa-trash-alt"></i></label>          
        </div>
      </div>

      <div class="col-lg-6">
        <label class="lb">{{ trans('backoffice.News_date') }} (PT)</label>
        <input class="ip" type="text" name="data_noticia_pt" value="@if(isset($news->data_noticia_pt)){{ $news->data_noticia_pt }}@endif">

        <label class="lb">{{ trans('backoffice.News_date') }} (EN)</label>
        <input class="ip" type="text" name="data_noticia_en" value="@if(isset($news->data_noticia_en)){{ $news->data_noticia_en }}@endif">
      </div>
    </div>

    <label class="lb">{{ trans('backoffice.Online') }}</label>
    <div class="clearfix height-10"></div>
    <input type="checkbox" name="online" id="check1" value="1" @if(isset($news->online) && ($news->online=='1')) checked @endif>
    <label for="check1"><span></span>{{ trans('backoffice.Online') }}</label>
  
     

 
   
    <div class="clearfix height-20"></div>
    <div id="botoes">
      <button class="bt bt-verde float-right" type="submit"><i class="fas fa-check"></i> {{ trans('backoffice.Save') }}</button>
      <label class="width-10 height-40 float-right"></label>
      <a href="{{ route('apartmentsPageB') }}" class="abt bt-vermelho float-right"><i class="fas fa-times"></i> {{ trans('backoffice.Cancel') }}</a>
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
          <a href="{{ route('apartmentsPageB') }}" class="abt bt-cinza"><i class="fas fa-arrow-left"></i> {{ trans('backoffice.Back') }}</a>&nbsp;
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
    $('#selecao_arquivo').val('');
    $('#uploads').html('&nbsp;');
    $('#imagem').val('');
    $('#imagem_selecao_arquivo').html('<label class="a-dotted-white" id="uploads">&nbsp;</label>');
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
            $('#imagem').val(resp.imagem);
            $('#imagem_selecao_arquivo').html('<img src="'+resp.imagem+'" class="height-40 margin-top10">');
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