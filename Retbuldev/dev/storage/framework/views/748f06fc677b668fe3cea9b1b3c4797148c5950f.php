<div class="flex-center position-ref full-height">


    <div class="content">
        <div class="title m-b-md">
            Laravel Dev Branch
        </div>
        <div class="container" id='app'>
            <image-list></image-list>
        </div>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <img src="<?php echo e(asset('/Vyronasdbmin/').'/'. $image->name); ?>">
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
    </div>
</div>
<!-- Scripts -->
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>