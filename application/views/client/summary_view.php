	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="<?php echo site_url(); ?>">الرئيسية</a><i class="fa fa-circle"></i>
				</li>
				<li>
					<a href="<?php echo site_url('client'); ?>">منطقة العملاء</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 <?php echo $pageTitle ?>
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row margin-top-10">
				<div class="col-md-12 col-sm-12">
					<!-- BEGIN PORTLET-->
					<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption caption-md">
								<i class="icon-bar-chart theme-font hide"></i>
								<span class="caption-subject theme-font bold uppercase">تقارير الحملات</span>
								<span class="caption-helper hide">weekly stats...</span>
							</div>
							<div class="actions">
								<div class="btn-group btn-group-devided" data-toggle="buttons">
									<label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
									<input type="radio" name="options" class="toggle" id="option1">اليوم</label>
									<label class="btn btn-transparent grey-salsa btn-circle btn-sm">
									<input type="radio" name="options" class="toggle" id="option2">أسبوع</label>
									<label class="btn btn-transparent grey-salsa btn-circle btn-sm">
									<input type="radio" name="options" class="toggle" id="option2">شهر</label>
								</div>
							</div>
						</div>
						<div class="portlet-body">
							
							<div class="table-scrollable table-scrollable-borderless">
								<table class="table table-hover table-light">
								<thead>
								<tr class="uppercase">
									<th colspan="2">
										 MEMBER
									</th>
									<th>
										 Earnings
									</th>
									<th>
										 CASES
									</th>
									<th>
										 CLOSED
									</th>
									<th>
										 RATE
									</th>
								</tr>
								</thead>
								<tr>
									<td class="fit">
										<img class="user-pic" src="<?php echo base_url(); ?>assets/admin/layout3/img/avatar4.jpg">
									</td>
									<td>
										<a href="javascript:;" class="primary-link">Brain</a>
									</td>
									<td>
										 $345
									</td>
									<td>
										 45
									</td>
									<td>
										 124
									</td>
									<td>
										<span class="bold theme-font">80%</span>
									</td>
								</tr>
								<tr>
									<td class="fit">
										<img class="user-pic" src="<?php echo base_url(); ?>assets/admin/layout3/img/avatar5.jpg">
									</td>
									<td>
										<a href="javascript:;" class="primary-link">Nick</a>
									</td>
									<td>
										 $560
									</td>
									<td>
										 12
									</td>
									<td>
										 24
									</td>
									<td>
										<span class="bold theme-font">67%</span>
									</td>
								</tr>
								<tr>
									<td class="fit">
										<img class="user-pic" src="<?php echo base_url(); ?>assets/admin/layout3/img/avatar6.jpg">
									</td>
									<td>
										<a href="javascript:;" class="primary-link">Tim</a>
									</td>
									<td>
										 $1,345
									</td>
									<td>
										 450
									</td>
									<td>
										 46
									</td>
									<td>
										<span class="bold theme-font">98%</span>
									</td>
								</tr>
								<tr>
									<td class="fit">
										<img class="user-pic" src="<?php echo base_url(); ?>assets/admin/layout3/img/avatar7.jpg">
									</td>
									<td>
										<a href="javascript:;" class="primary-link">Tom</a>
									</td>
									<td>
										 $645
									</td>
									<td>
										 50
									</td>
									<td>
										 89
									</td>
									<td>
										<span class="bold theme-font">58%</span>
									</td>
								</tr>
								</table>
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
			</div>
			
			
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
