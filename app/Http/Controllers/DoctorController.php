<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $medicos = User::doctors()->get();
        return view('doctors.index',compact('medicos'));
    }

   
    public function create()
    {
        return view('doctors.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email'=>'required|email',
            'cedula'=>'required|digits:10',
            'address'=>'nullable|min:6',
            'phone'=>'required'
        ],[
            'name.required'=> 'El nombre del medico es obligatorio',
            'name.min'=> 'El nombre del médico debe tener mas de 3 caracteres',
            'email.required'=> 'El correo electronico es obligatorio',
            'email.email'=> 'Ingresa la dirección de correo electronico valido',
            'cedula.required'=> 'La cédula es obligatorio',
            'cedula.digits'=> 'La cédula debe tener 10 digitos',
            'address.min'=> 'La dirección debe tener mas de 6 caracteres',
            'phone.required'=> 'El númento de teléfono es obligatorio',

        ]);
        $doctor= User::create($request->all()+[
            'role'=>'doctor',
            'password'=>($request->input('password'))
        ]);

        $notification ='El Doctor se ha creado correctamente';

        return redirect('/medicos')->with(compact('notification'));
    

    }

    
    public function show($id)
    {
        //
    }

    
    public function edit(User $medico)
    {
        return view('doctors.edit',compact('medico'));
    }

    
    public function update(Request $request, User $medico)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email'=>'required|email',
            'cedula'=>'required|digits:10',
            'address'=>'nullable|min:6',
            'phone'=>'required'
        ],[
            'name.required'=> 'El nombre del medico es obligatorio',
            'name.min'=> 'El nombre del médico debe tener mas de 3 caracteres',
            'email.required'=> 'El correo electronico es obligatorio',
            'email.email'=> 'Ingresa la dirección de correo electronico valido',
            'cedula.required'=> 'La cédula es obligatorio',
            'cedula.digits'=> 'La cédula debe tener 10 digitos',
            'address.min'=> 'La dirección debe tener mas de 6 caracteres',
            'phone.required'=> 'El númento de teléfono es obligatorio',

        ]);
        $medico->update($request->except(['password']));

        $medico->update([
            
            $medico->name = $request->name,
            $medico->email = $request->email,
            $medico->cedula = $request->cedula,
            $medico->address = $request->address,
            $medico->phone = $request->phone,


        ]);

        if($request->password != ''){
            $medico->update([
                $medico->password = $request->password,
            ]);
        }


        $notification ='La información del medico se actualizado correctamente';

        return redirect('/medicos')->with(compact('notification'));
    
    }

    
    public function destroy(User $medico)
    {
        $deleteName =$medico->name;

        $medico->delete();

        $notification ='El doctor '.$deleteName.' se ha eliminado correctamente';

        return redirect('/medicos')->with(compact('notification'));
        
    }
}
