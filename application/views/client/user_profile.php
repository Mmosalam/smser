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
            <!-- Content admin -->
            <div class="col-md-9 client_content">	
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
                        <div class="col-md-8 pull-right">
                            <p><?php echo $row->user_uname ?> </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 pull-right">
                            <label>اﻟﺮﻗﻢ اﻟﺴﺮﻱ: </label>
                        </div>
                        <div class="col-md-8 pull-right">
                            <p> ******** </p>
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
                        <div class="col-md-8 pull-right">
                            <span><?php echo $row->user_full_name ?> </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 pull-right">
                            <label>اﻟﺒﺮﻳﺪ اﻹﻟﻜﺘﺮﻭﻧﻲ</label>
                        </div>
                        <div class="col-md-8 pull-right">
                            <span><?php echo $row->user_email ?> </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 pull-right">
                            <label>ﺗﺎﺭﻳﺦ اﻟﺘﺴﺠﻴﻞ: </label>
                        </div>
                        <div class="col-md-8 pull-right">
                            <span><?php echo $this->global_model->change_time($row->user_add_date); // echo $this->fix_date->express_date($row->user_add_date, $this->session->userdata('siteDefaultDate')) //  //  ?></span>
                        </div>
                    </div>
                </div>
                <hr />
                <h4> حالة الحساب </h4>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 pull-right">
                            <label> ﺣﺎﻟﺔ اﻟﺤﺴﺎﺏ:  </label>
                        </div>
                        <div class="col-md-8 pull-right">
                            <span><?php if ($row->user_actived) {
                    echo '<span class="label label-success">مفعل</span>';
                } else {
                    echo'<span class="label label-danger">بإنتظار التفعيل</span>';
                } ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 pull-right">
                            <label> ﺗﺎﺭﻳﺦ ﺁﺧﺮ ﺩﺧﻮﻝ:  </label>
                        </div>
                        <div class="col-md-8 pull-right">
                            <span><?php echo $this->global_model->change_time($row->user_last_login); // echo $this->fix_date->express_date($row->user_last_login, $this->session->userdata('siteDefaultDate')) ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 pull-right">
                            <label> ﺁﺧﺮ ﺩﺧﻮﻝ ﺗﻢ ﻣﻦ :  </label>
                        </div>
                        <div class="col-md-8 pull-right">
                            <span><?php echo $row->user_last_ip ?></span>
                        </div>
                    </div>
                </div>

                <hr />
                <h4> بيانات التطوير </h4> 
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2 pull-right">
                            <label> API Url: </label>
                        </div>
                        <div class="col-md-8 pull-right">
                            <span>http://www.expresswapp.net/api/send?username=[your username]&#38;password=[your password]&#38;numbers=[recipient number]&#38;message=[text message]&#38;sender=[sender name]</span>
                        </div>
                    </div>
                </div>


                <hr />
            </div> 




            <!-- -->

            <!-- Sidebars -->
<?php $this->load->view('includes/user_menu') ?>
            <!-- End Sidebars -->




        </div>
    </div>
    <!-- End Container-->
</section>
<!-- End Works-->
