@extends('backend.layouts.app')
@section('content')
<div class="content">
	<div class="block block-rounded">
	    <div class="block-header block-header-default">
	        <h3 class="block-title">
	      	  Appointment Table
	        </h3>
	        <a href="{{route('appointment.create')}}" class="btn btn-alt-primary" ><i class="fa fa-plus mr-5"></i> Add Appointment</a>
	    </div>
	    <div class="block-content block-content-full">
		    <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
		        <thead>
		          <tr>
	                <th class="text-center">S/L &nbsp;</th>
	                <th class="text-center">Patient Name &nbsp;</th>
	                <th class="text-center">Department &nbsp;</th>
	                <th class="text-center">Doctor Name &nbsp;</th>
	                <th class="text-center">Time &nbsp;</th>
	                <th class="text-center">Action &nbsp;</th>
	            </tr>
		        </thead>
		        <tbody>
		        	@php $sl = 1; @endphp
	                @foreach($all_appointment as $appointment)
		          	<tr>
			            <td class="text-center">{{$sl++}}</td>
			            <td class="text-center">{{$appointment->patient ? $appointment->patient->patient_name : 'N/A'}}</td>
			            <td class="text-center">{{$appointment->department ? $appointment->department->department_name : 'N/A'}}</td>
			            <td class="text-center">{{$appointment->doctor ? $appointment->doctor->doctor_name : 'N/A'}}</td>
			            <td class="text-center">{{date('d-m-Y', strtotime($appointment->date))}} ( {{$appointment->schedule_time ? $appointment->schedule_time->schedule_time : 'N/A'}} )</td>
			            <td class="text-center" width="15%">
			            	<div class="btn-group">
				            	<form action="{{route('appointment.destroy',$appointment->id)}}" method="post" accept-charset="utf-8">
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