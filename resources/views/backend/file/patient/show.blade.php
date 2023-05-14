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
      <h3 class="block-title">{{$patient->patient_name}} - Profile</h3>
    </div>
    <div class="block-content">
      <table class="table table-borderless">
        <tbody>
          <div class="mb-3">
            <img class="profile-image" src="{{$patient->image ? '/' . $patient->image :  '/demo.svg'}}">
          </div> 
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Full Name : </span>
            </td>
            <td>
              <p>{{$patient->patient_name}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Phone Number : </span>
            </td>
            <td>
              <p>{{$patient->phone}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Mobile Number : </span>
            </td>
            <td>
              <p>{{$patient->mobile}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Email : </span>
            </td>
            <td>
              <p>{{$patient->email}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Sex : </span>
            </td>
            <td>
              <p>{{$patient->sex}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Blood Group : </span>
            </td>
            <td>
              <p>{{$patient->blood_group}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Date of Birth : </span>
            </td>
            <td>
              <p>{{$patient->bdate}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Address : </span>
            </td>
            <td>
              <p>{{ $patient->address }}</p>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection