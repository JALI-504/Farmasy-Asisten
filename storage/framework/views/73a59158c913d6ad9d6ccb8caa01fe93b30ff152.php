<!--Extendemos la plantilla para el formato a mostrar-->

<?php $__env->startSection('contenido'); ?>


<h1 class="text-center font-italic font-weight-bold">Pharmacy-Assistant</h1>

 <?php $__env->startSection('titulo'); ?><h2 class="text-center">Creación De Empleados</h2><?php $__env->stopSection(); ?>

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


        <!--Campo para ingresar la identidad-->
        <div class="form-group">
            <label for="identidad">Identidad:</label>
            <input require type="text" class="form-control" maxlength="13" name="identidad" id="identidad"
            value="<?php echo e(old('identidad')); ?>"placeholder="#############">
        </div>

        <!--Campo para ingresar el primer nombre-->
        <div class="form-group">
            <label for="primer_nombre">Primer Nombre:</label>
            <input require type="text" class="form-control"maxlength="30" name="primer_nombre" id="primer_nombre"
            value="<?php echo e(old('primer_nombre')); ?>" placeholder="Ingrese el primer nombre">
        </div>

        <!--Campo para ingresar el segundo nombre-->
        <div class="form-group">
            <label for="segundo_nombre">Segundo Nombre:</label>
            <input require type="text" class="form-control form-control-user"maxlength="30" name="segundo_nombre" id="segundo_nombre"
            value="<?php echo e(old('segundo_nombre')); ?>"placeholder="Ingrese el segundo nombre">
        </div>

        <!--Campo para ingresar el primer apellido-->
        <div class="form-group">
            <label for="primer_apellido">Primer Apellido:</label>
            <input require type="text" class="form-control form-control-user"maxlength="30" name="primer_apellido" id="primer_apellido"
            value="<?php echo e(old('primer_apellido')); ?>"placeholder="Ingrese el primer apellido">
        </div>

        <!--Campo para ingresar el segundo nombre-->

        <div class="form-group">
            <label for require="segundo_apellido">Segundo Apellido:</label>
            <input require type="text" class="form-control form-control-user" maxlength="30" name="segundo_apellido" id="segundo_apellido"
            value="<?php echo e(old('segundo_apellido')); ?>"placeholder="Ingrese el segundo apellido">
        </div>

        <?php $fecha_actual = date("d-m-Y");?>

        <!--Campo para ingresar la fecha de nacimiento-->
        <div class="form-group">
            <label for="fecha_nacimiento">Fecha Nacimiento:</label>
            <input require type="date" class="form-control form-control-user" name="fecha_nacimiento" id="fecha_nacimiento"
            value="<?php echo e(old('fecha_nacimiento')); ?>"min="<?php echo date('Y-m-d',strtotime($fecha_actual."- 60 year"));?>"
             max="<?php echo date('Y-m-d',strtotime($fecha_actual."- 18 year"));?>">
        </div>

        <!--Campo para ingresar el numero de telefono-->
        <div class="form-group">
            <label for="numero_telefono">Número de Teléfono:</label>
            <input require type="tel" class="form-control form-control-user"maxlength="8" name="numero_telefono" id="numero_telefono"
            value="<?php echo e(old('numero_telefono')); ?>"placeholder="######## (8 Digitos)">
        </div>

        <!--Campo para ingresar la fecha de entrada-->
        <div class="form-group">
            <label for="fecha_entrada">Fecha Entrada:</label>
            <input require type="date" class="form-control form-control-user" name="fecha_entrada" id="fecha_entrada"
            value="<?php echo e(old('fecha_entrada')); ?>"
            max="<?php echo date('Y-m-d',strtotime($fecha_actual));?>">
        </div>


        <!--Campo para ingresar el correo electronico-->
        <div class="form-group">
            <label for="correo_electronico">Correo:</label>
            <input require type="email" class="form-control form-control-user"maxlength="50" name="correo_electronico" id="correo_electronico"
            value="<?php echo e(old('correo_electronico')); ?>"placeholder="Ingrese el correo electrónico">
        </div>

        <!--Campo para seleccionar el direccion-->
        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input require type="text" class="form-control form-control-user"maxlength="80" name="direccion" id="direccion"
            value="<?php echo e(old('direccion')); ?>"placeholder="Ingrese su Direccion">
        </div>

        <!--Campo para seleccionar el cargo-->
        <div>
        <label for="cargo">Cargo:</label>
		 <select class="form-control form-control-user" name="cargo" id="cargo">
			<?php $__currentLoopData = $cargo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($c->name); ?>"><?php echo e($c->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		 </select>

		</div>


        <!--Campo para ingresar el numero de emergencia-->
        <div class="form-group">
            <label for="numero_emergencia">Número de teléfono para emergencias:</label>
            <input require type="tel" class="form-control form-control-user" maxlength="8" name="numero_emergencia" id="numero_emergencia"
            placeholder="######## (8 Digitos)" value="<?php echo e(old('numero_emergencia')); ?>"
            >
        </div>



        <div class="modal" id="cambio"tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Guardar Empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Desea crear el empleado?</p>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary " href="/empleados">
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
        <a type="button" class="btn-border btn-outline-success" href="/empleados">
        Volver
        </a>
        </button>

        </form><!--Final de formulario-->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\pharmacy-assistant\resources\views/empleado/crearEmpleado.blade.php ENDPATH**/ ?>