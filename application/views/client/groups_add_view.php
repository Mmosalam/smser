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
					<a href="#">الرئيسية</a><i class="fa fa-circle"></i>
				</li>
				<li>
					<a href="#">منطقة العملاء</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 <?php echo $pageTitle ?>
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE FORM PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs font-green-sharp"></i>
								<span class="caption-subject font-green-sharp bold uppercase"><?php echo $pageTitle ?></span>
							</div>
						</div>
						<div class="portlet-body form">
							<?php
                            $attributes = array('class' => 'form-horizontal', 'role' => 'form');
                            echo form_open_multipart('client/addGroup', $attributes);
                            ?> 
                                <input class="typo" type="hidden" name="type" value="editor" /> 
                                <?php if(validation_errors() != null){ ?>
                                <div class="alert alert-danger"> <?php echo validation_errors(); ?> </div>
                                <?php } ?>
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
								<div class="form-body">
                                
									<div class="form-group">
										<label class="col-md-2 control-label text-right">اسم القائمة</label>
										<div class="col-md-10">
											<input type="text" class="form-control" placeholder="اسم القائمة" name="group_name">
										</div>
									</div>
                                    
                                    <div class="form-group">
                                    	<label class="col-md-2 control-label">أرقام القائمة</label>
                                    	<div class="col-md-10">
                                            <div class="tabbable-custom ">
                                                <ul class="nav nav-tabs ">
                                                    <li class="active">
                                                        <a class="type" href="#tab_5_1" data-toggle="tab" data-type="editor">
                                                        أضافة ارقام من خلال المحرر </a>
                                                    </li>
                                                    <li>
                                                        <a class="type" href="#tab_5_2" data-toggle="tab" data-type="csv">
                                                        أضافة ارقام من خلال Excel</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_5_1">
                                                        <div class="alert alert-info">
                                                            <p>
                                                                 ﺃﻗﺮﺃ ﺟﻴﺪاً اﻟﺘﻌﻠﻴﻤﺎﺕ اﻟﺘﺎﻟﻴﺔ ﺗﺠﻨﺒﺎً ﻟﻮﺟﻮﺩ ﺃﺧﻄﺎء ﺑﺠﻬﺎﺕ اﻻﺗﺼﺎﻝ ﺑﺎﻟﻘﺎﺋﻤﺔ<br />
    اﻧﺴﺦ ﻭاﻟﺼﻖ ﺟﻬﺎﺕ اﻻﺗﺼﺎﻝ اﻟﺨﺎﺻﺔ ﺑﻚ ويراعى ان يكون كل رقم بسطر
                                                            </p>
                                                        </div>
                                                        <p>
                                                            <textarea id="comment" class="form-control" style="height: 160px;" name="editor" rows="10"></textarea>						
                                                        </p>
                                                    </div>
                                                    <div class="tab-pane" id="tab_5_2">
                                                    	<div class="alert alert-info">
                                                            <p>
                                                                الأمتدادات المسموحة هى 'xlsx,xls' 
                                                            </p>
                                                        </div>
                                                        <p>
                                                            <input id="excelUpload" type="file" name="userfile" />
                                                        </p>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
								</div>


								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9" style=" text-align:left">
											<button type="submit" class="btn green">إنشاء القائمة</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->

				</div>
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
		<!-- BEGIN PAGE CONTENT -->
	</div>
	<!-- END PAGE CONTAINER -->


