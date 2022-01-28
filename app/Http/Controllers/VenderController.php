<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use App\Models\inventario;
use App\Models\productosVendido;
use App\Models\Venta;
use Illuminate\Http\Request;

class VenderController extends Controller
{
    //
    public function terminarOCancelarVenta(Request $request)
    {
        if ($request->input("accion") == "terminar") {
            return $this->terminarVenta($request);
        } else {
            return $this->cancelarVenta();
        }
    }
    
    public function terminarVenta(Request $request)
    {
        // Crear una venta
        $venta = new Venta();
        $venta->id_cliente = $request->input("id_cliente");
        $venta->saveOrFail();
        $idVenta = $venta->id;
        $inventarios = $this->obtenerProductos();
        // Recorrer carrito de compras
        foreach ($inventarios as $inventario) {
            // El producto que se vende...
            $productoVendido = new productosVendido();
            $productoVendido->fill([
                "id_venta" => $idVenta,
                "nombre_producto" => $inventario->nombre_producto,
                "codigo_barras" => $inventario->codigo_barras,
                "precio" => $inventario->precio_venta,
                "cantidad" => $inventario->cantidad,
                
            ]);
            // Lo guardamos
            $productoVendido->saveOrFail();
            // Y restamos la existencia del original
            $productoActualizado = inventario::find($inventario->id);
            $productoActualizado->existencia -= $productoVendido->cantidad;
            $productoActualizado->saveOrFail();
        }
        $this->vaciarProductos();
        return redirect()
            ->route("ventas.create")
            ->with("mensaje", "Venta terminada");

        }
    private function obtenerProductos()
    {
        $inventarios = session("inventarios");
        if (!$inventarios) {
            $inventarios = [];
        }
        return $inventarios;
    }
    public function cancelarVenta()
    {
        $this->vaciarProductos();
        return redirect()
            ->route("ventas.create")
            ->with("mensaje", "Venta cancelada");
    }

    private function vaciarProductos()
    {
        $this->guardarProductos(null);
    }

    public function quitarProductoDeVenta(Request $request)
    {
        $indice = $request->post("indice");
        $inventarios = $this->obtenerProductos();
        array_splice($inventarios, $indice, 1);
        $this->guardarProductos($inventarios);
        return redirect()
            ->route("ventas.create");
    }

    private function guardarProductos($inventarios)
    {
        session(["inventarios" => $inventarios,
        ]);
    }
  
    public function agregarProductoVenta(Request $request)
    {
        $codigo_barras = $request->post("codigo_barras");
        $can = $request->post("cantidad");
        $inventario = inventario::where("codigo_barras", "=", $codigo_barras)->first();
        if($can>0){
            if (!$inventario) {
                return redirect()
                    ->route("ventas.create")
                    ->with("mensaje", "Producto no encontrado");
            }
            $this->agregarProductoACarrito($inventario, $can);
            return redirect()
                ->route("ventas.create");
        }else{
            return redirect()
                    ->route("ventas.create")
                    ->with("mensaje", "La cantidad debe de ser positiva");
        }
        
    }

    private function agregarProductoACarrito($inventario, $can)
    {
        if ($inventario->existencia < $can) {
            return redirect()->route("ventas.create")
                ->with([
                    "mensaje" => "No hay suficiente existencias para agregar esa cantidad producto",
                    "tipo" => "danger"
                ]);
        }
        $inventarios = $this->obtenerProductos();
        $posibleIndice = $this->buscarIndiceDeProducto($inventario->codigo_barras, $inventarios);
        // Es decir, producto no fue encontrado
        if ($posibleIndice === -1) {
            $inventario->cantidad = $can;
            array_push($inventarios, $inventario);
        } else {
            if ($inventarios[$posibleIndice]->cantidad + $can > $inventario->existencia) {
                return redirect()->route("ventas.create")
                    ->with([
                        "mensaje" => "No se pueden agregar más productos de este tipo, se quedarían sin existencia",
                        "tipo" => "danger"
                    ]);
            }
            $inventarios[$posibleIndice]->cantidad+=$can;
        }
        $this->guardarProductos($inventarios);
    }

    private function buscarIndiceDeProducto(string $codigo_barras, array &$inventarios)
    {
        foreach ($inventarios as $indice => $inventario) {
            if ($inventario->codigo_barras === $codigo_barras) {
                return $indice;
            }
        }
        return -1;
    }

    public function index(Request $request)
    {
        $total = 0;
        foreach ($this->obtenerProductos() as $inventario) {
            $total += $inventario->cantidad * $inventario->precio_venta;
        }
     
        return view('ventas/vender_factura',
        [
            "total" => $total,
            "clientes" => Cliente::all(),
        ]);
        
    }
}
