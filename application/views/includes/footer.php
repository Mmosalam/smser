<!-- BEGIN PRE-FOOTER -->
        <div class="page-prefooter">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                        <h2>عن الشركة</h2>
                        <p>
                             هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة.
                        </p>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs12 footer-block">
                        <h2>النشرة البريدية</h2>
                        <div class="subscribe-form">
                            <form action="javascript:;">
                                <div class="input-group">
                                    <input type="text" placeholder="mail@email.com" class="form-control">
                                    <span class="input-group-btn">
                                    <button class="btn" type="submit">أشتراك</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                        <h2>تابعنا على</h2>
                        <ul class="social-icons">
                            <li>
                                <a href="javascript:;" data-original-title="rss" class="rss"></a>
                            </li>
                            <li>
                                <a href="javascript:;" data-original-title="facebook" class="facebook"></a>
                            </li>
                            <li>
                                <a href="javascript:;" data-original-title="twitter" class="twitter"></a>
                            </li>
                            <li>
                                <a href="javascript:;" data-original-title="googleplus" class="googleplus"></a>
                            </li>
                            <li>
                                <a href="javascript:;" data-original-title="linkedin" class="linkedin"></a>
                            </li>
                            <li>
                                <a href="javascript:;" data-original-title="youtube" class="youtube"></a>
                            </li>
                            <li>
                                <a href="javascript:;" data-original-title="vimeo" class="vimeo"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                        <h2>تواصل معنا</h2>
                        <address class="margin-bottom-40">
                         الهاتف: 800 123 3456<br>
                         البريد الإلكترونى: <a href="mailto:info@metronic.com">info@metronic.com</a>
                        </address>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PRE-FOOTER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="container">
                 جميع الحقوق محفوظة 2015 &copy;
            </div>
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
        <!-- END FOOTER -->
        <!-- BEGIN JAVASCRIPTS (Load javascripts at bottom, this will reduce page load time) -->
        <!-- BEGIN CORE PLUGINS -->
        <!--[if lt IE 9]>
        <script src="<?php echo base_url() ;?>assets/global/plugins/respond.min.js"></script>
        <script src="<?php echo base_url() ;?>assets/global/plugins/excanvas.min.js"></script> 
        <![endif]-->
        <script src="<?php echo base_url() ;?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ;?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
        <!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
        <script src="<?php echo base_url() ;?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ;?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ;?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ;?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ;?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ;?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ;?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        
		<script>
            $(document).ready(function() {
                $(".type").click(function() {
                    var type = $(this).attr("data-type");
                    $('.typo').val(type);
                });
            });
        </script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url() ;?>assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ;?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ;?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ;?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ;?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ;?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ;?>assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
        <!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
        <script src="<?php echo base_url() ;?>assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ;?>assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ;?>assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
        <script src="<?php echo base_url() ;?>assets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ;?>assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ;?>assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ;?>assets/admin/pages/scripts/index3.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ;?>assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ;?>assets/admin/pages/scripts/contact-us.js"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <script>
        jQuery(document).ready(function() {    
           Metronic.init(); // init metronic core componets
           Layout.init(); // init layout
           Demo.init(); // init demo(theme settings page)
           Index.init(); // init index page
           Tasks.initDashboardWidget(); // init tash dashboard widget
		   ContactUs.init();
        });
        </script>
        
        <script>
			function calculateCount(){
			
				var length = $(this).val().length;
				var total;
			
				if (isArabic($(this).val())) {
			
					total = 70;
				} else {
			
					total = 160;
				}
			
				$("#smsTotal").text(total);
			
				var msgCount = Math.ceil(length / total);
				var smsCount = length % total;
			
				if (msgCount == 0)
					msgCount = 1;
			
				$("#msgCount").text(msgCount);
				$("#smsCount").text(smsCount);
			}
			
			$(document).on('keyup', '#txtsms', calculateCount);
			$(document).on('keydown','#txtsms', calculateCount);
			
			function isArabic(string){
				var arabic = /[\u0600-\u06FF]/;
				return arabic.test(string);
			}		   
		
		</script>

        <!-- END JAVASCRIPTS -->
    </body>
    <!-- END BODY -->
</html>