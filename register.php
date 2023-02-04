<!-- <?php
include("dbconnection.php");
?> -->

<div class="container-fluid">
	<form action="" id="signup-frm" style="padding-top:100px;" action="registerinfo.php">
		<div class="form-group">
			<label for="" class="control-label">الأسم</label>
			<input type="text" name="name" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">رقم الهاتف</label>
			<input type="number" name="phone" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">العنوان</label>
			<textarea cols="30" rows="3" name="address" required="" class="form-control"></textarea>
		</div>
		<div class="form-group">
			<label for="" class="control-label">البريد الألكتروني</label>
			<input type="email" name="email" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">كلمه المرور</label>
			<input type="password" name="password" required="" class="form-control">
		</div>
		<button class="button btn btn-info btn-sm">أنشاء الحساب</button>
	</form>
</div>

<style>
	#uni_modal .modal-footer{
		display:none;
	}
</style>

<script>
	$('#signup-frm').submit(function(e){
		e.preventDefault()
		$('#signup-frm button[type="submit"]').attr('disabled',true).html('جاري الحفظ...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'admin/ajax.php?action=signup',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#signup-frm button[type="submit"]').removeAttr('disabled').html('Create');

			},
			success:function(resp){
				if(resp == 1){
					//location.reload();
                    location.href ='<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php?page=login' ?>';
				}else{
					// $('#signup-frm').prepend('<div class="alert alert-danger">البريد الألكتروني موجود بالفعل</div>')
					$('#signup-frm button[type="submit"]').removeAttr('disabled').html('Create');
				}
			}
		})
	})
</script>