

<?php $__env->startSection('content'); ?>
  <?php if($funcao=='new'): ?><?php $arrayCrumbs = [ trans('backoffice.Website') => route('websitePageB'), 'Adicionar Imagem' => route('addImgProjetoB') ]; ?><?php else: ?>
  <?php $arrayCrumbs = [ trans('backoffice.Website') => route('websitePageB'), 'Editar Imagem' => route('editImgProjetoB',['id'=>$projeto->id]) ]; ?><?php endif; ?>
  <?php echo $__env->make('backoffice/includes/crumbs', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div class="page-titulo">
    <?php if($funcao=='new'): ?> Adicionar Imagem <?php else: ?> Editar Imagem <?php endif; ?>
  </div>



  <form id="newForm" method="POST" enctype="multipart/form-data" action="<?php echo e(route('addImgProjetoPost')); ?>">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" id="id" name="id_img" value="<?php if(isset($projeto->id)): ?><?php echo e($projeto->id); ?><?php endif; ?>">

    <div class="row">
      <div class="col-lg-6">
        <label class="lb"><?php echo e(trans('backoffice.Description')); ?> (PT)</label>
        <input class="ip" type="text" name="descricao_pt" value="<?php if(isset($projeto->descricao_pt)): ?><?php echo e($projeto->descricao_pt); ?><?php endif; ?>">

        <label class="lb"><?php echo e(trans('backoffice.Description')); ?> (EN)</label>
        <input class="ip" type="text" name="descricao_en" value="<?php if(isset($projeto->descricao_en)): ?><?php echo e($projeto->descricao_en); ?><?php endif; ?>">
      </div>
      <div class="col-lg-6">
        <label class="lb"><?php echo e(trans('backoffice.Image')); ?> (PT)</label>
        <input type="hidden" id="imagem_antiga" name="imagem_antiga" value="<?php if(isset($projeto->imagem_pt)): ?><?php echo e($projeto->imagem_pt); ?><?php endif; ?>">
        <div>
          <div class="div-50">
            <div class="div-50" id="imagem">
              <?php if(isset($projeto->imagem_pt) && $projeto->imagem_pt): ?><img src="<?php echo e($projeto->imagem_pt); ?>" class="height-40 margin-top10"><?php else: ?><label class="a-dotted-white" id="uploads">&nbsp;</label><?php endif; ?>
            </div>
            <label for="selecao-arquivo" class="lb-40 bt-azul float-right"><i class="fas fa-upload"></i></label>
            <input id="selecao-arquivo" type="file" name="ficheiro" onchange="lerFicheiros(this,'uploads');" accept="image/*">
          </div>
          <label class="lb-40 bt-azul float-right" onclick="limparFicheiros();"><i class="fa fa-trash-alt"></i></label>          
        </div>

        <label class="lb"><?php echo e(trans('backoffice.Image')); ?> (EN)</label>
        <input type="hidden" id="imagem_antiga_en" name="imagem_antiga_en" value="<?php if(isset($projeto->imagem_en)): ?><?php echo e($projeto->imagem_en); ?><?php endif; ?>">
        <div>
          <div class="div-50">
            <div class="div-50" id="imagem_en">
              <?php if(isset($projeto->imagem_en) && $projeto->imagem_en): ?><img src="<?php echo e($projeto->imagem_en); ?>" class="height-40 margin-top10"><?php else: ?><label class="a-dotted-white" id="uploads_en">&nbsp;</label><?php endif; ?>
            </div>
            <label for="selecao-arquivo_en" class="lb-40 bt-azul float-right"><i class="fas fa-upload"></i></label>
            <input id="selecao-arquivo_en" type="file" name="ficheiro_en" onchange="lerFicheiros(this,'uploads_en');" accept="image/*">
          </div>
          <label class="lb-40 bt-azul float-right" onclick="limparFicheiros_en();"><i class="fa fa-trash-alt"></i></label>          
        </div>

      </div>
    </div>
   
    <label class="lb"><?php echo e(trans('backoffice.Online')); ?></label>
    <div class="clearfix height-10"></div>
    <input type="checkbox" name="online" id="check1" value="1" <?php if(isset($projeto->online) && ($projeto->online=='1')): ?> checked <?php endif; ?>>
    <label for="check1"><span></span><?php echo e(trans('backoffice.Online')); ?></label>
     

 
   
    <div class="clearfix height-20"></div>
    <div id="botoes">
      <button class="bt bt-verde float-right" type="submit"><i class="fas fa-check"></i> <?php echo e(trans('backoffice.Save')); ?></button>
      <label class="width-10 height-40 float-right"></label>
      <a href="<?php echo e(route('websitePageB')); ?>" class="abt bt-vermelho float-right"><i class="fas fa-times"></i> <?php echo e(trans('backoffice.Cancel')); ?></a>
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
          <a href="<?php echo e(route('websitePageB')); ?>" class="abt bt-cinza"><i class="fas fa-arrow-left"></i> <?php echo e(trans('backoffice.Back')); ?></a>&nbsp;
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
  function lerFicheiros(input,id) {
    var quantidade = input.files.length;
    var nome = input.value;
    if(quantidade==1){$('#'+id).html(nome);}
    else{$('#'+id).html(quantidade+' <?php echo e(trans('backoffice.selectedFiles')); ?>');}
  }
  function limparFicheiros() {
    $('#selecao-arquivo').val('');
    $('#uploads').html('&nbsp;');
    $('#imagem_antiga').val('');
    $('#imagem').html('<label class="a-dotted-white" id="uploads">&nbsp;</label>');
  }

  function limparFicheiros_en() {
    $('#selecao-arquivo_en').val('');
    $('#uploads_en').html('&nbsp;');
    $('#imagem_antiga_en').val('');
    $('#imagem_en').html('<label class="a-dotted-white" id="uploads">&nbsp;</label>');
  }

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
        console.log(resposta);
        resp = $.parseJSON(resposta);
        if(resp.estado=='sucesso'){          
          $('#id').val(resp.id);
          limparFicheiros();
          
          if(resp.imagem){
            $('#imagem_antiga').val(resp.imagem);
            $('#imagem').html('<img src="'+resp.imagem+'" class="height-40 margin-top10">');
          }

          if(resp.imagem_en){
            $('#imagem_antiga_en').val(resp.imagem_en);
            $('#imagem_en').html('<img src="'+resp.imagem_en+'" class="height-40 margin-top10">');
          }

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