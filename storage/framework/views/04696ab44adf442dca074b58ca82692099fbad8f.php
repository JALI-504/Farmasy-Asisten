<!--Extendemos la plantilla para el formato a mostrar-->

<?php $__env->startSection('contenido'); ?>


    <?php if(session('mensaje')): ?>
        <div class="alert alert-success">
            <?php echo e(session('mensaje')); ?>

        </div>
    <?php endif; ?>

    <div style="float: left;">
        <a class="btn-border btn-outline-info btn-lg"
        href="/"><i class="fa fa-home" aria-hidden="true"></i></a>
    </div>
    <br>
    <!--Inicio de Titulo-->
    <h1 class="text-center font-italic font-weight-bold">Pharmacy-Assistant</h1>

    <?php $__env->startSection('titulo'); ?><h2 class="text-center">Lista de Clientes</h2><?php $__env->stopSection(); ?>
        <!--Final de Titulo-->
    <br><br>
    
    <div class="form-group">
        <input type="text" class="form-control pull-right" style="width:100%" id="search" placeholder="Buscar">
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#search").keyup(function(){
                _this = this;
                $.each($("#mytable2 tbody tr"), function() {
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                    $(this).hide();
                else
                    $(this).show();
                });
            });
        });
        </script>

      <br><br>

      <div class="alert alert-primary" role="alert">
</div>

      <br>



    <div>
        <div style="float: left;">
            <a class="border border-primary btn btn-outline-primary md-2" href='clientesnuevo'> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
  <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
</svg> Nuevo Cliente</a>
            <br>
        </div>

        <div style="float: right; padding-right: 30px">

            <a class="border border-danger btn btn-outline-danger"href="<?php echo e(route('ventas.create')); ?>"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg>Vender</a>

        </div>
     </div>

    <br><br>

     <!--Definimos la creacion de la tabla donde se veran los proveedores-->
    <table id="mytable2" class="table table-striped table-hover table-success">
        <thead>
        <!--Definimos los campos de la tabla-->
        <tr>
            <th scope="col">Identidad</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Dirección</th>
            <th scope="col">RTN</th>
            <th scope="col">Detalles</th>
            <th scope="col">Edición</th>

            <!--Los campos han sido definidos-->
        </tr>
        </thead>
        <tbody>

        <!--Botón de imprimir solo era una prueba-->
        <?php $__empty_1 = true; $__currentLoopData = $cliente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cli): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><!--Definimos un forelse para recuperar los valores de cada proveedor-->
            <tr>
            <!--recuperamos los datos en el orden de los campos para ser mostrados-->
                <td><?php echo e($cli->identidad); ?></td>
                <td><?php echo e($cli->nombre); ?></td>
                <td><?php echo e($cli->apellido); ?></td>
                <td><?php echo e($cli->telefono); ?></td>
                <td><?php echo e($cli->direccion); ?></td>
                <td><?php echo e($cli->rtn); ?></td>


               <!--Definimos el boton de Editar-->
                <td>
                <a class="btn-border btn-outline-success btn-lg"
                href="<?php echo e(route('clientes.show',['id'=>$cli->id])); ?>">
                <i class="fa fa-info"></i></a>
                </td>
                <td>
                <a class="btn-border btn-outline-warning btn-lg"
                href="<?php echo e(route('clientes.edit',['id'=>$cli->id])); ?>"><i class="fa fa-edit"></i></a></td>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <th scope="row">No hay clientes</th><!--Si la tabla esta vacia mostramos el mensaje no hay productos-->
            </tr>
        <?php endif; ?><!--fin del forelse-->
        </script>
        </tbody>
    </table>
    <?php echo e($cliente->links()); ?><!--variable proveedor del forelse-->
<?php $__env->stopSection(); ?><!--Fin de la seccion-->

<?php echo $__env->make('layouts.admin2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\pharmacy-assistant\resources\views/clientes/indexCliente.blade.php ENDPATH**/ ?>