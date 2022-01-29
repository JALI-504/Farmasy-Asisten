<!--Extendemos la plantilla para el formato a mostrar-->

<?php $__env->startSection('contenido'); ?><!--Inicio del contenido-->

<?php if(session('mensaje')): ?>
        <div class="alert alert-success">
            <?php echo e(session('mensaje')); ?>

        </div>
    <?php endif; ?>

    <div style="float: left;">
        <a class="btn-border btn-outline-info btn-lg"
        href="/"><i class="fa fa-home" aria-hidden="true"></i></a>
    </div>
<h1 class="text-center font-italic font-weight-bold">Pharmacy-Assistant</h1>

<?php $__env->startSection('titulo'); ?><h2 class="text-center">Lista de Proveedor</h2><?php $__env->stopSection(); ?>

<br><br>
    
    <div class="form-group">
        <input type="text" class="form-control pull-right" style="width:100%" id="search" placeholder="Buscar">
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#search").keyup(function(){
                _this = this;
                $.each($("#mytable5 tbody tr"), function() {
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                    $(this).hide();
                else
                    $(this).show();
                });
            });
        });
        </script>

      <br><br>
    <a class=" border btn btn-outline-primary  btn-lg ml-2"
            href='/proveedoresnuevo'>Crear un Proveedor</a>
            <br>

     <!--Definimos la creacion de la tabla donde se veran los proveedores-->
    <table id="mytable5" class="table table-striped table-hover table-success" id="b">

    <!--utilizamos un estilo personalizado mediante css para darle realse a la tabla-->
    <style>

   #b{
       border-collapse:separate;
       border: solid #ccc 1px;
       border-radius: 25px;
     }
    </style>
    <!--fin del estilo-->

     <br>
        <thead>
        <!--Definimos los campos de la tabla-->
        <tr>
            <th scope="col">Nombre Proveedor</th>
            <th scope="col">Teléfono Proveedor</th>
            <th scope="col">Nombre de Laboratorio</th>
            <th scope="col">Teléfono de Laboratorio</th>
            <th scope="col">Correo de Laboratorio</th>
            <th scope="col">Nombre Vendedor</th>
            <th scope="col">Número Vendedor</th>
            <th scope="col">Dirección</th>
            <th scope="col">Detalles</th>
            <th scope="col">Edición</th>
            <!--Los campos han sido definidos-->
        </tr>
        </thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $proveedor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><!--Definimos un forelse para recuperar los valores de cada proveedor-->
            <tr>
            <!--recuperamos los datos en el orden de los campos para ser mostrados-->
                <td><?php echo e($pro->nombre); ?></td>
                <td><?php echo e($pro->telefono); ?></td>
                <td><?php echo e($pro->nombre_laboratorio); ?></td>
                <td><?php echo e($pro->telefono_laboratorio); ?></td>
                <td><?php echo e($pro->correo); ?></td>
                <td><?php echo e($pro->nombre_vendedor); ?></td>
                <td><?php echo e($pro->numero_vendedor); ?></td>
                <td><?php echo e($pro->direccion); ?></td>
                <td>
                                <a class="btn-border btn-outline-success btn-lg" href="<?php echo e(route('proveedores.ver',['id'=>$pro->id])); ?>">
                                    <i class="fa fa-info"></i>
                                </a>
                            </td>

               <!--Definimos el boton de Editar-->
                <td><a class="btn-border btn-outline-warning btn-lg"
                href="<?php echo e(route('proveedores.edit',['id'=>$pro->id])); ?>"><i class="fa fa-edit"></i></a></td>
                <td>

                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <th scope="row">No hay proveedores</th><!--Si la tabla esta vacia mostramos el mensaje no hay productos-->
            </tr>
        <?php endif; ?><!--fin del forelse-->
        </script>
        </tbody>
    </table>
    <?php echo e($proveedor->links()); ?><!--variable proveedor del forelse-->
<?php $__env->stopSection(); ?><!--Fin de la seccion-->

<?php echo $__env->make('layouts.admin2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\pharmacy-assistant\resources\views/proveedor/indexProveedor.blade.php ENDPATH**/ ?>