@extends('site/layouts/default-bonfim')

@section('content')
	<div class="bonfim-preto" style="text-align:center;padding-top:75px;">
		<div class="container">
			<div class="row">
				<div class="col-md-10 offset-md-1">
					<div>
						<h1 class="noticia-tit"> {!! $noticia->titulo !!}</h1>
						<label class="bonfim-noticias-tit-data"> {!! $noticia->data_noticia !!} </label>
					</div>

					<div class="bonfim-noticias-txt">
						{!! $noticia->primeiro_texto !!}
					</div>

					<img class="bonfim-noticias-img" src="{{ $noticia->imagem }}">

					<div class="bonfim-noticias-txt">
						@if($noticia->segundo_texto != '' ) <label class="margin-bottom40">{!! $noticia->segundo_texto !!} <p style="margin:10px 0px;"><a style="font-family: 'SegoeuLightItalic';" class="tx-branco text-decoration-line" href="{{ $noticia->link }}" target="_blank">{!! trans('bonfim.See_original_news') !!}</a></p> </label>@else <p style="margin-bottom:10px;"><a style="font-family: 'SegoeuLightItalic';" class="tx-branco text-decoration-line" href="{{ $noticia->link }}" target="_blank">{!! trans('bonfim.See_original_news') !!}</a></p> @endif
						
						<div class="bonfim-noticias-txt-data"> {!! $noticia->data_noticia !!} </div>
					</div>
				</div>
				
			</div>
			
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<div class="bonfim-noticias">
					<div id="bonfim-noticias-slide" class="container">
						 
						<div class="swiper-button-next"><span>{{ trans('bonfim.Seguinte') }}</span></div>
						<div class="swiper-button-prev"><span>{{ trans('bonfim.Anterior') }}</span></div>

						<div class="swiper-container">
						    <div class="swiper-wrapper">
						 		@foreach($noticia_slide as $noticia)
						 		<? 
						 		if(strlen($noticia->titulo) > 50){
						 			$css = 'bonfim-noticias-slide-tit-grande';
						 		}
						 		else{
						 			$css = 'bonfim-noticias-slide-tit';
						 		} 
						 		?>
					 				<div id="slide_noticias" class="swiper-slide">
					 					<a href="{{ route('bonfimNoticiaPage',$noticia->id_noticia) }}">
								      		<div class="bonfim-noticias-position">
								      			<p class="{{ $css }}">{!! $noticia->titulo !!}</p>
								      			<p class="bonfim-noticias-slide-txt">{!! $noticia->texto !!}</p>

								      			<label class="bonfim-noticias-slide-data"> {!! $noticia->data_noticia !!}</label>
								      		</div>
							      		</a>
							      	</div>
							    @endforeach
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="bonfim-div-newsletter-fd">
		<div class="container">
			<div class="bonfim-div-newsletter">
		      <form id="newsletterForm" action="{{route('newsletterBonfimForm')}}" name="form" method="post">
		  			<div class="row">
		  				<div class=" col-sm-9 col-md-8 offset-md-1 col-lg-6 offset-lg-2  col-xl-5 offset-xl-3 bonfim-padding-right padding-left">
		  				<label style="font-family: 'Segoeu';" class="bonfim-div-newsletter-txt">{!! trans('bonfim.SUBSCREVER_txt') !!}</label><br>
		  					
		            <div class="bonfim-div-newsletter-ip">
		              <label style="font-family: 'Segoeu';" class="tx-azul">{{ trans('bonfim.EMAIL') }}</label><br>
		              <input class="bonfim-ip" type="email" name="email">
		            </div>

		            <button class="bonfim-div-newsletter-bt">{{ trans('bonfim.SUBSCREVER') }}</button>
		  					<div id="labelAviso_news"></div>
		  				</div>
		          
		  				<div class=" col-sm-3 col-md-2 col-lg-2 col-xl-1 bonfim-padding-right">
		  					<img class="float-right" src="/img/site/logo_255_azul.svg">
		  				</div>
		  			</div>
		      </form>
			</div>
		</div>
	</div>

	<div class="bonfim-rodape-mapa">
		<div class="bonfim-rodape-gaivota">{!!trans('site.Gaivota')!!}</div>
	</div>
@stop

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css">
@stop


@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.jquery.min.js"></script>

<script>
	$('#newsletterForm').on('submit',function(e) {
	 var form = $(this);
	 e.preventDefault();
	 $.ajax({
	   type: "POST",
	   url: form.attr('action'),
	   data: new FormData(this),
	   contentType: false,
	   processData: false,
	   cache: false,
	   headers:{ 'X-CSRF-Token':'{!! csrf_token() !!}' }
	 })
	 .done(function(resposta){
	   console.log(resposta);
	   try{ resp=$.parseJSON(resposta); }
	    catch (e){
	        if(resposta){
	          $('#labelAviso_news').css('color','red');
	          $('#labelAviso_news').html(resposta);
	        }
	        return;
	    }

	    if(resp.estado=='sucesso'){
	      $('#labelAviso_news').css('color','green');
	      $('#labelAviso_news').html(resp.mensagem);

	      document.getElementById("newsletterForm").reset();
	    }

	 });
	});
</script>
 <script>
    var swiper = new Swiper('.swiper-container', {
    	slidesPerView: 2,
    	// Navigation arrows
	  	nextButton: '.swiper-button-next',
	  	prevButton: '.swiper-button-prev',

	  	breakpoints: {
	      1024: {
	          slidesPerView: 2,
	      },
	      992: {
	          slidesPerView: 2,
	      },
	      768: {
	          slidesPerView: 1,
	      },
	      640: {
	          slidesPerView: 1,
	      },
	      320: {
	          slidesPerView: 1,
	      }
	  	},
		
    });
</script>
@stop