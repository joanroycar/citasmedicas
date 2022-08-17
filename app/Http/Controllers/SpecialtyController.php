<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    
    public function __construct()

    {
        $this->middleware('auth');
        
    }
    public function index()
    {
        $specialties = Specialty::all();

        return view('specialties.index',compact('specialties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('specialties.create');
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
        ],[
            'name.required'=> 'El nombre de la especialidad es obligatorio',
            'name.min'=> 'El nombre de la especialidad debe tener mas de 3 caracteres',

        ]);
        $especialty= Specialty::create($request->all());

        return redirect('/especialidades');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function show(Specialty $specialty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialty $especialidade)
    {
        return view('specialties.edit',compact('especialidade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specialty $especialidade)
    {
        $request->validate([
            'name' => 'required|min:3',
        ],[
            'name.required'=> 'El nombre de la especialidad es obligatorio',
            'name.min'=> 'El nombre de la especialidad debe tener mas de 3 caracteres',

        ]);

        $especialidade->update($request->all());

        return redirect('/especialidades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialty $especialidade)
    {
        $especialidade->delete();

        return redirect('/especialidades');


    }
}
