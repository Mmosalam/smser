                    <div class="hor-menu ">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="<?php echo site_url('home') ?>">الرئيسية</a>
                            </li>
                            
							<?php if ($this->session->userdata('is_logged_in')) { ?>
                            
                            <li class="menu-dropdown classic-menu-dropdown ">
                                <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
                                منطقة العملاء <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu pull-left">
                                    <li class=" dropdown-submenu">
                                        <a href=":;">
                                        ادارة قوائم الارسال </a>
                                        <ul class="dropdown-menu">
                                            <li class=" ">
                                                <a href="<?php echo site_url('client/addGroup'); ?>">
                                                انشاء قائمة جديدة </a>
                                            </li>
                                            <li class=" ">
                                                <a href="<?php echo site_url('client/groups'); ?>">
                                                عرض قوائم الارسال </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class=" dropdown-submenu">
                                        <a href=":;">
                                        ﺇﺭﺳﺎﻝ اﻟﺮﺳﺎﺋﻞ </a>
                                        <ul class="dropdown-menu">
                                            <li class=" ">
                                                <a href="<?php echo site_url('client/send'); ?>">
                                                ارسال رسالة جماعية </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            
                            <?php }else{ ?>
                            <li>
                                <a href="<?php echo site_url('client') ?>">منطقة العملاء</a>
                            </li>
                            <?php } ?>
                            
                            <li>
                                <a href="<?php echo site_url('pricing') ?>">الاسعار</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('contact') ?>">اتصل بنا</a>
                            </li>
                            
                            
                        </ul>
                    </div>



