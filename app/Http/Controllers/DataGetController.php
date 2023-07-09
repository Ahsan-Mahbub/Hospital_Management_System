<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\ScheduleTime;
use App\Models\Ward;
use App\Models\Bed;

class DataGetController extends Controller
{
    public function getDoctor($id)
    {
        $doctors = Doctor::where('department_id', $id)->active()->get();
        return response()->json($doctors, 200);
    }

    public function getDoctorSchedule($id)
    {
        $today = date('Y-m-d');
        $schedules = Schedule::where('doctor_id', $id)->active()->whereDate('date', '>=', $today)->get();
        return response()->json($schedules, 200);
    }

    public function getDoctorDateSchedule($id, $date)
    {
        $schedule_time = ScheduleTime::where('doctor_id', $id)->where('date',$date)->get();
        return response()->json($schedule_time, 200);
    }

    public function getWard($id)
    {
        $ward = Ward::where('room_id', $id)->get();
        return response()->json($ward, 200);
    }

    public function getBed($id)
    {
        $bad = Bed::where('ward_id', $id)->get();
        return response()->json($bad, 200);
    }
}
