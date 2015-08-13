<?php $this->load->view('includes/header'); ?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<?php $this->load->view('includes/menu'); ?>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<?php $this->load->view('includes/breadcrumb',$breadcrumbs); ?>
                <div class="page-toolbar">
					<a href="<?php echo site_url('credit/credit_add') ?>" class="btn blue">إضافة</a>
                </div>
            </div>
			<!-- END PAGE HEADER-->
			<div class="row">
				<div class="col-md-8">
					<?php
                    $all = $this->messages->get();
                    if ($all != null) {
                        foreach ($all as $type => $messages)
                            foreach ($messages as $message)
                                switch ($type) {
                                    case "error":
                                        echo '<div class="alert alert-danger innerLR"><button type="button" class="close" data-dismiss="alert">×</button><strong>خطأ</strong><br>' . $message . '</div>';
                                        break;
                                    case "success":
                                        echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>نجاح</strong><br>' . $message . '</div>';
                                        break;
                                    case "alert":
                                        echo '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>تحذير</strong><br>' . $message . '</div>';
                                        break;
                                }
                    }
                    ?>
                    <?php if (validation_errors() != null) { ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>خطأ</strong><?php echo validation_errors(); ?> </div>
                    <?php } ?>
                
                
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-users"></i><?php echo $pageTitle ?>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover">
								<thead>
								<tr>
                                    <th>#</th>
									<th>أسم العضو</th>
									<th>المطلوب</th>
									<th>الحالة</th>
									<th>تاريخ الطلب</th>
									<th>الخيارات</th>
								</tr>
								</thead>
								<tbody>
									<?php
                                    if($rows != false)
                                    foreach($rows as $row){
                                    ?>
                                    <tr>
                                        <td><?php echo $row->credit_request_uid; ?></td>
                                        <td><?php echo $this->credit_model->getUserByID($row->user_uid) ?></td>
                                        <td><?php echo $row->credit_request_amount ?></td>
                                        <td><?php
											if ($row->credit_request_statue == 1) {
												echo '<span class="label label-success" style="font-family:ArabicFont !important">تم الشحن</span>';
											}else{
												echo '<span class="label label-warning" style="font-family:ArabicFont !important">بأنتظار التنفيذ</span>';
											}
											?>
                                        </td>
                                        <td><?php echo $this->fix_date->express_date($row->credit_request_add_date, $this->session->userdata('siteDefaultDate')) ?></td>
                                        <td>
                                        	<a href="#" class="btn btn-xs green"><i class="fa fa-pencil"></i> تنفيذ</a>
                                            <a href="#" class="btn btn-xs red"><i class="fa fa-trash-o"></i> الـغاء</a>
                                            
										
                                        </td>
                                    </tr>
                                    <?php } ?>
								</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
                
                <div class="col-md-4">
                
              
              
              
              
              
              
              
              
					<div class="portlet box green ">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-share font-blue-steel hide"></i>سجل العمليات
							</div>
							<div class="actions">
								
							</div>
						</div>
						<div class="portlet-body">
							<div class="scroller" style="height: 400px;" data-always-visible="1" data-rail-visible="0">
								<ul class="feeds">
									<?php
                                    if ($history != null)
                                        foreach ($history as $item):
                                            switch ($item->credit_history_type) {
                                                case 1:
                                                    ?>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-success">
                                                                        <i class="fa fa-check"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc">
                                                                        تم أضافة <?php echo $item->credit_history_amount ?> نقطة من خلال المدير <a href="<?php echo site_url('users/users_view/' . $item->user_uid_from) ?>" target="_blank"><?php echo $this->credit_model->getUserNameByID($item->user_uid_from); ?></a> إلى العضو <a href="<?php echo site_url('users/users_view/' . $item->user_uid) ?>" target="_blank"><?php echo $this->credit_model->getUserNameByID($item->user_uid); ?></a> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date">
                                                                 <?php echo $this->fix_date->express_date($item->credit_history_date, $this->session->userdata('siteDefaultDate')) ?>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    
                                                    <?php
                                                    break;
                                                case 2:
                                                    ?>
                                                    <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-danger">
                                                                        <i class="fa fa-times"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc">
                                                                         تم خصم <?php echo $item->credit_history_amount ?> نقطة من العضو <a href="<?php echo site_url('users/users_view/' . $item->user_uid) ?>" target="_blank"><?php echo $this->credit_model->getUserNameByID($item->user_uid); ?></a><br />
                                                                     <?php if($item->credit_history_reason != null){ ?>    
                                                                     <span>السبب : <?php echo $item->credit_history_reason ?></span>
                                                                     <?php }else{ ?>  
                                                                     <span>السبب : أرسال حملة.</span>
                                                                     <?php } ?>  															
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date">
                                                                 <?php echo $this->fix_date->express_date($item->credit_history_date, $this->session->userdata('siteDefaultDate')) ?>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    
                                                    <?php
                                                    break;
                                                case 3:
                                                    ?>
                                                   <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-warning">
                                                                        <i class="fa fa-reply"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc">
                                                                         تم تحويل <?php echo $item->credit_history_amount ?> نقطة من خلال العضو <a href="<?php echo site_url('users/users_view/' . $item->user_uid_from) ?>" target="_blank"><?php echo $this->credit_model->getUserNameByID($item->user_uid_from); ?></a>  إلى العضو <a href="<?php echo site_url('users/users_view/' . $item->user_uid) ?>" target="_blank"><?php echo $this->credit_model->getUserNameByID($item->user_uid); ?></a>															
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date">
                                                                 <?php echo $this->fix_date->express_date($item->credit_history_date, $this->session->userdata('siteDefaultDate')) ?>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    
                                                <?php
                                                case 4:
                                                    ?>
                                                   <li>
                                                        <div class="col1">
                                                            <div class="cont">
                                                                <div class="cont-col1">
                                                                    <div class="label label-sm label-info">
                                                                        <i class="fa fa-plus"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="cont-col2">
                                                                    <div class="desc">
                                                                         قام العضو <a href="<?php echo site_url('users/users_view/' . $item->user_uid) ?>" target="_blank"><?php echo $this->credit_model->getUserNameByID($item->user_uid); ?></a> بطلب شحن رصيده بعدد <?php echo $item->credit_history_amount ?> نقطة															
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col2">
                                                            <div class="date">
                                                                 <?php echo $this->fix_date->express_date($item->credit_history_date, $this->session->userdata('siteDefaultDate')) ?>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    
                                                    <?php
                                                    break;
                                            }


                                        endforeach;
                                    ?>       
                                
                                
                                
                                
                                
                                


								</ul>
							</div>
							<div class="scroller-footer">
								<div class="btn-arrow-link pull-right">
								</div>
							</div>
						</div>
					</div>
              
              
              
              
              
              
              
              
              
              
              
              
                
                </div>
                
            </div>
            
			<div class="clearfix">
			</div>
			
			
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<?php $this->load->view('includes/footer'); ?>