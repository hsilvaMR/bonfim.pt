

<?php $__env->startSection('content'); ?>
  <?php $arrayCrumbs = [ trans('backoffice.Newsletter') => route('newsletterEmailsPageB'), $nome->identificacao => route('newsletterViewPageB',[$nome->id, $news->lingua]) ]; ?>
  <?php echo $__env->make('backoffice/includes/crumbs', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div class="page-titulo">
    <?php echo e($nome->identificacao); ?>

  </div>

  <a href="<?php echo e(route('newsletterEditPageB',$news->id)); ?>" class="abt bt-verde modulo-botoes"><i class="fas fa-pencil-alt"></i> Editar Newsletter</a>

  <div class="height-40"></div>

  <?php $__currentLoopData = $news_file; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <label class="lb margin-right10"><a href="<?php echo e($file->ficheiro); ?>" download><i class="fas fa-download"></i> Ficheiro_<?php echo e($file->id); ?></a></label> 
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
  <div class="height-10"></div>

  <label class="lb">Assunto:</label> <label class="lb-solid"><?php echo e($news->assunto); ?></label> 
  <label class="lb">Mensagem:</label> 
  <div class="lb-solid" style="background:rgba(68, 151, 166, 0.5);">

    <div style="background-image:url(/img/email/header.png);background-repeat:no-repeat;background-size:100% 100%;height:250px;"></div>

    <div style="font-family:Open Sans;font-style:normal;font-weight:normal;font-size:15px;line-height:24px;text-align:center;background-color:#fff;padding:60px 55px;color:#000;">
      <?php echo e($news->corpo); ?>

    </div>
    <div style="background-color:#ffffff;text-align: center;padding-bottom:50px;">
      <a href="http://255dobonfim.pt" target="_blank"><button class="bt" style="background: rgba(68, 151, 166, 0.5);font-family: Open Sans;font-weight:300;"><?php if($lang == 'pt'): ?> VISITAR <?php else: ?> VISIT <?php endif; ?> </button></a>
    </div>

    <div style="background-color:#ffffff;text-align: center;padding-bottom:30px;font-size:12px;line-height:16px;font-weight:300;">
      <label><?php if($lang == 'pt'): ?>Se o botão não funcionar copie e cole o seguinte <?php else: ?> If the button does not work copy and paste the following <?php endif; ?><br> <?php if($lang == 'pt'): ?>link no seu navegador de internet: <?php else: ?> link into your web browser: <?php endif; ?><br><a style="text-decoration:none;color:rgba(68, 151, 166, 0.5);" href="http://255dobonfim.pt">http://255dobonfim.pt</a></label> 
    </div>
    
    <div style="background-color:#ffffff;text-align: center;padding-bottom:50px;font-size:12px;line-height:16px;font-weight:300;">
      <label><?php if($lang == 'pt'): ?> Para ter a certeza que recebe sempre os nossos e-mails <?php else: ?> To make sure you always receive our e-mails,<?php endif; ?> <br> <?php if($lang == 'pt'): ?>e notificações, adicione o nosso e-mail aos seus contactos: <?php else: ?> please add our e-mail address to your contacts:<?php endif; ?> <br><a style="text-decoration:none;color:rgba(68, 151, 166, 0.5);" href="mailto:mail@255dobonfim.pt"> mail@255dobonfim.pt</a></label> 
    </div>

    <div style="background-color:#ffffff;text-align: center;padding-bottom:50px;line-height:25px;">
      <a style="color:rgba(68, 151, 166, 0.5);text-decoration:none;font-size:12px;line-height:14px;" href="http://255dobonfim.pt">www.255dobonfim.pt</a>
      <br>
      <a href="https://www.linkedin.com/showcase/255dobonfim" target="_blank"><img height="18" src="/img/email/linkedin_255.png"></a> 
    </div>
  </div> 


  <!-- Modal Save -->
  <div class="modal fade" id="myModalSave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <input type="hidden" name="id_modal" id="id_modal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header"><h4 class="modal-title" id="myModalLabel"><?php echo e(trans('backoffice.Saved')); ?></h4></div>
        <div class="modal-body"><?php echo trans('backoffice.savedSuccessfully'); ?></div>
        <div class="modal-footer">
          <a href="<?php echo e(route('newsletterPageB')); ?>" class="abt bt-cinza"><i class="fas fa-arrow-left"></i> <?php echo e(trans('backoffice.Back')); ?></a>&nbsp;
          <a href="javascript:;" class="abt bt-verde" data-dismiss="modal"><i class="fas fa-check"></i> <?php echo e(trans('backoffice.Ok')); ?></a>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
  
<script type="text/javascript">

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backoffice/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>