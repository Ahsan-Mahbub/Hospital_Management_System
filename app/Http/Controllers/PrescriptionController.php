<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Models\Patient;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prescriptions = Prescription::orderBy('id','desc')->get();
        return view('backend.file.prescription.list', compact('prescriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = Patient::active()->get();
        return view('backend.file.prescription.create', compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prescription = new Prescription();
        $requested_data = $request->all();
        $save = $prescription->fill($requested_data)->save();
        if($save){
            return redirect()->route('prescription.index')->with('message','Patient Case Study Added Successfully');
        }else{
            return back()->with('error','Patient Case Study Added Failed!!');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prescription = Prescription::findOrFail($id);
        return view('backend.file.prescription.show', compact('prescription'));
    }

    public function status($id)
    {
        $status = Prescription::findOrFail($id);
        if ($status->status == 0) {
            $status->status = 1;
        } else {
            $status->status = 0;
        }
        $status->save();
        return redirect()->back()->with('message','Patient Case Study Status Change Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patients = Patient::active()->get();
        $prescription = Prescription::findOrFail($id);
        return view('backend.file.prescription.edit', compact('prescription','patients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Prescription::findOrFail($id);
        $formData = $request->all();
        $updated = $update->fill($formData)->save();
        if($updated){
            return redirect()->route('prescription.index')->with('message','Patient Case Study Updated Successfully');
        }else{
            return back()->with('error','Patient Case Study Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Prescription::where('id', $id)->firstorfail()->delete();
        return back()->with('message','Patient Case Study Successfully Deleted');
    }
}
