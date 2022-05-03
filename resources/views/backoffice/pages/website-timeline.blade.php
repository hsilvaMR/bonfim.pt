@extends('backoffice/layouts/default')

@section('content')
	<?php $arrayCrumbs = [ 'Barra de progressão' => route('websiteTimelinePageB') ]; ?>
  	@include('backoffice/includes/crumbs')

	<div class="page-titulo">
	  Barra de progressão
	  <div class="page-informacao" data-toggle="modal" data-target="#myModalInformation"><i class="fas fa-info"></i></div>
	</div>

  <div><label class="lb">Data de início da obra:</label> {{ $data_inicio }}</div>
  <div><label class="lb">Data de conclusão da obra:</label> {{ $data_fim }}</div>
 


  <!--<div id="myProgress" style="position: relative;width: 100%;height: 30px;background-color: #ddd;">
  
  </div>-->

    
<?php 
  $data_hoje=\Carbon\Carbon::now()->timestamp;
  $data_hoje_dia=date('d',$data_hoje);

  $calculo_percentagem = ($data_hoje_dia*100)/30;
?>

  <ol class="progress" data-steps="21">
    @foreach($array as $val)
      <li class="done">

        <span class="name" 
          @if(($data_hoje >= $val['data'])) style="background-color:green;"
          @elseif(($data_hoje < $val['data']) && (date('m-y',$val['data']) == date('m-y',$data_hoje))) style="background-image:linear-gradient(to right,green,#ccc {{ $calculo_percentagem }}%);" 
          @endif>{!! date('m-y',$val['data']) !!}</span>

        @foreach($barra_fase as $fase)
          @if(date('m-y',$val['data']) == date('m-y',$fase->data_inicio))
         
            <span style="word-wrap: break-word;font-size: xx-small;">{{ $fase->fase_pt }}</span>
         
          @endif
        @endforeach
        <!--<span class="step"><span>{ { $val['data'] }}</span></span>--> 
      </li>
    @endforeach
  </ol>

  <form id="form" method="POST" enctype="multipart/form-data" action="{{ route('websiteTimelineEditForm') }}">
    {{ csrf_field() }}

    <div class="row">
      <div class="col-md-6">
        <label class="lb">Data de início da obra:</label> 
        <div class="div-160 float-right">
          <input class="ip" type="text" id="data_inicio_obra" name="data_inicio_obra" maxlength="10" value="@if(isset($barra->data_inicio)){{ date('Y-m-d',$barra->data_inicio) }}@endif">
        </div>
        
      </div>
      <div class="col-md-6">
        <label class="lb">Data de conclusão da obra:</label> 
        <div class="div-190 float-right">
          <input class="ip" type="text" id="data_conclusao_obra" name="data_conclusao_obra" maxlength="10" value="@if(isset($barra->data_fim)){{ date('Y-m-d',$barra->data_fim) }}@endif">
        </div>
      </div>
    </div>
    
  
      <div class="row">
        
        <div class="col-lg-4">
          <label class="lb">Fase de Progressão: (PT | EN)</label> 
          @foreach($barra_fase as $fase)
            <div class="row">
              <div class="col-md-6">
                <input class="ip" type="text" name="pt_fase_{{ $fase->id }}" value="{{ $fase->fase_pt }}">
              </div>
              <div class="col-md-6">
                <input class="ip" type="text" name="en_fase_{{ $fase->id }}" value="{{ $fase->fase_en }}">
              </div>
            </div>
          @endforeach
        </div>
        
        <div class="col-lg-4">
          <label class="lb">Estado: (PT | EN)</label> 
          @foreach($barra_fase as $fase)
            <div class="row">
              <div class="col-md-6">
                <input class="ip" type="text" name="pt_estado_{{ $fase->id }}" value="{{ $fase->estado_pt }}">
              </div>
              <div class="col-md-6">
                <input class="ip" type="text" name="en_estado_{{ $fase->id }}" value="{{ $fase->estado_en }}">
              </div>
            </div>
          @endforeach
        </div>
        
        <div class="col-lg-2">
          <label class="lb">Data de início:</label> 
          @foreach($barra_fase as $fase)
            <input class="ip" type="text" id="inicio_{{ $fase->id }}" name="data_inicio_{{ $fase->id }}" maxlength="10" value="@if(isset($fase->data_inicio)){{ date('Y-m-d',$fase->data_inicio) }}@endif">
          @endforeach
        </div>

        
        <div class="col-lg-2">
          <label class="lb">Data de conclusão:</label><br>
          @foreach($barra_fase as $fase)
            <div class="div-130 float-left"><input class="ip" type="text" id="conclusao_{{ $fase->id }}" name="data_conclusao_{{ $fase->id }}" maxlength="10" value="@if(isset($fase->data_fim)){{ date('Y-m-d',$fase->data_fim) }}@endif"></div>
            <button class="bt-40 bt-azul float-right" type="button" onclick="removeFase({{ $fase->id }});$(this).parent().remove();"><i class="fas fa-trash-alt"></i></button>
          @endforeach
        </div>
          
        
      </div>
      


    <div class="height-40"></div>

    <div class="row">
      <div class="col-lg-4">
        <label class="lb">Adiconar fase de progressão (PT | EN)</label> 
        <div class="row">
          <div class="col-md-6">
            <input class="ip" type="text" name="fase_pt" value="">
          </div>
          <div class="col-md-6">
            <input class="ip" type="text" name="fase_en" value="">
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <label class="lb">Estado (PT | EN)</label> 

        <div class="row">
          <div class="col-md-6">
            <input class="ip" type="text" name="estado_pt" value="">
          </div>
          <div class="col-md-6">
            <input class="ip" type="text" name="estado_en" value="">
          </div>
        </div>
      </div>
      <div class="col-lg-2">
        <label class="lb">Data de início:</label> 
        <input class="ip" type="text" id="data_inicio_new" name="data_inicio_new" maxlength="10" value="">
      </div>

      <div class="col-lg-2">
        <label class="lb">Data de conclusão:</label> 
        <input class="ip" type="text" id="data_conclusao_new" name="data_conclusao_new" maxlength="10" value="">
      </div>

    </div>

    <div class="clearfix height-20"></div>
    <div id="botoes">
      <button class="bt bt-verde float-right" type="submit"><i class="fas fa-check"></i> {{ trans('backoffice.Save') }}</button>
      <label class="width-10 height-40 float-right"></label>
      <a href="{{ route('websiteTimelinePageB') }}" class="abt bt-vermelho float-right"><i class="fas fa-times"></i> {{ trans('backoffice.Cancel') }}</a>
    </div>
    <div id="loading" class="loading"><i class="fas fa-sync fa-spin"></i> {{ trans('backoffice.SavingR') }}</div>
    <div class="clearfix"></div>
    <div class="height-20"></div>
    <label id="labelSucesso" class="av-100 av-verde display-none"><span id="spanSucesso">{{ trans('backoffice.savedSuccessfully') }}</span> <i class="fas fa-times" onclick="$(this).parent().hide();"></i></label>
    <label id="labelErros" class="av-100 av-vermelho display-none"><span id="spanErro"></span> <i class="fas fa-times" onclick="$(this).parent().hide();"></i></label>

  </form>
  
	<!-- Modal Information -->
	<div class="modal fade" id="myModalInformation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog" role="document">
    		<div class="modal-content">
      		<div class="modal-header"><h4 class="modal-title">{{ trans('backoffice.dashboardTt') }}</h4></div>
      		<div class="modal-body">{!! trans('backoffice.timelineTx') !!}</div>
      		<div class="modal-footer"><button type="button" class="bt bt-azul" data-dismiss="modal"><i class="fas fa-check"></i> {{ trans('backoffice.Ok') }}</button></div>
    		</div>
  	</div>
	</div>


