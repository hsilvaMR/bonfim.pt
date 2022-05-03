

<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('backoffice/emails/includes/header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<!-- ICON -->
	<table style="padding-top:50px;" border="0" cellpadding="0" width="100%">
	   <tr>
		  <td align="center" width="100%">
		    <img src="<?php echo e(asset('backoffice/img/emails/restore.png')); ?>" alt="Restore" height="90">
		  </td>
		</tr>
	</table>
	<!-- TEXTO -->
	<table style="padding-top:40px;" border="0" cellpadding="0" width="100%">
	   <tr>
		    <td align="center" width="100%" style="color:#58595b;font-size:14px;line-height:20px;">
		        <?php echo trans('backoffice.restoreTx'); ?>

			</td>
		</tr>
	</table>
	<!-- BOTAO -->
	<table style="padding-top:40px;" border="0" cellpadding="0" width="100%">
	   <tr>
		  	<td align="center" width="100%">
			    <table style="font-size:14px;padding:8px 13px;color:#ffffff;background-color:#0084B6;">
					<tr><td><a href="<?php echo e(route('emailRestorePageB',['token' => $token])); ?>" target="_blank" style="color:#ffffff;text-decoration:none;background:#0084B6;"><?php echo trans('backoffice.restoreBt'); ?></a></td></tr>
				</table>
			</td>
		</tr>
	</table>
	<!-- DOESN'T WORK -->
	<table style="padding-top:40px;" border="0" cellpadding="0" width="100%">
	   <tr>
		  	<td align="center" width="100%" style="color:#58595b;font-size:11px;line-height:15px;">
		    	<?php echo trans('backoffice.doesntWorkTx'); ?> <a href="<?php echo e(route('emailRestorePageB',['token' => $token])); ?>" style="text-decoration:none;color:#2fb385;" target="_blank"><?php echo e(route('emailRestorePageB',['token' => $token])); ?></a>
			</td>
		</tr>
	</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backoffice/emails/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>