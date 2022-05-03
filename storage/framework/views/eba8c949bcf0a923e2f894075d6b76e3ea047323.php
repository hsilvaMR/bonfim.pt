<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="login">
    <a href="<?php echo e(asset('')); ?>"><img class="login-logo" src="<?php echo e(asset('/backoffice/img/icons/logo_bonfim_preto.png')); ?>"></a>
    <form id="loginForm" method="POST" action="<?php echo e(route('loginFormB')); ?>">
      <?php echo e(csrf_field()); ?>

      <div id="login">
        <p class="text-center"><?php echo e(trans('backoffice.Welcome')); ?></p>
        <label class="lb"><?php echo e(trans('backoffice.Email')); ?></label>
        <input class="ip" type="email" name="email" id="email" value="" placeholder="<?php echo e(trans('backoffice.email')); ?>">
        <label class="lb"><?php echo e(trans('backoffice.Password')); ?></label>
        <input class="ip" type="password" name="password" id="password" value="" placeholder="<?php echo e(trans('backoffice.password')); ?>">
        <label class="login-esqueceu" onClick="mostrarForm('forgot');"><?php echo e(trans('backoffice.forgotPassword')); ?></label>
        <button class="bt-100 bt-azul" type="submit"><i class="fas fa-sign-in-alt"></i> <?php echo e(trans('backoffice.logIn')); ?></button>
        <div class="height-20"></div>
        <label id="labelSucesso" class="av-100 av-verde display-none"><span id="spanSucesso"><?php echo e(trans('backoffice.LoginSuccessfully')); ?></span> <i class="fas fa-times" onclick="$(this).parent().hide();"></i></label>
        <label id="labelErros" class="av-100 av-vermelho display-none"><span id="spanErro"></span> <i class="fas fa-times" onclick="$(this).parent().hide();"></i></label>
      </div>
    </form>
    <div id="forgot" class="display-none">
      <p class="text-center"><?php echo e(trans('backoffice.restoreAccount')); ?> <span class="tx-verde cursor-pointer" onClick="mostrarForm('login');"><?php echo e(trans('backoffice.youKnow')); ?></span></p>
      <label class="lb"><?php echo e(trans('backoffice.Email')); ?></label>
      <input class="ip" type="email" name="email_restore" id="email_restore" value="" placeholder="<?php echo e(trans('backoffice.email')); ?>" onKeyPress="if(event.keyCode == 13){ recuperarPassword(); }">
      <div class="height-20"></div>
      <button class="bt-100 bt-azul" type="button" onclick="recuperarPassword();"><i class="fas fa-unlock-alt"></i> <?php echo e(trans('backoffice.Restore')); ?></button>
      <div class="height-20"></div>
      <label id="labelSucesso2" class="av-100 av-verde display-none"><span id="spanSucesso2"><?php echo e(trans('backoffice.SuccessfullySubmitted')); ?></span> <i class="fas fa-times" onclick="$(this).parent().hide();"></i></label>
        <label id="labelErros2" class="av-100 av-vermelho display-none"><span id="spanErro2"></span> <i class="fas fa-times" onclick="$(this).parent().hide();"></i></label>
    </div>
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
function mostrarForm(id)
{
  $("#labelSucesso").hide();
  $("#labelErros").hide();
  $("#labelSucesso2").hide();
  $("#labelErros2").hide();

  if(id=='login'){
    $("#loginForm")[0].reset();
    $('#forgot').css("display","none");
    $('#login').css("display","block");
    $("#email").select();
  }else{
    //$("#email_restore").val('tmendes@ mredis.com');    
    $("#email_restore").val('');    
    $('#login').css("display","none");
    $('#forgot').css("display","block");
    $("#email_restore").select();
  }
}

$('#loginForm').on('submit',function(e) {
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
    if(resposta=='sucesso')
    {
      $("#labelSucesso").show();
      window.location="<?php echo e(route('dashboardPageB')); ?>";
    }
    else if(resposta=='email')
      {
        $("#loginForm")[0].reset();
        $("#email").select();
        $("#spanErro").html('<?php echo e(trans('backoffice.NonExistentEmail')); ?>');
        $("#labelErros").show();
      }else if(resposta=='password')
        {
          $("#password").val('');
          $("#password").select();
          $("#spanErro").html('<?php echo e(trans('backoffice.incorrectPassword')); ?>');
          $("#labelErros").show();
        }else if(resposta=='bloqueado')
          {
            $("#loginForm")[0].reset();
            $("#spanErro").html('<?php echo e(trans('backoffice.accountLocked')); ?>');
            $("#labelErros").show();
          }else if(resposta=='pendente')
            {
              $('#email_restore').val($('#email').val());
              $('#login').css("display","none");
              $('#forgot').css("display","block");
              $("#spanErro2").html('<?php echo e(trans('backoffice.accountStillPeding')); ?>');
              $("#labelErros2").show();
            }else
              {
                $("#spanErro").html(resposta);
                $("#labelErros").show();
              }
  });
});

function recuperarPassword(){
  $("#labelSucesso2").hide();
  $("#labelErros2").hide();
  var email = $('#email_restore').val();
  if(email){
    $.ajax({
      type: "POST",
      url: '<?php echo e(route('restoreFormB')); ?>',
      data: { email:email },
      headers:{ 'X-CSRF-Token':'<?php echo csrf_token(); ?>' }
    })
    .done(function(resposta) {
      //console.log(resposta);
      if(resposta.trim()=='sucesso'){
        $('#email_restore').val('');
        $('#email_restore').select();
        $("#labelSucesso2").show();
      }else{
        $("#spanErro2").html(resposta);
        $("#labelErros2").show();
      }
    });
  }
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backoffice/layouts/default-out', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>