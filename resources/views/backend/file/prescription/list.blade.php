@extends('backend.layouts.app')
@section('content')
<div class="content">
	<div class="block block-rounded">
	    <div class="block-header block-header-default">
	        <h3 class="block-title">
	      	  Patient Case Study Table
	        </h3>
	        <a href="{{route('prescription.create')}}" class="btn btn-alt-primary" ><i class="fa fa-plus mr-5"></i> Add Patient Case Study</a>
	    </div>
	    <div class="block-content block-content-full">
		    <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
		        <thead>
		          <tr>
	                <th class="text-center">S/L &nbsp;</th>
	                <th class="text-center">Patient Name &nbsp;</th>
	                <th class="text-center">Food Alergies &nbsp;</th>
	                <th class="text-center">Tendency Bleed &nbsp;</th>
	                <th class="text-center">Heart Disease &nbsp;</th>
	                <th class="text-center">High Blood Pressure &nbsp;</th>
	                <th class="text-center">Others &nbsp;</th>
	                <th class="text-center">Status &nbsp;</th>
	                <th class="text-center">Action &nbsp;</th>
	            </tr>
		        </thead>
		        <tbody>
		        	@php $sl = 1; @endphp
	                @foreach($prescriptions as $prescription)
		          	<tr>
			            <td class="text-center">{{$sl++}}</td>
			            <td class="text-center">{{$prescription->patient ? $prescription->patient->patient_name : 'N/A'}}</td>
			            <td class="text-center">{{$prescription->food_allergies}}</td>
			            <td class="text-center">{{$prescription->trendency_bleed}}</td>
			            <td class="text-center">{{$prescription->heart_disease}}</td>
			            <td class="text-center">{{$prescription->blood_presure}}</td>
			            <td class="text-center">{{$prescription->others}}</td>
			            <td class="text-center">
			                @if($prescription->status == 1)
		            			<span class="badge bg-success">Active</span>
		            		@else
		            			<span class="badge bg-danger">Inactive</span>
		            		@endif
			            </td>
			            <td class="text-center" width="15%">
			            	<div class="btn-group">
				            	<form action="{{route('prescription.destroy',$prescription->id)}}" method="post" accept-charset="utf-8">
	                            	<a href="{{route('prescription.status',$prescription->id)}}" class="btn btn-sm btn-secondary js-bs-tooltip-enabled">
		                                <i class="fa fa-refresh {{$prescription->status == 1 ? 'text-success' :'text-danger'}}"></i>
		                            </a>
		                            <a href="{{route('prescription.show', $prescription->id)}}" class="btn btn-sm btn-secondary js-bs-tooltip-enabled">
		                                <i class="fa fa-eye"></i>
		                            </a>
			                		<a href="{{route('prescription.edit', $prescription->id)}}" class="btn btn-sm btn-secondary js-bs-tooltip-enabled">
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