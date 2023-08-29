<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomer;
use Illuminate\Http\Request;
use App\Models\Customer;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CustomerExport;

class CustomerController extends Controller
{


    public function show()
    {
        $customers = Customer::all();
        return view('customers.list', compact('customers'));
    }

    public function findByName(Request $request)
    {
        $filtro = $request->input('filtro');

        $query = Customer::query();

        if ($filtro) {

            $query->where('first_name', 'LIKE', "%$filtro%");
        }

        $customers = $query->get();

        return view('customers.list', compact('customers'));
    }



    public function index()
    {
        return view('customers.index');
    }

    public function store(StoreCustomer $request)
    {
        
        $existe = Customer::where('id_customer', $request->identificador)->first();

        if ($existe) {
            $mensaje = 'Existe un registro con el código que desea ingresar, verifique y vuelva a intentar...';
            session()->flash('Advertencia', $mensaje);
            return redirect()->back()->withErrors(['Advertencia' => $mensaje]);
        }

        $dato = new Customer();
        $dato->first_name = $request->nombre;
        $dato->second_name = $request->apellidos;
        $dato->id_customer = $request->identificador;
        $dato->phone = $request->telefono;

        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $dato->image = $imageName;
        }

        $dato->save();
        return redirect()->route('customer.list');
    }

    public function export(Request $request)
    {
        $filtro = $request->input('filtro');

        $query = Customer::query();

        if ($filtro) {

            $query->where('first_name', 'LIKE', "%$filtro%");
        }

        $customers = $query->get();

        $rutaImagenes = public_path('images/');
        foreach ($customers as $registro) {
            $registro->image = $rutaImagenes . $registro->image;
        }
        return Excel::download(new CustomerExport($customers), 'RegistrosFiltro.xlsx');
    }
}
