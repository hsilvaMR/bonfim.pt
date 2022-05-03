

<?php $__env->startSection('content'); ?>

<div id="site" style="position: relative;z-index: 1;">
	<div id="apartamento_xs" class="bonfim-preto">

		<div style="padding:10px 15px;">
			<div style="width:70%;float:left;">
				<div style="text-align:center;align-items:center;display:flex;flex-direction:row;flex-wrap:wrap;justify-content:center;float:right;">
					<a href="<?php echo e(route('bonfimApartamentosPage',$apartamento_prev)); ?>"><div style="background:url(/img/site/setas-A.svg) !important;background-size:cover !important;height:14px !important;width:8px !important;float:left;margin-right:20px;"></div></a>
					<div class="bonfim-apartamento-img-planta" style="background-image:url('<?php echo e($apartamento->imagem_planta_2); ?>');background-size:100% 100%;background-repeat:no-repeat;"></div>
					<a href="<?php echo e(route('bonfimApartamentosPage',$apartamento_next)); ?>"><div style="background:url(/img/site/setas-B.svg) !important;background-size:cover !important;height:14px !important;width:8px !important;float:right;margin-left:20px;"></div></a>
				</div>
			</div>

			<div class="text-right" style="line-height:18px;">
				<span class="bonfim-apartamento-tipo-tit"><?php echo $apartamento->fracao; ?></span><br>
				<span class="bonfim-apartamento-tipo-txt">T1 DUPLEX</span>	
			</div>
		</div>
		
		<div id="ola_xs" class="swiper-container">
	        <div class="swiper-wrapper">
	        	<?php $__currentLoopData = $apartamento_galeria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galeria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	            	<div class="swiper-slide" style="background-image:url('<?php echo e($galeria->img); ?>');background-size:100% 100%;background-repeat:no-repeat;cursor:pointer;" onclick="openModal(<?php echo e($galeria->id); ?>,'<?php echo e($galeria->img); ?>');"></div>
  				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	        </div>
	        <!-- Add Pagination -->
	        <div class="swiper-pagination" style="right: 0px !important;"></div>
	    </div>

	    <div class="container">
	    	<div class="row">
		    	<div class="col-4">
		    		<div style="position: relative;top: 50%;transform: translateY(-50%);"><img height="80" src="<?php echo e($apartamento->imagem_planta); ?>"></div>
		    	</div>

		    	<div class="col-4" style="padding-right:0px !important;">
		    		<div style="padding:20px 0px 0px 18px;">
		    			<div class="bonfim-apartamento-tipo-desc">
							<p class="bonfim-apartamento-tipo-desc-tit"><?php echo trans('site.fracao'); ?></p>
							<label class="bonfim-apartamento-tipo-txt"><?php echo $apartamento->fracao; ?></label>
						</div>
						<div class="bonfim-apartamento-tipo-desc">
							<p class="bonfim-apartamento-tipo-desc-tit"><?php echo trans('site.piso'); ?></p>
							<label class="bonfim-apartamento-tipo-txt"><?php echo $apartamento->piso; ?></label>
						</div>
						<div class="bonfim-apartamento-tipo-desc">
							<p class="bonfim-apartamento-tipo-desc-tit">WC</p>
							<label class="bonfim-apartamento-tipo-txt"><?php echo $apartamento->wc; ?></label>
						</div>
						<?php $new_arrumos = str_replace("m2",'m<sup>2</sup>',$apartamento->arrumos);?>
						<div class="bonfim-apartamento-tipo-desc">
							<p class="bonfim-apartamento-tipo-desc-tit"><?php echo trans('site.arrumos'); ?></p>
							<label class="bonfim-apartamento-tipo-txt"><?php echo $new_arrumos; ?></label>
						</div>
						
						<div class="bonfim-apartamento-tipo-desc">
							<!--<p class="bonfim-apartamento-tipo-desc-tit">VALOR</p>-->
							<div id="valor" style="border: 1px solid #C4C4C4;line-height:19px;text-align:center;">
								<span style="text-transform: none !important;" class="bonfim-apartamento-tipo-desc-tit cursor-pointer"> <?php if($apartamento->valor == 'sob consulta'): ?><?php echo trans('site.valorConsulta'); ?> <?php else: ?><?php echo $apartamento->valor; ?><?php endif; ?></span>
							</div>
							

						</div>
		    		</div>
		    	</div>
		    	<div class="col-4">
		    		<div style="padding:20px 0px 0px 18px;">
		    			<?php 
		              		$new_bruta = str_replace("m2",'m<sup>2</sup>',$apartamento->area_bruta);
		              		$new_util = str_replace("m2",'m<sup>2</sup>',$apartamento->area_util);
		              	?>
						<div class="bonfim-apartamento-tipo-desc">
							<p class="bonfim-apartamento-tipo-desc-tit"><?php echo trans('site.areaBruta'); ?></p>
							<label class="bonfim-apartamento-tipo-txt"><?php echo $new_bruta; ?></label>
						</div>

						<div class="bonfim-apartamento-tipo-desc">
							<p class="bonfim-apartamento-tipo-desc-tit"><?php echo trans('site.areaUtil'); ?></p>
							<label class="bonfim-apartamento-tipo-txt"><?php echo $new_util; ?></label>
						</div>
						<?php $new_varandas = str_replace("m2",'m<sup>2</sup>',$apartamento->varandas);?>
						<div class="bonfim-apartamento-tipo-desc">
							<p class="bonfim-apartamento-tipo-desc-tit"><?php echo trans('site.varandas'); ?></p>
							<label class="bonfim-apartamento-tipo-txt"><?php echo $new_varandas; ?></label>
						</div>
						
						<div class="bonfim-apartamento-tipo-desc">
							<p class="bonfim-apartamento-tipo-desc-tit"><?php echo trans('site.roupeiros'); ?></p>
							<label class="bonfim-apartamento-tipo-txt"><?php echo $apartamento->roupeiros; ?></label>
						</div>
						<div class="bonfim-apartamento-tipo-desc">
							<p class="bonfim-apartamento-tipo-desc-tit"><?php echo trans('site.disponibilidade'); ?></p>
							
							<label class="bonfim-apartamento-tipo-txt">
								<?php if($apartamento->disponibilidade == 'disponivel'): ?><?php echo trans('site.disponivel'); ?>

								<?php elseif($apartamento->disponibilidade == 'reservado'): ?> <?php echo trans('site.reservado'); ?>

								<?php else: ?> <?php echo trans('site.vendido'); ?> <?php endif; ?> 
							</label>
							
						</div>
		    		</div>
		    	</div>
		    	
		    </div>
	    </div>
	    

	</div>
	
	<div id="apartamento_xl" class="bonfim-div-preto" style="padding:40px 0px 30px 0px;">
		<div class="container-fluid">

			<div class="row">
				<div class="col-md-5">
					<div class="bonfim-apartamento">
						

						<div class="bonfim-apartamento-right">
							<div class="bonfim-apartamento-tipo">
								<label class="bonfim-apartamento-tipo-tit"><?php echo $apartamento->fracao; ?></label><br>
								<label class="bonfim-apartamento-tipo-txt">T1 DUPLEX</label>
							</div>
							<?php 
			              		$new_bruta = str_replace("m2",'m<sup>2</sup>',$apartamento->area_bruta);
			              		$new_util = str_replace("m2",'m<sup>2</sup>',$apartamento->area_util);
			              	?>
							<div class="bonfim-apartamento-tipo-desc">
								<p class="bonfim-apartamento-tipo-desc-tit"><?php echo trans('site.areaBruta'); ?></p>
								<label class="bonfim-apartamento-tipo-txt"><?php echo $new_bruta; ?></label>
							</div>

							<div class="bonfim-apartamento-tipo-desc">
								<p class="bonfim-apartamento-tipo-desc-tit"><?php echo trans('site.areaUtil'); ?></p>
								<label class="bonfim-apartamento-tipo-txt"><?php echo $new_util; ?></label>
							</div>
							<?php $new_varandas = str_replace("m2",'m<sup>2</sup>',$apartamento->varandas);?>
							<div class="bonfim-apartamento-tipo-desc">
								<p class="bonfim-apartamento-tipo-desc-tit"><?php echo trans('site.varandas'); ?></p>
								<label class="bonfim-apartamento-tipo-txt"><?php echo $new_varandas; ?></label>
							</div>
							
							<div class="bonfim-apartamento-tipo-desc">
								<p class="bonfim-apartamento-tipo-desc-tit"><?php echo trans('site.roupeiros'); ?></p>
								<label class="bonfim-apartamento-tipo-txt"><?php echo $apartamento->roupeiros; ?></label>
							</div>
							<div class="bonfim-apartamento-tipo-desc">
								<p class="bonfim-apartamento-tipo-desc-tit"><?php echo trans('site.disponibilidade'); ?></p>
								
								<label class="bonfim-apartamento-tipo-txt">
									<?php if($apartamento->disponibilidade == 'disponivel'): ?><?php echo trans('site.disponivel'); ?>

									<?php elseif($apartamento->disponibilidade == 'reservado'): ?> <?php echo trans('site.reservado'); ?>

									<?php else: ?> <?php echo trans('site.vendido'); ?> <?php endif; ?> 
								</label>
								
							</div>

							<div class="bonfim-apartamento-planta" style="background-image:url('<?php echo e($apartamento->imagem_planta); ?>');background-size:100% 100%;background-repeat:no-repeat;"></div>
							<!--<img class="bonfim-apartamento-planta" src="{ !! $apartamento->imagem_planta !!}">-->
						</div>

						<div class="bonfim-apartamento-left">
							<div class="bonfim-apartamento-tipo-desc">
								<p class="bonfim-apartamento-tipo-desc-tit"><?php echo trans('site.fracao'); ?></p>
								<label class="bonfim-apartamento-tipo-txt"><?php echo $apartamento->fracao; ?></label>
							</div>
							<div class="bonfim-apartamento-tipo-desc">
								<p class="bonfim-apartamento-tipo-desc-tit"><?php echo trans('site.piso'); ?></p>
								<label class="bonfim-apartamento-tipo-txt"><?php echo $apartamento->piso; ?></label>
							</div>
							<div class="bonfim-apartamento-tipo-desc">
								<p class="bonfim-apartamento-tipo-desc-tit">WC</p>
								<label class="bonfim-apartamento-tipo-txt"><?php echo $apartamento->wc; ?></label>
							</div>
							<?php $new_arrumos = str_replace("m2",'m<sup>2</sup>',$apartamento->arrumos);?>
							<div class="bonfim-apartamento-tipo-desc">
								<p class="bonfim-apartamento-tipo-desc-tit"><?php echo trans('site.arrumos'); ?></p>
								<label class="bonfim-apartamento-tipo-txt"><?php echo $new_arrumos; ?></label>
							</div>
							
							<div class="bonfim-apartamento-tipo-desc">
								<!--<p class="bonfim-apartamento-tipo-desc-tit">VALOR</p>-->
								<div id="valor" style="border: 1px solid #C4C4C4;line-height:18px;text-align:center;font-size:18px;padding:7px;">
									<span style="text-transform: none !important;" class="bonfim-apartamento-tipo-desc-tit cursor-pointer"> <?php if($apartamento->valor == 'sob consulta'): ?><?php echo trans('site.valorConsulta'); ?> <?php else: ?><?php echo $apartamento->valor; ?><?php endif; ?></span>
								</div>
								

							</div>
						</div>
					
					</div>
					
				</div>

				<div class="col-md-7" style="padding: 0 !important;">

					<div class="div-apartamento-absolute">
						<!-- Swiper -->
					    <div id="ola" class="swiper-container">
					        <div id="ola_swiper_wrapper" class="swiper-wrapper">
					        	<?php $__currentLoopData = $apartamento_galeria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galeria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					            	<div class="swiper-slide" style="background-image:url('<?php echo e($galeria->img); ?>');background-size:100% 100%;background-repeat:no-repeat;cursor:pointer;" onclick="openModal(<?php echo e($galeria->id); ?>,'<?php echo e($galeria->img); ?>');"></div>
			      				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					        </div>
					        <!-- Add Pagination -->
					        <div class="swiper-pagination" style="right: 0px !important;left:5px !important;"></div>
					    </div>

						<div style="text-align:center;margin:40px auto auto auto;align-items:center;display:flex;flex-direction:row;flex-wrap:wrap;justify-content:center;">
							<a href="<?php echo e(route('bonfimApartamentosPage',$apartamento_prev)); ?>"><div style="background:url(/img/site/setas-A.svg) !important;background-size:cover !important;height:25px !important;width:15px !important;float:left;margin-right:40px;"></div></a>
							<div class="bonfim-apartamento-img-planta" style="background-image:url('<?php echo e($apartamento->imagem_planta_2); ?>');background-size:100% 100%;background-repeat:no-repeat;"></div>
							<!--<img class="bonfim-apartamento-img-planta" src="{ !! $apartamento->imagem_planta_2 !!}">-->
							<a href="<?php echo e(route('bonfimApartamentosPage',$apartamento_next)); ?>"><div style="background:url(/img/site/setas-B.svg) !important;background-size:cover !important;height:25px !important;width:15px !important;float:right;margin-left:40px;"></div></a>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="bonfim-apartamento-acabamento-xl">
			<h2 style="font-family:'Segoeu';font-weight:400;color:#fff;font-size:18px;padding:50px 0px 30px 0px;text-transform:uppercase;"><?php echo trans('site.mapaAcabamentos'); ?>:</h2>
			<?php $float_left=''; $float_right = '';?>
			<?php $__currentLoopData = $acabamentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				
				<?php
					if($value->id_lote % 2 == 0){
						if($value->id % 2 == 0){
							$for_acaba = '';
							foreach($array_acabamento as $array){
								if($value->id == $array['id_acabamento']){
									$for_acaba.= '<div class="row"> 
													<div class="col-md-3" style="padding-right:0px !important;"><label class="bonfim-apartamento-acabamento-label">'.$array['tipo'].' :</label></div>
													<div class="col-md-9"><div style="margin-bottom:10px;font-family: \'SegoeuLight\';font-weight:300;font-size:12px;">'.nl2br($array['descricao']).'</div></div>
												</div>';
								}
							}

							if($for_acaba != ''){
								$float_right.='<div id="acabamento_'.$value->id.'" style="margin-bottom:30px;">
									<label id="click_acabamento_xl_'.$value->id.'" class="bonfim-apartamento-acabamento-zona" onclick="closeA('.$value->id.',\'xl\');">
										'.$value->divisao.' 
										<img id="open_icon_xl_'.$value->id.'" height="8" src="/img/bonfim/icon_seta_inferior.svg">
										<img id="close_icon_xl_'.$value->id.'" class="display-none" style="margin-top:-5px;" height="14" src="/img/bonfim/icon_seta_frente.svg">
									</label>
						
									<div id="acabamento_array_xl_'.$value->id.'" style="font-family: \'Segoeu\';font-weight:400;font-size:12px;color:#fff;">
										'.$for_acaba.'
									</div>
								</div>';
							}
						}else{
							$for_acaba_left = '';
							foreach($array_acabamento as $array){

								if($value->id == $array['id_acabamento']){
									$for_acaba_left.= '
										<div class="row"> 
											<div class="col-md-3" style="padding-right:0px !important;"><label class="bonfim-apartamento-acabamento-label">'.$array['tipo'].' :</label></div>
											<div class="col-md-9"><div style="margin-bottom:10px;font-family: \'SegoeuLight\';font-weight:300;font-size:12px;">'.nl2br($array['descricao']).'</div></div>
										</div>';
								}
							}

							if($for_acaba_left != ''){
								$float_left.= '<div id="acabamento_'.$value->id.'" style="margin-bottom:30px;">
									<label id="click_acabamento_xl_'.$value->id.'" class="bonfim-apartamento-acabamento-zona" onclick="closeA('.$value->id.',\'xl\');">
										'.$value->divisao.' 
										<img id="open_icon_xl_'.$value->id.'" height="8" src="/img/bonfim/icon_seta_inferior.svg">
										<img id="close_icon_xl_'.$value->id.'" class="display-none" style="margin-top:-5px;" height="14" src="/img/bonfim/icon_seta_frente.svg">
									</label>
									
									<div id="acabamento_array_xl_'.$value->id.'" style="font-family:\'Segoeu\';font-weight:400;font-size:12px;color:#fff;">
										'.$for_acaba_left.'
									</div>
								</div>';
							}
						}

					}else{
						if($value->id % 2 == 0){
							$for_acaba_left = '';
							foreach($array_acabamento as $array){

								if($value->id == $array['id_acabamento']){
									$for_acaba_left.= '
										<div class="row"> 
											<div class="col-md-3" style="padding-right:0px !important;"><label class="bonfim-apartamento-acabamento-label">'.$array['tipo'].' :</label></div>
											<div class="col-md-9"><div style="margin-bottom:10px;font-family: \'SegoeuLight\';font-weight:300;font-size:12px;">'.nl2br($array['descricao']).'</div></div>
										</div>';
								}
							}

							if($for_acaba_left != ''){
								$float_left.= '<div id="acabamento_'.$value->id.'" style="margin-bottom:30px;">
									<label id="click_acabamento_xl_'.$value->id.'" class="bonfim-apartamento-acabamento-zona" onclick="closeA('.$value->id.',\'xl\');">
										'.$value->divisao.' 
										<img id="open_icon_xl_'.$value->id.'" height="8" src="/img/bonfim/icon_seta_inferior.svg">
										<img id="close_icon_xl_'.$value->id.'" class="display-none" style="margin-top:-5px;" height="14" src="/img/bonfim/icon_seta_frente.svg">
									</label>
									
									<div id="acabamento_array_xl_'.$value->id.'" style="font-family:\'Segoeu\';font-weight:400;font-size:12px;color:#fff;">
										'.$for_acaba_left.'
									</div>
								</div>';
							}
						}else{
							$for_acaba = '';
							foreach($array_acabamento as $array){
								if($value->id == $array['id_acabamento']){
									$for_acaba.= '<div class="row"> 
													<div class="col-md-3" style="padding-right:0px !important;"><label class="bonfim-apartamento-acabamento-label">'.$array['tipo'].' :</label></div>
													<div class="col-md-9"><div style="margin-bottom:10px;font-family: \'SegoeuLight\';font-weight:300;font-size:12px;">'.nl2br($array['descricao']).'</div></div>
												</div>';
								}
							}

							if($for_acaba != ''){
								$float_right.='<div id="acabamento_'.$value->id.'" style="margin-bottom:30px;">
									<label id="click_acabamento_xl_'.$value->id.'" class="bonfim-apartamento-acabamento-zona" onclick="closeA('.$value->id.',\'xl\');">
										'.$value->divisao.' 
										<img id="open_icon_xl_'.$value->id.'" height="8" src="/img/bonfim/icon_seta_inferior.svg">
										<img id="close_icon_xl_'.$value->id.'" class="display-none" style="margin-top:-5px;" height="14" src="/img/bonfim/icon_seta_frente.svg">
									</label>
						
									<div id="acabamento_array_xl_'.$value->id.'" style="font-family: \'Segoeu\';font-weight:400;font-size:12px;color:#fff;">
										'.$for_acaba.'
									</div>
								</div>';
							}
						}
					}
					
				?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			<?php if(($float_left != '') && ($float_right != '')): ?>
				<div class="row">
					<div class="col-md-6"><?php echo $float_right; ?></div>
					<div class="col-md-6"><?php echo $float_left; ?></div>
				</div>
			<?php else: ?>
				<div class="row">
					<div class="col-md-12"><?php echo $float_right; ?> <?php echo $float_left; ?></div>
				</div>
			<?php endif; ?>
		</div>

		<div class="bonfim-apartamento-acabamento-xs">
			<?php $__currentLoopData = $acabamentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div id="acabamento_<?php echo e($value->id); ?>" style="margin-bottom:30px;">
					<label id="click_acabamento_mobile_<?php echo e($value->id); ?>" class="bonfim-apartamento-acabamento-zona" onclick="closeA(<?php echo e($value->id); ?>,'mobile');">
						<?php echo e($value->divisao); ?>

						<img id="open_icon_mobile_<?php echo e($value->id); ?>" height="8" src="/img/bonfim/icon_seta_inferior.svg">
						<img id="close_icon_mobile_<?php echo e($value->id); ?>" class="display-none" style="margin-top:-5px;" height="14" src="/img/bonfim/icon_seta_frente.svg">
					</label>
					
					<div id="acabamento_array_mobile_<?php echo e($value->id); ?>" style="font-family:'Segoeu';font-weight:400;font-size:12px;color:#fff;">
						<?php $__currentLoopData = $array_acabamento; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $array): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($value->id == $array['id_acabamento']): ?>
							<div style="margin-bottom:10px;font-family:'SegoeuLight';font-weight:300;font-size:12px;">
								<?php echo nl2br($array['descricao']); ?>

							</div>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>


	<div id="contacto" class="bonfim-div-preto">
		<div class="container">
			<h2 class="bonfim-tit"><?php echo e(trans('bonfim.ENTRE_EM_CONTACTO')); ?></h2>
		    <form id="contactForm" action="<?php echo e(route('contactBonfimForm')); ?>" name="form" method="post">
		      <input type="hidden" name="id_lote" value="<?php echo $apartamento->id; ?>">
		  		<div class="bonfim-contacto">
		  			<div class="row">
		  				<div class="col-md-5 offset-md-1 col-lg-4 offset-lg-2 bonfim-padding-right">
				            <div class="bonfim-contacto-width float-right">
				              <label style="font-family: 'Segoeu';" class="tx-azul"><?php echo e(trans('bonfim.NOME')); ?>*</label>
				              <input class="bonfim-ip" type="text" name="nome">
				              <label style="font-family: 'Segoeu';" class="tx-azul"><?php echo e(trans('bonfim.EMAIL')); ?>*</label>
				              <input class="bonfim-ip" type="email" name="email">
				              <label style="font-family: 'Segoeu';" class="tx-azul"><?php echo e(trans('bonfim.TELEFONE')); ?>*</label>
				              <input class="bonfim-ip" type="text" name="telefone" style="margin-bottom:0px;">
				              <span style="font-family: 'Segoeu';" class="tx-azul float-right"><?php echo e(trans('bonfim.campos_obrigatorios')); ?>*</span>
				            </div>
		  				</div>
		  				<div class="col-md-5 col-lg-4 bonfim-padding-left">
		  					<label style="font-family: 'Segoeu';" class="tx-azul"><?php echo e(trans('bonfim.DEIXE_MENSSAGEM')); ?>:</label>
		  					<textarea name="mensagem" class="bonfim-contacto-width bonfim-textarea"><?php echo trans('site.apartamentoInfo'); ?> <?php echo $apartamento->fracao; ?>.</textarea>
		  				</div>
		  			</div>
		  			<div class="bonfim-div-bt">
		  				<button class="bonfim-bt"><?php echo e(trans('bonfim.ENVIAR')); ?></button>
		          		<div id="labelAviso"></div>
		  			</div>
		  		</div>
		    </form>
		</div>
	</div>

	<div class="bonfim-rodape-mapa">
		<div class="bonfim-rodape-gaivota"><?php echo trans('site.Gaivota'); ?></div>
	</div>

