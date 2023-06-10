@extends('backend.layouts.app')
@section('content')
<div class="content">
	<div class="block block-rounded">
	    <div class="block-header block-header-default">
	        <h3 class="block-title">
	      	  Schedule Table
	        </h3>
	        <a href="{{route('schedule.create')}}" class="btn btn-alt-primary" ><i class="fa fa-plus mr-5"></i> Add Schedule</a>
	    </div>
	    <div class="block-content block-content-full">
		    <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
		        <thead>
		          <tr>
	                <th class="text-center">S/L &nbsp;</th>
	                <th class="text-center">Doctor Name &nbsp;</th>
	                <th class="text-center">Department Name &nbsp;</th>
	                <th class="text-center">Date / Day &nbsp;</th>
	                <th class="text-center">Start Time &nbsp;</th>
	                <th class="text-center">End Time &nbsp;</th>
	                <th class="text-center">Per Patient Time &nbsp;</th>
	                <th class="text-center">Status &nbsp;</th>
	                <th class="text-center">Action &nbsp;</th>
	            </tr>
		        </thead>
		        <tbody>
		        	@php $sl = 1; @endphp
	                @foreach($schedules as $schedule)
		          	<tr>
			            <td class="text-center">{{$sl++}}</td>
			            <td class="text-center">{{$schedule->doctor->doctor_name}}</td>
			            <td class="text-center">{{$schedule->doctor->department->department_name}}</td>
			            <td class="text-center">{{$schedule->date}} <br> {{$schedule->available_day}}</td>
			            <td class="text-center">{{$schedule->start_time}}</td>
			            <td class="text-center">{{$schedule->end_time}}</td>
			            <td class="text-center">{{$schedule->per_patient_time}}</td>
			            <td class="text-center">
			                @if($schedule->status == 1)
		            			<span class="badge bg-success">Active</span>
		            		@else
		            			<span class="badge bg-danger">Inactive</span>
		            		@endif
			            </td>
			            <td class="text-center" width="15%">
			            	<div class="btn-group">
				            	<form action="{{route('schedule.destroy',$schedule->id)}}" method="post" accept-charset="utf-8">
	                            	<a href="{{route('schedule.status',$schedule->id)}}" class="btn btn-sm btn-secondary js-bs-tooltip-enabled">
		                                <i class="fa fa-refresh {{$schedule->status == 1 ? 'text-success' :'text-danger'}}"></i>
		                            </a>
			                		<a href="{{route('schedule.edit', $schedule->id)}}" class="btn btn-sm btn-secondary js-bs-tooltip-enabled">
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