<?php include 'db_connect.php' ?>

<div class="container-fluid">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<large class="card-title">
					<b>قائمه الرحلات المحجوزه</b>
				</large>
				
			</div>

			<div class="card-body">
			<table class="table table-bordered" id="flight-list">
					<colgroup>
						<!-- <col width="10%">
						<col width="30%">
						<col width="50%">
						<col width="10%"> -->
					</colgroup>
					<thead>
						<tr>
							<th class="text-center">الرقم</th>
							<th class="text-center">الأسم</th>
							<th class="text-center">رقم الهاتف</th>
							<th class="text-center">الوجهه</th>
							<th class="text-center">تاريخ المغادره</th>
							<th class="text-center">تاريخ الرجوع </th>
							<th class="text-center">نوع الرحله</th>
							<th class="text-center">الوزن</th>
							<th class="text-center">الاحداث</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$airport = $conn->query("SELECT * FROM airport_list ");
							while($row = $airport->fetch_assoc()){
								$aname[$row['id']] = ucwords($row['airport'].', '.$row['location']);
							}
							$i=1;
							$qry = $conn->query("SELECT * FROM booked_flight");
							while($row = $qry->fetch_assoc()):

						 ?>
						 <tr>
						 	
						 	 <td><?php echo $i++ ?></td>
						 	 <td><?php echo $row['name'] ?></td>
							 <td><?php echo $row['phone'] ?></td>
							 <td><?php echo $row['desination_city'] ?></td>
							 <td><?php echo $row['departure_time'] ?></td>
							 <td><?php echo $row['return_time'] ?></td>
							 <td><?php echo $row['type'] ?></td>
							 <td><?php echo $row['weight'] ?></td>
							 <td>
				 		        <center>
								<div class="btn-group">
								  <button type="button" class="btn btn-primary">الاحداث</button>
								  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <div class="dropdown-menu">
								    <a class="dropdown-item edit_booked" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>تعديل</a>
								    <div class="dropdown-divider"></div>
								    <a class="dropdown-item delete_booked" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>حذف</a>
								  </div>
								</div>
								</center>
				 	         </td>
						 	<!-- <td class="text-center">
						 			<button class="btn btn-outline-primary btn-sm edit_booked" type="button" data-id="<?php echo $row['bid'] ?>"><i class="fa fa-edit"></i></button>
						 			<button class="btn btn-outline-danger btn-sm delete_booked" type="button" data-id="<?php echo $row['bid'] ?>"><i class="fa fa-trash"></i></button>
						 	</td> -->

						 </tr>

						<?php endwhile; ?>
					</tbody>
				</table>
			</div>

		</div>
	</div>
</div>
<style>
	td p {
		margin:unset;
	}
	td img {
	    width: 8vw;
	    height: 12vh;
	}
	td{
		vertical-align: middle !important;
	}
</style>	
<script>
	$('#flight-list').dataTable()
	$('.edit_booked').click(function(){
		uni_modal("تعديل المعلومات","manage_booked.php?id="+$(this).attr('data-id'),'mid-large')
	})
	$('.delete_booked').click(function(){
		_conf("هل انت واثق من انك تريد حذف الحجز ؟","delete_booked",[$(this).attr('data-id')])
	})
function delete_booked($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_flight',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("تم حذف الحجز بنجاح",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>