</div>
	
<div id="modal" class="modal" style="display:none;">
	
	<span id="close" class="close" onclick="closeModal();"><i class="far fa-times-circle"></i></span>
	<div class="swiper-container swiper1" style="height:100%;width:100%;">
	    <div class="swiper-wrapper">

	    </div>
	    <!-- Add Pagination 
	    <div class="swiper-pagination swiper-pagination1"></div>-->
	</div>
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.jquery.min.js"></script>





<script>

	$("#valor").click(function() {
	    $('html,body').animate({ scrollTop: $("#contacto").offset().top},'slow');
	});

	$('#ola').mousedown(function (e) {
	  if(e.button == 2) { // right click
	    return false; // do nothing!
	  }
	});

	$('#ola_xs').mousedown(function (e) {
	  if(e.button == 2) { // right click
	    return false; // do nothing!
	  }
	});

	$('.swiper1').mousedown(function (e) {
	  if(e.button == 2) { // right click
	    return false; // do nothing!
	  }
	});

	$('.bonfim-apartamento-img-planta').mousedown(function (e) {
	  if(e.button == 2) { // right click
	    return false; // do nothing!
	  }
	});

	$('.bonfim-apartamento-planta').mousedown(function (e) {
	  if(e.button == 2) { // right click
	    return false; // do nothing!
	  }
	});


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
	   headers:{ 'X-CSRF-Token':'<?php echo csrf_token(); ?>' }
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
    var swiper_ola = new Swiper('#ola', {
    	//autoplay: 5000,
        //direction: 'vertical',
        slidesPerView: 1,
        spaceBetween: 30,
        mousewheel: true,
        pagination:'.swiper-pagination',
      	paginationClickable: true,
    });

    var swiper = new Swiper('#ola_xs', {
    	//autoplay: 5000,
        //direction: 'vertical',
        slidesPerView: 1,
        spaceBetween: 30,
        mousewheel: true,
        pagination:'.swiper-pagination',
      	paginationClickable: true,

    });
