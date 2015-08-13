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
                </div>
            </div>
			<!-- END PAGE HEADER-->
			<div class="row">
				<?php
                $attributes = array('class' => '');
                echo form_open_multipart('credit/credit_add', $attributes);
                ?>
				<div class="col-md-12">
					<?php if (validation_errors() != null) { ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>خطأ</strong><?php echo validation_errors(); ?> </div>
                    <?php } ?>
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-usd"></i><?php echo $pageTitle ?>
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label">العضو</label>
                                    <select name="user_uid" class="bs-select form-control" data-live-search="true" data-size="8">
                                        <option value="">أختار العضو</option>
                                        <?php foreach ($users as $user) { ?>
                                            <option value="<?php echo $user->user_uid ?>">
											<?php echo $user->user_uname ?> | <?php echo $user->user_full_name ?> | <?php echo $user->user_email ?>
                                            </option>
                                        <?php } ?>
                                     </select>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label">قيمة الرصيد</label>
                                    <input type="number" class="form-control" name="credit_amount" value="<?php echo set_value('credit_amount'); ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label">نوع العملية</label>
                                    <select name="credit_history_type" class="form-control">
                                        <option value="">أختار نوع العملية</option>
                                        <option value="1" <?php echo set_select('credit_history_type', 1); ?>>أضافة</option>
                                        <option value="2" <?php echo set_select('credit_history_type', 2); ?>>خصم</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label">السبب</label>
                                    <input type="text" class="form-control" name="credit_history_reason" value="<?php echo set_value('credit_amount'); ?>">
                                </div>
                            </div>
                            <div class="form-actions right">
                                <button type="submit" class="btn green">تنفيذ العملية</button>
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