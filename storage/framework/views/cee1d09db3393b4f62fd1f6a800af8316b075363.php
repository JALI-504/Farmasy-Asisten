
<?php $__env->startSection('contenido'); ?>

<div style="float: left;">
        <a class="btn-border btn-outline-info btn-lg"
        href="/"><i class="fa fa-home" aria-hidden="true"></i></a>
    </div>

    <div class="form-group">
        <input type="text" class="form-control pull-right" style="width:100%" id="search" placeholder="Buscar">
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#search").keyup(function(){
                _this = this;
                $.each($("#mytable4 tbody tr"), function() {
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                    $(this).hide();
                else
                    $(this).show();
                });
            });
        });
        </script>                   


<h1 class="text-center font-italic font-weight-bold">Pharmacy-Assistant</h1>
<div >              
                    <?php 
                    $total = 0;
                    ?>
                    <?php $__currentLoopData = $compras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php 
                    $total = $total +  $compra->total
                    ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Total de compras</label>
                        <input type="number" class="form-control" name="fecha"  value="<?php echo e($total); ?>"  readonly>
                    </div>
                    

            <?php $__env->startSection('titulo'); ?><h2 class="text-center">Lista de Compras</h2><?php $__env->stopSection(); ?>

            <br><br>
  
            <div class="table-responsive">
            <table id="mytable4" class="table table-striped table-hover table-success" id="b">
                
                    <thead>
                    <tr>
                        <th>Factura</th>
                        <th>Fecha</th>
                        <th>Proveedor</th>
                        <th>Total</th>
                        <th>Detalles</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $compras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(sprintf('%05d', $compra->id_factura)); ?></td>
                            <td><?php echo e($compra->created_at); ?></td>
                            <td><?php echo e($compra->proveedors->nombre); ?></td>
                            <td>$<?php echo e(number_format($compra->total, 2)); ?></td>

                            <td>
                            <a class="btn btn-success" href="<?php echo e(route("compras.ver", $compra)); ?>">
                                    <i class="fa fa-info"></i>
                                </a>
                            </td>
                            
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
            
            
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\pharmacy-assistant\resources\views/compras/compras_index.blade.php ENDPATH**/ ?>