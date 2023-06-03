<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\Doctor;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::with('doctor')->get();
        return view('backend.file.schedule.list', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $doctors = Doctor::active()->get();
        return view('backend.file.schedule.create', compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $schedule = new Schedule();
        $scheduleSave = $schedule->fill($request->all())->save();
        
        if($scheduleSave){
            return redirect()->route('schedule.index')->with('message','Schedule Added Successfully');
        }else{
            return back()->with('error','Schedule Added Failed!!');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        $doctors = Doctor::active()->get();
        return view('backend.file.schedule.edit', compact('schedule', 'doctors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        $scheduleUpdate = $schedule->fill($request->all())->save();
        if($scheduleUpdate){
            return redirect()->route('schedule.index')->with('message','Schedule Updated Successfully');
        }else{
            return back()->with('error','Schedule Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $delete = $schedule->delete();
        return back()->with('message','Doctor Successfully Deleted');
    }

    public function status($id)
    {
        $status = Schedule::findOrFail($id);
        if ($status->status == 0) {
            $status->status = 1;
        } else {
            $status->status = 0;
        }
        $status->save();
        return redirect()->back()->with('message','Schedule Status Change Successfully');
    }
}