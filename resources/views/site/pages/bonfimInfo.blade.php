@extends('site/layouts/default-bonfim-info')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-5 col-lg-4" style="padding: 0 !important;">
			<div class="img-magnifier-container">
			  <a href="{{ route('bonfimLocalizacaoPage') }}"><img id="myimage" src="/img/bonfim/rua_mapa.png"></a>
        <div id="log"></div>
			</div>
		</div>
		<div class="col-sm-7 col-lg-8" style="padding: 0 !important;">
      <!--<div id="video_info" style="cursor:pointer;" onclick="openModalVideo();">
        <div class="bonfim-apresentacao">
          <div class="bonfim-apresentacao-txt">
            <h3>{ !! trans('bonfim.APRESENTACAO') !!}</h3>
            <p style="text-shadow: 0px 1px 5px rgb(0 0 0 / 25%);">{ !! trans('bonfim.APRESENTACAO_txt') !!}</p>
          </div>
        </div>

          
          <video id="video_info_video"  style="position:absolute;right:0;bottom:0;min-width:100%;min-height:100%;width:auto;height:auto;z-index:-100;background-size:cover;overflow:hidden;filter:blur(6px);" autoplay loop>
            <source src="/img/bonfim/video.mp4" type="video/mp4">
          </video>
      
      </div>-->
   
      
			<div class="bonfim-apresentacao">
        <div class="bonfim-apresentacao-txt">
          <h3>{!! trans('bonfim.APRESENTACAO') !!}</h3>
          <p style="text-shadow: 0px 1px 5px rgb(0 0 0 / 25%);">{!! trans('bonfim.APRESENTACAO_txt') !!}</p>
        </div>
    	</div>
		</div>
	</div>
</div>

<!-- Modal GALERIA -->
<div id="modal_video" class="modal">
  <span id="close_video" class="close" onclick="closeModalVideo();"><i class="far fa-times-circle"></i></span>
  <video style="width:100%;" autoplay loop>
    <source src="/img/bonfim/video.mp4" type="video/mp4">
  </video>
</div>

<div class="bonfim-height-60"></div>

<div class="tx-branco" style="padding:0px 20px;">
	<div id="bonfim_container_slide" class="container">
		<!-- Swiper -->
		<div class="bonfim-slide">
		  <div id="bonfim_container" class="swiper-container">
		    <div class="swiper-wrapper">
          @foreach($apartamentos as $value)
            <div class="swiper-slide bonfim-slide-swiper" style="background-image:url('{{ $value->imagem_home }}');">
              <a style="height:100%;width:100%;" href="{{ route('bonfimApartamentosPage',$value->id) }}"></a>
            </div>
          @endforeach
		    </div>
		  </div>
		  <!-- Add Arrows -->
		  <div class="swiper-button-next"></div>
		  <div class="swiper-button-prev"></div>
		</div>
	</div>
</div>

<div class="bonfim-height-60"></div>

<div id="swiper-container-noticia" class="swiper-container">
    <div class="swiper-wrapper">
      @foreach($noticias as $val)
        <div class="swiper-slide" style="background-image:url('{{ $val['rasgao'] }}');background-size: 100% 100%;">
          <a href="{{ route('bonfimNoticiaPage',$val['id']) }}">
            <div style="padding:0px 20px;">
              <h3 class="noticia-titulo">{!! $val['titulo'] !!}</h3>
              <label class="noticia-data"> {!! $val['data_noticia'] !!}</label>
            </div>
          </a>
        </div>
      @endforeach
    </div>
    <!-- Add Pagination -->
  <div id="swiper-pagination-noticia" class="swiper-pagination"></div>
</div>

<div class="bonfim-height-60"></div>

