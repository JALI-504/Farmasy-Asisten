<?php $__env->startSection('contenido'); ?>
<?php if(session('mensaje')): ?>
<div class="alert alert-success">
    <?php echo e(session('mensaje')); ?>

</div>
<?php endif; ?>


          <div class="card-header card-header-primary">
            <h4 class="card-title">Roles</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_create')): ?>
                <a href="<?php echo e(route('roles.create')); ?>" class="btn btn-primary">Añadir nuevo rol</a>
                <?php endif; ?>
                <a href="<?php echo e(route('welcome')); ?>" class="btn btn-success">volver</a>
                <br>
              </div>
            </div>
              <table class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                <thead>
                  <th class="text-center"> Nombre </th>
                  <th class="text-center" style="width: 70%"> Permisos </th>
                  <th class="text-center"> Acciones </th>
                </thead>
                <tbody>
                  <?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                  <tr>
                    <td><?php echo e($role->name); ?></td>
                    <td>
                      <?php $__empty_2 = true; $__currentLoopData = $role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                          <span class="badge badge-info"><?php echo e($permission->name); ?></span>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                          <span class="badge badge-danger">No permission added</span>
                      <?php endif; ?>
                    </td>
                    <td>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_edit')): ?>
                      <?php if($role->id != 1): ?>
                      <a href="<?php echo e(route('roles.edit', $role->id)); ?>" class="btn btn-success"> <i
                        class="material-icons">editar</i> </a>
                      <?php endif; ?>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_destroy')): ?>
                    <?php if($role->id != 1): ?>
                      <form action="<?php echo e(route('roles.destroy', $role->id)); ?>" method="post"
                        onsubmit="return confirm('areYouSure')" style="display: inline-block;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" rel="tooltip" class="btn btn-danger">
                          <i class="material-icons">Eliminar</i>
                        </button>
                      </form>
                      <?php endif; ?>
                    <?php endif; ?>
                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                  <tr>
                    <td colspan="2">Sin registros.</td>
                  </tr>
                  <?php endif; ?>
                </tbody>
              </table>
              
          </div>
          <!--Footer-->
          <div class="card-footer mr-auto">
            <?php echo e($roles->links()); ?>

          </div>
          <!--End footer-->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\pharmacy-assistant\resources\views/roles/index.blade.php ENDPATH**/ ?>