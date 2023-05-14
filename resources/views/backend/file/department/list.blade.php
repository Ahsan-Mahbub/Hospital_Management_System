@extends('backend.layouts.app')
@section('content')
<div class="content">
	<div class="block block-rounded">
	    <div class="block-header block-header-default">
	        <h3 class="block-title">
	      	  Department Table
	        </h3>
	        <button type="button" class="btn btn-alt-primary" data-bs-toggle="modal" data-bs-target="#add_modal"><i class="fa fa-plus mr-5"></i> Add Department</button>
	    </div>
	    <div class="block-content block-content-full">
		    <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
		        <thead>
		          <tr>
	                <th class="text-center">S/L &nbsp;</th>
	                <th class="text-center">Department Name &nbsp;</th>
	                <th class="text-center">Details &nbsp;</th>
	                <th class="text-center">Access &nbsp;</th>
	                <th class="text-center">Action &nbsp;</th>
	            </tr>
		        </thead>
		        <tbody>
		        	@php $sl = 1; @endphp
	                @foreach($all_department as $department)
		          	<tr>
			            <td class="text-center">{{$sl++}}</td>
			            <td class="text-center">{{$department->department_name}}</td>
			            <td class="text-center">{{$department->details}}</td>
			            <td class="text-center">
			                @if($department->status == 1)
		            			<span class="badge bg-success">Active</span>
		            		@else
		            			<span class="badge bg-danger">Inactive</span>
		            		@endif
			            </td>
			            <td class="text-center">
			            	<div class="btn-group">
				            	<form action="{{route('department.destroy',$department->id)}}" method="post" accept-charset="utf-8">
	                            	<a href="{{route('department.status',$department->id)}}" class="btn btn-sm btn-secondary js-bs-tooltip-enabled">
		                                <i class="fa fa-refresh {{$department->status == 1 ? 'text-success' :'text-danger'}}"></i>
		                            </a>

			                		<a data-bs-toggle="modal" data-bs-target="#edit_modal" id="editdepartment" data="{{$department->id}}" class="btn btn-sm btn-secondary js-bs-tooltip-enabled">
		                                <i class="fa fa-edit"></i>
		                            </a>
	                                @csrf
	                                @method('delete')
	    	                    	<button type="submit" class="btn btn-sm btn-secondary js-bs-tooltip-enabled delete-confirm">
		                                <i class="fa fa-times"></i>
		                            </button>
		                        </form>
                            </div>
		                </td>
		          	</tr>
		          	@endforeach
		        </tbody>
		    </table>
	    </div>
	</div>
</div>

<!-- Add Modal -->
<div class="modal" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="modal-large" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      	<div class="modal-content">
	        <div class="block block-rounded shadow-none mb-0">
	          	<div class="block-header block-header-default">
		            <h3 class="block-title">Add Department</h3>
		            <div class="block-options">
		              <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
		                <i class="fa fa-times"></i>
		              </button>
		            </div>
	          	</div>
	          	<div class="block-content fs-sm">
	        		<form action="{{route('department.store')}}" method="post" enctype="multipart/form-data">
	                	@csrf
	                	<div class="form-group row pb-2">
                        	<label class="col-12 pb-2">Department Name <span class="text-danger">*</span></label>
                        	<div class="col-lg-12">
                                <input type='text' class="form-control" required name="department_name" placeholder="Department Name">
                            </div>
	                    </div>
	                    <div class="form-group row pb-2">
                        	<label class="col-12 pb-2">Department Details</label>
                        	<div class="col-lg-12">
                                <textarea class="form-control" name="details" placeholder="Details"></textarea>
                            </div>
	                    </div>
	                    <div class="form-group text-center mt-4 mb-4">
	                        <button type="submit" class="btn btn-square btn-primary min-width-125">Submit</button>
	                    </div>
	                </form>
	          	</div>
	        </div>
      	</div>
    </div>
</div>
<!-- END Add Modal -->

<!-- Edit Modal -->
<div class="modal" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="modal-large" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      	<div class="modal-content">
	        <div class="block block-rounded shadow-none mb-0">
	          	<div class="block-header block-header-default">
		            <h3 class="block-title">Update Department</h3>
		            <div class="block-options">
		              <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
		                <i class="fa fa-times"></i>
		              </button>
		            </div>
	          	</div>
	          	<div class="block-content fs-sm">
	        		<form action="{{route('department.update')}}" method="post" enctype="multipart/form-data">
	                	@csrf
	                	<input type="hidden" name="id" id="department_id">
	                	<div class="form-group row pb-2">
                        	<label class="col-12 pb-2">Department Name <span class="text-danger">*</span></label>
                        	<div class="col-lg-12">
                                <input type='text' class="form-control" required name="department_name" id="department_name" placeholder="Department Name">
                            </div>
	                    </div>
	                    <div class="form-group row pb-2">
                        	<label class="col-12 pb-2">Department Details </label>
                        	<div class="col-lg-12">
                                <textarea class="form-control" name="details" id="details" placeholder="Details"></textarea>
                            </div>
	                    </div>
	                    <div class="form-group text-center mt-4 mb-4">
	                        <button type="submit" class="btn btn-square btn-primary min-width-125">Update</button>
	                    </div>
	                </form>
	          	</div>
	        </div>
      	</div>
    </div>
</div>
<!-- END Edit Modal -->

@endsection
@section('script')
<script type="text/javascript">
	$(document).on("click", "#editdepartment", function () {
        let id = $(this).attr("data");
        $.ajax({
            url: "/admin/department/edit/"+id,
            type: "get",
            dataType: "json",
            success: function (response) {
                $("#department_id").val(response.id);
                $("#department_name").val(response.department_name);
                $("#details").val(response.details);
            }
        })
    }) 
</script>
@endsection