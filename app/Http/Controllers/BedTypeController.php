<?php

namespace App\Http\Controllers;

use App\Models\BedType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BedTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($bedTypeEditedData = null)
    {
        $bedTypes = BedType::all();
        return view('backend.file.bed-manage.bed-type.index', compact('bedTypes', 'bedTypeEditedData'));
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
            'name'    => 'required|unique:bed_types',
            'bed_price' => 'required|numeric',
        ]);

        BedType::create($validatedData);

        return redirect()->route('bed-types.index')
            ->with('success', 'Bed Type created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BedType  $bedType
     * @return \Illuminate\Http\Response
     */
    public function show(BedType $bedType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BedType  $bedType
     * @return \Illuminate\Http\Response
     */
    public function edit(BedType $bedType)
    {
        return $this->index($bedType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BedType  $bedType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BedType $bedType)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                Rule::unique('bed_types')->ignore($bedType->id),
            ],
            'bed_price' => 'required|numeric',
        ]);

       $bedType->update($validatedData);

        return redirect()->route('bed-types.index')
            ->with('success', 'Bed Type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BedType  $bedType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BedType $bedType)
    {
        $bedType->delete();

        return redirect()->route('bed-types.index')
            ->with('success', 'Bed type deleted successfully');
    }
}