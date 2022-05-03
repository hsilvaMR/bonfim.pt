<ul class="nav-menu">
    
    <li class="nav-item-cabecalho">
        <a href="">
            <div id="avatarNav" class="nav-avatar" @if(json_decode(\Cookie::get('admin_cookie'))->avatar) style="background-image:url('/backoffice/img/admin/{{ json_decode(\Cookie::get('admin_cookie'))->avatar }}');" @endif></div>
            <span id="nameNav">{{ json_decode(\Cookie::get('admin_cookie'))->nome }}</span>
        </a>
    </li>
    
    <li class="nav-item-principal @if($separador=='dashboard') active @endif">
        <a href="{{ route('dashboardPageB') }}">
            <span class="fas fa-tachometer-alt"></span>
            {{ trans('backoffice.Dashboard') }}
            <span class="selected"></span>
        </a>
    </li>

    <li class="nav-item-principal @if($separador=='admins') active @endif">
        <a href="{{ route('adminPageB') }}">
            <span class="fas fa-users"></span>
            {{ trans('backoffice.Admins') }}
            <span class="selected"></span>
        </a>
    </li>

    <li class="nav-item-principal @if($separador=='apartments') active @endif">
        <a href="{{ route('apartmentsPageB') }}">
            <span class="far fa-building"></span>
            {{ trans('backoffice.Apartments') }}
            <span class="selected"></span>
        </a>
    </li>

    <li class="nav-item-principal @if($separador=='news') active @endif">
        <a href="{{ route('newsPageB') }}">
            <span class="far fa-newspaper"></span>
            {{ trans('backoffice.News') }}
            <span class="selected"></span>
        </a>
    </li>

    

    @php $array=['newsletter','newsletter_emails']; @endphp
    <li class="nav-item-principal @if(in_array($separador, $array)) open @endif">
        <a href="javascript:;" class="menuClick">
            <span class="far fa-building"></span>
            {{ trans('backoffice.Newsletter') }}
            <i class="fas fa-angle-down @if(in_array($separador, $array)) rodar180 @endif"></i>
        </a>
        <ul class="nav-sub-menu menuOpen">
            
            <li class="nav-item-secundario @if($separador=='newsletter') active @endif">
                <a href="{{ route('newsletterPageB') }}">
                    {{ trans('backoffice.Contacts') }} {{ trans('backoffice.Newsletter') }}
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item-secundario @if($separador=='newsletter_emails') active @endif">
                <a href="{{ route('newsletterEmailsPageB') }}">
                    Emails {{ trans('backoffice.Newsletter') }}
                    <span class="selected"></span>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item-principal @if($separador=='contacts') active @endif">
        <a href="{{ route('contactsPageB') }}">
            <span class="far fa-envelope"></span>
            {{ trans('backoffice.Contacts') }}
            <span class="selected"></span>
        </a>
    </li>

    <li class="nav-item-principal @if($separador=='ficha_tecnica') active @endif">
        <a href="{{ route('datasheetPageB') }}">
            <span class="fas fa-paste"></span>
            {{ trans('backoffice.Datasheet') }}
            <span class="selected"></span>
        </a>
    </li>

    @php $array=['info','timeline','galeria_home']; @endphp
    <li class="nav-item-principal @if(in_array($separador, $array)) open @endif">
        <a href="javascript:;" class="menuClick">
            <span class="fas fa-desktop"></span>
            Website
            <i class="fas fa-angle-down @if(in_array($separador, $array)) rodar180 @endif"></i>
        </a>
        <ul class="nav-sub-menu menuOpen">
            
            <li class="nav-item-secundario @if($separador=='info') active @endif">
                <a href="{{ route('websitePageB') }}">
                    Página Informação
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item-secundario @if($separador=='timeline') active @endif">
                <a href="{{ route('websiteTimelinePageB') }}">
                    Barra de progressão
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item-secundario @if($separador=='galeria_home') active @endif">
                <a href="{{ route('galeriaHomePageB') }}">
                    Galeria Home
                    <span class="selected"></span>
                </a>
            </li>
        </ul>
    </li>

</ul>