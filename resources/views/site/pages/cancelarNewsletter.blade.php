@extends('site/layouts/default-bonfim')

@section('content')
	<div class="bonfim-preto" style="text-align:center;padding:75px 0px;height:calc(100% - 190px);">
	
		<div style="position: relative;top: 50%;transform: translateY(-50%); ">

			<img height="75" src="/img/site/icon_unsubscribe.svg">
			<p style="margin:30px;font-size:24px;">@if($lingua == 'pt')Subscrição cancelada com sucesso!@else Subscription canceled successfully!@endif</p>

			<a href="{{ route('bonfimInfoPage') }}"><button class="bonfim-bt">@if($lingua == 'pt') VOLTAR AO SITE @else BACK TO SITE @endif </button></a>
		</div>
	</div>
@stop

@section('css')
@stop


@section('javascript')
@stop