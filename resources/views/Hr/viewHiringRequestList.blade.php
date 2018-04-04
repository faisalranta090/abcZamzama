<?php 
	$accType = Auth::user()->acc_type;
	if($accType == 'client'){
		$m = $_GET['m'];
	}else{
		$m = Auth::user()->company_id;
	}
	//$d = DB::selectOne('select `dbName` from `company` where `id` = '.$m.'')->dbName;
?>
@extends('layouts.default')

@section('content')
	<div class="well">
		<div class="panel">
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
						@include('Hr.'.$accType.'hrMenu')
					</div>
					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
						<div class="well">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<span class="subHeadingLabelClass">View Hiring Request List</span>
								</div>
							</div>
							<div class="lineHeight">&nbsp;</div>
							<div class="panel">
								<div class="panel-body">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12col-xs-12">
											<div class="table-responsive">
												<table class="table table-bordered sf-table-list">
   													<thead>
														<th class="text-center">S.No</th>
														<th class="text-center">Request No</th>
														<th class="text-center">Job Title</th>
														<th class="text-center">Job Type</th>
														<th class="text-center">Designation</th>
														<th class="text-center">Qualification</th>
														<th class="text-center">Shift Type</th>
														<th class="text-center">Request Status</th>
														<th class="text-center">Action</th>
													</thead>
													<tbody>
														<?php $counter = 1;?>

														@foreach($RequestHiring as $key => $y)
															<tr>
																<td class="text-center"><?php echo $counter++;?></td>
																<td><?php echo $y->RequestHiringNo;?></td>
																<td><?php echo $y->RequestHiringTitle;?></td>
																<td><?php echo $y->job_type_id;?></td>
																<td><?php echo $y->designation_id;?></td>
																<td><?php echo $y->qualification_id;?></td>
																<td><?php echo $y->shift_type_id;?></td>
																<td><?php echo $y->RequestHiringStatus;?></td>
																<td class="text-center">
																	<a onclick="showDetailModelOneParamerter('hdc/viewHiringRequestDetail','<?php echo $y->id;?>','View Request Hiring Detail')" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-eye-open"></span></a>

																	<button class="delete-modal btn btn-xs btn-danger btn-xs" onclick="deleteRowCompanyHRRecords('<?php echo $m ?>','<?php echo $y->id ?>','RequestHiring')">
                    													<span class="glyphicon glyphicon-trash"></span>
                													</button>
																</td>
															</tr>
														@endforeach
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection