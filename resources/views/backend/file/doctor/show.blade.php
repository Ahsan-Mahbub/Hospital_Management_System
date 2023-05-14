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
      <h3 class="block-title">{{$doctor->doctor_name}} - Profile</h3>
    </div>
    <div class="block-content">
      <table class="table table-borderless">
        <tbody>
          <div class="mb-3">
            <img class="profile-image" src="{{$doctor->image ? '/' . $doctor->image :  '/demo.svg'}}">
          </div> 
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Full Name : </span>
            </td>
            <td>
              <p>{{$doctor->doctor_name}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Phone Number : </span>
            </td>
            <td>
              <p>{{$doctor->phone}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Mobile Number : </span>
            </td>
            <td>
              <p>{{$doctor->mobile}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Email : </span>
            </td>
            <td>
              <p>{{$doctor->email}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Designation : </span>
            </td>
            <td>
              <p>{{$doctor->designation}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Department : </span>
            </td>
            <td>
              <p>{{$doctor->department ? $doctor->department->department_name : 'N/A'}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Sex : </span>
            </td>
            <td>
              <p>{{$doctor->sex}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Blood Group : </span>
            </td>
            <td>
              <p>{{$doctor->blood_group}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Date of Birth : </span>
            </td>
            <td>
              <p>{{$doctor->bdate}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Specialist : </span>
            </td>
            <td>
              <p>{{$doctor->specialist}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Address : </span>
            </td>
            <td>
              <p>{{ $doctor->address }}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Biography : </span>
            </td>
            <td>
              <p>{{$doctor->biography}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Education : </span>
            </td>
            <td>
              <p>{!! $doctor->education !!}</p>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection