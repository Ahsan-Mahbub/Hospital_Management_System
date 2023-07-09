@extends('backend.layouts.app')
@section('content')
<style>
	.btn-check:disabled+.btn, .btn-check[disabled]+.btn {
	    pointer-events: none;
	    filter: none;
	    opacity: .65;
	    background: #000;
	}
</style>
<div class="content">
	<div class="block block-rounded">
		<div class="block-header block-header-default">
		  <h3 class="block-title">Add Patient Admission</h3>
		  <div class="block-options">
		    <a href="{{route('admission.index')}}" class="btn btn-alt-primary"><i class="fa fa-list mr-5"></i> Admission List</a>
		  </div>
		</div>
		<div class="block-content">
		    <form action="{{route('admission.store')}}" method="post">
            	@csrf
            	<div class="row">
            		<div class="col-md-12">
						<div class="row">
							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Patient Name <span class="text-danger">*</span></label>
								<div class="col-lg-12">
									<select class="form-select" name="patient_id" required>
										<option value="">Select One</option>
										@foreach($patients as $patient)
										<option value="{{$patient->id}}">{{$patient->patient_name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Department Name <span class="text-danger">*</span></label>
								<div class="col-lg-12">
									<select class="form-select" name="department_id" id="department_id" required onclick="getDoctor()">
										<option value="">Select One</option>
										@foreach($departments as $department)
											<option value="{{$department->id}}">{{$department->department_name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Doctor Name <span class="text-danger">*</span></label>
								<div class="col-lg-12">
									<select class="form-select" name="doctor_id" id="doctor_id" required onchange="getDoctorSchedule()">
										<option value="">Select One</option>
									</select>
								</div>
							</div>
							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Date <span class="text-danger">*</span></label>
								<div class="col-lg-12">
									<input type="date" class="form-control" name="admission_date" required>
								</div>
							</div>

							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Case </label>
								<div class="col-lg-12">
									<input type="text" class="form-control" name="case" placeholder="Case">
								</div>
							</div>
							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Casuality </label>
								<div class="col-lg-12">
									<select class="form-select" name="casuality">
										<option value="">Select One</option>
										<option value="Yes">Yes</option>
										<option value="No">No</option>
									</select>
								</div>
							</div>
							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Patient Type </label>
								<div class="col-lg-12">
									<select class="form-select" name="patient_type">
										<option value="">Select One</option>
										<option value="New">New</option>
										<option value="Old">Old</option>
									</select>
								</div>
							</div>
							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Creadit Limit <span class="text-danger">*</span></label>
								<div class="col-lg-12">
									<input type="number" class="form-control" name="creadit_limit" placeholder="Creadit Limit">
								</div>
							</div>
							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Room <span class="text-danger">*</span></label>
								<div class="col-lg-12">
									<select class="form-select" name="room_id" id="room_id" required onclick="getWard()">
										<option value="">Select One</option>
										@foreach($rooms as $room)
											<option value="{{$room->id}}">{{$room->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Ward <span class="text-danger">*</span></label>
								<div class="col-lg-12">
									<select class="form-select" name="ward_id" id="ward_id" required onclick="getBed()">
										<option value="">Select One</option>
									</select>
								</div>
							</div>
							<div class="form-group col-md-4 pb-3">
								<label class="col-12 pb-2">Bed <span class="text-danger">*</span></label>
								<div class="col-lg-12">
									<select class="form-select" name="bed_id" id="bed_id" required>
										<option value="">Select One</option>
									</select>
								</div>
							</div>
							<div class="form-group col-md-12 pb-3">
								<label class="col-12 pb-2">Problem Details </label>
								<div class="col-lg-12">
									<textarea class="form-control" rows="3" name="details" placeholder="Problem Details"></textarea>
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

@section('script')
<script type="text/javascript">
	function getDoctor()
	{
	    let id = $("#department_id").val();
	    let url = '/get-doctor/'+id;
	    $.ajax({
	        type: "get",
	        url: url,
	        dataType: "json",
	        success: function (response) {
	            let html = '';
	            html+=`<option value="">`+'Select One'+`</option>`
	            response.forEach(element => {
	                html+='<option value='+element.id+'>'+element.doctor_name+'</option>'
	            });
	            $("#doctor_id").html(html);
	        }
	    });
	}
	function getWard()
	{
	    let id = $("#room_id").val();
	    let url = '/get-ward/'+id;
	    $.ajax({
	        type: "get",
	        url: url,
	        dataType: "json",
	        success: function (response) {
	            let html = '';
	            html+=`<option value="">`+'Select One'+`</option>`
	            response.forEach(element => {
	                html+='<option value='+element.id+'>'+element.ward_name+'</option>'
	            });
	            $("#ward_id").html(html);
	        }
	    });
	}
	function getBed()
	{
	    let id = $("#ward_id").val();
	    let url = '/get-bed/'+id;
	    $.ajax({
	        type: "get",
	        url: url,
	        dataType: "json",
	        success: function (response) {
	            let html = '';
	            html+=`<option value="">`+'Select One'+`</option>`
	            response.forEach(element => {
	                html+='<option value='+element.id+'>'+element.name+'</option>'
	            });
	            $("#bed_id").html(html);
	        }
	    });
	}
</script>
@endsection