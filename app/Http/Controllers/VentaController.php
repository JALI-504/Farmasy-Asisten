<?php

namespace App\Http\Controllers;

use App\Models\venta;
use App\Models\inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use Illuminate\Support\Facades\Gate;

class VentaController extends Controller
{
    public function ticket(Request $request)
{
    $venta = Venta::findOrFail($request->get("id"));
    $nombreImpresora = env("NOMBRE_IMPRESORA");
    $connector = new WindowsPrintConnector($nombreImpresora);
    $impresora = new Printer($connector);
    $impresora->setJustification(Printer::JUSTIFY_CENTER);
    $impresora->setEmphasis(true);
    $impresora->text("Ticket de venta\n");
    $impresora->text($venta->created_at . "\n");
    $impresora->text("https://parzibyte.me/blog\n");
    $impresora->setEmphasis(false);
    $impresora->text("\n===============================\n");
    $total = 0;
    foreach ($venta->inventarios as $inventario) {
        $subtotal = $inventario->cantidad * $inventario->precio;
        $total += $subtotal;
        $impresora->setJustification(Printer::JUSTIFY_LEFT);
        $impresora->text(sprintf("%.2fx%s\n", $inventario->cantidad, $inventario->descripcion));
        $impresora->setJustification(Printer::JUSTIFY_RIGHT);
        $impresora->text('$' . number_format($subtotal, 2) . "\n");
    }
    $impresora->setJustification(Printer::JUSTIFY_CENTER);
    $impresora->text("\n===============================\n");
    $impresora->setJustification(Printer::JUSTIFY_RIGHT);
    $impresora->setEmphasis(true);
    $impresora->text("Total: $" . number_format($total, 2) . "\n");
    $impresora->setJustification(Printer::JUSTIFY_CENTER);
    $impresora->setTextSize(1, 1);
    $impresora->text("Gracias por su compra\n");
    $impresora->text("https://parzibyte.me/blog");
    $impresora->feed(5);
    $impresora->close();
    return redirect()->back()->with("mensaje", "Ticket impreso");
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('ventas'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));

        $ventasConTotales = Venta::join("productos_vendidos", "productos_vendidos.id_venta", "=", "ventas.id")
            ->select("ventas.*", DB::raw("sum(productos_vendidos.cantidad * productos_vendidos.precio) as total"))
            ->groupBy("ventas.id", "ventas.created_at", "ventas.updated_at")
            ->groupBy("ventas.id", "ventas.created_at", "ventas.updated_at", "ventas.id_cliente")
            ->get();
        return view("ventas.ventas_index", ["ventas" => $ventasConTotales,]);

        $ventas = venta::buscarpor($request->get('buscarPor'))->orderBy('id', 'DESC')->paginate(5);

        return view('ventas.ventas_index')//vista
            ->with('ventas', $ventas);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('venta_create'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));

        $clientes = DB::table('clientes')->get();

        $ventas = DB::table('ventas')->get();

        $inventarios = DB::table('inventarios')->get();

        return view('ventas/vender_factura',["clientes"=>$clientes ,"ventas"=>$ventas,
        "inventarios"=>$inventarios]);

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
    public function ver(Venta $venta)
    {
        abort_if(Gate::denies('venta_ver'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));

        $total = 0;
        foreach ($venta->inventario as $inven) {
            $total += $inven->cantidad * $inven->precio;
        }
        return view("ventas.ventas_show", [
            "venta" => $venta,
            "total" => $total,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Venta $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Venta $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Venta $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        abort_if(Gate::denies('venta_destroy'), redirect()->route('welcome')->with('denegar','No tiene acceso a esta seccion'));

        $venta->delete();
        return redirect()->route("ventas.index")
            ->with("mensaje", "Venta eliminada");
    }
}
