<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_appointment = Appointment::orderBy('id','desc')->get();
        return view('backend.file.appointment.list', compact('all_appointment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $userId   = auth()->user()->user_id;
        $userRole = auth()->user()->role;
        $patients    = Patient::active()->get();
        $departments = Department::active()->get();
        
        if($userRole === 'doctor') {
            $department = Doctor::with('department')->where('id', $userId)->first();
            return view('backend.file.appointment.doctor-appointment-create', compact('department', 'patients'));
        }
        
        return view('backend.file.appointment.create', compact('departments','patients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $appointment = new Appointment();
        $requested_data = $request->all();
        $save = $appointment->fill($requested_data)->save();
        if($save){
            return redirect()->route('appointment.index')->with('message','Appointment Added Successfully');
        }else{
            return back()->with('error','Appointment Added Failed!!');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Appointment::where('id', $id)->firstorfail()->delete();
        return back()->with('message','Appointment Successfully Deleted');
    }
}