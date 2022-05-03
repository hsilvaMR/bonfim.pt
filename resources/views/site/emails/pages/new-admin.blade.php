@extends('site/emails/layouts/default')

@section('content')
	@include('backoffice/emails/includes/header')
	<!-- ICON -->
	<table style="padding-top:50px;" border="0" cellpadding="0" width="100%">
	   <tr>
		  <td align="center" width="100%">
		    <img src="{{  asset('backoffice/img/emails/user.png') }}" alt="User" height="90">
		  </td>
		</tr>
	</table>
	<!-- TEXTO -->
	<table style="padding-top:40px;" border="0" cellpadding="0" width="100%">
	   <tr>
		    <td align="center" width="100%" style="color:#58595b;font-size:14px;line-height:20px;">
		        {!! trans('backoffice.welcomeTi') !!} {{ $nome }},
		        <br>{!! trans('backoffice.welcomeTx') !!}
			</td>
		</tr>
	</table>

	@include('site/emails/includes/noreply')
@stop