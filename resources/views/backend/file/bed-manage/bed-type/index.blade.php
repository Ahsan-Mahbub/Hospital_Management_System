@extends('backend.layouts.app')

@section('content')
<div class="content">
    <section class="section">
        <div class="row">
            <div class="col-sm-4">
                <div class="block">
                    @if(isset($bedTypeEditedData))
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-white">
                                <i class="fa fa-pencil"></i> &nbsp;Edit Bed Type
                            </h3>
                        </div>
                        <form action="{{ route('bed-types.update', $bedTypeEditedData->id) }}" method="POST" class="p-3">
                            @csrf
                            @method('PUT')
                    @else
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-white">
                                <i class="fa fa-plus-circle"></i> &nbsp;Add Bed Type
                            </h3>
                        </div>
                        <form action="{{ route('bed-types.store') }}" method="POST" class="p-3">
                            @csrf
                    @endif
                        <div class="block">
                            <div class="form-group">
                                <label class="control-label" for="name">Name<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ isset($bedTypeEditedData) ? $bedTypeEditedData->name : old('name') }}" placeholder="Ex:Standard, VIP" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="bed_price">Bed Charge<span class="text-danger"> *</span></label>
                                <input type="number" class="form-control @error('bed_price') is-invalid @enderror" id="bed_price" name="bed_price" value="{{ isset($bedTypeEditedData) ? $bedTypeEditedData->bed_price : old('bed_price') }}" placeholder="Ex: 5,000" required>
                                @error('bed_price')
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
                                        <th>Bed Charge</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bedTypes as $key=>$bedType)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $bedType->name }}</td>
                                            <td>{{ $bedType->bed_price }}</td>
                                            <td>
                                                {{-- Status button component --}}
                                                <x-status-button :status="$bedType->status" :id="$bedType->id" :model="'bed_types'" />
                                            </td>
                                            <td>
                                                <a href="{{ route('bed-types.edit', $bedType->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('bed-types.destroy', $bedType->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this bed type?');">
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