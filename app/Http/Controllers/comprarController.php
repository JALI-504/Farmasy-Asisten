<?php

namespace App\Http\Controllers;
use App\Models\proveedor;
use App\Models\producto;
use App\Models\inventario;
use App\Models\productos_comprado;
use App\Models\Compra;
use App\Models\factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class comprarController extends Controller
{
    //
    public function terminarOCancelarCompra(Request $request)
    {
        if ($request->input("accion") == "terminar") {
            return $this->terminarCompra($request);
        } else {
            return $this->cancelarCompra();
        }
    }
    
    public function terminarCompra(Request $request)
    {

        $Nfactura = DB::table('facturas')->max('id');

        $factura = new factura();
        $factura->saveOrFail();

        $compra = new Compra();
        $compra->id_proveedor = $request->input("id_proveedor");
        $compra->id_factura = $factura->id;
        $compra->factura = $Nfactura+1;
        $compra->saveOrFail();
        
        $idCompra = $compra->id;
        $factura = $compra->factura;

        $fecha_actual = date("d-m-Y");
        $fecha_ven = date("Y-m-d",strtotime($fecha_actual."+ 90 days"));

        $inventarios = $this->obtenerProductos();
        // Recorrer carrito de compras
        foreach ($inventarios as $inventario) {
            // El producto que se vende...
            $productoComprado = new productos_comprado();
            $productoComprado->fill([
                "id_compra" => $idCompra,
                "factura" => $factura,
                "nombre_producto" => $inventario->nombre,
                "codigo_barras" => $inventario->codigo,
                "precio" => $inventario->precio_compra,
                "cantidad" => $inventario->cantidad,
            ]);
            // Lo guardamos
            $productoComprado->saveOrFail();
            // Y restamos la existencia del original
            if(inventario::find($inventario->id)){
                $productoActualizado = inventario::find($inventario->id);
                $nuevoprecio = ($productoActualizado->existencia*$productoActualizado->precio_compra)+
                                ($inventario->precio_compra*$inventario->cantidad);
                $nuevovalor = $nuevoprecio/($productoActualizado->existencia+$inventario->cantidad);
                $productoActualizado->precio_venta = $nuevovalor*1.25;
                $productoActualizado->precio_compra = $nuevovalor;
            }else{
                $productoActualizado = new inventario();
                $productoActualizado->precio_venta = $inventario->precio_compra*1.25;
                $productoActualizado->precio_compra = $inventario->precio_compra;
            }
            $productoActualizado->codigo_barras = $inventario->codigo;
            $productoActualizado->nombre_producto = $inventario->nombre;
            $productoActualizado->existencia += $inventario->cantidad;
            $productoActualizado->vencimiento = $fecha_ven;
            $productoActualizado->saveOrFail();
        }
        $this->vaciarProductos();
        return redirect()
            ->route("compras.create")
            ->with("mensaje", "compra terminada");

        }
    private function obtenerProductos()
    {
        $inventarios = session("inventarios");
        if (!$inventarios) {
            $inventarios = [];
        }
        return $inventarios;
    }
    public function cancelarCompra()
    {
        $this->vaciarProductos();
        return redirect()
            ->route("compras.create")
            ->with("mensaje", "compra cancelada");
    }

    private function vaciarProductos()
    {
        $this->guardarProductos(null);
    }

    public function quitarProductoDeCompra(Request $request)
    {
        $indice = $request->post("indice");
        $inventarios = $this->obtenerProductos();
        array_splice($inventarios, $indice, 1);
        $this->guardarProductos($inventarios);
        return redirect()
            ->route("compras.create");
    }

    private function guardarProductos($inventarios)
    {
        session(["inventarios" => $inventarios,
        ]);
    }
  
    public function agregarProductoCompra(Request $request)
    {
        $codigo_barras = $request->post("codigo_barras");
        $can = $request->post("cantidad");
        $pre = $request->post("precio");
        $inventario = producto::where("codigo", "=", $codigo_barras)->first();
        if($pre>0){
            if($can>0){
                if (!$inventario) {
                    return redirect()
                        ->route("compras.create")
                        ->with("mensaje", "Producto no encontrado");
                }
                $this->agregarProductoACarrito($inventario, $can, $pre);
                return redirect()
                    ->route("compras.create");
            }else{
                return redirect()
                        ->route("compras.create")
                        ->with("mensaje", "La cantidad debe de ser positiva");
            }
        }else{
            return redirect()
                ->route("compras.create")
                ->with("mensaje", "El precio debe de ser positiva");
        }
        
    }

    private function agregarProductoACarrito($inventario, $can, $pre)
    {
        if ($inventario->existencia < 0) {
            return redirect()->route("compras.create")
                ->with([
                    "mensaje" => "No hay existencias del producto",
                    "tipo" => "danger"
                ]);
        }
        $inventarios = $this->obtenerProductos();

        $posibleIndice = $this->buscarIndiceDeProducto($inventario->codigo, $inventarios);
        // Es decir, producto no fue encontrado
        if ($posibleIndice === -1) {
            $inventario->cantidad = $can;
            $inventario->precio_compra = $pre;
            array_push($inventarios, $inventario);
        } else {
            $valor1 = $inventarios[$posibleIndice]->cantidad;
            $precio1 = $inventarios[$posibleIndice]->precio_compra;
            $inventarios[$posibleIndice]->cantidad+=$can;
            $dato1 = ($valor1*$precio1)+($can*$pre);
            $dato2 = $dato1/$inventarios[$posibleIndice]->cantidad;
            $inventarios[$posibleIndice]->precio_compra = $dato2;
        }
    
        // Es decir, producto no fue encontrado
     
        $this->guardarProductos($inventarios);
    }

    private function buscarIndiceDeProducto(string $codigo, array &$inventarios)
    {
        foreach ($inventarios as $indice => $inventario) {
            if ($inventario->codigo === $codigo) {
                return $indice;
            }
        }
        return -1;
    }


    public function index(Request $request)
    {
        $total = 0;
        foreach ($this->obtenerProductos() as $inventario) {
            $total += $inventario->cantidad * $inventario->precio_compra;
        }
     
        return view('compras/comprar_factura',
        [
            "total" => $total,
            "clientes" => Cliente::all(),
        ]);
        
    }
}