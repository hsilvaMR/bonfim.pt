

<?php $__env->startSection('content'); ?>
  <?php if($funcao==''): ?><?php $arrayCrumbs = [ trans('backoffice.Datasheet') => route('datasheetPageB')]; ?><?php else: ?>
  <?php endif; ?>
  <?php echo $__env->make('backoffice/includes/crumbs', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div class="page-titulo">
    <?php echo e(trans('backoffice.Datasheet')); ?>

  </div>


  <form id="newForm" method="POST" enctype="multipart/form-data" action="<?php echo e(route('datasheetFormB')); ?>">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" id="id" name="id_projeto" value="<?php if(isset($projeto->id)): ?><?php echo e($projeto->id); ?><?php endif; ?>">

    <label class="lb"><?php echo e(trans('backoffice.Project')); ?></label>
    <input style="text-transform:uppercase;" class="ip" type="text" value="<?php if(isset($projeto->nome)): ?><?php echo e($projeto->nome); ?><?php endif; ?>" disabled>

    <label class="lb"><?php echo e(trans('backoffice.Datasheet')); ?> (PT)</label>
    <textarea class="tx" name="ficha_tecnica_pt"><?php if(isset($projeto->ficha_tecnica_pt)): ?><?php echo nl2br($projeto->ficha_tecnica_pt); ?><?php endif; ?></textarea>

    <label class="lb"><?php echo e(trans('backoffice.Datasheet')); ?> (EN)</label>
    <textarea class="tx" name="ficha_tecnica_en"><?php if(isset($projeto->ficha_tecnica_en)): ?><?php echo nl2br($projeto->ficha_tecnica_en); ?><?php endif; ?></textarea>

    
   
    <div class="clearfix height-20"></div>
    <div id="botoes">
      <button class="bt bt-verde float-right" type="submit"><i class="fas fa-check"></i> <?php echo e(trans('backoffice.Save')); ?></button>
      <label class="width-10 height-40 float-right"></label>
      <a href="<?php echo e(route('datasheetPageB')); ?>" class="abt bt-vermelho float-right"><i class="fas fa-times"></i> <?php echo e(trans('backoffice.Cancel')); ?></a>
    </div>
    <div id="loading" class="loading"><i class="fas fa-sync fa-spin"></i> <?php echo e(trans('backoffice.SavingR')); ?></div>
    <div class="clearfix"></div>
    <div class="height-20"></div>
    <label id="labelSucesso" class="av-100 av-verde display-none"><span id="spanSucesso"><?php echo e(trans('backoffice.savedSuccessfully')); ?></span> <i class="fas fa-times" onclick="$(this).parent().hide();"></i></label>
    <label id="labelErros" class="av-100 av-vermelho display-none"><span id="spanErro"></span> <i class="fas fa-times" onclick="$(this).parent().hide();"></i></label>
  </form>

  <!-- Modal Save -->
  <div class="modal fade" id="myModalSave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <input type="hidden" name="id_modal" id="id_modal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header"><h4 class="modal-title" id="myModalLabel"><?php echo e(trans('backoffice.Saved')); ?></h4></div>
        <div class="modal-body"><?php echo trans('backoffice.savedSuccessfully'); ?></div>
        <div class="modal-footer">
          <a href="<?php echo e(route('datasheetPageB')); ?>" class="abt bt-cinza"><i class="fas fa-arrow-left"></i> <?php echo e(trans('backoffice.Back')); ?></a>&nbsp;
          <a href="javascript:;" class="abt bt-verde" data-dismiss="modal"><i class="fas fa-check"></i> <?php echo e(trans('backoffice.Ok')); ?></a>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/i18n/pt.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/i18n/en.js"></script>

<script type="text/javascript">

  $('#newForm').on('submit',function(e) {
      $("#labelSucesso").hide();
      $("#labelErros").hide();
      $('#loading').show();
      $('#botoes').hide();
      var form = $(this);
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: form.attr('action'),
        data: new FormData(this),
        contentType: false,
        processData: false,
        cache: false
      })
      .done(function(resposta) {
        //$('#myModalSave').modal('show');
        //console.log(resposta);
        resp = $.parseJSON(resposta);
        if(resp.estado=='sucesso'){          
          $('#id').val(resp.id);
          $('#loading').hide();
          $('#botoes').show();
          $("#labelSucesso").show();          
        }else if(resp.estado=='erro'){
          $("#spanErro").html(resp.mensagem);
          $("#labelErros").show();
          $('#loading').hide();
          $('#botoes').show();
        }else if(resposta){
          $("#spanErro").html(resposta);
          $("#labelErros").show();
          $('#loading').hide();
          $('#botoes').show();
        }
      });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backoffice/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>