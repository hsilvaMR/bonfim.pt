<div style="position:relative;">
	<span style="position:absolute;bottom:0;right:0;padding:0px 15px 15px 0px;color:#fff;font-size:16px;">
		<a style="text-decoration:none;color:#fff;" href="<?php echo e(route('setLanguage',['lang' => 'en'])); ?>">EN&nbsp;|&nbsp;</a>
		<a style="text-decoration:none;color:#fff;" href="<?php echo e(route('setLanguage',['lang' => 'pt'])); ?>">PT</a>
	</span>
	<div class="header-bonfim-content">
		<div class="container">
			<a href="<?php echo e(route('bonfimInfoPage')); ?>"><img class="header-bonfim-img-255" src="/img/site/logo_bonfim.svg"></a>
			<a href="https://www.gaivota.pt/"><img class="header-bonfim-img-gaivota" src="/img/site/logo.svg"></a>
		</div>

		<div class="header-bonfim-desc">
			<div class="header-bonfim-desc-txt">
				<div><label class="header-bonfim-desc-tit"><?php echo e(trans('bonfim.APARTAMENTOS')); ?></label></div>
				<label class="header-bonfim-desc-texto"><?php echo e(trans('bonfim.APARTAMENTOS_CENTER')); ?></label>

			</div>

		</div>
	</div>
	
	<img class="header-bonfim-img-fd" src='/img/bonfim/top_header_imagem.png'>

</div>
