

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="login">
    <a href="<?php echo e(route('loginPageB')); ?>"><img class="login-logo" src="<?php echo e(asset('/backoffice/img/icons/logo.png')); ?>"></a>
    <form id="restorePasswordForm" method="POST" action="<?php echo e(route('restorePasswordFormB')); ?>">
      <?php echo e(csrf_field()); ?>

      <div id="forgot">
        <p class="text-center"><?php echo e(trans('backoffice.resetPassword')); ?> <a href="<?php echo e(route('loginPageB')); ?>" class="tx-verde"><?php echo e(trans('backoffice.youKnow')); ?></a></p>
        <label class="lb"><?php echo e(trans('backoffice.newPassword')); ?></label>
        <input class="ip" type="hidden" name="token" value="<?php echo e($token); ?>">
        <input class="ip" type="password" name="password" value="" placeholder="<?php echo e(trans('backoffice.newPassword')); ?>">
        <div class="height-20"></div>
        <button class="bt-100 bt-azul" type="submit"><i class="fas fa-check"></i> <?php echo e(trans('backoffice.Save')); ?></button>
        <div class="height-20"></div>
        <label id="labelSucesso" class="av-100 av-verde display-none"><span id="spanSucesso"><?php echo e(trans('backoffice.savedSuccessfully')); ?></span> <i class="fas fa-times" onclick="$(this).parent().hide();"></i></label>
          <label id="labelErros" class="av-100 av-vermelho display-none"><span id="spanErro"></span> <i class="fas fa-times" onclick="$(this).parent().hide();"></i></label>
      </div>
    </form>
    <div class="height-20"></div>
    <!--
    <p class="text-center">
      <a href="{ { route('setLanguageB',['lang'=>'en']) }}" class="display-inline">English</a>&emsp;
      <a href="{ { route('setLanguageB',['lang'=>'pt']) }}" class="display-inline">Português</a>
    </p>
    -->
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">
$('#restorePasswordForm').on('submit',function(e) {
  $("#labelSucesso").hide();
  $("#labelErros").hide();
  var form = $(this);
  e.preventDefault();
  $.ajax({
    type: "POST",
    url: form.attr('action'),
    data: form.serialize(),
  })
  .done(function(resposta) {
    if(resposta){
      $("#spanErro").html(resposta);
      $("#labelErros").show();
    }
    else
    {
      $("#labelSucesso").show();
      $("#restorePasswordForm")[0].reset();
      setTimeout(function(){ window.location="<?php echo e(route('loginPageB')); ?>"; },2000);
      //return;
    }
  });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backoffice/layouts/default-out', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>