@extends('backend.layouts.app')

@section('content')
<div class="content">
    <section class="section">
        <div class="row">
            <div class="col-sm-4">
                <div class="block">
                    @if(isset($roomEditedData))
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-white">
                                <i class="fa fa-pencil"></i> &nbsp;Edit Room
                            </h3>
                        </div>
                        <form action="{{ route('rooms.update', $roomEditedData->id) }}" method="POST" class="p-3">
                            @csrf
                            @method('PUT')
                    @else
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-white">
                                <i class="fa fa-plus-circle"></i> &nbsp;Add Room
                            </h3>
                        </div>
                        <form action="{{ route('rooms.store') }}" method="POST" class="p-3">
                            @csrf
                    @endif
                        <div class="block">
                            <div class="form-group">
                                <label class="control-label" for="name">Room Name<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ isset($roomEditedData) ? $roomEditedData->name : old('name') }}" placeholder="Ex:301, B-1" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="bed_capacity">Bed Capacity<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control @error('bed_capacity') is-invalid @enderror" id="bed_capacity" name="bed_capacity" value="{{ isset($roomEditedData) ? $roomEditedData->bed_capacity : old('bed_capacity') }}" required>
                                @error('bed_capacity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group ">
                                <label class="control-label" for="control">Description</label>
                                <textarea name="description" id="description" class="form-control " cols="30" rows="5">{{ isset($roomEditedData) ? $roomEditedData->description : old('description') }}</textarea>
                                <span></span>
                            </div>

                            
                            <div class="form-group">
                                <label class="control-label" for="floor_id  ">Floor<span class="text-danger"> *</span></label>
                                <select class="form-control @error('name') is-invalid @enderror" id="floor_id" name="floor_id" required>
                                    <option value="">--select floor--</option>
                                    @foreach ($floors as $floor)
                                        <option value="{{ $floor->id }}" {{$roomEditedData && $roomEditedData->floor_id === $floor->id ? 'selected' : ''}}>{{ $floor->name }}</option>
                                    @endforeach
                                </select>
                                @error('floor_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group"> 
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="fa fa-check opacity-50 me-1"></i> Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Floors List --}}
            <div class="col-sm-8">
                <div class="block">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title text-white">
                            <i class="fa fa-list-alt"></i> &nbsp;List
                        </h3>
                    </div>
                    <div class="pt-4 p-2">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-vcenter ">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Floor</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Bed Capacity</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rooms as $key=>$room)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $room->floor->name }}</td>
                                            <td>{{ $room->name }}</td>
                                            <td>{{ $room->description }}</td>
                                            <td>{{ $room->bed_capacity }}</td>
                                            <td>
                                                {{-- Status button component --}}
                                                <x-status-button :status="$room->status" :id="$room->id" :model="'rooms'" />
                                            </td>
                                            <td>
                                                <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this room?');">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection