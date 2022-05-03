<ul class="nav-menu">
    
    <li class="nav-item-cabecalho">
        <a href="">
            <div id="avatarNav" class="nav-avatar" <?php if(json_decode(\Cookie::get('admin_cookie'))->avatar): ?> style="background-image:url('/backoffice/img/admin/<?php echo e(json_decode(\Cookie::get('admin_cookie'))->avatar); ?>');" <?php endif; ?>></div>
            <span id="nameNav"><?php echo e(json_decode(\Cookie::get('admin_cookie'))->nome); ?></span>
        </a>
    </li>
    
    <li class="nav-item-principal <?php if($separador=='dashboard'): ?> active <?php endif; ?>">
        <a href="<?php echo e(route('dashboardPageB')); ?>">
            <span class="fas fa-tachometer-alt"></span>
            <?php echo e(trans('backoffice.Dashboard')); ?>

            <span class="selected"></span>
        </a>
    </li>

    <li class="nav-item-principal <?php if($separador=='admins'): ?> active <?php endif; ?>">
        <a href="<?php echo e(route('adminPageB')); ?>">
            <span class="fas fa-users"></span>
            <?php echo e(trans('backoffice.Admins')); ?>

            <span class="selected"></span>
        </a>
    </li>

    <li class="nav-item-principal <?php if($separador=='apartments'): ?> active <?php endif; ?>">
        <a href="<?php echo e(route('apartmentsPageB')); ?>">
            <span class="far fa-building"></span>
            <?php echo e(trans('backoffice.Apartments')); ?>

            <span class="selected"></span>
        </a>
    </li>

    <li class="nav-item-principal <?php if($separador=='news'): ?> active <?php endif; ?>">
        <a href="<?php echo e(route('newsPageB')); ?>">
            <span class="far fa-newspaper"></span>
            <?php echo e(trans('backoffice.News')); ?>

            <span class="selected"></span>
        </a>
    </li>

    

    <?php $array=['newsletter','newsletter_emails']; ?>
    <li class="nav-item-principal <?php if(in_array($separador, $array)): ?> open <?php endif; ?>">
        <a href="javascript:;" class="menuClick">
            <span class="far fa-building"></span>
            <?php echo e(trans('backoffice.Newsletter')); ?>

            <i class="fas fa-angle-down <?php if(in_array($separador, $array)): ?> rodar180 <?php endif; ?>"></i>
        </a>
        <ul class="nav-sub-menu menuOpen">
            
            <li class="nav-item-secundario <?php if($separador=='newsletter'): ?> active <?php endif; ?>">
                <a href="<?php echo e(route('newsletterPageB')); ?>">
                    <?php echo e(trans('backoffice.Contacts')); ?> <?php echo e(trans('backoffice.Newsletter')); ?>

                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item-secundario <?php if($separador=='newsletter_emails'): ?> active <?php endif; ?>">
                <a href="<?php echo e(route('newsletterEmailsPageB')); ?>">
                    Emails <?php echo e(trans('backoffice.Newsletter')); ?>

                    <span class="selected"></span>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item-principal <?php if($separador=='contacts'): ?> active <?php endif; ?>">
        <a href="<?php echo e(route('contactsPageB')); ?>">
            <span class="far fa-envelope"></span>
            <?php echo e(trans('backoffice.Contacts')); ?>

            <span class="selected"></span>
        </a>
    </li>

    <li class="nav-item-principal <?php if($separador=='ficha_tecnica'): ?> active <?php endif; ?>">
        <a href="<?php echo e(route('datasheetPageB')); ?>">
            <span class="fas fa-paste"></span>
            <?php echo e(trans('backoffice.Datasheet')); ?>

            <span class="selected"></span>
        </a>
    </li>

    <?php $array=['info','timeline','galeria_home']; ?>
    <li class="nav-item-principal <?php if(in_array($separador, $array)): ?> open <?php endif; ?>">
        <a href="javascript:;" class="menuClick">
            <span class="fas fa-desktop"></span>
            Website
            <i class="fas fa-angle-down <?php if(in_array($separador, $array)): ?> rodar180 <?php endif; ?>"></i>
        </a>
        <ul class="nav-sub-menu menuOpen">
            
            <li class="nav-item-secundario <?php if($separador=='info'): ?> active <?php endif; ?>">
                <a href="<?php echo e(route('websitePageB')); ?>">
                    Página Informação
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item-secundario <?php if($separador=='timeline'): ?> active <?php endif; ?>">
                <a href="<?php echo e(route('websiteTimelinePageB')); ?>">
                    Barra de progressão
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item-secundario <?php if($separador=='galeria_home'): ?> active <?php endif; ?>">
                <a href="<?php echo e(route('galeriaHomePageB')); ?>">
                    Galeria Home
                    <span class="selected"></span>
                </a>
            </li>
        </ul>
    </li>

</ul>