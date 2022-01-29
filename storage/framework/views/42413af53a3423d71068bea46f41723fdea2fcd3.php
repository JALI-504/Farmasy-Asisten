<?php $__env->startSection('contenido'); ?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="<?php echo e(route('permissions.store')); ?>" method="post" class="form-horizontal">
          <?php echo csrf_field(); ?>
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Permiso</h4>
              <p class="card-category">Ingresar datos</p>
            </div>
            <div class="card-body">
              <div class="row">
                <label for="name" class="col-sm-2 col-form-label">Nombre del permiso</label>
                <div class="col-sm-7">
                  <div class="form-group">
                    <input type="text" class="form-control" name="name" autofocus>
                  </div>
                </div>
              </div>
            </div>
            <!--Footer-->
            <div class="card-footer ml-auto mr-auto">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            <!--End footer-->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\pharmacy-assistant\resources\views/permissions/create.blade.php ENDPATH**/ ?>