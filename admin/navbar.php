
<style>
</style>
<nav id="sidebar" class='mx-lt-5 bg-dark' >
		
		<div class="sidebar-list">

				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> الرئيسيه</a>
				<a href="index.php?page=booked" class="nav-item nav-booked"><span class='icon-field'><i class="fa fa-book"></i></span> الحجوزات</a>
				<a href="index.php?page=charge" class="nav-item nav-charge"><span class='icon-field'><i class="fa fa-book"></i></span> تقارير الشحن</a>
				<a href="index.php?page=insurance" class="nav-item nav-insurance"><span class='icon-field'><i class="fa fa-book"></i></span> تقارير التأمين</a>
				<a href="index.php?page=airport" class="nav-item nav-airport"><span class='icon-field'><i class="fa fa-map-marked-alt"></i></span> المطارات</a>		
				<a href="index.php?page=airlines" class="nav-item nav-airport"><span class='icon-field'><i class="fa fa-building"></i></span> الخطوط الجويه</a>		
				<?php if($_SESSION['login_type'] == 1): ?>
				<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> المستخدمين</a>
				<a href="index.php?page=bwdates-report-ds" class="nav-item nav-booked"><span class='icon-field'><i class="fa fa-book"></i></span> تقارير الحجز</a>
				<a href="index.php?page=site_settings" class="nav-item nav-site_settings"><span class='icon-field'><i class="fa fa-cog"></i></span>الاعدادات</a>
			<?php endif; ?>
		</div>

</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
