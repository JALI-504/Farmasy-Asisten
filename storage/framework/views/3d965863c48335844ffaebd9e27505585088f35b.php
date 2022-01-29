<?php $__env->startSection('contenido'); ?>
<?php if(session('mensaje')): ?>
<div class="alert alert-success">
    <?php echo e(session('mensaje')); ?>

</div>
<?php endif; ?>

                <div class="card-header card-header-primary">
                  <h4 class="card-title">Permisos</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_create')): ?>
                      <a href="<?php echo e(route('permissions.create')); ?>" class="btn btn-primary">Añadir permiso</a>
                    <?php endif; ?>
                    <a href="<?php echo e(route('welcome')); ?>" class="btn btn-success">volver</a>
                    <br>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                      <thead>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Acciones</th>
                      </thead>
                      <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                          <td><?php echo e($permission->name); ?></td>
                          <td class="td-actions text-right">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_edit')): ?>
                            <a href="<?php echo e(route('permissions.edit', $permission->id)); ?>" class="btn btn-warning"><i
                                class="material-icons">editar</i></a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_destroy')): ?>
                            <form action="<?php echo e(route('permissions.destroy', $permission->id)); ?>" method="POST"
                              style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                              <?php echo csrf_field(); ?>
                              <?php echo method_field('DELETE'); ?>
                              <button class="btn btn-danger" type="submit" rel="tooltip">
                                <i class="material-icons">eliminar</i>
                              </button>
                            </form>
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
                </div>
                <div class="card-footer mr-auto">
                  <?php echo e($permissions->links()); ?>

                </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\pharmacy-assistant\resources\views/permissions/index.blade.php ENDPATH**/ ?>