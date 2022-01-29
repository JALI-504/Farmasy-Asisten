<?php $__env->startSection('contenido'); ?>

<h1 class="text-center font-italic font-weight-bold">Pharmacy-Assistant</h1>


 <?php $__env->startSection('titulo'); ?><h2 class="text-center">Creación De Clientes</h2><?php $__env->stopSection(); ?>

    <br>
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

    <!--Inicio del Titulo-->
    <!--Final del Titulo-->

    <form method="post" action=""><!--Inicio de formulario-->
        <?php echo csrf_field(); ?>

        <!--Campo para ingresar la identidad-->
        <div class="form-group">
            <label for="identidad">Identidad:</label>
            <input type="text" class="form-control form-control-user" maxlength="13" name="identidad" id="identidad"
            value="<?php echo e(old('identidad')); ?>"placeholder="#############">


        <!--Campo para ingresar el nombre-->
        <div class="form-group ">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control form-control-user"maxlength="25"
            name="nombre" id="nombre"value="<?php echo e(old('nombre')); ?>"
            placeholder="Ingrese el nombre del cliente">
        </div>

        <!--Campo para ingresar el primer apellido-->
        <div class="form-group">
            <label for="primer_apellido">Apellido:</label>
            <input type="text" class="form-control form-control-user"maxlength="30"
            name="apellido" id="apellido"value="<?php echo e(old('apellido')); ?>"
            placeholder="Ingrese el apellido del cliente">
        </div>


        <!--Campo para ingresar el telefono-->
        <div class="form-group ">
            <label for="telefono">Teléfono:</label>
            <input type="tel" class="form-control form-control-user" maxlength="8" name="telefono" id="telefono"
            value="<?php echo e(old('telefono')); ?>"placeholder="########">
        </div>


        <!--Campo para ingresar la direccion-->
        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" class="form-control form-control-user"maxlength="100"
            name="direccion" id="direccion"value="<?php echo e(old('direccion')); ?>"
            placeholder="Ingrese la dirección del cliente">
        </div>

        <div class="form-group">
            <label for="rtn">RTN:</label>
            <input type="text" class="form-control form-control-user"maxlength="50"
            name="rtn" id="direccion"value="<?php echo e(old('rtn')); ?>"
            placeholder="Ingrese la RTN del cliente">
        </div>


        <div class="modal" id="cambio"tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Guardar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Desea crear el cliente?</p>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary " href="/clientes">
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
        <!--Boton limpiar-->
        <button type="reset" class="btn-border btn-outline-danger">
            Limpiar
        </button>
        <!--Boton para volver-->
        <button class="btn-border btn-outline-success">
        <a type="button" class="btn-border btn-outline-success" href="<?php echo e(route("clientes.index")); ?>">
        Volver
        </a>
        </button>

    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\pharmacy-assistant\resources\views/clientes/createCliente.blade.php ENDPATH**/ ?>