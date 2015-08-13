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
									<th>
										 #
									</th>
									<th>
										 اﺳﻢ ﻗﺎﺋﻤﺔ اﻹﺭﺳﺎﻝ
									</th>
									<th>
										 ﻋﺪﺩ اﻷﺭﻗﺎﻡ
									</th>
									<th>
										 تاريخ الاضافة
									</th>
									<th>
										 الاعدادات
									</th>
								</tr>
								</thead>
								<tbody>
									<?php
                                    if ($rows != false) {
                                        $i = 0;
                                        foreach ($rows as $row) {
                                            $i++;
                                            ?>
        
                                            <tr>
                                                <td><?php echo $row->group_uid  ?></td>
                                                <td> 
                                                    <a href="<?php echo site_url('client/groupView/'.$row->group_uid) ?>"><?php echo $row->group_name  ?></a>
                                                </td>
                                                <td> ارقام الاتصال (<?php echo $this->groups_model->getGroupContactsNumber($row->group_uid);  ?>) </td>
                                                <td> 
                                                    <?php echo $this->fix_date->express_date($row->group_add_date,$this->session->userdata('siteDefaultDate'))  ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo site_url('client/groupView/'.$row->group_uid) ?>" class="btn btn-default btn-xs active">عرض</a>
                                                    <a href="<?php echo site_url('client/groupUpdate/'.$row->group_uid) ?>" class="btn btn-primary btn-xs active">إضافة أرقام</a>
                                                    <a href="<?php echo site_url('client/groupExport/'.$row->group_uid) ?>" class="btn btn-info btn-xs active">حفظ بملف</a>
                                                    <a href="#" data-target="#modal_<?php echo $i ?>" data-toggle="modal" class="btn btn-danger active btn-xs">حذف</a>
                                                    
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
                                                                 تحذير : عند الضغط على تأكيد الحذف سيتم حذف المجموعة والأرقام التى بداخلها !
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn default" data-dismiss="modal" aria-hidden="true">غلق النافذة</button>
                                                            <a href="<?php echo site_url('client/users_groups_del/'.$row->group_uid) ?>" class="btn btn-danger">تأكيد الحذف</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
									<?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="5" style="text-align:center">السجل فارغ</td>
                                        </tr>
                                    <?php } ?>
								
								
								</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
					

				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
		<!-- BEGIN PAGE CONTENT -->
	</div>
	<!-- END PAGE CONTAINER -->


