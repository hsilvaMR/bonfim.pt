

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('site/emails/includes/header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<table style="padding-top:20px;" border="0" cellpadding="0" width="100%">
   <tr>
	    <td   width="100%" style="color:#58595b;font-size:14px;line-height:20px;text-align: justify;">
	    	<?php if(isset($dados['id_lote'])): ?> Este cliente pretende saber mais informações do apartamento fração <?php echo e($dados['id_lote']); ?> <?php endif; ?>
	    	<br><br>
	        <?php echo trans('emails.Nome'); ?>: <?php echo e($dados['nome']); ?>

	        <br><?php echo trans('emails.Telefone'); ?>: <?php echo e($dados['telefone']); ?>

		    <br><?php echo trans('emails.Email'); ?>: <?php echo e($dados['email']); ?>

		    <br><br><?php echo trans('emails.Mensagem'); ?>: <?php echo e($dados['mensagem']); ?>	  
		</td>
	</tr>
</table>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site/emails/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>