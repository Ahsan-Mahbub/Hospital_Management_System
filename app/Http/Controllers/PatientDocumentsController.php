<?php

namespace App\Http\Controllers;

use App\Models\PatientDocuments;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Str;

class PatientDocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::get();
        $doctors = Doctor::get();
        $all_documents = PatientDocuments::orderBy('id','desc')->get();
        return view('backend.file.documents.list', compact('all_documents','patients','doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $documents = new PatientDocuments();
        $requested_data = $request->all();
        if ($request->hasFile('file')) {
            $extension = $request->file('file')->getClientOriginalExtension();
            $name = 'file' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/files/patient-documents/";
            $request->file('file')->move($path, $name);
            $requested_data['file'] = $path . $name;
        }
        $save = $documents->fill($requested_data)->save();
        if($save){
            return redirect()->route('documents.index')->with('message','Patient Documents Added Successfully');
        }else{
            return back()->with('error','Patient Documents Added Failed!!');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PatientDocuments  $patientDocuments
     * @return \Illuminate\Http\Response
     */
    public function show(PatientDocuments $patientDocuments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PatientDocuments  $patientDocuments
     * @return \Illuminate\Http\Response
     */
    public function edit(PatientDocuments $patientDocuments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PatientDocuments  $patientDocuments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PatientDocuments $patientDocuments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PatientDocuments  $patientDocuments
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientDocuments $patientDocuments)
    {
        //
    }
}
