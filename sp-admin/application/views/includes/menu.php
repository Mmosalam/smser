<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
					<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
					<form class="sidebar-search sidebar-search-bordered sidebar-search-solid" action="extra_search.html" method="POST">
						<a href="javascript:;" class="remove">
						<i class="icon-close"></i>
						</a>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="بحث عن عضو ...">
							<span class="input-group-btn">
							<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
							</span>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li class="start active open">
					<a href="<?php echo site_url('main') ?>">
					<i class="icon-home"></i>
					<span class="title">الرئيسية</span>
					<span class="selected"></span>
					</a>
					
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-users"></i>
					<span class="title">إدارة الأعضاء</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?php echo site_url('users/users_active') ?>">
								<i class="icon-user-following"></i> الأعضاء المفعلين
							</a>
						</li>
						<li>
							<a href="<?php echo site_url('users/users_not_active') ?>">
								<i class="icon-user-unfollow"></i> الأعضاء غير المفعلين
							</a>
						</li>
						<li>
							<a href="<?php echo site_url('users/users_banned') ?>">
								<i class="icon-ban"></i> الأعضاء المحظورين
							</a>
						</li>
					</ul>
				</li>
                
				<li>
					<a href="<?php echo site_url('credit/credit_requests') ?>">
					<i class="icon-wallet"></i>
					<span class="title">إدارة الرصيد</span>
					<span class="selected"></span>
					</a>
					
				</li>

				<li>
					<a href="<?php echo site_url('sender/sender_list') ?>">
					<i class="icon-call-out"></i>
					<span class="title">أرقام الأرسال</span>
					<span class="selected"></span>
					</a>
					
				</li>

                <li class="heading">
                    <h3 class="uppercase">خاص بالأدارة</h3>
                </li>
				<li>
					<a href="<?php echo site_url('users/admins_list') ?>">
					<i class="icon-shield"></i>
					<span class="title">المديرين</span>
					<span class="selected"></span>
					</a>
					
				</li>
				<li>
					<a href="#">
					<i class="icon-globe"></i>
					<span class="title">الصلاحيات</span>
					<span class="selected"></span>
					</a>
					
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>