@stop

@section('css')
<link rel="stylesheet" href="{{ asset('backoffice/vendor/datepicker/bootstrap-datepicker.css') }}">
@stop

@section('javascript')
<script type="text/javascript" src="{{ asset('backoffice/vendor/datepicker/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript">  
  @foreach($barra_fase as $fase)
    $('#inicio_'+{!! $fase->id !!}).datepicker({
      //format:'yyyy-mm-dd',
      days: {!! trans('backoffice.days') !!},
      daysShort: {!! trans('backoffice.daysShort') !!},
      daysMin: {!! trans('backoffice.daysMin') !!},
      months: {!! trans('backoffice.months') !!},
      monthsShort: {!! trans('backoffice.monthsShort') !!}
    });

    $('#conclusao_'+{!! $fase->id !!}).datepicker({
      //format:'yyyy-mm-dd',
      days: {!! trans('backoffice.days') !!},
      daysShort: {!! trans('backoffice.daysShort') !!},
      daysMin: {!! trans('backoffice.daysMin') !!},
      months: {!! trans('backoffice.months') !!},
      monthsShort: {!! trans('backoffice.monthsShort') !!}
    });
  @endforeach

  $('#data_inicio_new').datepicker({
    //format:'yyyy-mm-dd',
    days: {!! trans('backoffice.days') !!},
    daysShort: {!! trans('backoffice.daysShort') !!},
    daysMin: {!! trans('backoffice.daysMin') !!},
    months: {!! trans('backoffice.months') !!},
    monthsShort: {!! trans('backoffice.monthsShort') !!}
  });

  $('#data_conclusao_new').datepicker({
    //format:'yyyy-mm-dd',
    days: {!! trans('backoffice.days') !!},
    daysShort: {!! trans('backoffice.daysShort') !!},
    daysMin: {!! trans('backoffice.daysMin') !!},
    months: {!! trans('backoffice.months') !!},
    monthsShort: {!! trans('backoffice.monthsShort') !!}
  });


  $('#data_inicio_obra').datepicker({
    //format:'yyyy-mm-dd',
    days: {!! trans('backoffice.days') !!},
    daysShort: {!! trans('backoffice.daysShort') !!},
    daysMin: {!! trans('backoffice.daysMin') !!},
    months: {!! trans('backoffice.months') !!},
    monthsShort: {!! trans('backoffice.monthsShort') !!}
  });

  $('#data_conclusao_obra').datepicker({
    //format:'yyyy-mm-dd',
    days: {!! trans('backoffice.days') !!},
    daysShort: {!! trans('backoffice.daysShort') !!},
    daysMin: {!! trans('backoffice.daysMin') !!},
    months: {!! trans('backoffice.months') !!},
    monthsShort: {!! trans('backoffice.monthsShort') !!}
  });


  


  $('#form').on('submit',function(e) {
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
        $('#loading').hide();
        $('#botoes').show();
        $("#labelSucesso").show();  
        location.reload();        
      }else if(resposta){
        $("#spanErro").html(resposta);
        $("#labelErros").show();
        $('#loading').hide();
        $('#botoes').show();
      }
    });
  });

  function removeFase(id){

    $.ajax({
      type: "POST",
        url: '{{ route('deleteLineTMB') }}',
        data: { tabela:'barra_progressao_fase', id:id },
        headers:{ 'X-CSRF-Token':'{!! csrf_token() !!}' }
    })
    .done(function(resposta) {
        if(resposta=='sucesso'){
          location.reload(); 
          $.notific8('{{ trans('backoffice.savedSuccessfully') }}');
        }else{ $.notific8(resposta, {color:'ruby'}); }
    });
    
    
  }
</script>
@stop