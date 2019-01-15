<?php $__env->startSection('content'); ?>
<div class="container" id='app'>
	<div class="row">
		<div class="content"> 		
			<image-list></image-list>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>