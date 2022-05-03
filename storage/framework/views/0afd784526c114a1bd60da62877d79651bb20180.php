<!doctype html>
<html lang="pt-PT">
    <head>
        <?php echo $__env->make('backoffice/includes/head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </head>
    <body>
        <?php echo $__env->yieldContent('content'); ?>

        <?php echo $__env->make('backoffice/includes/assets', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->yieldContent('javascript'); ?>
    </body>
</html>