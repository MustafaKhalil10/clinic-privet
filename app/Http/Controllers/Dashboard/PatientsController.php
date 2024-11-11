<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientsController extends Controller
{

    public function index()
    {
        //
        $patients = Patient::all();
        return view('dashboard.patients.index', ['patients' => $patients]);
    }


    public function create()
    {
        //
        return view('dashboard.patients.create_edit');
    }


    public function store(Request $request)
    {
        //
        $request->validate(Patient::rules());
        Patient::create($request->all());
        return redirect()->route('patients.index')->with('success', 'Patient Add successfully');
    }



    public function edit($id)
    {
        //
        $patient = Patient::find($id);
        return view('dashboard.patients.create_edit', ['patient' => $patient]);
    }


    public function update(Request $request, $id)
    {
        //
        $request->validate(Patient::rules());
        $patient = Patient::find($id);
        $patient->update($request->all());
        return redirect()->route('patients.index')->with('success', 'Patient update successfully');
    }


    public function destroy(Patient $patient)
    {
        //
        $patient->delete();
        return redirect()->route('patients.index')->with('info', 'patient delete successfully');
    }
}
