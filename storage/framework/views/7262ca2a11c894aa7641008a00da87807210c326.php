<div class="bread-crumbs">
	<?php $__currentLoopData = $arrayCrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $linkCrumbs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	    <a href="<?php if($linkCrumbs): ?> <?php echo e($linkCrumbs); ?> <?php else: ?> javascript:; <?php endif; ?>"><?php echo e($key); ?></a>
	    <i>&middot;</i>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>