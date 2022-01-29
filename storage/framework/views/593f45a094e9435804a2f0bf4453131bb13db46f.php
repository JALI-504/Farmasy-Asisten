<!--Extendemos la plantilla para el formato a mostrar-->

<?php $__env->startSection('contenido'); ?>


<h1 class="text-center font-italic font-weight-bold">Pharmacy-Assistant</h1>

 <?php $__env->startSection('titulo'); ?><h2 class="text-center">Creación De Usuario</h2><?php $__env->stopSection(); ?>

    <!--Mensajes de error-->
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <?php echo e($error); ?>

                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <br>

    <form method="post" action=""><!--Inicio de formulario-->
        <?php echo csrf_field(); ?>


        <br><br>

        <div>
            <label for="empleado">Empleado:</label>
             <select class="form-control form-control-user" name='empleado' id='empleado' onchange="accion()">
                <option value="" style="display: none">Seleccione un Empleado</option>
                <?php $__currentLoopData = $empleados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empleado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($empleado->id); ?>"><?php echo e($empleado->primer_nombre); ?> <?php echo e($empleado->segundo_nombre); ?> <?php echo e($empleado->primer_apellido); ?> <?php echo e($empleado->segundo_apellido); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </select>
    
            </div>

            <script>
                function accion(){
                    var select = document.getElementById('empleado').value;


                    <?php $__currentLoopData = $empleados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empleado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        if (<?php echo e($empleado->id); ?> == select){
                            document.getElementById('id_empleado').value = select;
                            document.getElementById('name').value = '<?php echo e($empleado->primer_nombre); ?> <?php echo e($empleado->segundo_nombre); ?> <?php echo e($empleado->primer_apellido); ?> <?php echo e($empleado->segundo_apellido); ?>';
                            document.getElementById('email').value = '<?php echo e($empleado->correo_electronico); ?>';
                        }                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                }
            </script>

        <div class="form-group">
            <input require type="text" class="form-control" name='id_empleado' id='id_empleado' style="display: none"
            value="<?php echo e(old('id_empleado')); ?>" readonly>
        </div>

        <div class="form-group">
            <input require type="text" class="form-control" name='name' id='name' style="display: none"
            value="<?php echo e(old('name')); ?>" readonly>
        </div>       

        <div class="form-group">
            <label for="">Nombre de usuario:</label>
            <input require type="text" class="form-control" name="username" id="username"
            value="<?php echo e(old('username')); ?>">
        </div>  

        <div class="form-group">
            <input require type="text" class="form-control" name="email" id="email" style="display: none"
            value="<?php echo e(old('email')); ?>" readonly>
        </div> 

        <div class="form-group">
            <label for="">Contraseña:</label>
            <input require type="text" class="form-control" name="password" id="password"
            value="<?php echo e(old('password')); ?>">
        </div>  

        <div class="modal" id="cambio"tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Guardar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Desea crear el usuario?</p>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary " href="/usuario">
            Guardar
            </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
        </div>

        <!--Boton Guardar-->
        <button type="button" class="btn-border btn-outline-primary "
        data-toggle="modal" data-target="#cambio">
            Guardar
        </button>

        <!--Boton limpiar-->
        <button type="reset" class="btn-border btn-outline-danger">
            Limpiar
        </button>
        <!--Boton para volver-->
        <button class="btn-border btn-outline-success">
        <a type="button" class="btn-border btn-outline-success" href="/usuario">
        Volver
        </a>
        </button>

        </form><!--Final de formulario-->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\pharmacy-assistant\resources\views/auth/register.blade.php ENDPATH**/ ?>