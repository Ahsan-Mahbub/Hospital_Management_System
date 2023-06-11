<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\ScheduleTime;
use Carbon\Carbon;
use DateTime;

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
        try{
            $schedule = new Schedule();
            $scheduleSave = $schedule->fill($request->all())->save();

            $start = Carbon::parse($request->input('start_time'));
            $end = Carbon::parse($request->input('end_time'));
            $schedule_times = [];
            while ($start < $end) {
                $schedule_times[] = $start->format('H:i');
                $start->addMinutes($request->per_patient_time);
            }

            foreach ($schedule_times as $schedule_data) {
                $set_schedule = new ScheduleTime();
                $set_schedule->schedule_id = $schedule->id;
                $set_schedule->doctor_id = $request->doctor_id;
                $set_schedule->date = $request->date;
                $set_schedule->schedule_time = $schedule_data;
                $set_schedule->save();
            }

            return redirect()->route('schedule.index')->with('message','Schedule Added Successfully');

        }catch(Throwable $e){
            return back()->with('error', $e);
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
        try{
            $schedule_data = Schedule::where('id',$schedule->id)->first();
            if($request->start_time == $schedule_data->start_time && $request->end_time == $schedule_data->end_time && $request->doctor_id == $schedule_data->doctor_id){
                $scheduleUpdate = $schedule->fill($request->all())->save();                
            }else{
                ScheduleTime::where('schedule_id', $schedule->id)->delete();

                $scheduleUpdate = $schedule->fill($request->all())->save();

                $start = Carbon::parse($request->input('start_time'));
                $end = Carbon::parse($request->input('end_time'));
                $schedule_times = [];
                while ($start < $end) {
                    $schedule_times[] = $start->format('H:i');
                    $start->addMinutes($request->per_patient_time);
                }

                foreach ($schedule_times as $data) {
                    $set_schedule = new ScheduleTime();
                    $set_schedule->schedule_id = $schedule->id;
                    $set_schedule->schedule_time = $data;
                    $set_schedule->doctor_id = $schedule->doctor_id;
                    $set_schedule->date = $schedule->date;
                    $set_schedule->save();
                }
            }
            return redirect()->route('schedule.index')->with('message','Schedule Updated Successfully');
        }catch(Throwable $e) {
            return back()->with('error', $e);
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