@extends('backoffice/layouts/default')

@section('content')
  @if(isset($contacts->id))<?php $arrayCrumbs = [ trans('backoffice.Contacts') => route('contactsPageB') , trans('backoffice.Contact_Details') => route('contactsDetailsPageB',['id'=>$contacts->id])]; ?>@endif
  @include('backoffice/includes/crumbs')

  <div class="page-titulo">
    {{ trans('backoffice.Contact_Details') }}
  </div>

  @if($contacts->id_lote != '' )
    <div><label class="lb">Pedido de contacto no apartamento {{ $apartamento->fracao }}</label></div>
  @endif

  <div class="row">
    <div class="col-lg-9">
      <label class="lb">{{ trans('backoffice.Name') }}</label>
      <label class="lb-solid">{{ $contacts->nome }}</label>
    </div>
    <div class="col-lg-3">
      <label class="lb">{{ trans('backoffice.Date') }}</label>
      <label class="lb-solid">{!! date('d/m/Y',$contacts->data) !!}</label>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <label class="lb">{{ trans('backoffice.Contact') }}</label>
      <label class="lb-solid">{{ $contacts->telefone }}</label>
    </div>
    <div class="col-lg-6">
      <label class="lb">{{ trans('backoffice.Email') }}</label>
      <label class="lb-solid"><a href="mailto:{!! $contacts->email !!}">{{ $contacts->email }}</a></label>
    </div>
  </div>

  
  
  <label class="lb">{{ trans('backoffice.Message') }}</label>
  <label class="lb-solid min-height-100">{!! nl2br($contacts->mensagem) !!}</label>
  

  <div class="clearfix height-20"></div>
  <a href="{{ route('contactsPageB') }}" class="abt bt-azul float-right"><i class="fas fa-arrow-left"></i> {{ trans('backoffice.Back') }}</a>
@stop





    
 


