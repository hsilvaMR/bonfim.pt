<!doctype html>
<html lang="pt-PT">
    <head>
        <?php echo $__env->make('backoffice/includes/head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->yieldContent('css'); ?>
    </head>
    <body>
        <?php echo $__env->make('backoffice/includes/header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <article>
            <nav class="article-menu">
                <?php echo $__env->make('backoffice/includes/menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </nav>
            <div class="article-conteudo">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </article>

        <?php echo $__env->make('backoffice/includes/footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->make('backoffice/includes/assets', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->yieldContent('javascript'); ?>
    </body>
</html>