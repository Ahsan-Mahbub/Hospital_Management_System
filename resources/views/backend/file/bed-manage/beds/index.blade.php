@extends('backend.layouts.app')

@section('content')
<div class="content">
    <section class="section">
        <div class="row">
            <div class="col-sm-4">
                <div class="block">
                    @if(isset($bedEditedData))
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-white">
                                <i class="fa fa-pencil"></i> &nbsp;Edit Bed
                            </h3>
                        </div>
                        <form action="{{ route('beds.update', $bedEditedData->id) }}" method="POST" class="p-3">
                            @csrf
                            @method('PUT')
                    @else
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-white">
                                <i class="fa fa-plus-circle"></i> &nbsp;Add Bed
                            </h3>
                        </div>
                        <form action="{{ route('beds.store') }}" method="POST" class="p-3">
                            @csrf
                    @endif
                        <div class="block">
                            <div class="form-group">
                                <label class="control-label" for="name">Name<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ isset($bedEditedData) ? $bedEditedData->name : old('name') }}" placeholder="Ex:301, B-1" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="bed_type_id ">Bed Type<span class="text-danger"> *</span></label>
                                <select class="form-control @error('bed_type_id') is-invalid @enderror" id="bed_type_id" name="bed_type_id" required>
                                    <option value="">--select bed type--</option>
                                    @foreach ($bedTypes as $bedType)
                                        <option value="{{ $bedType->id }}" {{$bedEditedData && $bedEditedData->bed_type_id === $bedType->id ? 'selected' : ''}}>{{ $bedType->name }}</option>
                                    @endforeach
                                </select>
                                @error('bed_type_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="ward_id">Ward<span class="text-danger"> *</span></label>
                                <select class="form-control @error('ward_id') is-invalid @enderror" id="ward_id" name="ward_id" required>
                                    <option value="">--select floor--</option>
                                    @foreach ($wards as $ward)
                                        <option value="{{ $ward->id }}" {{$bedEditedData && $bedEditedData->ward_id === $ward->id ? 'selected' : ''}}>{{ $ward->ward_name }}</option>
                                    @endforeach
                                </select>
                                @error('ward_id')
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
                                        <th>Name</th>
                                        <th>Bed Type</th>
                                        <th>Ward</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($beds as $key=>$bed)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $bed->name }}</td>
                                            <td>{{ $bed->bedType->name }}</td>
                                            <td>{{ $bed->ward->ward_name }}</td>
                                            <td>
                                                {{-- Status button component --}}
                                                <x-status-button :status="$bed->status" :id="$bed->id" :model="'beds'" />
                                            </td>
                                            <td>
                                                <a href="{{ route('beds.edit', $bed->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('beds.destroy', $bed->id) }}" method="POST" class="d-inline">
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