<?php $__env->startSection('contenido'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <?php $__env->startSection('titulo'); ?><div class="card-header">Actualización de la clave</div><?php $__env->stopSection(); ?>

                <div class="card-body">
                <div>

                </form>
                    <form method="POST" action="<?php echo e(route('usuarios.edit',['id'=>Auth::user()->id])); ?>">
                    <?php echo method_field('put'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña anterior</label>

                            <div class="col-md-6">
                                <input id="oldpassword" maxlength="20" placeholder="Ingrese su contraseña" type="password"
                                class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="oldpassword"
                                required autocomplete="new-password">

                                    <?php if(session('errorcambio')): ?>
                                        <div class="invalid-feedback">
                                        <strong><?php echo e(session('errorcambio')); ?></strong>
                                        </div>
                                    <?php endif; ?>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Nueva Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" maxlength="20" placeholder="Ingrese su contraseña" type="password"
                                class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password">

                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"  class="col-md-4 col-form-label text-md-right">Confirmar Contraseña</label>
                            <div class="col-md-6">
                                <input id="password-confirm" maxlength="20" placeholder="Confirme su contraseña" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cambiocla">
                                    Guardar
                                </button>

                                <a class="btn btn-primary" type=button href="/home">Regresar</a>

                                <div class="modal" id="cambiocla"tabindex="-1" role="dialog" >
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Guardar Cambios</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Desea guardar los cambios realizados?</p>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary " href="/home">
                                    Aceptar
                                    </button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                    </div>
                                </div>
                                </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\pharmacy-assistant\resources\views/CambioClave.blade.php ENDPATH**/ ?>