<div class="barra_progressao_xl container">
  <div style="position:relative;height:200px;">
    <div style="height:20px;margin-bottom:10px;color:#192533;font-size:16px;line-height:20px;">  
      <span style="position: absolute;left:0;color:{{ $color_texto_inicio  }};font-weight:600;font-family:'Proxima Nova Semibold';"> </span> 
      <span id="timeline_uniao_data" style="position: absolute;right:5px;font-weight:600;font-family:'Proxima Nova Semibold';">{{ $data_fim }}</span>
    </div>
    <img class="timeline_img_inicio" height="60" style="position:absolute;left:0;z-index:100;" src="/img/bonfim/timeline/inicio.svg">

    <div style="width:calc(100% - 70px);position:absolute;left:37px;">
  
      <label class="timeline_barra_verde" style="width:{{ $calc_incio }}px;height:15px;background-color:#E8F1FB;margin-top:15px;margin-right:-4px;margin-left:10px;">
        @if(($width_verde_inicio > 0) && ($width_verde_inicio < 100))
          <label style="width:calc(100% - {{ $width_verde_inicio }}%);height:15px; background-color:#36B289;border-top-right-radius: 50px 50px;border-bottom-right-radius: 50px 50px;"></label>
        @elseif($width_verde_inicio == 100)
          <label style="width:100%;height:15px; background-color:#36B289;"></label>
        @endif
      </label>
      @foreach($array_fases as $fase)
      
        <label id="fase_img_{{ $fase['id'] }}" class="timeline_fase" style="position:relative">
         
          <label style="position:absolute;top:-60px;font-size:16px;color:{{ $fase['color_texto'] }};width:70px;line-height:12px;font-weight:bold;font-family:'Proxima Nova Semibold';">{{ $fase['data_inicio'] }}</label>

          <img  style="margin-top:-29px;position:relative;" height="50" src="{{ $fase['img_visto'] }}">

            <div style="cursor:pointer;">
              <label style="position:absolute;bottom:0;top:30px;left:-20px;font-size:12px;text-align:center;width:90px;">
                <label  style="width:90px;height:50px;vertical-align:bottom;display:table-cell;font-family:'Proxima Nova Regular';font-weight:bold;color:#192533;">{{ $fase['fase'] }}</label>
              </label>

              <label style="position:absolute;bottom:0;top:80px;left:-20px;font-size:10px;text-align:center;width:90px;">
                <label style="width:90px;font-family:'Proxima Nova Regular';color:#60789A;">{{ $fase['estado'] }}</label>
              </label>
            </div>
            
        </label>
        <label id="fase_{{ $fase['id'] }}" class="timeline_barra_branca" style="width:{{ $fase['largura_barra'] }}px;height:15px;background-color:#E8F1FB;margin-top:25px;margin-right:-5px;margin-left:-5px;">
          @if(($fase['barra_verde'] > 0) && ($fase['barra_verde'] < 100))
            <label style="width:calc(100% - {{ $fase['barra_verde']  }}%);height:15px; background-color:#36B289;border-top-right-radius: 50px 50px;border-bottom-right-radius: 50px 50px;"></label>
          @elseif($fase['barra_verde'] == 100)
            <label style="width:100%;height:15px; background-color:#36B289;"></label>
          @endif
        </label>
      @endforeach
    </div>
    
    <div id="timeline_uniao" style="height:60px;width:60px;background-color:#36B289;color:#fff;border-radius:50%;border:3.5px solid #E8F1FB;position: absolute;right:0;z-index:100;text-align:center;"><span style="line-height:55px;font-size:15px;font-family:'Proxima Nova Regular';font-weight: bold;">{{ $percentagem }}%</span></div>
  </div>
</div>

<!--<div class="barra_progressao_xs container">
  <div class="barra_progressao_xs_inicio" style="text-align:center;">
    <span style="color:{ { $color_texto_inicio }};font-weight:600;font-family:'Proxima Nova Semibold';font-size:20px;line-height:20px;margin-right:20px;width:40px;"></span>
    <img style="margin-left:78px;" height="60" src="/img/bonfim/timeline/inicio.svg">
  </div>
  <div class="barra_progressao_xs_conteudo">
    <div style="display:flex;flex-direction:row;justify-content:center;align-items:center">
      <span style="width:78px;"></span> 
      <div style="width:15px;height:{{ $calc_incio }}px;background-color:#E8F1FB;">
        @if(($width_verde_inicio > 0) && ($width_verde_inicio < 100))
          <div style="width:15px;height:calc(100% - {{ $width_verde_inicio }}%); background-color:#36B289;border-bottom-left-radius: 50px 50px;border-bottom-right-radius: 50px 50px;"></div>
        @elseif($width_verde_inicio == 100)
          <div style="width:15px;height:100%; background-color:#36B289;"></div>
        @endif
      </div>
    </div>
    @foreach($array_fases as $fase)
    
      <div style="display:flex;flex-direction:row;justify-content:center;align-items:center">
       <div>
        <div style="font-size:18px;color:{{ $fase['color_texto'] }};font-weight:bold;font-family:'Proxima Nova Semibold';float:left;width:64px;line-height:48px;">{{ $fase['data_inicio'] }}</div>
     
        <img style="margin-left:15px;margin-top:-1px;margin-bottom:-1px;"  height="50" src="{{ $fase['img_visto'] }}">

        <label style="margin-left:20px;font-size:15px;font-family:'Proxima Nova Regular';font-weight:bold;text-align:left;position:absolute;">{{ $fase['fase'] }}
          <br><label style="font-family:'Proxima Nova Regular';color:#60789A;">{{ $fase['estado'] }}</label>
        </label>
        
        </div>
      </div>

      <div style="display:flex;flex-direction:row;justify-content:center;align-items:center">
        <span style="width:78px;"></span> 
        <div style="width:15px;height:{{ $fase['largura_barra'] }}px;background-color:#E8F1FB;">
          @if(($fase['barra_verde'] > 0) && ($fase['barra_verde'] < 100))
            <div style="width:15px;height:calc(100% - {{ $fase['barra_verde']  }}%); background-color:#36B289;border-bottom-left-radius: 50px 50px;border-bottom-right-radius: 50px 50px;"></div>
          @elseif($fase['barra_verde'] == 100)
            <div style="width:15px;height:100%; background-color:#36B289;"></div>
          @endif
        </div>
      </div>
    @endforeach
  </div>

  <div class="barra_progressao_xs_inicio" style="text-align:center;margin-top:-4px;">
    <span style="font-weight:600;font-family:'Proxima Nova Semibold';font-size:18px;line-height:60px;margin-right:20px;">{{ $data_fim }}</span>
    <label class="barra_progressao_xs_fim" style="height:60px;width:60px;background-color:#36B289;color:#fff;border-radius:50%;border:5.5px solid #E8F1FB;text-align:center;margin-top:-1px;margin-right:6px;"><span style="line-height:48px;font-size:15px;font-family:'Proxima Nova Regular';font-weight: bold;">{{ $percentagem }}%</span></label>
  </div>
