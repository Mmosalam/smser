<?php $this->load->view('includes/breadcrumb1') ?>     
<section class="paddings">
    <div class="container">
        <div class="row">   




            <!-- Title Table Separate Four colums-->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title-subtitle">
                        <?php echo $titleTable[0] ?>
                        <span><?php echo $titleTable[1] ?></span>
                    </h2>

                    <hr>
                </div>
            </div>
            <!-- End Title Table Separate Four colums-->
            <?php
            $attributes = array('class' => 'simple-form', 'style' => 'width:100%');
            echo form_open('client/userProfileUpdate', $attributes);
            ?> 
            <!-- Content admin -->


            <div class="col-md-9  client_content clients_forms">	
                    <?php if (validation_errors() != null) { ?>
                    <div class="alert alert-danger">    
                    <?php echo validation_errors(); ?>
                    </div>
                <?php } ?> 
                <?php
                $all = $this->messages->get();
                if ($all != null) {
                    foreach ($all as $type => $messages)
                        foreach ($messages as $message)
                            switch ($type) {
                                case "error":
                                    echo '<div class="alert alert-danger">' . $message . "</div>";
                                    break;
                                case "success":
                                    echo '<div class="alert alert-success">' . $message . "</div>";
                                    break;
                                case "alert":
                                    echo '<div class="alert alert-warning">' . $message . "</div>";
                                    break;
                            }
                }
                ?>
                <h2 class="short"><?php echo $titleTable[0] ?></h2>
                <hr />
                <h4> ﻣﻌﻠﻮﻣﺎﺕ اﻟﺪﺧﻮﻝ </h4>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 pull-right">
                            <label>رقم الجوال:  </label>
                        </div>
                        <div class="col-md-10 pull-right">
                            <span><input class="form-control" type="text" maxlength="100" value="<?php echo $row->user_uname ?>" disabled ></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 pull-right">
                            <label>كلمة المرور الحالية: </label>
                        </div>
                        <div class="col-md-10 pull-right">
                            <span><input name="user_pwd_old" type="text"  class="form-control"/></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 pull-right">
                            <label>كلمة المرور الجديدة: </label>
                        </div>
                        <div class="col-md-10 pull-right">
                            <span><input name="user_pwd" type="text"   class="form-control"/></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 pull-right">
                            <label>تأكيد كلمة المرور: </label>
                        </div>
                        <div class="col-md-10 pull-right">
                            <span><input name="user_pwd_confirm" type="text"  class="form-control" /></span>
                        </div>
                    </div>
                </div>
                <hr />
                <h4> المعلومات الاساسية </h4>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 pull-right">
                            <label>اسمك بالكامل</label>
                        </div>
                        <div class="col-md-10 pull-right">
                            <span><input name="user_full_name" type="text" value="<?php if (count($_POST) == 0) {
                    echo $row->user_full_name;
                } else {
                    echo set_value('user_full_name');
                } ?>"  class="form-control"/></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 pull-right">
                            <label>اﻟﺒﺮﻳﺪ اﻹﻟﻜﺘﺮﻭﻧﻲ</label>
                        </div>
                        <div class="col-md-10 pull-right">
                            <span><input name="user_email" type="text" value="<?php if (count($_POST) == 0) {
                    echo $row->user_email;
                } else {
                    echo set_value('user_email');
                } ?>"  class="form-control"/> </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <input class="btn btn-primary btn-lg pull-left" type="submit" data-loading-text="Loading..." value="تحديث المعلومات">
                    </div>
                </div>

            </div> 

            </form>


            <!-- -->

            <!-- Sidebars -->
<?php $this->load->view('includes/user_menu') ?>
            <!-- End Sidebars -->




        </div>
    </div>
    <!-- End Container-->
</section>
<!-- End Works-->
