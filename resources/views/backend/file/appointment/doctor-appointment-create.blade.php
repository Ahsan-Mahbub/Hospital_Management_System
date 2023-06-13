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
		  <h3 class="block-title">Add Appointment</h3>
		  <div class="block-options">
		    <a href="{{route('appointment.index')}}" class="btn btn-alt-primary"><i class="fa fa-list mr-5"></i> Appointment List</a>
		  </div>
		</div>
		<div class="block-content">
		    <form action="{{route('appointment.store')}}" method="post">
            	@csrf
            	<div class="row">
            		<div class="col-md-12">
						<div class="row">
							<div class="form-group col-md-6 pb-3">
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
							<div class="form-group col-md-6 pb-3">
								<label class="col-12 pb-2">Department Name <span class="text-danger">*</span></label>
								<div class="col-lg-12">
									<select class="form-select" name="department_id" id="department_id" required readonly>
										<option value="{{$department->department->id}}">{{$department->department->department_name}}</option>
									</select>
								</div>
							</div>
							<div class="form-group col-md-6 pb-3">
								<label class="col-12 pb-2">Doctor Name <span class="text-danger">*</span></label>
								<div class="col-lg-12">
									<select class="form-select" name="doctor_id" id="doctor_id" required readonly>
										<option value="{{$department->id}}">{{$department->doctor_name}}</option>
									</select>
								</div>
								<div id="schedule-info">
									
								</div>
							</div>

							<div class="form-group col-md-6 pb-3">
								<label class="col-12 pb-2">Date <span class="text-danger">*</span></label>
								<div class="col-lg-12">
									<input type="date" class="form-control" name="date" id="date" required onchange="getDateSchedule()">
								</div>
							</div>

							<div class="form-group col-md-12 pb-3">
								<label class="col-12 pb-2">Serial <span class="text-danger">*</span></label>
								<div class="col-lg-12">
									<div id="schedule-list">
										<input type="radio" class="btn-check" disabled>
										<label class="btn btn-outline-success" for="success-outlined">S1</label>
										<input type="radio" class="btn-check" disabled>
										<label class="btn btn-outline-success" for="success-outlined">S2</label>
										<input type="radio" class="btn-check" disabled>
										<label class="btn btn-outline-success" for="success-outlined">S3</label> ....... 
										<input type="radio" class="btn-check" disabled>
										<label class="btn btn-outline-success" for="success-outlined">S4</label>
									</div>
								</div>
							</div>

							<div class="form-group col-md-12 pb-3">
								<label class="col-12 pb-2">Problem <span class="text-danger">*</span></label>
								<div class="col-lg-12">
									<textarea class="form-control" rows="3" name="problem" placeholder="Problem" required></textarea>
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

	function getDoctorSchedule()
	{
	    let id = $("#doctor_id").val();
	    let url = '/get-doctor-schedule/'+id;
	    $.ajax({
	        type: "get",
	        url: url,
	        dataType: "json",
	        success: function (response) {
	            let html = '';
	            response.forEach(element => {
	            	const date = new Date(element.date);
	                html += '<p class="pt-2 mb-0"> <i class="fa fa-calendar"></i> '+ date.toDateString() + '( '+element.start_time +'-'+ element.end_time +' )' + '</p>'
	            });
	            $("#schedule-info").html(html);
	        }
	    });
	}

	function getDateSchedule()
	{
		let id = $("#doctor_id").val();
	    let date = $("#date").val();
	    let url = '/get-doctor-date-schedule/'+id+'/'+date;

	    $.ajax({
	        type: "get",
	        url: url,
	        dataType: "json",
	        success: function (response) {
	        	console.log(response);
	            let html = '';
	            var count = 1;
	            response.forEach(element => {
	            	html += `<input type="radio" name="schedule_time_id" `+ (element.schedule_booked == 1 ? 'disabled' : '') + ` value="`+element.id+`" class="btn-check" id="schedule-` + count + `">
							<label class="btn btn-outline-success" for="schedule-` + count + `">S`+ count++ +`</label>`
	            });
	            $("#schedule-list").html(html);
	        }
	    });
	}

	function selectSchedule(index) {
		let selectedInput = $('#schedule-' + index);

		// Disable input
		selectedInput.prop('disabled', true);

		// selected input checked
		selectedInput.attr('checked', true);

		// Change the background color
		selectedInput.next('label').css('background-color', 'green');
	}
</script>
@endsection