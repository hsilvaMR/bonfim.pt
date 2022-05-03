@extends('backoffice/layouts/default')

@section('content')
  <?php $arrayCrumbs = [ trans('backoffice.Dashboard') => route('dashboardPageB') ]; ?>
  @include('backoffice/includes/crumbs')

  <div class="page-titulo">
  	{{ trans('backoffice.Dashboard') }}
  	<div class="page-informacao" data-toggle="modal" data-target="#myModalInformation"><i class="fas fa-info"></i></div>
  </div>

  <div class="row">
    <div class="col-sm-6 col-lg-3">
	  <div class="modulo-azul">
	  	<div class="modulo-azul-top">{{ $num1 }}<i class="fas fa-users"></i></div>
	  	<a href="{{ route('adminPageB') }}">
	  	  <div class="modulo-azul-bottom">{{ trans('backoffice.Admins') }}<i class="fas fa-arrow-circle-right"></i></div>
	  	</a>
	  </div>
    </div>    
    <div class="col-sm-6 col-lg-3">
	  <div class="modulo-azul">
	  	<div class="modulo-azul-top">{{ $num2 }}<i class="far fa-building"></i></div>
	  	<a href="{{ route('apartmentsPageB') }}">
	  	  <div class="modulo-azul-bottom">{{ trans('backoffice.Apartments') }}<i class="fas fa-arrow-circle-right"></i></div>
	  	</a>
	  </div>
    </div>
    <div class="col-sm-6 col-lg-3">
	  <div class="modulo-azul">
	  	<div class="modulo-azul-top">{{ $num3 }}<i class="fas fa-phone"></i></div>
	  	<a href="{{ route('contactsPageB') }}">
	  	  <div class="modulo-azul-bottom">{{ trans('backoffice.Contacts') }}<i class="fas fa-arrow-circle-right"></i></div>
	  	</a>
	  </div>
    </div>
    <div class="col-sm-6 col-lg-3">
	  <div class="modulo-azul">
	  	<div class="modulo-azul-top">{{ $num4 }}<i class="far fa-newspaper"></i></div>
	  	<a href="{{ route('newsletterPageB') }}">
	  	  <div class="modulo-azul-bottom">{{ trans('backoffice.Newsletter') }}<i class="fas fa-arrow-circle-right"></i></div>
	  	</a>
	  </div>
    </div>
  </div>

  <div class="row">
  	<div class="col-lg-6">
  		<div class="modulo-dashboard">
			<div class="modulo-head">
				{{ trans('backoffice.latestAdmins') }}
				<a href="{{ route('adminPageB') }}">{{ trans('backoffice.goToPage') }} <i class="fas fa-arrow-circle-right"></i></a>
			</div>
			<table class="modulo-body">
				@foreach($lista1 as $list)
				    <tr>
				      <td>
				      	{!! $list->nome !!} | {!! $list->email !!}
				      </td>
				    </tr>
				@endforeach
				@if(empty($lista1)) <tr><td><font class="tx-cinza">{{ trans('backoffice.noRecords') }}</td></tr></font> @endif
			</table>
	  	</div>
  	</div>
  	<div class="col-lg-6">
  		<div class="modulo-dashboard">
			<div class="modulo-head">
				{{ trans('backoffice.latestContacts') }}
				<a href="{{ route('contactsPageB') }}">{{ trans('backoffice.goToPage') }} <i class="fas fa-arrow-circle-right"></i></a>
			</div>
			<table class="modulo-body">
				@foreach($lista2 as $list)
				    <tr>
				      <td>
				      </td>
				    </tr>
				@endforeach
				@if(empty($lista2)) <tr><td><font class="tx-cinza">{{ trans('backoffice.noRecords') }}</td></tr></font> @endif			  
			</table>
	  	</div>
  	</div>
  </div>

  
  <!-- Modal Information -->
  <div class="modal fade" id="myModalInformation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header"><h4 class="modal-title">{{ trans('backoffice.dashboardTt') }}</h4></div>
        <div class="modal-body">{!! trans('backoffice.dashboardTx') !!}</div>
        <div class="modal-footer"><button type="button" class="bt bt-azul" data-dismiss="modal"><i class="fas fa-check"></i> {{ trans('backoffice.Ok') }}</button></div>
      </div>
    </div>
  </div>
@stop

@section('css')
@stop

@section('javascript')
@stop