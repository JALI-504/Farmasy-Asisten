
<?php $__env->startSection('contenido'); ?>

<div class="row">
        <div class="col-12">
            <h1 class="text-center">Usuarios <i class="fa fa-users"></i></h1>
            <div class="form-group">
        <input type="text" class="form-control pull-right" style="width:100%" id="search" placeholder="Buscar">
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#search").keyup(function(){
                _this = this;
                $.each($("#mytable3 tbody tr"), function() {
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                    $(this).hide();
                else
                    $(this).show();
                });
            });
        });
        </script>  
            <br><br>
           
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Correo electrónico</th>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Rol</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($usuario->email); ?></td>
                            <td><?php echo e($usuario->nombre); ?></td>
                            <td><?php echo e($usuario->username); ?></td>
                            <td><?php echo e($usuario->rol); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\pharmacy-assistant\resources\views/usuarios/usuarios_index.blade.php ENDPATH**/ ?>