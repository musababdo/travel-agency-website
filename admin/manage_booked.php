<?php 
include('db_connect.php');
$qry = $conn->query("SELECT * FROM booked_flight where id = ".$_GET['id']);
foreach($qry->fetch_array() as $k => $v){
	$$k = $v;
}
?>
<div class="container-fluid">
	<div class="col-lg-12">
	<form action="" id="book-flight">
		<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
		<div class="row">
			<div class="col-md-6">
				<label class="control-label">الأسم</label>
				<input type="text" name="name" class="form-control" value="<?php echo $name ?>">
			</div>
			<div class="col-md-6">
				<label class="control-label">رقم الهاتف</label>
				<input type="text" name="phone" class="form-control" value="<?php echo $phone ?>">
			</div>
		</div>

		<div class="row">
		
			<div class="col-md-6">
				<label class="control-label">الوجهه</label>
				<input type="text" name="desination_city" class="form-control" value="<?php echo $desination_city ?>">
			</div>
			<div class="col-md-6">
				<label class="control-label">تاريخ المغادره</label>
				<input type="date" class="form-control input-sm datetimepicker2" name="departure_time" autocomplete="off" value="<?php echo $departure_time; echo isset($date) && !empty($date) ? date("Y-m-d",strtotime($date)) : "" ?>">
			</div>
			<div class="col-md-6">
				<label class="control-label">تاريخ الرجوع</label>
				<input type="date" class="form-control input-sm datetimepicker2" name="return_time" autocomplete="off" value="<?php echo $return_time; echo isset($date) && !empty($date) ? date("Y-m-d",strtotime($date)) : "" ?>">
			</div>
			<!-- <div class="col-md-6">
				<label class="control-label">نوع الرحله</label>
				<input type="text" name="contact" class="form-control" value="<?php echo $type ?>">
			</div> -->
			<div class="row form-group">
                                        <div class="col-md text-center">
                                            <div class="form-check">
                                              <input class="form-check-input" type="radio" name="type" id="onewway" value="ذهاب" >
                                              <label class="form-check-label" for="onewway">
                                                ذهاب                                              
                                              </label>
                                            </div>
                                        </div>
                                        <div class="col-md text-center">
                                            <div class="form-check">
                                              <input class="form-check-input" type="radio" name="type" id="rtrip" value="ذهاب و عوده">
                                              <label class="form-check-label" for="rtrip">
                                               ذهاب و عوده                                              
                                              </label>
                                            </div>                                           
                                    </div>
		                       </div>
		                  <div id="row-field">
		                    <div class="row ">
			                	<div class="col-md-12 text-center">
					              <button class="btn btn-primary btn-sm " >تعديل</button>
					              <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">الغاء</button>
				                </div>
			                </div>
		                </div>
		
	</form>
	</div>
</div>
<script>
	$('#go').click(function(){
		start_load()
		$.ajax({
			url:"get_fields.php?count="+$('#count').val(),
			success:function(resp){
				if(resp){
					$('#row-field').prepend(resp)
					$('#qty').hide()
					$('#row-field').show()
					end_load()
				}
			}

		})
	})
	$('#book-flight').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=update_booked',
			method:"POST",
			data:$(this).serialize(),
			success:function(resp){
				if(resp ==1 ){
					$('.modal').modal('hide')
					alert_toast("تم تعديل الحجز بنجاح","success")
					setTimeout(function(){
						location.reload();
					},1500)
				}
			}
		})
	})
</script>
<style>
	#uni_modal .modal-footer{
		display: none
	}
</style>