</div>-->


<div class="barra_progressao_xs container">

  <div class="barra_progressao_xs_inicio" style="text-align:center;">
    <img height="60" src="/img/bonfim/timeline/inicio.svg">
  </div>

  <div class="barra_progressao_xs_conteudo">
    <div style="width:15px;height:{{ $calc_incio }}px;background-color:#E8F1FB;margin:0 auto;">

      <?php $height_linha = $width_verde_inicio/2; ?>

      @if(($height_linha > 0) && ($height_linha < 100))
        <div style="width:15px;height:calc(100% - {{ $height_linha }}%); background-color:#36B289;border-bottom-left-radius: 50px 50px;border-bottom-right-radius: 50px 50px;"></div>
      @elseif($height_linha == 100)
        <div style="width:15px;height:100%; background-color:#36B289;"></div>
      @endif
    </div>

    @foreach($array_fases as $fase)
    
 
      <div style="text-align:center;
    height: 50px;
    margin: 0 auto;
    display: inline-block;
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;">
        
      
        <div style="text-align:end;height:50px;float:left;">
          <label style="font-size:18px;color:{{ $fase['color_texto'] }};font-weight:bold;font-family:'Proxima Nova Semibold';width:117px;line-height:48px;margin-right:20px;">{{ $fase['data_inicio'] }}</label>
          <img style="margin-top:-5px;"  height="50" src="{{ $fase['img_visto'] }}">
        </div>

        <label style="width:120px;font-size:13px;font-family:'Proxima Nova Regular';font-weight:bold;text-align:left;float:right;margin-left:20px;margin-top:20px;">{{ $fase['fase'] }}
          <br><label style="font-family:'Proxima Nova Regular';color:#60789A;">{{ $fase['estado'] }}</label>
        </label>
        
      </div>
     

      <? $height_fase = $fase['largura_barra']/2; ?>
      <? $height_fase_verde = $fase['barra_verde']/2; ?>
   
      <div style="width:15px;height:{{ $height_fase }}px;background-color:#E8F1FB;margin:-3px auto 0 auto;">
        @if(($height_fase_verde > 0) && ($height_fase_verde < 100))
          <div style="width:15px;height:calc(100% - {{ $height_fase_verde  }}%); background-color:#36B289;border-bottom-left-radius: 50px 50px;border-bottom-right-radius: 50px 50px;"></div>
        @elseif($height_fase_verde == 100)
          <div style="width:15px;height:100%; background-color:#36B289;"></div>
        @endif
      </div>
      
    @endforeach
  </div>


  <div class="barra_progressao_xs_inicio" style="text-align:center;height:50px;text-align:center;height:70px;margin:0 auto;display:inline-block;width:100%;display:flex;flex-direction:row;justify-content:center;align-items:center;">
    <div style="text-align:end;height:70px;margin-top:-8px;">
      <label style="width:110px;font-weight:600;font-family:'Proxima Nova Semibold';font-size:18px;line-height:60px;margin-right:20px;">{{ $data_fim }}</label>
      <label class="barra_progressao_xs_fim" style="height:60px;width:60px;background-color:#36B289;color:#fff;border-radius:50%;border:5.5px solid #E8F1FB;text-align:center;margin-top:-1px;margin-right:6px;"><span style="line-height:48px;font-size:15px;font-family:'Proxima Nova Regular';font-weight: bold;">{{ $percentagem }}%</span></label>
      <label style="width:120px;"></label>
    </div>      
  </div>
