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
      <h3 class="block-title">{{$prescription->patient ? $prescription->patient->patient_name : 'N/A'}} - Case Study</h3>
    </div>
    <div class="block-content">
      <table class="table table-borderless">
        <tbody>
          <div class="mb-3">
            <img class="profile-image" src="{{$prescription->patient->image ? '/' . $prescription->patient->image :  '/demo.svg'}}">
          </div> 
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Patient Name : </span>
            </td>
            <td>
              <p>{{$prescription->patient ? $prescription->patient->patient_name : 'N/A'}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Food Allergies : </span>
            </td>
            <td>
              <p>{{$prescription->food_allergies}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Tendency Bleed : </span>
            </td>
            <td>
              <p>{{$prescription->trendency_bleed}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Heart Disease : </span>
            </td>
            <td>
              <p>{{$prescription->heart_disease}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>High Blood Pressure : </span>
            </td>
            <td>
              <p>{{$prescription->blood_presure}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Diabetic : </span>
            </td>
            <td>
              <p>{{$prescription->diabetic}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Surgery : </span>
            </td>
            <td>
              <p>{{$prescription->surgery}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Accident : </span>
            </td>
            <td>
              <p>{{$prescription->accident}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Others : </span>
            </td>
            <td>
              <p>{{$prescription->others}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Family Medical History : </span>
            </td>
            <td>
              <p>{{$prescription->family_medical_history}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Current Medication : </span>
            </td>
            <td>
              <p>{{$prescription->current_medication}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Female Pregnancy : </span>
            </td>
            <td>
              <p>{{$prescription->female_pregrancy}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Breast Feeding : </span>
            </td>
            <td>
              <p>{{$prescription->breast_feeding}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Health Insurance : </span>
            </td>
            <td>
              <p>{{$prescription->helth_inssurance}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Low Income : </span>
            </td>
            <td>
              <p>{{$prescription->low_income}}</p>
            </td>
          </tr>
          <tr>
            <td class="text-right" style="width: 170px;">
              <span>Reference : </span>
            </td>
            <td>
              <p>{{$prescription->reference}}</p>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection