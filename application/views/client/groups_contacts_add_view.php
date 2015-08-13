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
                            echo form_open_multipart('client/groupUpdate', $attributes);
                            ?> 
                                <input type="hidden" name="users_groups_uid" value="<?php echo $id ?>" />
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
											<button type="submit" class="btn green">تحديث القائمة</button>
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


