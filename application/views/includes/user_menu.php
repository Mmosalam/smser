<div class="page-sidebar page-sidebar-fixed scroll">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="index.html">Bulk Wapp</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini">
                
            </a>
            <div class="profile">
                <div class="profile-image" onclick="introJs().start();" style="cursor:pointer">
                    <img src="<?php echo base_url() ;?>assets/client/assets/images/users/avatar.jpg" data-step="1" data-intro="عند الضغط على اللوجو فى اى صفحة بمطقة العملاء ستجد جولة تعريفية بالصفحة المتواجد داخلها لسهولة التعامل مع النظام" data-position="left"/>
                </div>
                <div class="profile-data">
                    <div class="profile-data-name" style="direction:rtl">مرحباً : <?php echo $this->session->userdata('user_full_name') ?></div>
                    <div class="profile-data-title">رصيدك الحالى : <?php echo $this->global_model->getCreditByID($this->session->userdata('user_uid')) ?> نقطة</div>
                </div>
            </div>                                                                        
        </li>
        <li class="xn-title">القائمة الشخصية</li>
        <li>
            <a href="<?php echo base_url() ?>"><span class="xn-text">الرئيسية</span> <span class="fa fa-desktop"></span></a>                        
        </li>                    
        <li class="xn-openable active">
            <a href="#"><span class="xn-text">اﻟﺤﺴﺎﺑﺎﺕ ﻭ اﻟﻨﻘﺎﻁ</span> <span class="fa fa-dashboard"></span></a>
            <ul>
                <li><a href="<?php echo site_url('client/summary'); ?>">ملخص الحساب</a> </li>
<!--                            <li><a href="<?php echo site_url('client/chargeCredit'); ?>">شحن رصيد</a> </li>
                <li><a href="<?php echo site_url('client/transferCredit'); ?>">تحويل النقاط</a> </li>
                <li><a href="<?php echo site_url('client/reportCredit'); ?>">تفاصيل العمليات</a> </li>
-->                        </ul>
        </li>
        
        <li class="xn-openable" data-step="3" data-intro="بعد ذلك يجب الدخول الى قسم ادارة قوائم الأرسال وتقوم بانشاء قائمة جديدة ثم تقوم بأضافة الأرقام للقائمة لتقوم بأستخدامها عند ارسال حملة اعلانية و يمكنك ايضا ادارة القوائم بنظام سهل جدا" data-position="left">
            <a href="#" id="hi"><span class="xn-text">ادارة قوائم الارسال</span> <span class="fa fa-desktop"></span></a>
            <ul>
                <li><a href="<?php echo site_url('client/addGroup'); ?>">انشاء قائمة جديدة</a></li>
                <li><a href="<?php echo site_url('client/groups'); ?>">عرض قوائم الارسال</a></li>
            </ul>
        </li>
        
        <li class="xn-openable" data-step="4" data-intro="من خلال قسم ﺇﺭﺳﺎﻝ اﻟﺮﺳﺎﺋﻞ تستطيع أرسالرسالة فردية أو حملة أعلانية لقائمة من قوائم الأرسال، ايضا ستجد ارشيف كامل مع تقارير مفصلة عن الحملة بعد انتهائها و تفاصيل لجميع العمليات التى قمت بها" data-position="left">
            <a href="#"><span class="xn-text">ﺇﺭﺳﺎﻝ اﻟﺮﺳﺎﺋﻞ</span> <span class="fa fa-envelope"></span></a>
            <ul>
<!--                            <li><a href="<?php if($this->session->userdata('siteSendStatue')){echo site_url('client/single');} ?>">ارسال رسالة فردية</a> </li>
-->                            <li><a href="<?php if($this->session->userdata('siteSendStatue')){echo site_url('client/campaign');} ?>">ارسال رسالة جماعية</a> </li>
<!--                            <li><a href="<?php echo site_url('client/singleReports'); ?>">ارشيف الرسائل الفردية</a> </li>
-->                            <li><a href="<?php echo site_url('client/reports'); ?>">ارشيف الرسائل الجماعية</a> </li>
                <li><a href="<?php echo site_url('client/reportMessages'); ?>">تفاصيل العمليات</a> </li>
            </ul>
        </li>
        
<!--                    <li class="xn-openable" data-step="4" data-intro="ولضمان جودة الخدمة قمنا بإضافة قسم الدعم الفنى لتلقى الاقتراحات والشكاوى ولسرعة التواصل مع عملائنا الكرام" data-position="left">
            <a href="#"><span class="xn-text">تذاكر الدعم الفنى</span> <span class="fa fa-envelope"></span></a>
            <ul>
                <li><a href="<?php echo site_url('client/ticket_add'); ?>">إنشاء تذكرة</a> </li>
                <li><a href="<?php echo site_url('client/ticket_open_list'); ?>">التذاكر المفتوحة</a> </li>
                <li><a href="<?php echo site_url('client/ticket_close_list'); ?>">التذاكر المغلقة</a> </li>
            </ul>
        </li>
        
        <li class="xn-openable" data-step="5" data-intro="من خلال قسم بيانات الحساب يمكنك عرض وتعديل البيانات الخاصة بحسابك" data-position="left">
            <a href="#"><span class="xn-text">بيانات الحساب</span> <span class="fa fa-bar-chart-o"></span></a>
            <ul>
                <li><a href="<?php echo site_url('client/userProfile'); ?>">عرض بيانات الحساب</a> </li>
                <li><a href="<?php echo site_url('client/userProfileUpdate'); ?>">تحرير بيانات الحساب</a> </li>
            </ul>
        </li>-->

    </ul>
    <!-- END X-NAVIGATION -->
</div>