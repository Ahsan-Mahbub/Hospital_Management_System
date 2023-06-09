@extends('backend.layouts.app')
@section('content')
<div class="content">
	<div class="block block-rounded">
		<div class="block-header block-header-default">
		  <h3 class="block-title">Add Schedule</h3>
		  <div class="block-options">
		    <a href="{{route('schedule.index')}}" class="btn btn-alt-primary"><i class="fa fa-list mr-5"></i> Schedule List</a>
		  </div>
		</div>
		<div class="block-content">
		    <form action="{{route('schedule.store')}}" method="post">
            	@csrf
            	<div class="row">
            		<div class="col-md-12">
						<div class="row">
							<div class="form-group col-md-6 pb-3">
								<label class="col-12 pb-2">Doctor Name <span class="text-danger">*</span></label>
								<div class="col-lg-12">
									<select class="form-select" name="doctor_id" required>
										<option value="">Select One</option>
										@foreach ($doctors as $doctor)
											<option value="{{ $doctor->id }}">{{ $doctor->doctor_name }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group col-md-6 pb-3">
								<label class="col-12 pb-2">Available Days <span class="text-danger">*</span></label>
								<div class="col-lg-12">
									<select class="form-select" name="available_day" required>
										<option value="">Select One</option>
										@foreach (getAvailableDays() as $day)
											<option value="{{ $day }}">{{ $day }}</option>
										@endforeach 
									</select>
								</div>
							</div>

							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Start Time <span class="text-danger">*</span></label>
								<div class="col-lg-12">
									<input type="time" class="form-control" name="start_time" required>
								</div>
							</div>

							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">End Time <span class="text-danger">*</span></label>
								<div class="col-lg-12">
									<input type='time' class="form-control" name="end_time" required>
								</div>
							</div>

							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Per Patient Time <small>(in Minute) </small><span class="text-danger">*</span></label>
								<div class="col-lg-12">
									<input type="number" class="form-control" name="per_patient_time" required placeholder="Per Patient Time">
								</div>
							</div>
						</div>
						
					</div>
            	</div>
                <div class="form-group text-left mt-4 mb-4">
                    <button type="submit" class="btn btn-square btn-primary min-width-125">Submit</button>
                </div>
            </form>
		</div>
	</div>
</div>
@endsection