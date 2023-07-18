@extends('backend.layouts.app')
@section('css')
<style>
	.patient-profile-overview-box {
		border: solid 1px #c5d6de;
	}
	.tab-container {
		position: relative;
		overflow: hidden;
		display: flex;
		/* justify-content: space-between; */
	}
	.arrow {
		z-index: 1;
		height: 42px;
		width: 45px;
		border: 1px solid #c5d6de;
		background-color: rgba(255, 255, 255, 0.5);
		font-size: 15px;
		text-align: center;
		line-height: 43px;
		cursor: pointer;
		color: #333;
		transition: background-color 0.3s ease, color 0.3s ease;
	}
	.arrow.left,
	.arrow.right {
		border-top: 0;
		border-bottom: 0;
	}

	.arrow:hover {
		background-color: rgba(255, 255, 255, 0.8);
		color: #0183cc;
	}
  
	.tabs {
		display: flex;
		overflow: hidden;
		height: 42px;
		background: #fff;
        flex: 1;
	}
  
  	.tab-wrapper {
		display: flex;
		transition: transform 0.3s ease;
		will-change: transform;
		height: 42px;
		justify-content: space-between;
	}
  
	.tab {	
		transition: color 0.3s ease;
		flex: none;
		padding: 10px 17px;
		margin-right: 1px;
	}

	.tab a {
		color: #333;
	}
  
	.tab.active {
		border: 0;
		border-bottom: 3px solid #0283cc;
	}
	.tab.active a {
		color: #0183cc;
	}
	
	.tab-content-wrap {
		padding: 20px 15px;
		background: #fff;
		border-top: 1px solid #c5d6de;
	}
	.tabcontent {
		display: none;
	}
	.tabcontent.active {
		display: block;
	}
	
	
	/* Content css */
	.border-b {
		border-bottom: 1px solid #ddd;
	}
	.border-r {
		border-right: 1px solid #ddd;
	}
	.mb10 {
		margin-bottom: 10px !important;
	}
	.box-header {
		color: #444;
		display: flex;
		justify-content: space-between;
		padding: 7px 0px;
		position: relative;
		align-items: center;
	}
	.box-header h3 {
		font-size: 14px;
    	margin-bottom: 0px;
	}

	.profile-user-img {
		width: 100px !important;
		height: 100px;
		min-width: 100px;
		min-height: 100px;
	}
	.bolds {
		font-weight: 600;
		font-size: 15px;
	}
	.font14 {
		font-size: 14px;
	}
	.editviewdelete-icon a {
		margin-left: 10px;
		color: #444;
		font-size: 14px;
	}

	.staff-members {
		padding-bottom: 15px;
	}
	.staff-members .media {
		border-bottom: 1px solid #ddd;
		padding-bottom: 10px;
		padding-right: 8px;
		display: flex;
		align-items: center;
	}
	/* .media:first-child {
		margin-top: 5px;
	} */
	.media-body {
		flex: 1;
	}
	.media-body .bolds{
		margin: 0px 10px;
	}
	.member-profile-small {
		height: 32px;
		width: 32px;
		border-radius: 50%;
	}
	.border-less-table>thead>tr>th, .border-less-table>tbody>tr>th, .border-less-table>tfoot>tr>th, .border-less-table>thead>tr>td, .border-less-table>tbody>tr>td, .border-less-table>tfoot>tr>td {
		border: 0px solid #f4f4f4;
		padding: 5px 0px;
	}
  /* Font Awesome integration (Font Awesome CDN link is required) */
  @import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css");
  
</style>
@endsection

