<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Str;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_doctor = Doctor::orderBy('doctor_name','asc')->get();
        return view('backend.file.doctor.list', compact('all_doctor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::active()->get();
        return view('backend.file.doctor.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $doctor = new Doctor();
            $requested_data = $request->all();
            $doctor->password = Hash::make($request->password);
            if ($request->hasFile('image')) {
                $extension = $request->file('image')->getClientOriginalExtension();
                $name = 'image' . Str::random(5) . '.' . $extension;
                $path = "backend/assets/images/doctor/";
                $request->file('image')->move($path, $name);
                $requested_data['image'] = $path . $name;
            }
            $save = $doctor->fill($requested_data)->save();
            $doctor_data = [
                'name'    => $request->doctor_name,
                'email'   => $request->email,
                'password'=> Hash::make($request->password),
                'role'    => 'doctor',
                'user_id' => $doctor->id
            ];
            User::insert($doctor_data);
            return redirect()->route('doctor.index')->with('message','Doctor Added Successfully');

        } catch (Throwable $e) {
            return back()->with('error', $e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('backend.file.doctor.show', compact('doctor'));
    }

    public function status($id)
    {
        $status = Doctor::findOrFail($id);
        if ($status->status == 0) {
            $status->status = 1;
        } else {
            $status->status = 0;
        }
        $status->save();
        return redirect()->back()->with('message','Doctor Status Change Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments = Department::active()->get();
        $doctor = Doctor::findOrFail($id);
        return view('backend.file.doctor.edit', compact('doctor','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $update = Doctor::findOrFail($id);
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
                $path = "backend/assets/images/doctor/";
                $request->file('image')->move($path, $name);
                $formData['image'] = $path . $name;
            }
            $updated = $update->fill($formData)->save();

            $doctor_data = [
                'name'    => $request->doctor_name,
                'email'   => $request->email,
                'password'=> Hash::make($request->password),
            ];
            User::where('user_id', $id)->where('role','doctor')->update($doctor_data);

            return redirect()->route('doctor.index')->with('message','Doctor Updated Successfully');
        }catch(Throwable $e){
            return back()->with('error', $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Doctor::where('id', $id)->firstorfail()->delete();
        return back()->with('message','Doctor Successfully Deleted');
    }
}
