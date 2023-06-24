<?php

namespace App\Http\Controllers;

use App\Models\Ward;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($wardEditedData = null)
    {
        $rooms = Room::active()->get();
        $wards = Ward::get();
        return view('backend.file.bed-manage.wards.index', compact('rooms', 'wards', 'wardEditedData'));
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
        $validatedData = $request->validate([
            'ward_name'    => 'required|unique:wards',
            'room_id'      => 'required|exists:rooms,id',
            'description'  => 'nullable',
        ]);

        Ward::create($validatedData);

        return redirect()->route('wards.index')
            ->with('success', 'Ward created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function show(Ward $ward)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function edit(Ward $ward)
    {
        return $this->index($ward);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ward $ward)
    {
        $validatedData = $request->validate([
            'ward_name'    => [
                'required',
                Rule::unique('wards')->ignore($ward->id),
            ],
            'room_id'      => 'required|exists:rooms,id',
            'description'  => 'nullable',
        ]);

        $ward->update($validatedData);

        return redirect()->route('wards.index')
            ->with('success', 'Ward updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ward  $ward
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ward $ward)
    {
        $ward->delete();

        return redirect()->route('wards.index')
            ->with('success', 'Ward deleted successfully');
    }
}