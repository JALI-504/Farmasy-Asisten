<?php $__env->startSection('contenido'); ?>

<?php if(session('denegar')): ?>
<div class="alert alert-danger">
    <?php echo e(session('denegar')); ?>

</div>
<?php endif; ?>


<?php if(session('mensaje')): ?>
        <div class="alert alert-success">
            <?php echo e(session('mensaje')); ?>

        </div>
    <?php endif; ?>


    <div class="col-12 text-center">
        <h1 class="text-center font-italic font-weight-bold">Pharmacy-Assistant</h1>
        <?php $__env->startSection('titulo'); ?><h2 class="text-center font-italic font-weight-bold"> ¡Bienvenidos! </h2><?php $__env->stopSection(); ?>
        <br>
    </div>
    <br>
    <?php $__currentLoopData = [
    ["empleados", "clientes", "inventarios", "productos", "proveedores", "ventas", "usuarios", "compras"],
    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modulos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-12 pb-2">
            <div class="row">
                <?php $__currentLoopData = $modulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modulo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check($modulo)): ?>
                    <div class="col-12 col-md-3">
                        <div class="card">
                        <div class="card-body">
                                <!--<input type="image"  width="200px" heigth="200px" src="/img/<?php echo e($modulo); ?>.png"/>-->
                                <a href="<?php echo e($modulo); ?>"><img src="/img/<?php echo e($modulo); ?>.png" width="200px" heigth="200px"/></a>
<br><br>
                                <a href="<?php echo e($modulo); ?>" class="btn textblack menusuperior" style="font-size:20px">
                                    Ir a&nbsp;<?php echo e($modulo === "acerca_de" ? "Acerca de" : ucwords($modulo)); ?>

                                    <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\pharmacy-assistant\resources\views/welcome.blade.php ENDPATH**/ ?>