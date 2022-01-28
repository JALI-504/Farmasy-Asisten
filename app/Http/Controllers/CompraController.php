<?php

namespace App\Http\Controllers;

use App\Models\compra;
use App\Models\inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;



class CompraController extends Controller
{
    public function ticket(Request $request)
{
    
}
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('compras'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));

        $comprasConTotales = compra::join("productos_comprados", "productos_comprados.id_compra", "=", "compras.id")
            ->select("compras.*", DB::raw("sum(productos_comprados.cantidad * productos_comprados.precio) as total"))
            ->groupBy("compras.id", "compras.created_at", "compras.updated_at")
            ->groupBy("compras.id", "compras.created_at", "compras.updated_at", "compras.id_proveedor")
            ->get();
        return view("compras.compras_index", ["compras" => $comprasConTotales,]);

        $ventas = venta::buscarpor($request->get('buscarPor'))->orderBy('id', 'DESC')->paginate(5);

        return view('compras.compras_index')//vista
            ->with('compras', $compras);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('compra_create'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));

        $proveedors = DB::table('proveedors')->get();

        $compras = DB::table('compras')->get();

        $productos = DB::table('productos')->get();

        $factura = DB::table('facturas')->max('id');

        return view('compras/comprar_factura',["proveedors"=>$proveedors ,"compras"=>$compras,
        "productos"=>$productos,"factura"=>$factura]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Venta $venta
     * @return \Illuminate\Http\Response
     */
    public function ver(Compra $compra)
    {
        abort_if(Gate::denies('compra_ver'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));

        $total = 0;
        foreach ($compra->inventario as $inven) {
            $total += $inven->cantidad * $inven->precio;
        }
        return view("compras.compras_show", [
            "compra" => $compra,
            "total" => $total,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Compra $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Compra $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Compra $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        abort_if(Gate::denies('compra_destroy'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));

        $venta->delete();
        return redirect()->route("compras.index")
            ->with("mensaje", "Compra eliminada");
    }
}
