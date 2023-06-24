@extends('backend.layouts.app')

@section('content')
<div class="content">
    <section class="section">
        <div class="row">
            <div class="col-sm-4">
                <div class="block">
                    @if(isset($floor))
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-white">
                                <i class="fa fa-plus-circle"></i> &nbsp;Add Floor
                            </h3>
                        </div>
                        <form action="{{ route('floors.update', $floor->id) }}" method="POST" class="p-3">
                            @csrf
                            @method('PUT')
                    @else
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title text-white">
                                <i class="fa fa-plus-circle"></i> &nbsp;Add Floor
                            </h3>
                        </div>
                        <form action="{{ route('floors.store') }}" method="POST" class="p-3">
                            @csrf
                    @endif
                        <div class="block">
                            <div class="form-group">
                                <label class="control-label" for="name">Name<span class="text-danger"> *</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ isset($floor) ? $floor->name : old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group ">
                                <label class="control-label" for="control">Description</label>
                                <textarea name="description" id="description" class="form-control " cols="30" rows="5">{{ isset($floor) ? $floor->description : old('description') }}</textarea>
                                <span></span>
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
                            <i class="fa fa-plus-circle"></i> &nbsp;List
                        </h3>
                    </div>
                    <div class="pt-4 p-2">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-vcenter ">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($floors as $key=>$floor)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $floor->name }}</td>
                                            <td>{{ $floor->description }}</td>
                                            <td>
                                                {{-- Status button component --}}
                                                <x-status-button :status="$floor->status" :id="$floor->id" :model="'floors'" />
                                            </td>
                                            <td>
                                                <a href="{{ route('floors.edit', $floor->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('floors.destroy', $floor->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this floor?');">
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

@section('script')

<script type="text/javascript">
    $('#toggleButton').change(function() {
        var status  = $(this).prop('checked') ? 1 : 0;
        var floorId = $(this).data('id');
        var table   = $(this).data('model');
        $.ajax({
            url: '{{ route('toggleStatus') }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                status: status,
                id: floorId,
                model: table
            },
            success: function(response) {
                if(response.success) {
                    toastr.success('Status updated successfully');
                    updateToggleButtonColor(status);
                }
            },
            error: function (xhr, status, error) {
                // Handle error response
                if(status === 'error') {
                    toastr.error(xhr.responseJSON.error);
                }
            }
        });
    });

    function updateToggleButtonColor(status) {
        var slider = $('.slider');
        
        if (status == 1) {
            $('.status-text').text('Active');
            slider.css('background-color', '#078107'); // Green color
        } else {
            $('.status-text').text('Inactive')
            slider.css('background-color', '#ff0000'); // Red color
        }
    }
 </script>
@endsection