</script>

<script>
	function openA(id,tipo){
		$('#acabamento_array_'+tipo+'_'+id).show();
		$('#close_icon_'+tipo+'_'+id).hide();
		$('#open_icon_'+tipo+'_'+id).show();
		$('#click_acabamento_'+tipo+'_'+id).attr('onclick','closeA('+id+',\''+tipo+'\')');
	}

	function closeA(id,tipo){
		$('#acabamento_array_'+tipo+'_'+id).hide();
		$('#close_icon_'+tipo+'_'+id).show();
		$('#open_icon_'+tipo+'_'+id).hide();
		$('#click_acabamento_'+tipo+'_'+id).attr('onclick','openA('+id+',\''+tipo+'\')');
	}
</script>

<script>
	var swiper1 = new Swiper('.swiper1', {
	
  		/*observer: true,
		observeParents: true,*/
		loop:true,
	keyboard: { onlyInViewport: true },
		zoom:true,
		pagination: '.swiper-pagination1',
    	paginationClickable: true,

	});
</script>

<script>
  // Get the modal

  	function openModal(id,imagem){
    
  		$('#modal').css('display','block');

		$('#site').css('position','fixed');

		swiper1.removeAllSlides();

		swiper1.prependSlide('<div class="swiper-slide" style="background-image:url(\''+imagem+'\');background-size:contain;background-repeat:no-repeat;"></div>');

		<?php $__currentLoopData = $apartamento_galeria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galeria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			$var_image = '<?php echo $galeria->img; ?>';
			if($var_image != imagem){
				swiper1.appendSlide('<div class="swiper-slide" style="background-image:url(\''+$var_image+'\');background-size:contain;background-repeat:no-repeat;"></div>');
			}
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  	}

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
  
  	function closeModal(){
    	var span = document.getElementById("close");
    	var modal = document.getElementById("modal");
    	modal.style.display = "none";
    	$('#site').css('position','relative');
  	}
  
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('site/layouts/default-bonfim', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>