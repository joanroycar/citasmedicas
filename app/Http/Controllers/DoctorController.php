<?php

namespace App\Http\Controllers;

use App\Models\Horarios;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class DoctorController extends Controller
{
    Use WithPagination;
    public function index()
    {
        
        $medicos = User::doctors()->paginate(1);
        // $medicos = User::paginate(5)->doc;

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

    public function horario(){

        $days =[
            'Lunes','Martes','Miércoles','Jueves',
            'Viernes','Sábado','Domingo'

        ];
        
        return view('horarios.index',compact('days'));
    }

    public function horariostore(Request $request){
        $active = $request->input('active')?:[];

        $morning_start =$request->input('morning_start');
        $morning_end =$request->input('morning_end');
        $afternoon_start =$request->input('afternoon_start');
        $afternoon_end =$request->input('afternoon_end');

        for($i=0;$i<7; ++$i)
        Horarios::updateOrCreate(
            [
                'day'=> $i,
                'user_id'=>auth()->id()
            ],
            [
                'active'=> in_array($i,$active),
                'morning_start'=>$morning_start[$i],
                'morning_end'=>$morning_end[$i],
                'afternoon_start'=>$afternoon_start[$i],
                'afternoon_end'=>$afternoon_end[$i]

            ]

        );

        return back();

    }
}