@section('content')
<div class="content">
	<div class="patient-profile-overview-box">
		{{-- Tab menu --}}
		<div class="tab-container">
			<div class="arrow left"><i class="fas fa-chevron-left"></i></div>
			<div class="tabs">
				<div class="tab-wrapper">
					<div class="tab active">
						<a href="#overview" data-toggle="tab" aria-expanded="true"><i class="fa fa-th"></i> Overview</a>
					</div>
					{{-- <div class="tab">
						<a href="#nurse_note" data-toggle="tab" aria-expanded="true"><i class="fas fa-sticky-note"></i> Nurse Notes</a>
					</div> --}}
					{{-- <div class="tab">
						<a href="#medication" class="medication" data-toggle="tab" aria-expanded="true"><i class="fa fa-medkit" aria-hidden="true"></i> Medication</a>
					</div> --}}
					<div class="tab">
						<a href="#prescription" data-toggle="tab" aria-expanded="true"><i class="far fa-calendar-check"></i> Prescription</a>
					</div>
					<div class="tab">
						<a href="#consultant_register" data-toggle="tab" aria-expanded="true"><i class="fas fa-file-prescription"></i> <span>Consultant Register</span></a>
					</div>
					{{-- <div class="tab">
						<a href="#labinvestigation" data-toggle="tab" aria-expanded="true"><i class="fas fa-diagnoses"></i> Lab Investigation</a>
					</div>
					<div class="tab">
						<a href="#operationtheatre" class="operationtheatre" data-toggle="tab" aria-expanded="true"><i class="fas fa-cut" aria-hidden="true"></i> Operations</a>
					</div> --}}
					<div class="tab">
						<a href="#charges" data-toggle="tab" aria-expanded="true"><i class="fas fa-donate"></i> Charges</a>
					</div>
					<div class="tab">
						<a href="#bed_history" class="bed_history" data-toggle="tab" aria-expanded="true"><i class="fas fa-procedures"></i> Bed History</a>
					</div>
					{{-- <div class="tab">
						<a href="#treatment_history" data-toggle="tab" aria-expanded="true"><i class="fas fa-hourglass-half"></i> Treatment History</a>
					</div> --}}
				</div>
			</div>
			<div class="arrow right"><i class="fas fa-chevron-right"></i></div>
		</div>

		{{-- Tab content --}}
		<div class="tab-content-wrap">
			{{-- Patient Detail overview --}}
			<div class="tabcontent active">
				<div class="row">
					<div class="col-md-6 border-r">
						{{-- Box header --}}
						<div class="box-header border-b mb10 pl-0 pt0"> 
							<h3 class="text-uppercase">{{ $patient->patient_name }}</h3>
							<div class="editviewdelete-icon pt8">
								<a class="" href="#" onclick="getRecord('58')" data-toggle="tooltip" title="" data-original-title="Profile"><i class="fa fa-reorder"></i>
								</a> 
								<a class="" href="#" onclick="getEditRecord('58')" data-toggle="tooltip" title="" data-original-title="Edit Profile"><i class="fa fa-pencil"></i>
								</a>

								<a class="patient_discharge" href="#" data-toggle="tooltip" title="" data-original-title="Patient Discharge"><i class="fa fa-hospital"></i>
								</a> 
					
					
								<a class="" href="#" onclick="deleteIpdPatient('58')" data-toggle="tooltip" title="Delete Patient"><i class="fa fa-trash"></i>
								</a> 
							</div> 
						</div>

						<div class="row align-items-center">
							<div class="col-lg-3 col-md-4 col-sm-12 text-center">
								
								<img width="115" height="115" class="profile-user-img img-responsive img-rounded" src="https://demo.smart-hospital.in/uploads/patient_images/no_image.png?1689406060">
							
							</div><!--./col-lg-5-->
							<div class="col-lg-9 col-md-8 col-sm-12">
								<table class="table border-less-table mb-0">
									<tbody>
										<tr>
											<td class="bolds">Gender</td>
											<td>{{ $patient->sex }}</td>
										</tr>
										<tr>
											<td class="bolds">Age</td>
											<td>{{ $patient->bdate }} </td>
										</tr>
										<tr>
											<td class="bolds">Guardian Name</td>
											<td>{{ $patient->guardian_name ? $patient->guardian_name : 'Jhon' }}</td>
										</tr>
										
										<tr>
											<td class="bolds">Phone</td>
											<td>{{ $patient->phone }}</td>
										</tr>
									</tbody>
								</table>
							</div><!--./col-lg-7-->
						</div>

						<hr class="hr-panel-heading hr-10">

						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="align-content-center pt25">
									<table class="table border-less-table w-100">
										<tbody>
											{{-- <tr>
												<td class="bolds">Case ID</td>
												<td>2653</td>
											</tr> --}}
											<tr>
												<td class="bolds">IPD No</td>
												<td>{{$patient->currentAdmitted ? 'IPD'.$patient->currentAdmitted->id : ''}}</td>
											</tr>
											<tr>
												<td class="white-space-nowrap bolds" width="40%">Admission Date</td>
												<td>{{$patient->currentAdmitted ? $patient->currentAdmitted->created_at->format('d/m/Y') : ''}}</td>
											</tr>
											<tr>
												<td class="bolds">Bed</td>
												<td>{{$patient->currentAdmitted->bed->name. '-' . $patient->currentAdmitted->bed->ward->ward_name. '-' . $patient->currentAdmitted->bed->ward->room->floor->name}}</td>	
											</tr>
										</tbody>
									</table>
								</div>    
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12">
								{{-- <div class="chart-responsive text-center">
								  <div class="chart"> 
									<canvas id="pieChart" style="height: 150px; width: 194px;" width="242" height="187"><span></span></canvas>
								</div>
							  
								<p class="font12 mb0 font-medium">Credit Limit: $20000</p>
								<p class="font12 mb0 font-medium text-danger">Used Credit Limit: $-348</p> 
								<p class="font12 mb0 font-medium text-success-xl">Balance Credit Limit: $20348</p>
								</div> --}}
							</div>
						</div>

						<hr class="hr-panel-heading hr-10">

						{{-- Doctor list --}}
						<div class="box-header mb10 pl-0">
							<h3 class="text-uppercase bolds mt0 ptt10 pull-left font14">Consultant Doctor</h3>
							<div class="pull-right">
							   <div class="editviewdelete-icon pt8">
								<a href="#" class=" dropdown-toggle adddoctor" onclick="get_doctoripd('58')" title="Add Doctor" data-toggle="tooltip"><i class="fa fa-plus"></i>  
						  		</a>
								</div>  
						   </div>
						</div>

						<div class="staff-members">
							@foreach ($patient->admissions as $admission)
								@if ($admission->doctor)
									<div class="media">
										<div class="media-left">
											<a href="https://demo.smart-hospital.in/admin/staff/profile/4">
												<img src="https://demo.smart-hospital.in/uploads/staff_images/4.jpg?1689406060" class="member-profile-small media-object"></a>
										</div>
										<div class="media-body">
											<h5 class="bolds"><a href="{{ route('doctor.show', $admission->doctor->id) }}">{{ $admission->doctor->doctor_name }}</a>
											</h5>
										</div>
									</div><!--./media-->
								@endif	
							@endforeach		   
						</div>
					</div>

					<div class="col-md-6">
						{{-- <div class="box-header pl-0">
							<h3 class="text-uppercase">Medication</h3>
						 </div>
						 <div class="pl-0">
							<div class="table-responsive">
								<table class="table border-less-table w-full font14 mb-0">
									<thead>
										<tr>
											<th>Date</th>
											<th>Medicine Name</th>
											<th>Dose</th>
											<th>Time</th>
											<th>Remark</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>12/06/2022</td>
											<td>Alprovit</td>
												<td>1  ((ML))</td>
											<td> 05:55 PM</td>
											<td></td>
								   		</tr>									
										<tr>
											<td>12/07/2022</td>
											<td>BICASOL</td>
												<td>0.5 ((ML))</td>
											<td> 02:00 PM</td>
											<td></td>
								   		</tr>
																						   
									</tbody>
								</table>
							</div>
						</div>
						<hr class="hr-panel-heading hr-10"> --}}
						<div class="box-header pl-0">
							<h3 class="text-uppercase bolds mt0 mb0 ptt10 pull-left font14">Prescription</h3>
							<div class="pull-right">
								
						   </div>
					    </div>
					    <div class="box-header pl-0 d-block">
							<div class="table-responsive">
								<table class="table font14 mb0">
									<thead>
										<tr>
											<th>Prescription No</th>
											<th>Date</th>
											<th>Finding</th>
										</tr>
									</thead> 
									<tbody>
										@if($patient->prescriptions->isNotEmpty()) 
											@foreach ($patient->prescriptions as $prescription)
												<tr>
													<td>IPDP{{$prescription->id}}</td>
													<td>{{$prescription->created_at->format('d/m/Y H:i:s')}}</td>
													<td>Flushed complexion or hot skin.
												Flushed skin is often a visual sign of embarrassment, anxiety, or being too hot. However, frequent flushing can sometimes indicate an underlying medical condition. Flushed skin occurs when the hundreds of tiny blood vessels just beneath the skin dilate, or widen.</td>
													
												</tr>
											@endforeach
										@else
										    <tr>
												<td colspan="3" class="text-center">
                                                    <span class="text-danger">No data found</span>
                                                </td>
											</tr>
										@endif
										
									
									</tbody>
								</table>
							</div>
						</div>

						<hr class="hr-panel-heading hr-10">
						{{-- Bed history --}}
						<div class="box-header pl-0">
							<h3 class="text-uppercase bolds mt0 mb0 ptt10 pull-left font14">Bed History</h3>
					    </div>

						<div class="box-header pl-0">
							<div class="table-responsive w-100">
								<table class="table font14 mb0">
									<thead>
										<tr>
											<th>Ward</th>
											<th>Bed</th>
											<th>From Date</th>
											<th>To Date</th>
											<th>Active Bed</th>
										</tr>
									</thead> 
									<tbody>
										@foreach ($patient->admissions as $admission)
											<tr>
												<td>{{$admission->bed->ward->ward_name}}</td>
												<td>{{$admission->bed->name}}</td>
												<td>{{$admission->admission_date}}</td>
												<td></td>
												<td>{{$admission->bed->status == 1 ? 'Yes' : 'No'}}</td>
											</tr>
										@endforeach
									
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="tabcontent">
                <div class="box-header pl-0 d-block">
                    <div class="table-responsive">
                        <table class="table font14 mb0">
                            <thead>
                                <tr>
                                    <th>Prescription No</th>
                                    <th>Date</th>
                                    <th>Finding</th>
                                </tr>
                            </thead> 
                            <tbody>
                                @if($patient->prescriptions->isNotEmpty()) 
                                    @foreach ($patient->prescriptions as $prescription)
                                        <tr>
                                            <td>IPDP{{$prescription->id}}</td>
                                            <td>{{$prescription->created_at->format('d/m/Y H:i:s')}}</td>
                                            <td>Flushed complexion or hot skin.
                                        Flushed skin is often a visual sign of embarrassment, anxiety, or being too hot. However, frequent flushing can sometimes indicate an underlying medical condition. Flushed skin occurs when the hundreds of tiny blood vessels just beneath the skin dilate, or widen.</td>
                                            
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            <span class="text-danger">No data found</span>
                                        </td>
                                    </tr>
                                @endif
                                
                            
                            </tbody>
                        </table>
                    </div>
                </div>
			</div>
			<div class="tabcontent">
                <div class="staff-members">
                    <table class="table font14 mb0">
                        <thead>
                            <tr>
                                <th>Consultent Doctor</th>
                                <th>Designation</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </thead> 
                        <tbody>
                            @foreach ($patient->admissions as $admission)
                                <tr>
                                    <td>{{$admission->doctor->doctor_name}}</td>
                                    <td>{{$admission->doctor->designation}}</td>
                                    <td>{{$admission->doctor->doctor_name}}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        
                        </tbody>
                    </table>	   
                </div>
			</div>
			<div class="tabcontent">
                <div class="table-responsive w-100 text-center">
                   <span class="text-dnger">No data found</span>
                </div>
			</div>
			<div class="tabcontent">
                <div class="table-responsive w-100">
                    <table class="table font14 mb0">
                        <thead>
                            <tr>
                                <th>Ward</th>
                                <th>Bed</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Active Bed</th>
                            </tr>
                        </thead> 
                        <tbody>
                            @foreach ($patient->admissions as $admission)
                                <tr>
                                    <td>{{$admission->bed->ward->ward_name}}</td>
                                    <td>{{$admission->bed->name}}</td>
                                    <td>{{$admission->admission_date}}</td>
                                    <td></td>
                                    <td>{{$admission->bed->status == 1 ? 'Yes' : 'No'}}</td>
                                </tr>
                            @endforeach
                        
                        </tbody>
                    </table>
                </div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
{{-- <script>
	document.addEventListener('DOMContentLoaded', () => {
		const tabs = document.querySelectorAll('.tab');
		const contents = document.querySelectorAll('.content');
		const leftArrow = document.querySelector('.arrow.left');
		const rightArrow = document.querySelector('.arrow.right');
		const tabContainer = document.querySelector('.tabs');
		const tabWrapper = document.querySelector('.tab-wrapper');

		let currentIndex = 0;

		const updateVisibleTabs = () => {
			const tabContainerWidth = tabContainer.offsetWidth;
			const visibleTabs = Math.floor(tabContainerWidth / TAB_WIDTH);

			tabWrapper.style.width = `${visibleTabs * TAB_WIDTH}px`;

			if (currentIndex >= visibleTabs) {
			const scrollAmount = (currentIndex - visibleTabs + 1) * TAB_WIDTH;
			tabContainer.scrollTo({ left: scrollAmount });
			}
		};

		const setActiveTab = (index) => {
			tabs.forEach((tab, i) => {
			tab.classList.toggle('active', i === index);
			});
			contents.forEach((content, i) => {
			content.classList.toggle('active', i === index);
			});

			currentIndex = index;
			updateVisibleTabs();
		};

		const handleLeftArrowClick = () => {
			if (currentIndex > 0) {
			setActiveTab(currentIndex - 1);
			}
		};

		const handleRightArrowClick = () => {
			if (currentIndex < tabs.length - 1) {
			setActiveTab(currentIndex + 1);
			}
		};

		leftArrow.addEventListener('click', handleLeftArrowClick);
		rightArrow.addEventListener('click', handleRightArrowClick);
		window.addEventListener('resize', updateVisibleTabs);

		const TAB_WIDTH = 120;
		updateVisibleTabs();
		setActiveTab(currentIndex);
	});
</script> --}}
<script>
	const tabs = document.querySelectorAll('.tab');
	const contents = document.querySelectorAll('.tabcontent');
	const leftArrow = document.querySelector('.arrow.left');
	const rightArrow = document.querySelector('.arrow.right');
	const tabContainer = document.querySelector('.tabs');

	// Add event listeners to tabs
	tabs.forEach((tab, index) => {
		tab.addEventListener('click', () => {
			// Remove active classes from tabs and contents
			tabs.forEach(tab => tab.classList.remove('active'));
			contents.forEach(content => content.classList.remove('active'));

			// Add active class to the clicked tab and corresponding content
			tab.classList.add('active');
			contents[index].classList.add('active');
		});
	});

	// Scroll the tabs container to the left
	leftArrow.addEventListener('click', () => {
		tabContainer.scrollBy({
			left: -tabContainer.offsetWidth / 2,
			behavior: 'smooth'
		});
	});

	// Scroll the tabs container to the right
	rightArrow.addEventListener('click', () => {
		tabContainer.scrollBy({
			left: tabContainer.offsetWidth / 2,
			behavior: 'smooth'
		});
	});

</script>
@endsection