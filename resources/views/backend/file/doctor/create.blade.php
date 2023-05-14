@extends('backend.layouts.app')
@section('content')
<div class="content">
	<div class="block block-rounded">
		<div class="block-header block-header-default">
		  <h3 class="block-title">Add Doctor</h3>
		  <div class="block-options">
		    <a href="{{route('doctor.index')}}" class="btn btn-alt-primary"><i class="fa fa-list mr-5"></i> Doctor List</a>
		  </div>
		</div>
		<div class="block-content">
		    <form action="{{route('doctor.store')}}" method="post" enctype="multipart/form-data">
            	@csrf
            	<div class="row">
            		<div class="form-group col-md-4 pb-2">
	                	<label class="col-12 pb-2">Doctor Name <span class="text-danger">*</span></label>
	                	<div class="col-lg-12">
	                        <input type='text' class="form-control" required name="doctor_name" placeholder="Doctor Name">
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
	                	<label class="col-12 pb-2">Designation </label>
	                	<div class="col-lg-12">
	                        <input type='text' class="form-control" name="designation" placeholder="Designation">
	                    </div>
	                </div>
	                <div class="form-group col-md-4 pb-2">
	                	<label class="col-12 pb-2">Department <span class="text-danger">*</span></label>
	                	<div class="col-lg-12">
	                		<select class="form-control" name="department_id" required>
	                			<option value="">Select One</option>
	                			@foreach($departments as $department)
	                			<option value="{{$department->id}}">{{$department->department_name}}</option>
	                			@endforeach
	                		</select>
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
	                			<option value="A(+ve)">A(+ve)</option>
	                			<option value="A(-ve)">A(-ve)</option>
	                			<option value="B(+ve)">B(+ve)</option>
	                			<option value="A(-ve)">B(-ve)</option>
	                			<option value="A(+ve)">AB(+ve)</option>
	                			<option value="A(-ve)">AB(-ve)</option>
	                			<option value="B(+ve)">O(+ve)</option>
	                			<option value="A(-ve)">O(-ve)</option>
	                		</select>
	                    </div>
	                </div>
	                <div class="form-group col-md-4 pb-2">
	                	<label class="col-12 pb-2">Date of Birth <span class="text-danger">*</span></label>
	                	<div class="col-lg-12">
	                        <input type='date' class="form-control" required name="bdate">
	                    </div>
	                </div>
	                <div class="form-group col-md-4 pb-2">
	                	<label class="col-12 pb-2">Specialist <span class="text-danger">*</span></label>
	                	<div class="col-lg-12">
	                        <input type='text' class="form-control" required name="specialist" placeholder="Specialist">
	                    </div>
	                </div>
	                <div class="form-group col-md-6 pb-2">
	                	<label class="col-12 pb-2">Address <span class="text-danger">*</span></label>
	                	<div class="col-lg-12">
	                        <textarea class="form-control" required name="address" placeholder="Address"></textarea>
	                    </div>
	                </div>
	                <div class="form-group col-md-6 pb-2">
	                	<label class="col-12 pb-2">Biography</label>
	                	<div class="col-lg-12">
	                        <textarea class="form-control" name="biography" placeholder="Biography"></textarea>
	                    </div>
	                </div>
	                <div class="form-group col-md-12 pb-2">
	                	<label class="col-12 pb-2">Education/Degree</label>
	                	<div class="col-lg-12">
	                        <textarea class="form-control editor" name="education" placeholder="Education/Degree"></textarea>
	                    </div>
	                </div>
            	</div>
                <div class="form-group row">
	            	<label class="col-12">Image </label>
	            	<div class="col-lg-12">
	                    <input type='file' class="form-group" name="image" onchange="readURL(this);" />
	        			<img id="blah" src="/demo.svg" height="200" width="250" alt="doctor" /><br>
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