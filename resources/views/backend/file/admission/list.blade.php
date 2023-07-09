@extends('backend.layouts.app')
@section('content')
<div class="content">
	<div class="block block-rounded">
	    <div class="block-header block-header-default">
	        <h3 class="block-title">
	      	  Patient Admission Table
	        </h3>
	        <a href="{{route('admission.create')}}" class="btn btn-alt-primary" ><i class="fa fa-plus mr-5"></i> Add Patient Admission</a>
	    </div>
	    <div class="block-content block-content-full">
		    <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
		        <thead>
		          <tr>
	                <th class="text-center">S/L &nbsp;</th>
	                <th class="text-center">Patient Name &nbsp;</th>
	                <th class="text-center">Doctor Name &nbsp;</th>
	                <th class="text-center">Date &nbsp;</th>
	                <th class="text-center">Room &nbsp;</th>
	                <th class="text-center">Ward &nbsp;</th>
	                <th class="text-center">Bed &nbsp;</th>
	            </tr>
		        </thead>
		        <tbody>
		        	@php $sl = 1; @endphp
	                @foreach($all_admission as $admission)
		          	<tr>
			            <td class="text-center">{{$sl++}}</td>
			            <td class="text-center">{{$admission->patient ? $admission->patient->patient_name : 'N/A'}}</td>
			            <td class="text-center">{{$admission->doctor ? $admission->doctor->doctor_name : 'N/A'}}</td>
			            <td class="text-center">{{date('d-m-Y', strtotime($admission->admission_date))}}</td>
			            <td class="text-center">{{$admission->room ? $admission->room->name : 'N/A'}}</td>
			            <td class="text-center">{{$admission->ward ? $admission->ward->ward_name : 'N/A'}}</td>
			            <td class="text-center">{{$admission->bed ? $admission->bed->name : 'N/A'}}</td>
		          	@endforeach
		        </tbody>
		    </table>
	    </div>
	</div>
</div>
@endsection