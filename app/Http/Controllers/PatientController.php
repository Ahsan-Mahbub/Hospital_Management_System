<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Str;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_patient = Patient::orderBy('id','desc')->get();
        return view('backend.file.patient.list', compact('all_patient'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.file.patient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $patient = new Patient();
            $requested_data = $request->all();
            $patient->password = Hash::make($request->password);
            if ($request->hasFile('image')) {
                $extension = $request->file('image')->getClientOriginalExtension();
                $name = 'image' . Str::random(5) . '.' . $extension;
                $path = "backend/assets/images/patient/";
                $request->file('image')->move($path, $name);
                $requested_data['image'] = $path . $name;
            }
            $save = $patient->fill($requested_data)->save();
            $patient_data = [
                'name'    => $request->patient_name,
                'email'   => $request->email,
                'password'=> Hash::make($request->password),
                'role'    => 'patient',
                'user_id' => $patient->id
            ];
            User::insert($patient_data);
            return redirect()->route('patient.index')->with('message','Patient Added Successfully');
        } catch (Throwable $e) {
            return back()->with('error', $e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        return view('backend.file.patient.show', compact('patient'));
    }

    public function status($id)
    {
        $status = Patient::findOrFail($id);
        if ($status->status == 0) {
            $status->status = 1;
        } else {
            $status->status = 0;
        }
        $status->save();
        return redirect()->back()->with('message','Patient Status Change Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('backend.file.patient.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $update = Patient::findOrFail($id);
            if($request->password){
                $update->password = Hash::make($request->password);
            }
            $formData = $request->all();
            if ($request->hasFile('image')) {
                if (File::exists($update->image)) {
                    File::delete($update->image);
                }
                $extension = $request->file('image')->getClientOriginalExtension();
                $name = 'image' . Str::random(5) . '.' . $extension;
                $path = "backend/assets/images/patient/";
                $request->file('image')->move($path, $name);
                $formData['image'] = $path . $name;
            }
            $updated = $update->fill($formData)->save();

            $patient_data = [
                'name'    => $request->patient_name,
                'email'   => $request->email,
                'password'=> Hash::make($request->password),
            ];
            User::where('user_id', $id)->where('role','patient')->update($patient_data);

            return redirect()->route('patient.index')->with('message','Patient Updated Successfully');

        }catch(Throwable $e){
            return back()->with('error', $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Patient::where('id', $id)->firstorfail()->delete();
        return back()->with('message','Patient Successfully Deleted');
    }
}