</div>

<div class="bonfim-height-60"></div>

<div class="bonfim-div-preto">
 
    <h2 class="bonfim-tit">{{ trans('bonfim.PROJECTO') }}</h2>
    <div class="bonfim-height-40"></div>
    <!-- Swiper -->
    <div id="swiper-container-projeto" class="swiper-container" style="width:auto !important;">
      <div class="swiper-wrapper" style="width:auto !important;">
        <?php $cont = 0;?>
        @foreach($projetos as $projeto)
          <div id="slide_{{ $projeto->id }}" class="swiper-slide swiper-div">
            <!--<img id="img_slide_{{ $projeto->id }}" src="{{ $projeto->imagem_sem_resolucao }}" onclick="openModalProjeto({{ $projeto->id }},'{{ $projeto->imagem }}');"/>-->

              <a data-toggle="modal" href="#modal_projeto" data-slider="{{ $cont }}"><img src="{{ $projeto->imagem_sem_resolucao }}"/></a>
         
            <div class="depois">
              <label>{{ $projeto->descricao }}</label>
            </div>
          </div>
          <?php $cont++;?>
        @endforeach

      </div>
      
     <!--<div class="swiper-button-next" style="top:64px;"></div>-->
        
      <!--<div class="antes">
        <div class="swiper-button-prev" style="top:60px;"></div>
      </div>-->
    </div>

  
  <div class="container-fluid">
    <!--<marquee class="bonfim-projeto-ficha">Ficha Técnica: { !! $projeto_ficha->ficha_tecnica !!}</marquee>-->
    <div class="bonfim-projeto-ficha">{!! trans('bonfim.ficha_tecnica') !!} {!! $projeto_ficha->ficha_tecnica !!}</div>
  </div>
</div>




<div class="bonfim-height-60"></div>

<div class="bonfim-div-preto">
	
	<h2 class="bonfim-tit">{{ trans('bonfim.GALERIA') }}</h2>
	<div class="bonfim-height-40"></div>
	<!-- Swiper -->
	<div id="swiper-container-galeria" class="swiper-container">
		<div class="swiper-wrapper">
      @foreach($galeria_home as $galeria)
		  	<div class="swiper-slide" style="background-image:url('{{ $galeria->imagem }}');" onclick="openModalGaleria('{{ $galeria->imagem_fullscreen }}');"></div>
      @endforeach
		</div>
	</div>

	<!-- Add Pagination -->
	<div class="swiper-pagination" style="position:inherit;margin-top:20px;"></div>
</div>

<div class="bonfim-height-60"></div>

<div class="bonfim-div-preto">
	<div class="container">
		<h2 class="bonfim-tit">{{ trans('bonfim.ENTRE_EM_CONTACTO') }}</h2>
    <form id="contactForm" action="{{route('contactBonfimForm')}}" name="form" method="post">
      <input type="hidden" name="id_lote" value="">
  		<div class="bonfim-contacto">
  			<div class="row">
  				<div class="col-md-5 offset-md-1 col-lg-4 offset-lg-2 bonfim-padding-right">
            <div class="bonfim-contacto-width float-right">
              <label style="font-family: 'Segoeu';" class="tx-azul">{{ trans('bonfim.NOME') }}*</label>
              <input class="bonfim-ip" type="text" name="nome">
              <label style="font-family: 'Segoeu';" class="tx-azul">{{ trans('bonfim.EMAIL') }}*</label>
              <input class="bonfim-ip" type="email" name="email">
              <label style="font-family: 'Segoeu';" class="tx-azul">{{ trans('bonfim.TELEFONE') }}*</label>
              <input class="bonfim-ip" type="text" name="telefone" style="margin-bottom:0px;">
              <span style="font-family: 'Segoeu';" class="tx-azul float-right">{{ trans('bonfim.campos_obrigatorios') }}*</span>
            </div>
  					
  				</div>
  				<div class="col-md-5 col-lg-4 bonfim-padding-left">
  					<label style="font-family: 'Segoeu';" class="tx-azul">{{ trans('bonfim.DEIXE_MENSSAGEM') }}:</label>
  					<textarea name="mensagem" class="bonfim-contacto-width bonfim-textarea" placeholder="{!! trans('bonfim.contact_boa_tarde') !!}"></textarea>
  				</div>
  			</div>
  			<div class="bonfim-div-bt">
  				<button class="bonfim-bt">{{ trans('bonfim.ENVIAR') }}</button>
          <div id="labelAviso"></div>
  			</div>
  		</div>
    </form>
	</div>
