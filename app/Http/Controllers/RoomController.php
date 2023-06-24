<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Floor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($roomEditedData = null)
    {   
        $rooms  = Room::all();
        $floors = Floor::active()->get();
        return view('backend.file.bed-manage.rooms.index', compact('floors'
        , 'rooms', 'roomEditedData'));
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
            'floor_id'    => 'required|exists:floors,id',
            'name'        => 'required|unique:rooms',
            'bed_capacity' => 'required|numeric|min:1',
            'description' => 'nullable',
        ]);

        Room::create($validatedData);

        return redirect()->route('rooms.index')
            ->with('success', 'Room created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return $this->index($room);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $validatedData = $request->validate([
            'floor_id'    => 'required|exists:floors,id',
            'name'        => [
                'required|unique:rooms',
                Rule::unique('rooms')->ignore($room->id),
            ],
            'bed_capacity' => 'required|numeric|min:1',
            'description' => 'nullable',
        ]);

        $room->update($validatedData);

        return redirect()->route('rooms.index')
            ->with('success', 'Room updated successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('rooms.index')
            ->with('success', 'Room deleted successfully');
    }
}