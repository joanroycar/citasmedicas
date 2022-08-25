<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = User::patients()->paginate(5);
        return view('patients.index',compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        $paciente= User::create($request->all()+[
            'role'=>'paciente',
            'password'=>($request->input('password'))
        ]);
        $notification ='El Paciente se ha creado correctamente';

        return redirect('/pacientes')->with(compact('notification'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $paciente)
    {
        return view('patients.edit',compact('paciente'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $paciente)
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
        $paciente->update($request->except(['password']));

        $paciente->update([
            
            $paciente->name = $request->name,
            $paciente->email = $request->email,
            $paciente->cedula = $request->cedula,
            $paciente->address = $request->address,
            $paciente->phone = $request->phone,


        ]);

        if($request->password != ''){
            $paciente->update([
                $paciente->password = $request->password,
            ]);
        }


        $notification ='La información del paciente se actualizado correctamente';

        return redirect('/pacientes')->with(compact('notification'));
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $paciente)
    {
        $deleteName =$paciente->name;

        $paciente->delete();
    

        $notification ='El paciente '.$deleteName.' se ha eliminado correctamente';

        return redirect('/pacientes')->with(compact('notification'));
    }
}
