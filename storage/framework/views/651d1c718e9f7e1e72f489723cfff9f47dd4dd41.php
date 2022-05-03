

<?php $__env->startSection('content'); ?>
	<div class="bonfim-preto" style="text-align:center;padding-top:75px;">
		<div class="container">
			<div class="row">
				<div class="col-md-10 offset-md-1">
					<div>
						<h1 class="noticia-tit"> <?php echo $noticia->titulo; ?></h1>
						<label class="bonfim-noticias-tit-data"> <?php echo $noticia->data_noticia; ?> </label>
					</div>

					<div class="bonfim-noticias-txt">
						<?php echo $noticia->primeiro_texto; ?>

					</div>

					<img class="bonfim-noticias-img" src="<?php echo e($noticia->imagem); ?>">

					<div class="bonfim-noticias-txt">
						<?php if($noticia->segundo_texto != '' ): ?> <label class="margin-bottom40"><?php echo $noticia->segundo_texto; ?> <p style="margin:10px 0px;"><a style="font-family: 'SegoeuLightItalic';" class="tx-branco text-decoration-line" href="<?php echo e($noticia->link); ?>" target="_blank"><?php echo trans('bonfim.See_original_news'); ?></a></p> </label><?php else: ?> <p style="margin-bottom:10px;"><a style="font-family: 'SegoeuLightItalic';" class="tx-branco text-decoration-line" href="<?php echo e($noticia->link); ?>" target="_blank"><?php echo trans('bonfim.See_original_news'); ?></a></p> <?php endif; ?>
						
						<div class="bonfim-noticias-txt-data"> <?php echo $noticia->data_noticia; ?> </div>
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
						 
						<div class="swiper-button-next"><span><?php echo e(trans('bonfim.Seguinte')); ?></span></div>
						<div class="swiper-button-prev"><span><?php echo e(trans('bonfim.Anterior')); ?></span></div>

						<div class="swiper-container">
						    <div class="swiper-wrapper">
						 		<?php $__currentLoopData = $noticia_slide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noticia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						 		<? 
						 		if(strlen($noticia->titulo) > 50){
						 			$css = 'bonfim-noticias-slide-tit-grande';
						 		}
						 		else{
						 			$css = 'bonfim-noticias-slide-tit';
						 		} 
						 		?>
					 				<div id="slide_noticias" class="swiper-slide">
					 					<a href="<?php echo e(route('bonfimNoticiaPage',$noticia->id_noticia)); ?>">
								      		<div class="bonfim-noticias-position">
								      			<p class="<?php echo e($css); ?>"><?php echo $noticia->titulo; ?></p>
								      			<p class="bonfim-noticias-slide-txt"><?php echo $noticia->texto; ?></p>

								      			<label class="bonfim-noticias-slide-data"> <?php echo $noticia->data_noticia; ?></label>
								      		</div>
							      		</a>
							      	</div>
							    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
		      <form id="newsletterForm" action="<?php echo e(route('newsletterBonfimForm')); ?>" name="form" method="post">
		  			<div class="row">
		  				<div class=" col-sm-9 col-md-8 offset-md-1 col-lg-6 offset-lg-2  col-xl-5 offset-xl-3 bonfim-padding-right padding-left">
		  				<label style="font-family: 'Segoeu';" class="bonfim-div-newsletter-txt"><?php echo trans('bonfim.SUBSCREVER_txt'); ?></label><br>
		  					
		            <div class="bonfim-div-newsletter-ip">
		              <label style="font-family: 'Segoeu';" class="tx-azul"><?php echo e(trans('bonfim.EMAIL')); ?></label><br>
		              <input class="bonfim-ip" type="email" name="email">
		            </div>

		            <button class="bonfim-div-newsletter-bt"><?php echo e(trans('bonfim.SUBSCREVER')); ?></button>
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
		<div class="bonfim-rodape-gaivota"><?php echo trans('site.Gaivota'); ?></div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>
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
	   headers:{ 'X-CSRF-Token':'<?php echo csrf_token(); ?>' }
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site/layouts/default-bonfim', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>