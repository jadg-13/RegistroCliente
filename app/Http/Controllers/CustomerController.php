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

    public function index()
    {
        return view('customers.index');
    }

    public function store(StoreCustomer $request)
    {

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

        $existe = Customer::where('id_customer', $dato->id_customer)->first();

        if (!$existe) {
            $dato->save();
            //return $customer;
            return redirect()->route('customer.list');
        } else {
            $mensaje = "Existe un registro con el código que desea ingresar, verifique y vueva a intentar...";
            session()->flash('Advertencia', $mensaje);
            return redirect()->back();
        }
    }

    public function export()
    {
        return Excel::download(new CustomerExport, 'Registros.xlsx');
    }

   
}
