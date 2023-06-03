@extends('backend.layouts.app')
@section('content')
<div class="content">
	<div class="block block-rounded">
	    <div class="block-header block-header-default">
	        <h3 class="block-title">
	      	  Patient Documents Table
	        </h3>
	        <button type="button" class="btn btn-alt-primary" data-bs-toggle="modal" data-bs-target="#add_modal"><i class="fa fa-plus mr-5"></i> Add Patient Documents</button>
	    </div>
	    <div class="block-content block-content-full">
		    <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
		        <thead>
		          <tr>
	                <th class="text-center">S/L &nbsp;</th>
	                <th class="text-center">Patient Name &nbsp;</th>
	                <th class="text-center">Doctor Name &nbsp;</th>
	                <th class="text-center">Details &nbsp;</th>
	                <th class="text-center">Action &nbsp;</th>
	            </tr>
		        </thead>
		        <tbody>
		        	@php $sl = 1; @endphp
	                @foreach($all_documents as $documents)
		          	<tr>
			            <td class="text-center">{{$sl++}}</td>
			            <td class="text-center">{{$documents->patient ? $documents->patient->patient_name : 'N/A'}}
			            	<br>
			            	{{$documents->patient ? $documents->patient->phone : ''}}
			            </td>
			            <td class="text-center">{{$documents->doctor ? $documents->doctor->doctor_name : 'N/A'}}
			            	<br>
			            	{{$documents->doctor ? $documents->doctor->phone : ''}}
			            </td>
			            <td class="text-center">{!! $documents->details !!}</td>
			            <td class="text-center">
			            	<div class="btn-group">
				            	<form action="{{route('documents.destroy',$documents->id)}}" method="post" accept-charset="utf-8">
				            		<a href="/{{$documents->file}}" class="btn btn-sm btn-secondary">
		                                <i class="fa fa-download"></i>
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
		            <h3 class="block-title">Add Patient Documents</h3>
		            <div class="block-options">
		              <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
		                <i class="fa fa-times"></i>
		              </button>
		            </div>
	          	</div>
	          	<div class="block-content fs-sm">
	        		<form action="{{route('documents.store')}}" method="post" enctype="multipart/form-data">
	                	@csrf
	                	<div class="form-group row pb-2">
                        	<label class="col-12 pb-2">Patient Name <span class="text-danger">*</span></label>
                        	<div class="col-lg-12">
                                <select class="form-select" id="example-select" name="patient_id">
			                        <option value="">Select One</option>
			                        @foreach($patients as $patient)
			                        <option value="{{$patient->id}}">{{$patient->patient_name}}</option>
			                        @endforeach
			                    </select>
                            </div>
	                    </div>
	                    <div class="form-group row pb-2">
                        	<label class="col-12 pb-2">Patient File <span class="text-danger">*</span></label>
                        	<div class="col-lg-12">
                                <input type='file' class="form-control" required name="file">
                            </div>
	                    </div>
	                    <div class="form-group row pb-2">
                        	<label class="col-12 pb-2">Doctor Name <span class="text-danger">*</span></label>
                        	<div class="col-lg-12">
                                <select class="form-select" id="example-select" name="doctor_id">
			                        <option value="">Select One</option>
			                        @foreach($doctors as $doctor)
			                        <option value="{{$doctor->id}}">{{$doctor->doctor_name}}</option>
			                        @endforeach
			                    </select>
                            </div>
	                    </div>
	                    <div class="form-group row pb-2">
                        	<label class="col-12 pb-2">Documents Details</label>
                        	<div class="col-lg-12">
                                <textarea class="form-control editor" name="details" placeholder="Details"></textarea>
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
@endsection