@extends('backend.layouts.app')
@section('content')
<style type="text/css">
  p{
    margin-bottom: 0px!important;
  }
  .profile-image{
    height: 200px;
    border-radius: 50%;
    width: 200px;
    object-fit: cover;
  }
</style>
<div class="content">
  <div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">{{$appointment->patient ? $appointment->patient->patient_name : 'Not Set'}} - Appointment Details</h3>
    </div>
    <div class="block-content">
      <div class="row">
      		<div class="col-md-4">
      			Serial No : #{{$appointment->id}}
      		</div>
      		<div class="col-md-4">
      			Appointment Date : {{$appointment->date}}
      		</div>
      		<div class="col-md-4">
      			Schedule Time : {{$appointment->schedule_time ? $appointment->schedule_time->schedule_time : ''}}
      		</div>
      </div>
    </div>
    <div class="block-content">
      <div class="row">
      	<div class="col-md-6">
      		<table class="table table-borderless">
		        <tbody>
		          <div class="mb-3">
		            <img class="profile-image" src="{{$appointment->doctor->image ? '/' . $appointment->doctor->image :  '/demo.svg'}}">
		          </div> 
		          <tr>
		            <td class="text-right" style="width: 170px;">
		              <span>Doctor Name : </span>
		            </td>
		            <td>
		              <p>{{$appointment->doctor ? $appointment->doctor->doctor_name : 'Not Set'}}</p>
		            </td>
		          </tr>
		          <tr>
		            <td class="text-right" style="width: 170px;">
		              <span>Designation : </span>
		            </td>
		            <td>
		              <p>{{$appointment->doctor ? $appointment->doctor->designation : 'Not Set'}}</p>
		            </td>
		          </tr>
		          <tr>
		            <td class="text-right" style="width: 170px;">
		              <span>Specialist : </span>
		            </td>
		            <td>
		              <p>{{$appointment->doctor ? $appointment->doctor->specialist : 'Not Set'}}</p>
		            </td>
		          </tr>
		          <tr>
		            <td class="text-right" style="width: 170px;">
		              <span>Department : </span>
		            </td>
		            <td>
		              <p>{{$appointment->department ? $appointment->department->department_name : 'Not Set'}}</p>
		            </td>
		          </tr>
		          <tr>
		            <td class="text-right" style="width: 170px;">
		              <span>Phone Number : </span>
		            </td>
		            <td>
		              <p>{{$appointment->doctor ? $appointment->doctor->phone : 'Not Set'}}</p>
		            </td>
		          </tr>
		          <tr>
		            <td class="text-right" style="width: 170px;">
		              <span>Sex : </span>
		            </td>
		            <td>
		              <p>{{$appointment->doctor ? $appointment->doctor->sex : 'Not Set'}}</p>
		            </td>
		          </tr>
		        </tbody>
		      </table>
      	</div>
      	<div class="col-md-6">
      		<table class="table table-borderless">
		        <tbody>
		          <div class="mb-3">
		            <img class="profile-image" src="{{$appointment->patient->image ? '/' . $appointment->patient->image :  '/demo.svg'}}">
		          </div> 
		          <tr>
		            <td class="text-right" style="width: 170px;">
		              <span>Patient Name : </span>
		            </td>
		            <td>
		              <p>{{$appointment->patient ? $appointment->patient->patient_name : 'Not Set'}}</p>
		            </td>
		          </tr>
		          <tr>
		            <td class="text-right" style="width: 170px;">
		              <span>Phone Number : </span>
		            </td>
		            <td>
		              <p>{{$appointment->patient ? $appointment->patient->phone : 'Not Set'}}</p>
		            </td>
		          </tr>
		          <tr>
		            <td class="text-right" style="width: 170px;">
		              <span>Sex : </span>
		            </td>
		            <td>
		              <p>{{$appointment->patient ? $appointment->patient->sex : 'Not Set'}}</p>
		            </td>
		          </tr>
		          <tr>
		            <td class="text-right" style="width: 170px;">
		              <span>Blood Group : </span>
		            </td>
		            <td>
		              <p>{{$appointment->patient ? $appointment->patient->blood_group : 'Not Set'}}</p>
		            </td>
		          </tr>
		          <tr>
		            <td class="text-right" style="width: 170px;">
		              <span>Date of Birth : </span>
		            </td>
		            <td>
		              <p>{{$appointment->patient ? $appointment->patient->bdate : 'Not Set'}}</p>
		            </td>
		          </tr>
		          <tr>
		            <td class="text-right" style="width: 170px;">
		              <span>Problem : </span>
		            </td>
		            <td>
		              <p>{{ $appointment->problem }}</p>
		            </td>
		          </tr>
		        </tbody>
		      </table>
      	</div>
      </div>
    </div>
  </div>
</div>
@endsection