@extends('backend.layouts.app')
@section('content')
<div class="content">
	<div class="block block-rounded">
	    <div class="block-header block-header-default">
	        <h3 class="block-title">
	      	  Patient Table
	        </h3>
	        <a href="{{route('patient.create')}}" class="btn btn-alt-primary" ><i class="fa fa-plus mr-5"></i> Add Patient</a>
	    </div>
	    <div class="block-content block-content-full">
		    <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
		        <thead>
		          <tr>
	                <th class="text-center">S/L &nbsp;</th>
	                <th class="text-center">Image &nbsp;</th>
	                <th class="text-center">Patient Name &nbsp;</th>
	                <th class="text-center">Email &nbsp;</th>
	                <th class="text-center">Mobile &nbsp;</th>
	                <th class="text-center">Access &nbsp;</th>
	                <th class="text-center">Action &nbsp;</th>
	            </tr>
		        </thead>
		        <tbody>
		        	@php $sl = 1; @endphp
	                @foreach($all_patient as $patient)
		          	<tr>
			            <td class="text-center">{{$sl++}}</td>
			            <td class="text-center"><img style="width: 50px; height: 50px; border-radius: 50%;" src="{{$patient->image ? '/' . $patient->image :  '/demo.svg'}}"></td>
			            <td class="text-center">{{$patient->patient_name}}</td>
			            <td class="text-center">{{$patient->email}}</td>
			            <td class="text-center">{{$patient->mobile}}</td>
			            <td class="text-center">
			                @if($patient->status == 1)
		            			<span class="badge bg-success">Active</span>
		            		@else
		            			<span class="badge bg-danger">Inactive</span>
		            		@endif
			            </td>
			            <td class="text-center">
			            	<div class="btn-group">
				            	<form action="{{route('patient.destroy',$patient->id)}}" method="post" accept-charset="utf-8">
	                            	<a href="{{route('patient.status',$patient->id)}}" class="btn btn-sm btn-secondary js-bs-tooltip-enabled">
		                                <i class="fa fa-refresh {{$patient->status == 1 ? 'text-success' :'text-danger'}}"></i>
		                            </a>
		                            <a href="{{route('patient.show', $patient->id)}}" class="btn btn-sm btn-secondary js-bs-tooltip-enabled">
		                                <i class="fa fa-eye"></i>
		                            </a>
			                		<a href="{{route('patient.edit', $patient->id)}}" class="btn btn-sm btn-secondary js-bs-tooltip-enabled">
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
@endsection