</div>

<div class="bonfim-height-60"></div>

<div class="bonfim-div-newsletter-fd">
	<div class="container">
		<div class="bonfim-div-newsletter">
      <form id="newsletterForm" action="{{route('newsletterBonfimForm')}}" name="form" method="post">
  			<div class="row">
  				<div class=" col-sm-9 col-md-8 offset-md-1 col-lg-6 offset-lg-2  col-xl-5 offset-xl-3 bonfim-padding-right padding-left">
  					<label class="bonfim-div-newsletter-txt">{!! trans('bonfim.SUBSCREVER_txt') !!}</label><br>
  					
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

<div class="img-magnifier-glass-css" style="display:none;"></div>


<!-- Modal Projeto -->
<div id="modal_projeto" class="modal" style="z-index:500!important;">
  <span id="close_projeto" class="close" onclick="closeModalProjeto();"><i class="far fa-times-circle"></i></span>
  <div id="swiper1" class="swiper-container" style="height:100%;width:100%;">
    <div class="swiper-wrapper">
      
      @foreach($projetos as $projeto)

        <div class="swiper-slide"><div class="swiper-zoom-container" data-swiper-zoom="5"><img src="{!! $projeto->imagem !!}"></div></div>
      
    @endforeach
    </div>

  </div>
</div>





<!-- Modal GALERIA -->
<div id="modal_galeria">
  <span id="close_galeria" class="close" onclick="closeModalGaleria();"><i class="far fa-times-circle"></i></span>
  <div class="swiper-container swiper2" style="height:100%;width:100%;">
    <div class="swiper-wrapper"></div>
    <!-- Add Pagination 
    <div class="swiper-pagination swiper-pagination1"></div>-->
  </div>
</div>


<!--<div id="teste" class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <div class="swiper-zoom-container">
                <img src="/img/bonfim/timeline/inicio.svg">
            </div>
        </div>
        <div class="swiper-slide">
            <div class="swiper-zoom-container">
                <img src="/img/bonfim/timeline/visto_cinza.svg">
            </div>
        </div>
        <div class="swiper-slide" style="background-image:url('/img/bonfim/timeline/visto_verde.svg'); ;background-size:contain;background-repeat:no-repeat;">
       
            <div class="swiper-zoom-container">
              <img src="/img/bonfim/timeline/visto_verde.svg">
            </div>
        </div>
    </div>
</div>-->


@stop

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css">
@stop


@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.jquery.min.js"></script>

