@extends('backend.layouts.app')
@section('content')
<div class="content">
	<div class="block block-rounded">
		<div class="block-header block-header-default">
		  <h3 class="block-title">Prescription (Edit Patient Case Study)</h3>
		  <div class="block-options">
		    <a href="{{route('prescription.index')}}" class="btn btn-alt-primary"><i class="fa fa-list mr-5"></i> Patient Case Study List</a>
		  </div>
		</div>
		<div class="block-content">
		    <form action="{{route('prescription.update', $prescription->id)}}" method="post">
            	@csrf
            	<div class="row">
            		<div class="col-md-12">
						<div class="row">
							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Patient Name </label>
								<div class="col-lg-12">
									<select class="form-select" name="patient_id" required>
										<option value="">Select One</option>
										@foreach ($patients as $patient)
											<option value="{{ $patient->id }}" {{$prescription->patient_id == $patient->id ? 'selected' : ''}}>{{ $patient->patient_name }}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Food Alergies </label>
								<div class="col-lg-12">
									<input type="text" class="form-control" name="food_allergies" value="{{$prescription->food_allergies}}" placeholder="Food Alergies">
								</div>
							</div>
							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Tendency Bleed </label>
								<div class="col-lg-12">
									<input type="text" class="form-control" name="trendency_bleed" value="{{$prescription->trendency_bleed}}" placeholder="Tendency Bleed">
								</div>
							</div>
							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Heart Disease </label>
								<div class="col-lg-12">
									<input type="text" class="form-control" name="heart_disease" value="{{$prescription->heart_disease}}" placeholder="Heart Disease">
								</div>
							</div>
							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">High Blood Pressure </label>
								<div class="col-lg-12">
									<input type="text" class="form-control" name="blood_presure" value="{{$prescription->blood_presure}}" placeholder="High Blood Pressure">
								</div>
							</div>
							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Diabetic </label>
								<div class="col-lg-12">
									<input type="text" class="form-control" name="diabetic" value="{{$prescription->diabetic}}" placeholder="Diabetic">
								</div>
							</div>
							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Surgery </label>
								<div class="col-lg-12">
									<input type="text" class="form-control" name="surgery" value="{{$prescription->surgery}}" placeholder="Surgery">
								</div>
							</div>
							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Accident </label>
								<div class="col-lg-12">
									<input type="text" class="form-control" name="accident" value="{{$prescription->accident}}" placeholder="Accident">
								</div>
							</div>
							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Others </label>
								<div class="col-lg-12">
									<input type="text" class="form-control" name="others" value="{{$prescription->others}}" placeholder="Others">
								</div>
							</div>
							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Family Medical History </label>
								<div class="col-lg-12">
									<input type="text" class="form-control" name="family_medical_history" value="{{$prescription->family_medical_history}}" placeholder="Family Medical History">
								</div>
							</div>

							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Current Medication </label>
								<div class="col-lg-12">
									<input type="text" class="form-control" name="current_medication" value="{{$prescription->current_medication}}" placeholder="Current Medication">
								</div>
							</div>
							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Female Pregnancy </label>
								<div class="col-lg-12">
									<input type="text" class="form-control" name="female_pregrancy" value="{{$prescription->female_pregrancy}}" placeholder="Female Pregnancy">
								</div>
							</div>
							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Breast Feeding </label>
								<div class="col-lg-12">
									<input type="text" class="form-control" name="breast_feeding" value="{{$prescription->breast_feeding}}" placeholder="Breast Feeding">
								</div>
							</div>

							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Health Insurance </label>
								<div class="col-lg-12">
									<input type="text" class="form-control" name="helth_inssurance" value="{{$prescription->helth_inssurance}}" placeholder="Health Insurance">
								</div>
							</div>
							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Low Income </label>
								<div class="col-lg-12">
									<input type="text" class="form-control" name="low_income" value="{{$prescription->low_income}}" placeholder="Low Income">
								</div>
							</div>
							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Reference </label>
								<div class="col-lg-12">
									<input type="text" class="form-control" name="reference" value="{{$prescription->reference}}" placeholder="Reference">
								</div>
							</div>

						</div>
						
					</div>
            	</div>
                <div class="form-group text-left mt-4 mb-4">
                    <button type="submit" class="btn btn-square btn-primary min-width-125">Update</button>
                </div>
            </form>
		</div>
	</div>
</div>
@endsection