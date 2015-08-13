	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
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
                            echo form_open_multipart('client/send', $attributes);
                            ?> 
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
										<label class="col-md-3 control-label text-right">محتوى الرسالة</label>
										<div class="col-md-9">
											<textarea class="form-control" id="txtsms" rows="3" name="message"></textarea>
                                            <p class="help-block"><span id="smsCount">0</span>/<span id="smsTotal">160</span> حرف - عدد الرسائل: <span id="msgCount">1</span></p>
										</div>
									</div>
                                    
									<div class="form-group">
										<label class="col-md-3 control-label text-right">اسم القائمة</label>
										<div class="col-md-6">
											<select class="form-control " name="group_uid">
                                                <option value="0">برجاء أختيار قائمة أرسال</option>
                                                <?php
												$groups = $this->groups_model->getAllGroupsForUser();
                                                if ($groups != null) {
                                                    foreach ($groups as $group) {
                                                        //$contactsNumber = $this->groups_model->getGroupContactsNumber($group->group_uid);
                                                        ?>
                                                        <option value="<?php echo $group->group_uid ?>"><?php echo $group->group_name  ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
										</div>
									</div>
                                    
                                    
                                    
                                    
								</div>


								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9" style=" text-align:left">
											<button type="submit" class="btn green">ارسال</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->

				</div>
                <!--<div class="col-md-6 ">
                    <div class="col-md-4 ">
                        <!-- BEGIN Portlet PORTLET
                        <div class="portlet box red">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i>Portlet
                                </div>
                            </div>
                            <div class="portlet-body">
                                 Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.
                            </div>
                        </div>
                        <!-- END Portlet PORTLET
                    </div>
                
                </div>-->
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
		<!-- BEGIN PAGE CONTENT -->
	</div>
	<!-- END PAGE CONTAINER -->