<script>


  
  @foreach($array_fases as $fase)
    $(function(){
      $("#fase_img_{!! $fase['id'] !!}").hover(
        function(){
          //Ao posicionar o cursor sobre a div
          $(this).css('transform', 'scale(1.4)');
          $(this).css('transition-duration', '0.5s');
          $('#fase_{!! $fase['id'] !!}').css('margin-left', '0px');
        },
        function(){
          //Ao remover o cursor da div
          $(this).css('transform', 'scale(1)');
          $(this).css('transition-duration', '0.5s');
          $('#fase_{!! $fase['id'] !!}').css('margin-left', '-5px');

        }
      );
    });
  @endforeach


  $(function(){
    $(".timeline_img_inicio").hover(
      function(){
        //Ao posicionar o cursor sobre a div
        $(this).css('transform', 'scale(1.2)');
        $(this).css('transition-duration', '0.5s');
      },
      function(){
        //Ao remover o cursor da div
        $(this).css('transform', 'scale(1)');
        $(this).css('transition-duration', '0.5s');
      }
    );
  });


  $(function(){
    $(".timeline_barra_verde").hover(
      function(){
        //Ao posicionar o cursor sobre a div
        $(this).css('transform', 'scale(1.20)');
        $(this).css('transition-duration', '0.5s');
      },
      function(){
        //Ao remover o cursor da div
        $(this).css('transform', 'scale(1)');
        $(this).css('transition-duration', '0.5s');
      }
    );
  });


  @foreach($array_fases as $fase)
    $(function(){
      $("#fase_{!! $fase['id'] !!}").hover(

        function(){

          var largura = $("#fase_{!! $fase['id'] !!}").width();
          console.log(largura);
          
          
            //Ao posicionar o cursor sobre a div
            $(this).css('transform', 'scale(1.10)');
            $(this).css('transition-duration', '0.5s');
            $(this).css('margin-right', '-3px');
            $(this).css('margin-left', '-1.5px');
         
          
        },
        function(){
          //Ao remover o cursor da div
          $(this).css('transform', 'scale(1)');
          $(this).css('transition-duration', '0.5s');
          $(this).css('margin-right', '-5px');
          $(this).css('margin-left', '-5px');
        }
      );
    });
  @endforeach

  


  


  $(function(){
    $("#timeline_uniao").hover(
      function(){
        //Ao posicionar o cursor sobre a div
        $(this).css('transform', 'scale(1.2)');
        $(this).css('transition-duration', '0.5s');
        $('#timeline_uniao_data').css('transform', 'scale(1.2)');
        $('#timeline_uniao_data').css('transition-duration', '0.5s');
        $('#timeline_uniao_data').css('margin-top', '-15px');
      },
      function(){
        //Ao remover o cursor da div
        $(this).css('transform', 'scale(1)');
        $(this).css('transition-duration', '0.5s');
        $('#timeline_uniao_data').css('transform', 'scale(1)');
        $('#timeline_uniao_data').css('transition-duration', '0.5s');
        $('#timeline_uniao_data').css('margin-top', '0px');
      }
    );
  });

  $(function(){
    $("#timeline_uniao_data").hover(
      function(){
        //Ao posicionar o cursor sobre a div
        $(this).css('transform', 'scale(1.2)');
        $(this).css('transition-duration', '0.5s');
        $(this).css('margin-top', '-15px');
        $('#timeline_uniao').css('transform', 'scale(1.2)');
        $('#timeline_uniao').css('transition-duration', '0.5s');
      },
      function(){
        //Ao remover o cursor da div
        $(this).css('transform', 'scale(1)');
        $(this).css('transition-duration', '0.5s');
        $(this).css('margin-top', '0px');
        $('#timeline_uniao').css('transform', 'scale(1)');
        $('#timeline_uniao').css('transition-duration', '0.5s');
      }
    );
  });






  var mySwiper = new Swiper('#teste', {
    zoom: {
      maxRatio: 5,
    },
  });


  $(function(){  
    $("#video_info").hover(
        function(){$('#video_info_video').css("filter", "blur(0px)")},
        function(){$('#video_info_video').css("filter", "blur(6px)")}
    );
});




  function openModalVideo(){
    $('#modal_video').show();
  }

  function closeModalVideo(){
    $('#modal_video').hide();
  }

  $('.bonfim-rodape-gaivota').mousedown(function (e) {
    if(e.button == 2) { // right click
      return false; // do nothing!
    }
  });

  $('.bonfim_container').mousedown(function (e) {
    if(e.button == 2) { // right click
      return false; // do nothing!
    }
  });

  $('#swiper-container-galeria').mousedown(function (e) {
    if(e.button == 2) { // right click
      return false; // do nothing!
    }
  });

  $('.modal-content').mousedown(function (e) {
    if(e.button == 2) { // right click
      return false; // do nothing!
    }
  });

  /*$('.swiper1').mousedown(function (e) {
    if(e.button == 2) { // right click
      return false; // do nothing!
    }
  });*/

  $('.swiper2').mousedown(function (e) {
    if(e.button == 2) { // right click
      return false; // do nothing!
    }
  });
</script>

<script>

$('#contactForm').on('submit',function(e) {
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
          $('#labelAviso').css('color','red');
          $('#labelAviso').css('margin-top','10px');
          $('#labelAviso').html(resposta);
        }
        return;
    }

    if(resp.estado=='sucesso'){
      $('#labelAviso').css('color','green');
      $('#labelAviso').css('margin-top','10px');
      $('#labelAviso').html(resp.mensagem);

      document.getElementById("contactForm").reset();
    }

 });


});

</script>

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

