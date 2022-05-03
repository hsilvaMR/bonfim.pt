

<?php $__env->startSection('content'); ?>
  <?php if($funcao=='new'): ?><?php $arrayCrumbs = [ trans('backoffice.Newsletter') => route('newsletterEmailsPageB'), 'Nova Newsletter' => route('newsletterSendPageB') ]; ?><?php else: ?>
  <?php $arrayCrumbs = [ trans('backoffice.Newsletter') => route('newsletterEmailsPageB'), 'Editar Newsletter' => route('newsletterEditPageB',['id'=>$news->id]) ]; ?><?php endif; ?>
  <?php echo $__env->make('backoffice/includes/crumbs', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div class="page-titulo">
    <?php if($funcao=='new'): ?>Nova Newsletter <?php else: ?> Editar Newsletter <?php endif; ?>
  </div>

  

  <form id="newForm" method="POST" enctype="multipart/form-data" action="<?php echo e(route('newsletterCreatePostB')); ?>">
    <?php echo e(csrf_field()); ?>


    <input class="ip" type="hidden" id="id_news" name="id_news" value="<?php if(isset($news->id)): ?><?php echo e($news->id); ?><?php endif; ?>">
    <input class="ip" type="hidden" id="lingua" name="lingua" value="<?php if(isset($news->lingua)): ?><?php echo e($news->lingua); ?><?php endif; ?>">

    <input class="ip" type="hidden" id="id_identificacao" name="id_identificacao" value="<?php if(isset($news_id->id)): ?><?php echo e($news_id->id); ?><?php endif; ?>">

    <label class="lb">Identificação da newsletter</label> 
    <input class="ip" type="text" name="nome" value="<?php if(isset($news_id->identificacao)): ?><?php echo e($news_id->identificacao); ?><?php endif; ?>">


    <!--Newsletter (PT)-->
    <?php if(($funcao=='edit') && ($news->lingua == 'pt')): ?>
      <div class="height-50"></div>
      <label class="lb">Newsletter (PT)</label> 

      <?php if($funcao=='edit'): ?>
        <?php $__currentLoopData = $news_file; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div id="file_<?php echo e($file->id); ?>"><label class="lb"><a class="margin-right10" href="<?php echo e($file->ficheiro); ?>" download> Ficheiro_<?php echo e($file->id); ?></a>
            <label onclick="deletefile(<?php echo e($file->id); ?>,'pt');"><i class="fas fa-times tx-vermelho"></i> <span class="tx-vermelho font12">eliminar ficheiro</span></label></label></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>

      <div>
        <div class="div-160" id="imagem_selecao_arquivo_pt">
          <label class="a-dotted-white" id="uploads_pt">&nbsp;</label>
        </div>
        <label for="selecao_arquivo_pt" class="bt-reto bt-azul float-right">Anexar ficheiros</label>
        <input id="selecao_arquivo_pt" type="file" name="ficheiro_pt[]" onchange="lerFicheiros(this,'uploads_pt');" accept="*" multiple>
      </div>

      <input class="ip" type="text" name="assunto_pt" value="<?php if(isset($news->assunto)): ?><?php echo e($news->assunto); ?><?php endif; ?>" placeholder="Assunto">
      <textarea class="tx" type="text" name="mensagem_pt" placeholder="Mensagem"><?php if(isset($news->corpo)): ?><?php echo e($news->corpo); ?><?php endif; ?></textarea>
    <?php endif; ?>
    <!--Newsletter (EN)-->

    <?php if(($funcao=='edit') && ($news->lingua == 'en')): ?>
      <div class="height-50"></div>
      <label class="lb">Newsletter (EN)</label> 

      <?php if($funcao=='edit'): ?>
        <?php $__currentLoopData = $news_file; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div id="file_<?php echo e($file->id); ?>"><label class="lb"><a class="margin-right10" href="<?php echo e($file->ficheiro); ?>" download> Ficheiro_<?php echo e($file->id); ?></a>
            <label onclick="deletefile(<?php echo e($file->id); ?>,'en');"><i class="fas fa-times tx-vermelho"></i> <span class="tx-vermelho font12">eliminar ficheiro</span></label></label></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>

      <div>
        <div class="div-160" id="imagem_selecao_arquivo_en">
          <label class="a-dotted-white" id="uploads_en">&nbsp;</label>
        </div>
        <label for="selecao_arquivo_en" class="bt-reto bt-azul float-right">Anexar ficheiros</label>
        <input id="selecao_arquivo_en" type="file" name="ficheiro_en[]" onchange="lerFicheiros(this,'uploads_en');" accept="*" multiple>
      </div>

      <input class="ip" type="text" name="assunto_en" value="<?php if(isset($news->assunto)): ?><?php echo e($news->assunto); ?><?php endif; ?>" placeholder="Assunto">
      <textarea class="tx" type="text" name="mensagem_en" placeholder="Mensagem"><?php if(isset($news->corpo)): ?><?php echo e($news->corpo); ?><?php endif; ?></textarea>
    <?php endif; ?>


    <div class="clearfix height-20"></div>
    <div id="botoes">
      <button class="bt bt-verde float-right" type="submit"><i class="fas fa-check"></i> <?php echo e(trans('backoffice.Save')); ?></button>
      <label class="width-10 height-40 float-right"></label>
      <a href="<?php echo e(route('newsletterPageB')); ?>" class="abt bt-vermelho float-right"><i class="fas fa-times"></i> <?php echo e(trans('backoffice.Cancel')); ?></a>
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
          <a href="<?php echo e(route('newsletterPageB')); ?>" class="abt bt-cinza"><i class="fas fa-arrow-left"></i> <?php echo e(trans('backoffice.Back')); ?></a>&nbsp;
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
    $('#selecao_arquivo').val('');
    $('#uploads').html('&nbsp;');
    $('#imagem').val('');
    $('#imagem_selecao_arquivo').html('<label class="a-dotted-white" id="uploads">&nbsp;</label>');
  }

  function deletefile(id){

    $.ajax({
      type: "POST",
        url: '<?php echo e(route('deleteLineTMB')); ?>',
        data: { tabela:'bonfim_newsletter_conteudo_file', id:id },
        headers:{ 'X-CSRF-Token':'<?php echo csrf_token(); ?>' }
    })
    .done(function(resposta) {
        if(resposta=='sucesso'){
          $('#file_'+id).remove();
          $.notific8('<?php echo e(trans('backoffice.deleteSuccessfully')); ?>');
        }else{ $.notific8(resposta, {color:'ruby'}); }
    });

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
          $('#id_news').val(resp.id);
          limparFicheiros();
          if(resp.imagem){
            $('#imagem').val(resp.imagem);
            $('#imagem_selecao_arquivo').html('<img src="'+resp.imagem+'" class="height-40 margin-top10">');
          }

          $('#loading').hide();
          $('#botoes').show();
          $("#labelSucesso").show();   
          window.location.href = '/admin/newsletter-view/'+resp.id+'/'+resp.lingua;       
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