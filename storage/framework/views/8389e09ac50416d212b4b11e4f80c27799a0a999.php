<?php $__env->startSection('content'); ?>






                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label style="color: #FFFFFF;margin-left:150px" for="username" class="col-md-2 col-form-label text-md-right">
                            <?php echo e(__('Nombre del Usuario')); ?></label>

                            <div class="col-md-6">
                                <input id="username" maxlength="80" placeholder="Ingrese su nombre de usuario" type="text"
                                class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="username" value="<?php echo e(old('username')); ?>"
                                required autofocus>

                                <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Datos Incorrectos</strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                            <br>
                        <div class="form-group row">
                            <label style="color: #FFFFFF;margin-left:150px"  for="password" class="col-md-2 col-form-label text-md-right"><?php echo e(__('Contraseña')); ?></label>

                            <div class="col-md-6">
                                <input id="password" placeholder="Ingrese su contraseña" maxlength="20" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">

                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Datos Incorrectos</strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

<br>
<br>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-outline-light btn-lg">
                                    <?php echo e(__('Entrar')); ?>

                                </button>
                                <!--
                                <a class="btn btn-outline-primary btn-lg" type=button href="<?php echo e(route('register')); ?>">
                                <?php echo e(__('Registrarse')); ?>

                                </a>-->

                                <?php if(Route::has('password.request')): ?>
                                    <a class="btn btn-outline-warning" href="<?php echo e(route('password.request')); ?>">
                                        <?php echo e(__('¿Se te olvidó la contraseña?')); ?>

                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                    <br>
                <h2 class="">Mantener el cuerpo saludable es una obligación… <br> De lo contrario, no podemos mantener nuestra mente fuerte y clara.</h2>
                </div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\pharmacy-assistant\resources\views/auth/login.blade.php ENDPATH**/ ?>