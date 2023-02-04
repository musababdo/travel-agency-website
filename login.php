<!-- <?php
include("dbconnection.php");
?> -->

<?php
if(isset($_SESSION['id']))
{
	echo "<script>window.location='index.php?page=flights';</script>";
}
$err='';
if(isset($_POST['submit']))
{	
	$sql = "SELECT * FROM login WHERE email='$_POST[email]' AND password='$_POST[password]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_num_rows($qsql) == 1)
	{
		$rslogin = mysqli_fetch_array($qsql);
		$_SESSION[id]= $rslogin[id] ;
		$_SESSION[phone]= $rslogin[phone] ;
		echo "<script>window.location='index.php?page=flights';</script>";
	}
	else
	{
		$err = "<div class='alert alert-danger'>
		<strong>خطاء !</strong> هنالك خطاء ما
	</div>";
	}
}
		
?>

<div class="container-fluid">
	<form action="" method="post" style="padding-top:150px;">
		<div class="form-group">
			<label for="" class="control-label">البريد الالكتروني</label>
			<input type="email" name="email" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">كلمه المرور</label>
			<input type="password" name="password" required="" class="form-control">
			<!-- <small><a href="javascript:void(0)" id="new_account">أنشاء حساب جديد</a></small> -->
			<input type="submit" name="submit" id="submit" value="تسجيل دخول" class="button btn btn-info btn-sm g-bg-cyan" /></div>
		</div>
		<input type="submit" name="submit" id="submit" onclick="location.href='index.php?page=register'" value="انشاء حساب" class="button btn btn-success btn-sm g-bg-cyan" /></div>
			<!-- <small><a href="javascript:void(0)" id="new_account">أنشاء حساب جديد</a></small> -->
	</form>
</div>

<style>
	#uni_modal .modal-footer{
		display:none;
	}
</style>

<script>
	$('#new_account').click(function(){
		uni_modal("أنشاء حساب جديد",'signup.php?redirect=index.php?page=checkout')
	})
	$('#login-frm').submit(function(e){
		e.preventDefault()
		$('#login-frm button[type="submit"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'admin/ajax.php?action=login2',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php?page=flights' ?>';
				}else{
					$('#login-frm').prepend('<div class="alert alert-danger">اسم المستخدم او كلمه المرور غير صحيحه</div>')
					$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>