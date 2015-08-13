	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="<?php echo site_url(); ?>">الرئيسية</a><i class="fa fa-circle"></i>
				</li>
				<li>
					<a href="<?php echo site_url('client'); ?>">منطقة العملاء</a><i class="fa fa-circle"></i>
				</li>
				<li>
					<a href="<?php echo site_url('client/groups'); ?>">قوائم الأرسال</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 <?php echo $pageTitle ?>
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<?php 
                    $all = $this->messages->get();
                    if($all != null){
                        foreach($all as $type=>$messages)
                            foreach($messages as $message)
                            switch($type){
                                case "error":
                                    echo '<div class="alert alert-danger">'.$message."</div>";
                                    break;
                                case "success":
                                    echo '<div class="alert alert-success">'.$message."</div>";
                                    break;
                                case "alert":
                                    echo '<div class="alert alert-warning">'.$message."</div>";
                                    break;	
                            }
                        }
                    ?>
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase"><?php echo $pageTitle ?></span>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover">
								<thead>
								<tr>
                                    <th>الرقم</th>
                                    <th>الشبكة</th>
                                    <th>تاريخ الأضافة</th>
                                    <th>الخيارات</th>
								</tr>
								</thead>
								<tbody>
									<?php
                                    if ($rows != false) {
                                        foreach ($rows as $row) {
                                            ?>
            
                                            <tr>
            
                                                <td><?php echo $row->users_groups_contacts_number ?></td>
                                                <td><?php
                                                    switch ($row->prov_uid) {
                                                        case(5):
                                                            echo'<span class="label label-danger">Viva</span>';
                                                            break;
            
                                                        case(6):
                                                            echo'<span class="label label-success">Ooredoo-Wataniya</span>';
                                                            break;
            
                                                        case(9):
                                                            echo'<span class="label label-warning">Zain</span>';
                                                            break;
                                                    }
                                                    ?></td>
                                                <td><?php  echo $this->fix_date->express_date($row->users_groups_contacts_add_date, $this->session->userdata('siteDefaultDate')) ?></td>
                                                <td>
                                                    <a href="#" data-target="#modal_<?php echo $i ?>" data-toggle="modal" class="btn btn-danger btn-xs" title="حذف الرقم">حذف</a>
                                                </td>
                                            </tr>
            
                                            <!-- Modal -->
                                            <div id="modal_<?php echo $i ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h4 class="modal-title">تأكيد الحذف</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                 تحذير : عند الضغط على تأكيد الحذف سيتم حذف الرقم من المجموعة !
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn default" data-dismiss="modal" aria-hidden="true">غلق النافذة</button>
                                                            <a href="<?php echo site_url('client/users_groups_contacts_del/' . $row->users_groups_contacts_uid) ?>" class="btn btn-danger">تأكيد الحذف</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
            
                                        <?php }
                                    } else {
                                        echo'<tr><td colspan="5" style="text-align:center">لم يتم العثور على بيانات </td></tr>';
                                    } ?>
								
								</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
					
					<?php echo $this->pagination->create_links(); ?>

				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
		<!-- BEGIN PAGE CONTENT -->
	</div>
	<!-- END PAGE CONTAINER -->
