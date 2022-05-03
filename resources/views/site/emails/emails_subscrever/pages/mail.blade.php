@extends('site/emails/emails_subscrever/layouts/default')

@section('content')
@include('site/emails/emails_subscrever/includes/header')

<table align="center">
  <tr>
    <td align="center" width="100%" style="color:#58595b;font-size:14px;line-height:20px;text-align:center; margin-top: 20px;">
    	{!! trans('emails.MostreInteresse') !!} 
    	<br><br><br>
		{{ $email }}        
	</td>
  </tr>
</table>
<p></p>  

@stop