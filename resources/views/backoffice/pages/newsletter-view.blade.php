@extends('backoffice/layouts/default')

@section('content')
  <?php $arrayCrumbs = [ trans('backoffice.Newsletter') => route('newsletterEmailsPageB'), $nome->identificacao => route('newsletterViewPageB',[$nome->id, $news->lingua]) ]; ?>
  @include('backoffice/includes/crumbs')

  <div class="page-titulo">
    {{ $nome->identificacao }}
  </div>

  <a href="{{ route('newsletterEditPageB',$news->id) }}" class="abt bt-verde modulo-botoes"><i class="fas fa-pencil-alt"></i> Editar Newsletter</a>

  <div class="height-40"></div>

  @foreach($news_file as $file)
    <label class="lb margin-right10"><a href="{{ $file->ficheiro }}" download><i class="fas fa-download"></i> Ficheiro_{{ $file->id }}</a></label> 
  @endforeach
  
  <div class="height-10"></div>

  <label class="lb">Assunto:</label> <label class="lb-solid">{{ $news->assunto }}</label> 
  <label class="lb">Mensagem:</label> 
  <div class="lb-solid" style="background:rgba(68, 151, 166, 0.5);">

    <div style="background-image:url(/img/email/header.png);background-repeat:no-repeat;background-size:100% 100%;height:250px;"></div>

    <div style="font-family:Open Sans;font-style:normal;font-weight:normal;font-size:15px;line-height:24px;text-align:center;background-color:#fff;padding:60px 55px;color:#000;">
      {{ $news->corpo }}
    </div>
    <div style="background-color:#ffffff;text-align: center;padding-bottom:50px;">
      <a href="http://255dobonfim.pt" target="_blank"><button class="bt" style="background: rgba(68, 151, 166, 0.5);font-family: Open Sans;font-weight:300;">@if($lang == 'pt') VISITAR @else VISIT @endif </button></a>
    </div>

    <div style="background-color:#ffffff;text-align: center;padding-bottom:30px;font-size:12px;line-height:16px;font-weight:300;">
      <label>@if($lang == 'pt')Se o botão não funcionar copie e cole o seguinte @else If the button does not work copy and paste the following @endif<br> @if($lang == 'pt')link no seu navegador de internet: @else link into your web browser: @endif<br><a style="text-decoration:none;color:rgba(68, 151, 166, 0.5);" href="http://255dobonfim.pt">http://255dobonfim.pt</a></label> 
    </div>
    
    <div style="background-color:#ffffff;text-align: center;padding-bottom:50px;font-size:12px;line-height:16px;font-weight:300;">
      <label>@if($lang == 'pt') Para ter a certeza que recebe sempre os nossos e-mails @else To make sure you always receive our e-mails,@endif <br> @if($lang == 'pt')e notificações, adicione o nosso e-mail aos seus contactos: @else please add our e-mail address to your contacts:@endif <br><a style="text-decoration:none;color:rgba(68, 151, 166, 0.5);" href="mailto:mail@255dobonfim.pt"> mail@255dobonfim.pt</a></label> 
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
        <div class="modal-header"><h4 class="modal-title" id="myModalLabel">{{ trans('backoffice.Saved') }}</h4></div>
        <div class="modal-body">{!! trans('backoffice.savedSuccessfully') !!}</div>
        <div class="modal-footer">
          <a href="{{ route('newsletterPageB') }}" class="abt bt-cinza"><i class="fas fa-arrow-left"></i> {{ trans('backoffice.Back') }}</a>&nbsp;
          <a href="javascript:;" class="abt bt-verde" data-dismiss="modal"><i class="fas fa-check"></i> {{ trans('backoffice.Ok') }}</a>
        </div>
      </div>
    </div>
  </div>
@stop

@section('css')
@stop

@section('javascript')
  
<script type="text/javascript">

</script>
@stop