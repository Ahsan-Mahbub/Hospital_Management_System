@extends('backend.layouts.app')

@section('content')
    <div class="content">
        <section class="section">
            <div class="row">
                <div class="col-sm-4">
                    <div class="block">
                        @if(isset($wardEditedData))
                            <div class="block-header bg-primary-dark">
                                <h3 class="block-title text-white">
                                    <i class="fa fa-pencil"></i> &nbsp;Edit Ward
                                </h3>
                            </div>
                            <form action="{{ route('wards.update', $wardEditedData->id) }}" method="POST" class="p-3">
                                @csrf
                                @method('PUT')
                        @else
                            <div class="block-header bg-primary-dark">
                                <h3 class="block-title text-white">
                                    <i class="fa fa-plus-circle"></i> &nbsp;Add Ward
                                </h3>
                            </div>
                            <form action="{{ route('wards.store') }}" method="POST" class="p-3">
                                @csrf
                        @endif
                            <div class="block">
                                <div class="form-group">
                                    <label class="control-label" for="name">Ward Name<span class="text-danger"> *</span></label>
                                    <input type="text" class="form-control @error('ward_name') is-invalid @enderror" id="ward_name" name="ward_name" value="{{ isset($wardEditedData) ? $wardEditedData->ward_name : old('ward_name') }}" placeholder="Ex: Intensive Care Unit (ICU)" required>
                                    @error('ward_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group ">
                                    <label class="control-label" for="control">Description</label>
                                    <textarea name="description" id="description" class="form-control " cols="30" rows="5">{{ isset($wardEditedData) ? $wardEditedData->description : old('description') }}</textarea>
                                    <span></span>
                                </div>

                                
                                <div class="form-group">
                                    <label class="control-label" for="room_id">Room<span class="text-danger"> *</span></label>
                                    <select class="form-control @error('room_id') is-invalid @enderror" id="room_id" name="room_id" required>
                                        <option value="">--select floor--</option>
                                        @foreach ($rooms as $room)
                                            <option value="{{ $room->id }}" {{$wardEditedData && $wardEditedData->room_id === $room->id ? 'selected' : ''}}>{{ $room->name }}--floor: {{ $room->floor->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('room_id')
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

                {{-- rooms List --}}
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
                                            <th>Room</th>
                                            <th>Ward Name</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($wards as $key=>$ward)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $ward->room->name }}</td>
                                                <td>{{ $ward->ward_name }}</td>
                                                <td>{{ $ward->description }}</td>
                                                <td>
                                                    {{-- Status button component --}}
                                                    <x-status-button :status="$ward->status" :id="$ward->id" :model="'wards'" />
                                                </td>
                                                <td>
                                                    <a href="{{ route('wards.edit', $ward->id) }}" class="btn btn-sm btn-primary">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form action="{{ route('wards.destroy', $ward->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this ward?');">
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