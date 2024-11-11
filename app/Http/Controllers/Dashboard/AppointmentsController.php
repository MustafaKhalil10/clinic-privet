<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    public function index()
    {
        //
        $request = request();
        $query = Appointment::query();
        $patient_name = $request->query('patient_name');
        $id = $request->query('id');
        // if ($patient_name) {
        //     $query->where('patient.name', 'LIKE', "%{$patient_name}%");
        // }
        if ($id) {
            $query->where('id', '=', $id);
        }
        $appointments = $query->paginate();
        return view('dashboard.appointments.index', ['appointments' => $appointments]);
    }

    public function edit($id)
    {
        //
        $appointment = Appointment::find($id);
        return view('dashboard.appointments.create_edit', ['$appointment' => $appointment]);
    }


    public function update(Request $request, $id)
    {
        //
        $request->validate(['status'=>'in:certain, canceled, panding']);
        Appointment::where('id', '=', $id)
            ->update([
                'status' => $request->post('status'),
            ]);
        return redirect()->route('appointments.index')->with('success', 'Appointment update successfully');
    }
}