<script type="text/javascript">

  var swiper_projeto = new Swiper('#swiper-container-projeto', {
    centeredSlides: true,
    spaceBetween: 30,
    slidesPerView: 'auto',
    loop: true,
    loopAdditionalSlides: 100,
    slideToClickedSlide: false,
    grabCursor: false,
    shortSwipes: false,
    longSwipes: false,
    allowTouchMove: false,
    touchMoveStopPropagation: false,
  });

  
  $('#swiper-container-projeto .swiper-slide-active .depois').append('<div id="next_html" onclick="clickNext();" class="swiper-button-next" style="top:64px;"></div>');
  $('#swiper-container-projeto .swiper-slide-active').append('<div id="prev_html" onclick="clickPrev();" class="antes"><div class="swiper-button-prev" style="top:60px;"></div></div>');

  $('#swiper-container-projeto .swiper-slide-active .depois').css('display','block');
  
  function clickNext(){
    $('.depois').css('display','none');
    swiper_projeto.slideNext();
    $('#next_html').remove();
    $('#prev_html').remove();
    $('#swiper-container-projeto .swiper-slide-active .depois').append('<div id="next_html" onclick="clickNext();" class="swiper-button-next" style="top:64px;"></div>');
    $('#swiper-container-projeto .swiper-slide-active').append('<div id="prev_html" onclick="clickPrev();" class="antes"><div class="swiper-button-prev" style="top:60px;"></div></div>');

    $('#swiper-container-projeto .swiper-slide-active .depois').css('display','block');
  }


  function clickPrev(){
    $('.depois').css('display','none');
    swiper_projeto.slidePrev();
    $('#prev_html').remove();
    $('#next_html').remove();
    $('#swiper-container-projeto .swiper-slide-active .depois').append('<div id="next_html" onclick="clickNext();" class="swiper-button-next" style="top:64px;"></div>');
    $('#swiper-container-projeto .swiper-slide-active').append('<div id="prev_html" onclick="clickPrev();" class="antes"><div class="swiper-button-prev" style="top:60px;"></div></div>');
    $('#swiper-container-projeto .swiper-slide-active .depois').css('display','block');
  }


var mySwiper = new Swiper ('#bonfim_container', {
	slidesPerView: 3,
  	spaceBetween: 30,
  	loop: true,
    autoplay: 5000,
  	grabCursor: true,
  	breakpoints: {
      1024: {
          slidesPerView: 3,
          spaceBetween: 25,
      },
      992: {
          slidesPerView: 2,
          spaceBetween: 25,
      },
      768: {
          slidesPerView: 1,
          spaceBetween: 25,
      },
      640: {
          slidesPerView: 1,
          spaceBetween: 20,
      },
      320: {
          slidesPerView: 1,
          spaceBetween: 20,
      }
  	},
 
  	// Navigation arrows
  	nextButton: '.swiper-button-next',
  	prevButton: '.swiper-button-prev',

});

</script>

