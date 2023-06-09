@extends('backend.layouts.app')
@section('content')
<div class="content">
	<div class="block block-rounded">
		<div class="block-header block-header-default">
		  <h3 class="block-title">Add Patient</h3>
		  <div class="block-options">
		    <a href="{{route('patient.index')}}" class="btn btn-alt-primary"><i class="fa fa-list mr-5"></i> Patient List</a>
		  </div>
		</div>
		<div class="block-content">
		    <form action="{{route('patient.store')}}" method="post" enctype="multipart/form-data">
            	@csrf
            	<div class="row">
            		<div class="form-group col-md-4 pb-2">
	                	<label class="col-12 pb-2">Patient Name <span class="text-danger">*</span></label>
	                	<div class="col-lg-12">
	                        <input type='text' class="form-control" required name="patient_name" placeholder="Patient Name">
	                    </div>
	                </div>
	                <div class="form-group col-md-4 pb-2">
	                	<label class="col-12 pb-2">Email Address <span class="text-danger">*</span></label>
	                	<div class="col-lg-12">
	                        <input type='email' class="form-control" required name="email" placeholder="Email Address">
	                    </div>
	                </div>
	                <div class="form-group col-md-4 pb-2">
	                	<label class="col-12 pb-2">Password <span class="text-danger">*</span></label>
	                	<div class="col-lg-12">
	                        <input type='password' class="form-control" required name="password" placeholder="Password">
	                    </div>
	                </div>
	                <div class="form-group col-md-4 pb-2">
	                	<label class="col-12 pb-2">Phone No </label>
	                	<div class="col-lg-12">
	                        <input type='text' class="form-control" name="phone" placeholder="Phone No">
	                    </div>
	                </div>
	                <div class="form-group col-md-4 pb-2">
	                	<label class="col-12 pb-2">Mobile No </label>
	                	<div class="col-lg-12">
	                        <input type='text' class="form-control" name="mobile" placeholder="Mobile No">
	                    </div>
	                </div>
	                <div class="form-group col-md-4 pb-2">
	                	<label class="col-12 pb-2">Sex <span class="text-danger">*</span></label>
	                	<div class="col-lg-12">
	                		<select class="form-control" name="sex" required>
	                			<option value="">Select One</option>
	                			<option value="Male">Male</option>
	                			<option value="Female">Felmale</option>
	                			<option value="Other">Other</option>
	                		</select>
	                    </div>
	                </div>
	                <div class="form-group col-md-4 pb-2">
	                	<label class="col-12 pb-2">Blood Group <span class="text-danger">*</span></label>
	                	<div class="col-lg-12">
	                		<select class="form-control" name="blood_group" required>
	                			<option value="">Select One</option>
	                			@foreach (getAvailableBloodGroup() as $group)
									<option value="{{ $group }}">{{ $group }}</option>
								@endforeach 
	                		</select>
	                    </div>
	                </div>
	                <div class="form-group col-md-4 pb-2">
	                	<label class="col-12 pb-2">Date of Birth <span class="text-danger">*</span></label>
	                	<div class="col-lg-12">
	                        <input type='date' class="form-control" required name="bdate">
	                    </div>
	                </div>
	                <div class="form-group col-md-12 pb-2">
	                	<label class="col-12 pb-2">Address <span class="text-danger">*</span></label>
	                	<div class="col-lg-12">
	                        <textarea class="form-control" required name="address" placeholder="Address"></textarea>
	                    </div>
	                </div>
            	</div>
                <div class="form-group row">
	            	<label class="col-12">Image </label>
	            	<div class="col-lg-12">
	                    <input type='file' class="form-group" name="image" onchange="readURL(this);" />
	        			<img id="blah" src="/demo.svg" height="200" width="250" alt="patient" /><br>
	                </div>
	            </div>
                <div class="form-group text-center mt-4 mb-4">
                    <button type="submit" class="btn btn-square btn-primary min-width-125">Submit</button>
                </div>
            </form>
		</div>
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript">
	function readURL(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	            $('#blah')
	            .attr('src', e.target.result);
	        };
	        reader.readAsDataURL(input.files[0]);
	    }
	}
</script>
@endsection