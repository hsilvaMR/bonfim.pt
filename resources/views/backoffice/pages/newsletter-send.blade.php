@extends('backoffice/layouts/default')

@section('content')
  @if($funcao=='new')<?php $arrayCrumbs = [ trans('backoffice.Newsletter') => route('newsletterEmailsPageB'), 'Nova Newsletter' => route('newsletterSendPageB') ]; ?>@else
  <?php $arrayCrumbs = [ trans('backoffice.Newsletter') => route('newsletterEmailsPageB'), 'Editar Newsletter' => route('newsletterEditPageB',['id'=>$news->id]) ]; ?>@endif
  @include('backoffice/includes/crumbs')

  <div class="page-titulo">
    @if($funcao=='new')Nova Newsletter @else Editar Newsletter @endif
  </div>

  

  <form id="newForm" method="POST" enctype="multipart/form-data" action="{{ route('newsletterCreatePostB') }}">
    {{ csrf_field() }}

    <input class="ip" type="hidden" id="id_news" name="id_news" value="@if(isset($news->id)){{ $news->id }}@endif">
    <input class="ip" type="hidden" id="lingua" name="lingua" value="@if(isset($news->lingua)){{ $news->lingua }}@endif">

    <input class="ip" type="hidden" id="id_identificacao" name="id_identificacao" value="@if(isset($news_id->id)){{ $news_id->id }}@endif">

    <label class="lb">Identificação da newsletter</label> 
    <input class="ip" type="text" name="nome" value="@if(isset($news_id->identificacao)){{ $news_id->identificacao }}@endif">


    <!--Newsletter (PT)-->
    @if(($funcao=='edit') && ($news->lingua == 'pt'))
      <div class="height-50"></div>
      <label class="lb">Newsletter (PT)</label> 

      @if($funcao=='edit')
        @foreach($news_file as $file)
          <div id="file_{{ $file->id }}"><label class="lb"><a class="margin-right10" href="{{ $file->ficheiro }}" download> Ficheiro_{{ $file->id }}</a>
            <label onclick="deletefile({{ $file->id }},'pt');"><i class="fas fa-times tx-vermelho"></i> <span class="tx-vermelho font12">eliminar ficheiro</span></label></label></div>
        @endforeach
      @endif

      <div>
        <div class="div-160" id="imagem_selecao_arquivo_pt">
          <label class="a-dotted-white" id="uploads_pt">&nbsp;</label>
        </div>
        <label for="selecao_arquivo_pt" class="bt-reto bt-azul float-right">Anexar ficheiros</label>
        <input id="selecao_arquivo_pt" type="file" name="ficheiro_pt[]" onchange="lerFicheiros(this,'uploads_pt');" accept="*" multiple>
      </div>

      <input class="ip" type="text" name="assunto_pt" value="@if(isset($news->assunto)){{ $news->assunto }}@endif" placeholder="Assunto">
      <textarea class="tx" type="text" name="mensagem_pt" placeholder="Mensagem">@if(isset($news->corpo)){{ $news->corpo }}@endif</textarea>
    @endif
    <!--Newsletter (EN)-->

    @if(($funcao=='edit') && ($news->lingua == 'en'))
      <div class="height-50"></div>
      <label class="lb">Newsletter (EN)</label> 

      @if($funcao=='edit')
        @foreach($news_file as $file)
          <div id="file_{{ $file->id }}"><label class="lb"><a class="margin-right10" href="{{ $file->ficheiro }}" download> Ficheiro_{{ $file->id }}</a>
            <label onclick="deletefile({{ $file->id }},'en');"><i class="fas fa-times tx-vermelho"></i> <span class="tx-vermelho font12">eliminar ficheiro</span></label></label></div>
        @endforeach
      @endif

      <div>
        <div class="div-160" id="imagem_selecao_arquivo_en">
          <label class="a-dotted-white" id="uploads_en">&nbsp;</label>
        </div>
        <label for="selecao_arquivo_en" class="bt-reto bt-azul float-right">Anexar ficheiros</label>
        <input id="selecao_arquivo_en" type="file" name="ficheiro_en[]" onchange="lerFicheiros(this,'uploads_en');" accept="*" multiple>
      </div>

      <input class="ip" type="text" name="assunto_en" value="@if(isset($news->assunto)){{ $news->assunto }}@endif" placeholder="Assunto">
      <textarea class="tx" type="text" name="mensagem_en" placeholder="Mensagem">@if(isset($news->corpo)){{ $news->corpo }}@endif</textarea>
    @endif


    <div class="clearfix height-20"></div>
    <div id="botoes">
      <button class="bt bt-verde float-right" type="submit"><i class="fas fa-check"></i> {{ trans('backoffice.Save') }}</button>
      <label class="width-10 height-40 float-right"></label>
      <a href="{{ route('newsletterPageB') }}" class="abt bt-vermelho float-right"><i class="fas fa-times"></i> {{ trans('backoffice.Cancel') }}</a>
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
          <a href="{{ route('newsletterPageB') }}" class="abt bt-cinza"><i class="fas fa-arrow-left"></i> {{ trans('backoffice.Back') }}</a>&nbsp;
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

  function deletefile(id){

    $.ajax({
      type: "POST",
        url: '{{ route('deleteLineTMB') }}',
        data: { tabela:'bonfim_newsletter_conteudo_file', id:id },
        headers:{ 'X-CSRF-Token':'{!! csrf_token() !!}' }
    })
    .done(function(resposta) {
        if(resposta=='sucesso'){
          $('#file_'+id).remove();
          $.notific8('{{ trans('backoffice.deleteSuccessfully') }}');
        }else{ $.notific8(resposta, {color:'ruby'}); }
    });

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
          $('#id_news').val(resp.id);
          limparFicheiros();
          if(resp.imagem){
            $('#imagem').val(resp.imagem);
            $('#imagem_selecao_arquivo').html('<img src="'+resp.imagem+'" class="height-40 margin-top10">');
          }

          $('#loading').hide();
          $('#botoes').show();
          $("#labelSucesso").show();   
          window.location.href = '/admin/newsletter-view/'+resp.id+'/'+resp.lingua;       
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