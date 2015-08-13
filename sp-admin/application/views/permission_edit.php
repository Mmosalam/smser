<div class="menu">                
        
        
        <?php $this->load->view('admin_menu'); ?>

        
        <?php $this->load->view('menu'); ?>
        
        
        <div class="dr"><span></span></div>
        
        <div class="widget">

            <div class="input-append">
                <input id="appendedInputButton" style="width: 118px;" type="text"><button class="btn" type="button">بحث</button>
            </div>            
            
        </div>
        
        <div class="dr"><span></span></div>
        
        
        
    </div>
    <div class="content">
        
        <?php $this->load->view('breadLine',$breadcrumb); ?>
         <div class="workplace">
        <div class="dr"><span></span></div>
        <div class="row-fluid">
                
                <div class="span12">
                    <div class="head">
                        <div class="isw-plus"></div>
                        <h1><?php echo $breadcrumb; ?></h1>
                        <ul class="buttons">
                            <li><a class="isw-plus"></a></li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                    <div class="block-fluid">     
   					 <?php echo form_open('permission/permission_edit_action/'.$row->per_uid);  ?> 
                        <table cellpadding="0" cellspacing="0" width="100%" class="table">
                            <thead>
                                <tr>                                    
                                    <th width="5%">الموافقة</th>
                                    <th width="5%">معاينة</th>
                                    <th width="5%">عرض</th>
                                    <th width="5%">أضافة</th>
                                    <th width="5%">تعديل</th>                                    
                                    <th width="5%">حذف</th>   
                                    <th width="20%">الأقسام</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>      
                                    <td></td>
                                    <td></td>
                                    <td> <input type="checkbox" name="country_list" value="1" <?php if($row->country_list == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="country_add" value="1" <?php if($row->country_add == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="country_edit" value="1" <?php if($row->country_edit == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="country_del" value="1" <?php if($row->country_del == 1) echo ' checked="checked"'; ?>/></td>
                                    <td>الدول</td>
                                </tr>
                                <tr>   
                                    <td></td>
                                    <td></td>
                                    <td> <input type="checkbox" name="city_list" value="1" <?php if($row->city_list == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="city_add" value="1" <?php if($row->city_add == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="city_edit" value="1" <?php if($row->city_edit == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="city_del" value="1" <?php if($row->city_del == 1) echo ' checked="checked"'; ?>/></td>
                                    <td>المدن</td>
                                </tr>
                                <tr> 
                                    <td></td>
                                    <td></td>
                                    <td> <input type="checkbox" name="category_list" value="1" <?php if($row->category_list == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="category_add" value="1" <?php if($row->category_add == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="category_edit" value="1" <?php if($row->category_edit == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="category_del" value="1" <?php if($row->category_del == 1) echo ' checked="checked"'; ?>/></td>
                                    <td>أقسام الأخبار الرئيسية</td>
                                </tr>
                                <tr>  
                                    <td></td>
                                    <td></td>
                                    <td> <input type="checkbox" name="sub_list" value="1" <?php if($row->sub_list == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="sub_add" value="1" <?php if($row->sub_add == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="sub_edit" value="1" <?php if($row->sub_edit == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="sub_del" value="1" <?php if($row->sub_del == 1) echo ' checked="checked"'; ?>/></td>
                                    <td>أقسام الأخبار الفرعية</td>
                                </tr>
                                <tr>  
                                    <td></td>
                                    <td></td>
                                    <td> <input type="checkbox" name="writer_list" value="1" <?php if($row->writer_list == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="writer_add" value="1" <?php if($row->writer_add == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="writer_edit" value="1" <?php if($row->writer_edit == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="writer_del" value="1" <?php if($row->writer_del == 1) echo ' checked="checked"'; ?>/></td>
                                    <td>كتاب الأخبار</td>
                                </tr>
                                <tr>  
                                    <td></td>
                                    <td> <input type="checkbox" name="news_view" value="1" <?php if($row->news_view == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="news_list" value="1" <?php if($row->news_list == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="news_add" value="1" <?php if($row->news_add == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="news_edit" value="1" <?php if($row->news_edit == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="news_del" value="1" <?php if($row->news_del == 1) echo ' checked="checked"'; ?>/></td>
                                    <td>الأخبار</td>
                                </tr>
                                <tr> 
                                    <td></td>
                                    <td></td>
                                    <td> <input type="checkbox" name="vedio_category_list" value="1" <?php if($row->vedio_category_list == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="vedio_category_add" value="1" <?php if($row->vedio_category_add == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="vedio_category_edit" value="1" <?php if($row->vedio_category_edit == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="vedio_category_del" value="1" <?php if($row->vedio_category_del == 1) echo ' checked="checked"'; ?>/></td>
                                    <td>أقسام الفيديو</td>
                                </tr>
                                <tr> 
                                    <td></td>
                                    <td><input type="checkbox" name="video_view" value="1" <?php if($row->video_view == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="video_list" value="1" <?php if($row->video_list == 1) echo ' checked="checked"'; ?>/></td>
                                    <td><input type="checkbox" name="video_add" value="1" <?php if($row->video_add == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="video_edit" value="1" <?php if($row->video_edit == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="video_del" value="1" <?php if($row->video_del == 1) echo ' checked="checked"'; ?>/></td>
                                    <td>الفيديو</td>
                                </tr>
                                <tr> 
                                    <td></td>
                                    <td></td>
                                    <td> <input type="checkbox" name="photo_list" value="1" <?php if($row->photo_list == 1) echo ' checked="checked"'; ?>/></td>
                                    <td><input type="checkbox" name="photo_add" value="1" <?php if($row->photo_add == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="photo_edit" value="1" <?php if($row->photo_edit == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="photo_del" value="1" <?php if($row->photo_del == 1) echo ' checked="checked"'; ?>/></td>
                                    <td>الصور</td>
                                </tr>
                                <tr> 
                                    <td></td>
                                    <td></td>
                                    <td> <input type="checkbox" name="polls_list" value="1" <?php if($row->polls_list == 1) echo ' checked="checked"'; ?>/></td>
                                    <td></td>
                                    <td> <input type="checkbox" name="polls_edit" value="1" <?php if($row->polls_edit == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> </td>
                                    <td>أستطلاع الرأى</td>
                                </tr>
                                <tr> 
                                    <td> <input type="checkbox" name="news_comments_approve" value="1" <?php if($row->news_comments_approve == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="news_comments_view" value="1" <?php if($row->news_comments_view == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="news_comments_list" value="1" <?php if($row->news_comments_list == 1) echo ' checked="checked"'; ?>/></td>
                                    <td></td>
                                    <td> <input type="checkbox" name="news_comments_edit" value="1" <?php if($row->news_comments_edit == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="news_comments_del" value="1" <?php if($row->news_comments_del == 1) echo ' checked="checked"'; ?>/></td>
                                    <td>تعليقات الأخبار</td>
                                </tr>
                                <tr> 
                                    <td> <input type="checkbox" name="video_comments_approve" value="1" <?php if($row->video_comments_approve == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="video_comments_view" value="1" <?php if($row->video_comments_view == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="video_comments_list" value="1" <?php if($row->video_comments_list == 1) echo ' checked="checked"'; ?>/></td>
                                    <td></td>
                                    <td> <input type="checkbox" name="video_comments_edit" value="1" <?php if($row->video_comments_edit == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="video_comments_del" value="1" <?php if($row->video_comments_del == 1) echo ' checked="checked"'; ?>/></td>
                                    <td>تعليقات الفيديو</td>
                                </tr>
                                <tr> 
                                    <td> <input type="checkbox" name="photo_comments_approve" value="1" <?php if($row->photo_comments_approve == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="photo_comments_view" value="1" <?php if($row->photo_comments_view == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="photo_comments_list" value="1" <?php if($row->photo_comments_list == 1) echo ' checked="checked"'; ?>/></td>
                                    <td></td>
                                    <td> <input type="checkbox" name="photo_comments_edit" value="1" <?php if($row->photo_comments_edit == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="photo_comments_del" value="1" <?php if($row->photo_comments_del == 1) echo ' checked="checked"'; ?>/></td>
                                    <td>تعليقات الصور</td>
                                </tr>
                                <tr> 
                                    <td> </td>
                                    <td> <input type="checkbox" name="users_profile" value="1" <?php if($row->users_profile == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="users_list" value="1" <?php if($row->users_list == 1) echo ' checked="checked"'; ?>/></td>
                                    <td><input type="checkbox" name="users_add" value="1" <?php if($row->users_add == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="users_edit" value="1" <?php if($row->users_edit == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="users_del" value="1" <?php if($row->users_del == 1) echo ' checked="checked"'; ?>/></td>
                                    <td>الأعضاء</td>
                                </tr>
                                <tr>   
                                    <td></td>
                                    <td></td>
                                    <td> <input type="checkbox" name="admins_list" value="1" <?php if($row->admins_list == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="admins_add" value="1" <?php if($row->admins_add == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="admins_edit" value="1" <?php if($row->admins_edit == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="admins_del" value="1" <?php if($row->admins_del == 1) echo ' checked="checked"'; ?>/></td>
                                    <td>المديرين</td>
                                </tr>
                                <tr> 
                                    <td></td>
                                    <td></td>
                                    <td> <input type="checkbox" name="group_list" value="1" <?php if($row->group_list == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="group_add" value="1" <?php if($row->group_add == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="group_edit" value="1" <?php if($row->group_edit == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="group_del" value="1" <?php if($row->group_del == 1) echo ' checked="checked"'; ?>/></td>
                                    <td>المجموعات</td>
                                </tr>
                                <tr> 
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td> <input type="checkbox" name="permission_edit" value="1" <?php if($row->permission_edit == 1) echo ' checked="checked"'; ?>/></td>
                                    <td></td>
                                    <td>الصلاحيات</td>
                                </tr>
                                <tr> 
                                    <td></td>
                                    <td></td>
                                    <td> <input type="checkbox" name="config_list" value="1" <?php if($row->config_list == 1) echo ' checked="checked"'; ?>/></td>
                                    <td></td>
                                    <td> <input type="checkbox" name="config_edit" value="1" <?php if($row->config_edit == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> </td>
                                    <td>الأعدادات الرئيسية للموقع</td>
                                </tr>
                                <tr> 
                                    <td></td>
                                    <td><input type="checkbox" name="contact_view" value="1" <?php if($row->contact_view == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> <input type="checkbox" name="contact_list" value="1" <?php if($row->contact_list == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> </td>
                                    <td></td>
                                    <td> <input type="checkbox" name="contact_del" value="1" <?php if($row->contact_del == 1) echo ' checked="checked"'; ?>/></td>
                                    <td>أتصل بنا</td>
                                </tr>
                                <tr> 
                                    <td></td>
                                    <td></td>
                                    <td> <input type="checkbox" name="newsletter_list" value="1" <?php if($row->newsletter_list == 1) echo ' checked="checked"'; ?>/></td>
                                    <td> </td>
                                    <td></td>
                                    <td></td>
                                    <td>النشرة البريدية</td>
                                </tr>

                            </tbody>
                        </table>                        
                        
                        <div class="row-form">
                            <div class="span2"><?php echo form_submit('submit', 'تعديل', 'class="btn btn-block"'); ?></div>
                            <?php echo form_close(); ?> 
                            <div class="clear"></div>
                        </div> 
                        
                        
                        
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