<script>
    var swiper_g = new Swiper('#swiper-container-galeria', {
      slidesPerView: 3,
      spaceBetween: 30,
      loop: true,
      autoplay: 5000,
      pagination:'.swiper-pagination',
      paginationClickable: true,

      breakpoints: {
      	1024: {
          slidesPerView: 3,
        },
      	992: {
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

<script>
  var swiper = new Swiper('#swiper-container-noticia', {
    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    pagination:'.swiper-pagination',
    paginationClickable: true,
  });
</script>

<script>
  var swiper1 = new Swiper('#swiper1', {
  
    zoom: {
      maxRatio: 5,
      zoomToggle:0,
    },
    paginationClickable: true,

  });

   $('#modal_projeto').on('shown.bs.modal', function(e) {
     swiper1.update();
    var $invoker = $(e.relatedTarget);
      swiper1.slideTo($invoker.data('slider'));
      swiper1.update();
    });

  document.addEventListener("keydown", function(e){
    if(e.keyCode == 37) {
      swiper1.slidePrev(); 
      //Left arrow pressed
    }
    if(e.keyCode == 39) {
      swiper1.slideNext();
      //Right arrow pressed
    }   
  });

</script>

<script>
  // MODAL PROJETO

  function openModalProjeto(id,imagem){
    
    $('#modal_projeto').css('display','block');

    //$('#site').css('position','fixed');

    /*swiper1.removeAllSlides();

    

    //swiper1.prependSlide('<div class="swiper-slide" style="background-image:url(\''+imagem+'\');background-size:contain;background-repeat:no-repeat;"></div>');

    swiper1.prependSlide('<div class="swiper-slide"><div class="swiper-zoom-container" data-swiper-zoom="5"><img src=\''+imagem+'\'></div></div>');

    @ foreach($projetos as $projeto)
      $var_image = '{ !! $projeto->imagem !!}';
      if($var_image != imagem){
        //swiper1.appendSlide('<div class="swiper-slide" style="background-image:url(\''+$var_image+'\');background-size:contain;background-repeat:no-repeat;"></div>');

        swiper1.appendSlide('<div class="swiper-slide"><div class="swiper-zoom-container" data-swiper-zoom="5"><img src=\''+$var_image+'\'></div></div>');
      }
    @ endforeach*/
  }
  
  function closeModalProjeto(){
    var span = document.getElementById("close_projeto");
    var modal = document.getElementById("modal_projeto");
    modal.style.display = "none";
    $('body').removeClass('modal-open');
    $('body').css('padding-right','0px');


        /*$('.swiper-zoom-container').css("transition-duration", "");
    $('.swiper-zoom-container').css("transform", "");

    $('.swiper-zoom-container img').css("transition-duration", "");
    $('.swiper-zoom-container img').css("transform", "");*/
    //$('#site').css('position','relative');
  }
  
</script>


<script>
  var swiper2 = new Swiper('.swiper2', {
  
    /*observer: true,
    observeParents: true,*/
    loop: true,
    //zoom:true,
    paginationClickable: true,

  });
  // MODAL GALERIA
  function openModalGaleria(imagem){
    
    $('#modal_galeria').css('display','block');

    //$('#site').css('position','fixed');

    swiper_g.stopAutoplay();
    swiper2.removeAllSlides();
    swiper2.prependSlide('<div class="swiper-slide" style="background-image:url(\''+imagem+'\');background-size:contain;background-repeat:no-repeat;"></div>');

    @foreach($galeria_home as $galeria)
      $var_image = '{!! $galeria->imagem_fullscreen !!}';
      if($var_image != imagem){
        swiper2.appendSlide('<div class="swiper-slide" style="background-image:url(\''+$var_image+'\');background-size:contain;background-repeat:no-repeat;"></div>');
      }
    @endforeach
  }


  document.addEventListener("keydown", function(e){
    if(e.keyCode == 37) {
        swiper2.slidePrev(); 
        //Left arrow pressed
    }
    if(e.keyCode == 39) {
        swiper2.slideNext();
        //Right arrow pressed
    }   
  });


  
  function closeModalGaleria(){
    var span = document.getElementById("close_galeria");
    var modal = document.getElementById("modal_galeria");
    modal.style.display = "none";
    swiper_g.startAutoplay();

    //$('#site').css('position','relative');
  }
  
</script>

<script>
function magnify(imgID, zoom) {
  var img, glass, w, h, bw;
  img = document.getElementById(imgID);
  /*create magnifier glass:*/
  glass = document.createElement("DIV");
  glass.setAttribute("class", "img-magnifier-glass");
 
  /*insert magnifier glass:*/
  img.parentElement.insertBefore(glass, img);
  /*set background properties for the magnifier glass:*/
  glass.style.backgroundImage = "url('" + img.src + "')";
  glass.style.backgroundRepeat = "no-repeat";
  glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
  bw = 3;
  w = glass.offsetWidth / 2;
  h = glass.offsetHeight / 2;
  /*execute a function when someone moves the magnifier glass over the image:*/
  glass.addEventListener("mousemove", moveMagnifier);
  img.addEventListener("mousemove", moveMagnifier);
  /*and also for touch screens:*/
  glass.addEventListener("touchmove", moveMagnifier);
  img.addEventListener("touchmove", moveMagnifier);

  function moveMagnifier(e) {
    var pos, x, y;
    /*prevent any other actions that may occur when moving over the image*/
    e.preventDefault();
    /*get the cursor's x and y positions:*/
    pos = getCursorPos(e);
    x = pos.x;
    y = pos.y;
    /*prevent the magnifier glass from being positioned outside the image:*/
    if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
    if (x < w / zoom) {x = w / zoom;}
    if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
    if (y < h / zoom) {y = h / zoom;}
    /*set the position of the magnifier glass:*/
    glass.style.left = (x - w) + "px";
    glass.style.top = (y - h) + "px";
    /*display what the magnifier glass "sees":*/
    glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
    
  }
  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /*get the x and y positions of the image:*/
    a = img.getBoundingClientRect();
    /*calculate the cursor's x and y coordinates, relative to the image:*/
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /*consider any page scrolling:*/
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }

  if('{{ $lingua }}' == 'pt') {
    $('.img-magnifier-glass').prepend('<img width="145" src="/img/site/Lupa_texto.png">');
  }else if('{{ $lingua }}' == 'en'){
    $('.img-magnifier-glass').prepend('<img width="145" src="/img/site/Lupa_texto_en.png">');
  }
  
  
}




</script>

<script>
/* Initiate Magnify Function
with the id of the image, and the strength of the magnifier glass:*/
magnify("myimage", 1.5);


$(".img-magnifier-container").mouseover(function() {
  $( ".img-magnifier-glass" ).css('display','block');
});

$(".img-magnifier-container").mouseout(function() {
  $top = $('.img-magnifier-glass-css').css('top');
  $position = $('.img-magnifier-glass-css').css('background-position');
  console.log($top);
  $( ".img-magnifier-glass" ).css('top',$top);
  $( ".img-magnifier-glass" ).css('background-position',$position);
});
</script>
@stop