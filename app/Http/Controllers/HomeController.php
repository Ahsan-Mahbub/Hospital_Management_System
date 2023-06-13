<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        if(Auth::user()->role === 'admin')
        {
            return view('backend.layouts.dashboard');
        }elseif(Auth::user()->role === 'doctor'){
            return view('backend.layouts.doctor-dashboard');
        }
    }
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminDashbord()
    {
        return view('backend.layouts.dashboard');
    }

     /**
     * Show the doctor dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function doctorDashbord()
    {
        return view('backend.layouts.doctor-dashboard');
    }

    public function store(Request $request){
        
       if ($request->password) {
            $data = [
                'name'   => $request->name,
                'password'=> Hash::make($request->password),
            ];
        } else {
            $data = [
                'name'   => $request->name,
                'password' => Auth::user()->password,
            ];
        }
        
        User::where('id', Auth::user()->id)->update($data);
        return back()->with('message','Profile Update Successfully');
    }

    public function changeMode()
    {
        $id = Auth::user()->id;
        $mode = User::findOrFail($id);
        if ($mode->darkmode == 0) {
            $mode->darkmode = 1;
        } else {
            $mode->darkmode = 0;
        }
        $mode->save();

        return redirect()->back();
    }
}