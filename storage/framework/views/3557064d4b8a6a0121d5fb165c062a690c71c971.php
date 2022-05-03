

<?php $__env->startSection('content'); ?>
  <?php if($funcao=='new'): ?><?php $arrayCrumbs = [ trans('backoffice.Apartments') => route('apartmentsPageB'), trans('backoffice.New_Apartment') => route('newApartmentsPageB') ]; ?><?php else: ?>
  <?php $arrayCrumbs = [ trans('backoffice.Apartments') => route('apartmentsPageB'), trans('backoffice.Edit_Apartment') => route('editApartmentsPageB',['id'=>$apart->id]) ]; ?><?php endif; ?>
  <?php echo $__env->make('backoffice/includes/crumbs', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div class="page-titulo">
    <?php if($funcao=='new'): ?><?php echo e(trans('backoffice.New_Apartment')); ?><?php else: ?><?php echo e(trans('backoffice.Edit_Apartment')); ?><?php endif; ?>
  </div>

  <form id="apartmentForm" method="POST" enctype="multipart/form-data" action="<?php echo e(route('apartmentsFormB')); ?>">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" id="id" name="id_apartamento" value="<?php if(isset($apart->id)): ?><?php echo e($apart->id); ?><?php endif; ?>">
    <div class="row">
      <div class="col-lg-4">
        <label class="lb"><?php echo e(trans('backoffice.Fraction')); ?></label>
        <input class="ip" type="text" name="fracao" value="<?php if(isset($apart->fracao)): ?><?php echo e($apart->fracao); ?><?php endif; ?>">
      </div>
      <div class="col-lg-4">
        <label class="lb"><?php echo e(trans('backoffice.Floor')); ?></label>
        <input class="ip" type="text" name="piso" value="<?php if(isset($apart->piso)): ?><?php echo e($apart->piso); ?><?php endif; ?>">
      </div>
      <div class="col-lg-4">
        <label class="lb"><?php echo e(trans('backoffice.Value')); ?> (€)</label>
        <input class="ip" type="text" name="valor" value="<?php if(isset($apart->valor)): ?><?php echo e($apart->valor); ?><?php endif; ?>">
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <label class="lb"><?php echo e(trans('backoffice.Gross_area')); ?></label>
        <input class="ip" type="text" name="area_bruta" value="<?php if(isset($apart->area_bruta)): ?><?php echo e($apart->area_bruta); ?><?php endif; ?>">
      </div>
      <div class="col-lg-4">
        <label class="lb"><?php echo e(trans('backoffice.Useful_area')); ?></label>
        <input class="ip" type="text" name="area_util" value="<?php if(isset($apart->area_util)): ?><?php echo e($apart->area_util); ?><?php endif; ?>">
      </div>
      <div class="col-lg-4">
        <label class="lb"><?php echo e(trans('backoffice.Balconies')); ?></label>
        <input class="ip" type="text" name="varandas" value="<?php if(isset($apart->varandas)): ?><?php echo e($apart->varandas); ?><?php endif; ?>">
      </div>
    </div>

    <div class="row">
      <div class="col-lg-3">
        <label class="lb">Número de quartos de banho</label>
        <input class="ip" type="text" name="wc" value="<?php if(isset($apart->wc)): ?><?php echo e($apart->wc); ?><?php endif; ?>">
      </div>
      <div class="col-lg-3">
        <label class="lb"><?php echo e(trans('backoffice.Closets')); ?></label>
        <input class="ip" type="text" name="roupeiros" value="<?php if(isset($apart->roupeiros)): ?><?php echo e($apart->roupeiros); ?><?php endif; ?>">
      </div>
      <div class="col-lg-3">
        <label class="lb"><?php echo e(trans('backoffice.Storage')); ?></label>
        <input class="ip" type="text" name="arrumos" value="<?php if(isset($apart->arrumos)): ?><?php echo e($apart->arrumos); ?><?php endif; ?>">
      </div>
      <div class="col-lg-3">
        <label class="lb"><?php echo e(trans('backoffice.Availability')); ?></label>
        <select class="select2" name="disponibilidade">
          <option value="" selected disabled></option>
          <option value="disponivel" <?php if(isset($apart->disponibilidade) && ($apart->disponibilidade=='disponivel')): ?> selected <?php endif; ?>>Disponível</option>
          <option value="reservado" <?php if(isset($apart->disponibilidade) && ($apart->disponibilidade=='reservado')): ?> selected <?php endif; ?>>Reservado</option>
          <option value="vendido" <?php if(isset($apart->disponibilidade) && ($apart->disponibilidade=='vendido')): ?> selected <?php endif; ?>>Vendido</option>
        </select>
      </div>
    </div>


    <label class="lb"><?php echo e(trans('backoffice.Description')); ?></label>
    <textarea class="tx" name="descricao"><?php if(isset($apart->descricao)): ?><?php echo e($apart->descricao); ?><?php endif; ?></textarea>

    <div class="row">
      <div class="col-lg-6">
        <label class="lb"><?php echo e(trans('backoffice.Plant_Image')); ?></label>
        <input type="hidden" id="img_selecao_arquivo" name="img_selecao_arquivo" value="<?php if(isset($apart->imagem_planta)): ?><?php echo e($apart->imagem_planta); ?><?php endif; ?>">
        <div>
          <div class="div-50">
            <div class="div-50" id="imagem_selecao_arquivo">
              <?php if(isset($apart->imagem_planta) && $apart->imagem_planta): ?><img src="<?php echo e($apart->imagem_planta); ?>" class="height-40 margin-top10"><?php else: ?><label class="a-dotted-white" id="uploads_selecao_arquivo">&nbsp;</label><?php endif; ?>
            </div>
            <label for="selecao_arquivo" class="lb-40 bt-azul float-right"><i class="fas fa-upload"></i></label>
            <input id="selecao_arquivo" type="file" name="ficheiro" onchange="lerFicheiros(this,'uploads_selecao_arquivo');" accept="image/*">
          </div>
          <label class="lb-40 bt-azul float-right" onclick="limparFicheiros('selecao_arquivo');"><i class="fa fa-trash-alt"></i></label>          
        </div>
      </div>

      <div class="col-lg-6">
        <label class="lb"><?php echo trans('backoffice.Plant_Image_home_slide'); ?> (PT)</label>
        <input type="hidden" id="img_selecao_arquivo_slide" name="img_selecao_arquivo_slide" value="<?php if(isset($apart->imagem_home_pt)): ?><?php echo e($apart->imagem_home_pt); ?><?php endif; ?>">
        <div>
          <div class="div-50">
            <div class="div-50" id="imagem_selecao_arquivo_slide">
              <?php if(isset($apart->imagem_home_pt) && $apart->imagem_home_pt): ?><img src="<?php echo e($apart->imagem_home_pt); ?>" class="height-40 margin-top10"><?php else: ?><label class="a-dotted-white" id="uploads_selecao_arquivo_slide">&nbsp;</label><?php endif; ?>
            </div>
            <label for="selecao_arquivo_slide" class="lb-40 bt-azul float-right"><i class="fas fa-upload"></i></label>
            <input id="selecao_arquivo_slide" type="file" name="ficheiro_slide" onchange="lerFicheiros(this,'uploads_selecao_arquivo_slide');" accept="image/*">
          </div>
          <label class="lb-40 bt-azul float-right" onclick="limparFicheiros('selecao_arquivo_slide');"><i class="fa fa-trash-alt"></i></label>          
        </div>

        <label class="lb"><?php echo trans('backoffice.Plant_Image_home_slide'); ?> (EN)</label>
        <input type="hidden" id="img_selecao_arquivo_slide_en" name="img_selecao_arquivo_slide_en" value="<?php if(isset($apart->imagem_home_en)): ?><?php echo e($apart->imagem_home_en); ?><?php endif; ?>">
        <div>
          <div class="div-50">
            <div class="div-50" id="imagem_selecao_arquivo_slide_en">
              <?php if(isset($apart->imagem_home_en) && $apart->imagem_home_en): ?><img src="<?php echo e($apart->imagem_home_en); ?>" class="height-40 margin-top10"><?php else: ?><label class="a-dotted-white" id="uploads_selecao_arquivo_slide_en">&nbsp;</label><?php endif; ?>
            </div>
            <label for="selecao_arquivo_slide_en" class="lb-40 bt-azul float-right"><i class="fas fa-upload"></i></label>
            <input id="selecao_arquivo_slide_en" type="file" name="ficheiro_slide_en" onchange="lerFicheiros(this,'uploads_selecao_arquivo_slide_en');" accept="image/*">
          </div>
          <label class="lb-40 bt-azul float-right" onclick="limparFicheiros('selecao_arquivo_slide_en');"><i class="fa fa-trash-alt"></i></label>          
        </div>

      </div>
    </div>

    

    <div class="row">
      <div class="col-lg-12">
        <label class="lb">Fotografias do apartamento</label>
        <div class="div-50">
          <div class="div-50" id="imagem_galeria">
            <label class="a-dotted-white" id="uploads_galeria">&nbsp;</label>
          </div>
          <label for="selecao_arquivo_galeria" class="lb-40 bt-azul float-right"><i class="fa fa-upload" aria-hidden="true"></i></label>
          <input id="selecao_arquivo_galeria" type="file" name="resposta[]" onchange="lerFicheiros(this,'uploads_galeria');" accept="image/*" multiple="true">
        </div>
        <label class="lb-40 bt-azul float-right" onclick="limparFicheiros();"><i class="fa fa-trash" aria-hidden="true"></i></label>

        <?php if(isset($apart->id)): ?>
          <div class="margin-top30">
            <div class="modulo-table">
              <div class="modulo-scroll pointer">
                <table class="modulo-body" id="sortable">
                  <thead>
                    <tr>
                      <th class="display-none"></th>
                      <th>#</th>
                      <th><?php echo e(trans('backoffice.Image')); ?></th>
                      <th><?php echo e(trans('backoffice.Online')); ?></th>
                      <th><?php echo e(trans('backoffice.Option')); ?></th>
                    </tr>
                  </thead>
                <tbody>
                 
                  <?php $__currentLoopData = $imagens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr id="linha_<?php echo $valor->id; ?>">
                    <td class="display-none"></td>
                    <td><?php echo ($valor->id); ?></td><input type="hidden" name="id_img" value="<?php echo $valor->id; ?>">
                    <td><img class="width-50 height-50" src="<?php echo $valor->img; ?>"></td><input type="hidden" name="imagem" value="<?php echo $valor->img; ?>">
                    <td class="check-small">
                      <input type="checkbox" name="online" id="check3<?php echo e($valor->id); ?>" value="1" onchange="updateOnOffTM(<?php echo e($valor->id); ?>);" <?php if($valor->online): ?> checked <?php endif; ?>>
                      <label for="check3<?php echo e($valor->id); ?>"><span></span></label>
                  </td>
                    <td class="table-opcao">
                      <span class="table-opcao" onclick="$('#id_modal_delete').val(<?php echo e($valor->id); ?>);" data-toggle="modal" data-target="#myModalDelete">
                        <i class="far fa-trash-alt"></i>&nbsp;<?php echo e(trans('backoffice.Delete')); ?>

                      </span>
                    </td>
                  </tr> 
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  <?php if(!isset($valor->id)): ?> <tr><td colspan="6"><?php echo e(trans('backoffice.noRecords')); ?></td></tr> <?php endif; ?>
                
                </tbody>
                </table>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div> 
   
    <label class="lb"><?php echo e(trans('backoffice.Online')); ?></label>
    <div class="clearfix height-10"></div>
    <input type="checkbox" name="online" id="check1" value="1" <?php if(isset($apart->online) && ($apart->online=='1')): ?> checked <?php endif; ?>>
    <label for="check1"><span></span><?php echo e(trans('backoffice.Online')); ?></label>
     

 
   
    <div class="clearfix height-20"></div>
    <div id="botoes">
      <button class="bt bt-verde float-right" type="submit"><i class="fas fa-check"></i> <?php echo e(trans('backoffice.Save')); ?></button>
      <label class="width-10 height-40 float-right"></label>
      <a href="<?php echo e(route('apartmentsPageB')); ?>" class="abt bt-vermelho float-right"><i class="fas fa-times"></i> <?php echo e(trans('backoffice.Cancel')); ?></a>
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
          <a href="<?php echo e(route('apartmentsPageB')); ?>" class="abt bt-cinza"><i class="fas fa-arrow-left"></i> <?php echo e(trans('backoffice.Back')); ?></a>&nbsp;
          <a href="javascript:;" class="abt bt-verde" data-dismiss="modal"><i class="fas fa-check"></i> <?php echo e(trans('backoffice.Ok')); ?></a>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Delete -->
  <div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <input type="hidden" name="id_modal_delete" id="id_modal_delete">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header"><h4 class="modal-title"><?php echo e(trans('backoffice.DeleteImg_tit')); ?></h4></div>
        <div class="modal-body"><?php echo trans('backoffice.DeleteImg_txt'); ?></div>
        <div class="modal-footer">
          <button type="button" class="bt bt-vermelho" data-dismiss="modal"><i class="fas fa-times"></i> <?php echo e(trans('backoffice.Cancel')); ?></button>&nbsp;
          <button type="button" class="bt bt-verde" data-dismiss="modal" onclick="apagarLinha();"><i class="fas fa-check"></i> <?php echo e(trans('backoffice.Delete')); ?></button>
          <div class="height-20"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal MAPA DE ACABAMENTOS -->
  <div class="modal fade" id="myModalAcabamentos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <input type="hidden" name="id_modal_mapa" id="id_modal_mapa">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header"><h4 class="modal-title">Mapa de acabamentos</h4></div>
        <div class="modal-body">Pretende inserir mapa de acabamentos a este apartamento?</div>
        <div class="modal-footer">
          <button id="modal_nao" type="button" class="bt bt-vermelho" data-dismiss="modal" onclick="modalAcabamentosNao();"><i class="fas fa-times"></i> Não</button>&nbsp;
          <button id="modal_sim" type="button" class="bt bt-verde" data-dismiss="modal" onclick="modalAcabamentosSim();"><i class="fas fa-check"></i> Sim</button>
          <div class="height-20"></div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet">
  <!-- PAGINAR -->
  <link href="<?php echo e(asset('backoffice/vendor/datatables/jquery.dataTables.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/i18n/pt.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/i18n/en.js"></script>
  <!-- PAGINAR -->
  <script src="<?php echo e(asset('backoffice/vendor/datatables/jquery.dataTables.min.js')); ?>"></script>

<script type="text/javascript">
  //<!-- PAGINAR -->
  $(document).ready(function(){
    $('#sortable').dataTable({
        aoColumnDefs: [{ "bSortable": false, "aTargets": [ 0,4 ] }],
        lengthMenu: [[20,50,-1], [20,50,'<?php echo e(trans('backoffice.All')); ?>']],
    });
  });

  function apagarLinha(){
    var id = $('#id_modal_delete').val();
    $.ajax({
      type: "POST",
        url: '<?php echo e(route('deleteLineTMB')); ?>',
        data: { tabela:'bonfim_lotes_galeria', id:id },
        headers:{ 'X-CSRF-Token':'<?php echo csrf_token(); ?>' }
    })
    .done(function(resposta) {
        if(resposta=='sucesso'){
          $('#linha_'+id).slideUp();
          $.notific8('<?php echo e(trans('backoffice.savedSuccessfully')); ?>');
        }else{ $.notific8(resposta, {color:'ruby'}); }
    });
  }

  function lerFicheiros(input,id) {
    var quantidade = input.files.length;
    var nome = input.value;
    if(quantidade==1){$('#'+id).html(nome);}
    else{$('#'+id).html(quantidade+' <?php echo e(trans('backoffice.selectedFiles')); ?>');}
  }
  function limparFicheiros(id) {
    $('#'+id).val('');
    $('#uploads_'+id).html('&nbsp;');
    $('#img_'+id).val('');
    $('#imagem_'+id).html('<label class="a-dotted-white" id="uploads_'+id+'">&nbsp;</label>');
  }

  function modalAcabamentosNao(id){
    window.location="https://www.255dobonfim.pt/admin/edit-apartment/"+id;
  }

  function modalAcabamentosSim(id){
    window.location="https://www.255dobonfim.pt/admin/finish-map/"+id;
  }

  $('#apartmentForm').on('submit',function(e) {
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
          limparFicheiros('selecao_arquivo');
          limparFicheiros('selecao_arquivo_slide');
          limparFicheiros('selecao_arquivo_slide_en');
          if(resp.imagem){
            $('#img_selecao_arquivo').val(resp.imagem);
            $('#imagem_selecao_arquivo').html('<img src="'+resp.imagem+'" class="height-40 margin-top10">');
          }

          if(resp.imagem_slide){
            $('#img_selecao_arquivo_slide').val(resp.imagem_slide);
            $('#imagem_selecao_arquivo_slide').html('<img src="'+resp.imagem_slide+'" class="height-40 margin-top10">');
          }

          if(resp.imagem_slide_en){
            $('#img_selecao_arquivo_slide_en').val(resp.imagem_slide_en);
            $('#imagem_selecao_arquivo_slide_en').html('<img src="'+resp.imagem_slide_en+'" class="height-40 margin-top10">');
          }

          $('#loading').hide();
          $('#botoes').show();
          $("#labelSucesso").show();   
          
          $('#modal_nao').attr('onclick','modalAcabamentosNao('+resp.id+')');
          $('#modal_sim').attr('onclick','modalAcabamentosSim('+resp.id+')');

          $('#myModalAcabamentos').modal('show');
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

  function updateOnOffTM(id){
      $.ajax({
        type: "POST",
          url: '<?php echo e(route('updateOnOffTMB')); ?>',
          data: { tabela:'bonfim_lotes_galeria', id:id },
          headers:{ 'X-CSRF-Token':'<?php echo csrf_token(); ?>' }
      })
      .done(function(resposta) {
          if(resposta=='sucesso'){
            $.notific8('<?php echo e(trans('backoffice.savedSuccessfully')); ?>');
          }else{
            $.notific8(resposta, {color:'ruby'});
          }
      });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backoffice/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>