<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\BedType;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($bedEditedData = null)
    {
        $bedTypes = BedType::active()->get();
        $wards = Ward::active()->get();
        $beds = Bed::get();
        return view('backend.file.bed-manage.beds.index', compact('bedTypes', 'beds', 'wards', 'bedEditedData'));
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
            'name'  => 'required|unique:beds',
            'bed_type_id' => 'required|exists:bed_types,id',
            'ward_id' => 'required|exists:wards,id',
        ]);

        Bed::create($validatedData);

        return redirect()->route('beds.index')
            ->with('success', 'Bed created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function show(Bed $bed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function edit(Bed $bed)
    {
        return $this->index($bed);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bed $bed)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                Rule::unique('beds')->ignore($bed->id),
            ],
            'bed_type_id' => 'required|exists:bed_types,id',
            'ward_id' => 'required|exists:wards,id',
        ]);

        $bed->update($validatedData);

        return redirect()->route('beds.index')
            ->with('success', 'Bed updatyed successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bed  $bed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bed $bed)
    {
        $bed->delete();

        return redirect()->route('beds.index')
            ->with('success', 'Bed deleted successfully');
    }
}