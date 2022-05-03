

<?php $__env->startSection('content'); ?>
	<?php $arrayCrumbs = [ 'Barra de progressão' => route('websiteTimelinePageB') ]; ?>
  	<?php echo $__env->make('backoffice/includes/crumbs', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div class="page-titulo">
	  Barra de progressão
	  <div class="page-informacao" data-toggle="modal" data-target="#myModalInformation"><i class="fas fa-info"></i></div>
	</div>

  <div><label class="lb">Data de início da obra:</label> <?php echo e($data_inicio); ?></div>
  <div><label class="lb">Data de conclusão da obra:</label> <?php echo e($data_fim); ?></div>
 


  <!--<div id="myProgress" style="position: relative;width: 100%;height: 30px;background-color: #ddd;">
  
  </div>-->

    
<?php 
  $data_hoje=\Carbon\Carbon::now()->timestamp;
  $data_hoje_dia=date('d',$data_hoje);

  $calculo_percentagem = ($data_hoje_dia*100)/30;
?>

  <ol class="progress" data-steps="21">
    <?php $__currentLoopData = $array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li class="done">

        <span class="name" 
          <?php if(($data_hoje >= $val['data'])): ?> style="background-color:green;"
          <?php elseif(($data_hoje < $val['data']) && (date('m-y',$val['data']) == date('m-y',$data_hoje))): ?> style="background-image:linear-gradient(to right,green,#ccc <?php echo e($calculo_percentagem); ?>%);" 
          <?php endif; ?>><?php echo date('m-y',$val['data']); ?></span>

        <?php $__currentLoopData = $barra_fase; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if(date('m-y',$val['data']) == date('m-y',$fase->data_inicio)): ?>
         
            <span style="word-wrap: break-word;font-size: xx-small;"><?php echo e($fase->fase_pt); ?></span>
         
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!--<span class="step"><span>{ { $val['data'] }}</span></span>--> 
      </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ol>

  <form id="form" method="POST" enctype="multipart/form-data" action="<?php echo e(route('websiteTimelineEditForm')); ?>">
    <?php echo e(csrf_field()); ?>


    <div class="row">
      <div class="col-md-6">
        <label class="lb">Data de início da obra:</label> 
        <div class="div-160 float-right">
          <input class="ip" type="text" id="data_inicio_obra" name="data_inicio_obra" maxlength="10" value="<?php if(isset($barra->data_inicio)): ?><?php echo e(date('Y-m-d',$barra->data_inicio)); ?><?php endif; ?>">
        </div>
        
      </div>
      <div class="col-md-6">
        <label class="lb">Data de conclusão da obra:</label> 
        <div class="div-190 float-right">
          <input class="ip" type="text" id="data_conclusao_obra" name="data_conclusao_obra" maxlength="10" value="<?php if(isset($barra->data_fim)): ?><?php echo e(date('Y-m-d',$barra->data_fim)); ?><?php endif; ?>">
        </div>
      </div>
    </div>
    
  
      <div class="row">
        
        <div class="col-lg-4">
          <label class="lb">Fase de Progressão: (PT | EN)</label> 
          <?php $__currentLoopData = $barra_fase; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row">
              <div class="col-md-6">
                <input class="ip" type="text" name="pt_fase_<?php echo e($fase->id); ?>" value="<?php echo e($fase->fase_pt); ?>">
              </div>
              <div class="col-md-6">
                <input class="ip" type="text" name="en_fase_<?php echo e($fase->id); ?>" value="<?php echo e($fase->fase_en); ?>">
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
        <div class="col-lg-4">
          <label class="lb">Estado: (PT | EN)</label> 
          <?php $__currentLoopData = $barra_fase; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row">
              <div class="col-md-6">
                <input class="ip" type="text" name="pt_estado_<?php echo e($fase->id); ?>" value="<?php echo e($fase->estado_pt); ?>">
              </div>
              <div class="col-md-6">
                <input class="ip" type="text" name="en_estado_<?php echo e($fase->id); ?>" value="<?php echo e($fase->estado_en); ?>">
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
        <div class="col-lg-2">
          <label class="lb">Data de início:</label> 
          <?php $__currentLoopData = $barra_fase; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input class="ip" type="text" id="inicio_<?php echo e($fase->id); ?>" name="data_inicio_<?php echo e($fase->id); ?>" maxlength="10" value="<?php if(isset($fase->data_inicio)): ?><?php echo e(date('Y-m-d',$fase->data_inicio)); ?><?php endif; ?>">
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        
        <div class="col-lg-2">
          <label class="lb">Data de conclusão:</label><br>
          <?php $__currentLoopData = $barra_fase; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="div-130 float-left"><input class="ip" type="text" id="conclusao_<?php echo e($fase->id); ?>" name="data_conclusao_<?php echo e($fase->id); ?>" maxlength="10" value="<?php if(isset($fase->data_fim)): ?><?php echo e(date('Y-m-d',$fase->data_fim)); ?><?php endif; ?>"></div>
            <button class="bt-40 bt-azul float-right" type="button" onclick="removeFase(<?php echo e($fase->id); ?>);$(this).parent().remove();"><i class="fas fa-trash-alt"></i></button>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
          
        
      </div>
      


    <div class="height-40"></div>

    <div class="row">
      <div class="col-lg-4">
        <label class="lb">Adiconar fase de progressão (PT | EN)</label> 
        <div class="row">
          <div class="col-md-6">
            <input class="ip" type="text" name="fase_pt" value="">
          </div>
          <div class="col-md-6">
            <input class="ip" type="text" name="fase_en" value="">
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <label class="lb">Estado (PT | EN)</label> 

        <div class="row">
          <div class="col-md-6">
            <input class="ip" type="text" name="estado_pt" value="">
          </div>
          <div class="col-md-6">
            <input class="ip" type="text" name="estado_en" value="">
          </div>
        </div>
      </div>
      <div class="col-lg-2">
        <label class="lb">Data de início:</label> 
        <input class="ip" type="text" id="data_inicio_new" name="data_inicio_new" maxlength="10" value="">
      </div>

      <div class="col-lg-2">
        <label class="lb">Data de conclusão:</label> 
        <input class="ip" type="text" id="data_conclusao_new" name="data_conclusao_new" maxlength="10" value="">
      </div>

    </div>

    <div class="clearfix height-20"></div>
    <div id="botoes">
      <button class="bt bt-verde float-right" type="submit"><i class="fas fa-check"></i> <?php echo e(trans('backoffice.Save')); ?></button>
      <label class="width-10 height-40 float-right"></label>
      <a href="<?php echo e(route('websiteTimelinePageB')); ?>" class="abt bt-vermelho float-right"><i class="fas fa-times"></i> <?php echo e(trans('backoffice.Cancel')); ?></a>
    </div>
    <div id="loading" class="loading"><i class="fas fa-sync fa-spin"></i> <?php echo e(trans('backoffice.SavingR')); ?></div>
    <div class="clearfix"></div>
    <div class="height-20"></div>
    <label id="labelSucesso" class="av-100 av-verde display-none"><span id="spanSucesso"><?php echo e(trans('backoffice.savedSuccessfully')); ?></span> <i class="fas fa-times" onclick="$(this).parent().hide();"></i></label>
    <label id="labelErros" class="av-100 av-vermelho display-none"><span id="spanErro"></span> <i class="fas fa-times" onclick="$(this).parent().hide();"></i></label>

  </form>
  
	<!-- Modal Information -->
	<div class="modal fade" id="myModalInformation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog" role="document">
    		<div class="modal-content">
      		<div class="modal-header"><h4 class="modal-title"><?php echo e(trans('backoffice.dashboardTt')); ?></h4></div>
      		<div class="modal-body"><?php echo trans('backoffice.timelineTx'); ?></div>
      		<div class="modal-footer"><button type="button" class="bt bt-azul" data-dismiss="modal"><i class="fas fa-check"></i> <?php echo e(trans('backoffice.Ok')); ?></button></div>
    		</div>
  	</div>
	</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('backoffice/vendor/datepicker/bootstrap-datepicker.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script type="text/javascript" src="<?php echo e(asset('backoffice/vendor/datepicker/bootstrap-datepicker.js')); ?>"></script>
<script type="text/javascript">  
  <?php $__currentLoopData = $barra_fase; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    $('#inicio_'+<?php echo $fase->id; ?>).datepicker({
      //format:'yyyy-mm-dd',
      days: <?php echo trans('backoffice.days'); ?>,
      daysShort: <?php echo trans('backoffice.daysShort'); ?>,
      daysMin: <?php echo trans('backoffice.daysMin'); ?>,
      months: <?php echo trans('backoffice.months'); ?>,
      monthsShort: <?php echo trans('backoffice.monthsShort'); ?>

    });

    $('#conclusao_'+<?php echo $fase->id; ?>).datepicker({
      //format:'yyyy-mm-dd',
      days: <?php echo trans('backoffice.days'); ?>,
      daysShort: <?php echo trans('backoffice.daysShort'); ?>,
      daysMin: <?php echo trans('backoffice.daysMin'); ?>,
      months: <?php echo trans('backoffice.months'); ?>,
      monthsShort: <?php echo trans('backoffice.monthsShort'); ?>

    });
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  $('#data_inicio_new').datepicker({
    //format:'yyyy-mm-dd',
    days: <?php echo trans('backoffice.days'); ?>,
    daysShort: <?php echo trans('backoffice.daysShort'); ?>,
    daysMin: <?php echo trans('backoffice.daysMin'); ?>,
    months: <?php echo trans('backoffice.months'); ?>,
    monthsShort: <?php echo trans('backoffice.monthsShort'); ?>

  });

  $('#data_conclusao_new').datepicker({
    //format:'yyyy-mm-dd',
    days: <?php echo trans('backoffice.days'); ?>,
    daysShort: <?php echo trans('backoffice.daysShort'); ?>,
    daysMin: <?php echo trans('backoffice.daysMin'); ?>,
    months: <?php echo trans('backoffice.months'); ?>,
    monthsShort: <?php echo trans('backoffice.monthsShort'); ?>

  });


  $('#data_inicio_obra').datepicker({
    //format:'yyyy-mm-dd',
    days: <?php echo trans('backoffice.days'); ?>,
    daysShort: <?php echo trans('backoffice.daysShort'); ?>,
    daysMin: <?php echo trans('backoffice.daysMin'); ?>,
    months: <?php echo trans('backoffice.months'); ?>,
    monthsShort: <?php echo trans('backoffice.monthsShort'); ?>

  });

  $('#data_conclusao_obra').datepicker({
    //format:'yyyy-mm-dd',
    days: <?php echo trans('backoffice.days'); ?>,
    daysShort: <?php echo trans('backoffice.daysShort'); ?>,
    daysMin: <?php echo trans('backoffice.daysMin'); ?>,
    months: <?php echo trans('backoffice.months'); ?>,
    monthsShort: <?php echo trans('backoffice.monthsShort'); ?>

  });


  


  $('#form').on('submit',function(e) {
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
        $('#loading').hide();
        $('#botoes').show();
        $("#labelSucesso").show();  
        location.reload();        
      }else if(resposta){
        $("#spanErro").html(resposta);
        $("#labelErros").show();
        $('#loading').hide();
        $('#botoes').show();
      }
    });
  });

  function removeFase(id){

    $.ajax({
      type: "POST",
        url: '<?php echo e(route('deleteLineTMB')); ?>',
        data: { tabela:'barra_progressao_fase', id:id },
        headers:{ 'X-CSRF-Token':'<?php echo csrf_token(); ?>' }
    })
    .done(function(resposta) {
        if(resposta=='sucesso'){
          location.reload(); 
          $.notific8('<?php echo e(trans('backoffice.savedSuccessfully')); ?>');
        }else{ $.notific8(resposta, {color:'ruby'}); }
    });
    
    
  }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backoffice/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>