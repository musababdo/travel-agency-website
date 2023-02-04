<?php 
include 'admin/db_connect.php'; 
if($_SERVER['REQUEST_METHOD'] == "POST"){
	foreach($_POST as $k => $v){
		$$k = $v;
	}
}
$id = $_SESSION['id'];
?>
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4 page-title">
                    	<h3 class="text-white">حجوزاتي</h3>
                        <hr class="divider my-4" />
                        <div class="col-md-12 mb-2 text-left">
                        <div class="card">
                            <div class="card-body">
                                <form id="manage-filter"  method="POST">
								<?php    
            $query_res= mysqli_query($con,"select * from booked_flight where u_id='$id'");
            if(mysqli_num_rows($query_res)){
                while($r=mysqli_fetch_array($query_res)){		
                  echo '<table  border="0" cellspacing="0" cellpadding="0">
                  <tr>
                
                    <tr >
                    <td>'.$r['name'].'</td>
                      <td><b> : الأسم</b></td>
                    </tr>
                    <tr >
                    <td>'.$r['phone'].'</td>
                      <td><b> : رقم الهاتف</b></td>
                    </tr>
                    <tr >
                        <td>'.$r['departure_city'].'</td>
                      <td><b> : بلد المغادره</b></td>
                    </tr>
					<tr >
                        <td>'.$r['desination_city'].'</td>
                      <td><b> : الوجهه</b></td>
                    </tr>
					<tr >
                        <td>'.$r['departure_time'].'</td>
                      <td><b> : تاريخ المغادره</b></td>
                    </tr>
					<tr >
                        <td>'.$r['return_time'].'</td>
                      <td><b> : تاريخ الرجوع</b></td>
                    </tr>
					<tr >
                        <td>'.$r['type'].'</td>
                      <td><b> : نوع الرحله</b></td>
                    </tr>
                
                 
                </table>';				
                }	
               }else{
                echo '<h5 class="card-title">ليس لديك حجوزات</h5>';
               }
        ?>
                                </form>
                            </div>
                        </div>
                    </div>                        
                    </div>
                    </div>
                    
                </div>
            </div>
        </header>
	<section class="page-section" id="flight" >

	<div id="portfolio" class="container">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-lg-12 text-center">
                    <h2 class="mb-4">شركات الطيران الشريكه</h2>
                    <hr class="divider">

                    </div>
                </div>
                <div class="row no-gutters">
                    <?php
                    $cats = $conn->query("SELECT * FROM airlines_list order by rand() asc");
                                while($row=$cats->fetch_assoc()):
                    ?>
                    <div class="col-lg-4 col-sm-6">
                        <div class="portfolio-box" href="#">
                            <img class="img-fluid" src="assets/img/<?php echo $row['logo_path'] ?>" alt="" />
                            
                        <!-- <div class="port-content text-center">
                           <a class="btn-primary btn">البحث عن الرحلات الجويه</a>
                        </div> -->
                        </div>
                    </div>
                    <?php endwhile; ?>
                    
                </div>
            </div>
        </div>

        <!-- <div class="container">
        	<div class="card">
        		<div class="card-body">
        			<div class="col-lg-12">
						<div class="row">
							<div class="col-md-12 text-center">
								<h2><b><?php echo isset($trip) && $trip == 2 ? "نتائج بحث رحله المغادره..." : ( !isset($trip)? " الرحلات المتاحه" :"البحث عن نتائج الرحلات الجويه...")  ?></b></h2>
							</div>
						</div>
						<hr class="divider">
				<?php 
				$airport = $conn->query("SELECT * FROM airport_list ");
				while($row = $airport->fetch_assoc()){
					$aname[$row['id']] = ucwords($row['airport'].', '.$row['location']);
				}
				$where = " where date(f.departure_datetime) > '".date("Y-m-d")."' ";
				if($_SERVER['REQUEST_METHOD'] == "POST" )
				$where .= " and f.departure_airport_id ='$departure_airport_id' and f.arrival_airport_id = '$arrival_airport_id' and date(f.departure_datetime) = '".date('Y-m-d',strtotime($date))."'  ";
				$flight = $conn->query("SELECT f.*,a.airlines,a.logo_path FROM flight_list f inner join airlines_list a on f.airline_id = a.id $where order by rand()");
				if($flight->num_rows > 0):
				while($row=$flight->fetch_assoc()):
					$booked = $conn->query("SELECT * FROM booked_flight where flight_id = ".$row['id'])->num_rows;
				?>
				<div class="row align-items-center">
					<div class="col-md-3">
						<img src="assets/img/<?php echo $row['logo_path'] ?>" alt="">
					</div>
					<div class="col-md-6">
						 <p><b><?php echo $aname[$row['departure_airport_id']].' - '.$aname[$row['arrival_airport_id']] ?></b></p>
						 <p><small>Airline: <b><?php echo $row['airlines'] ?></b></small></p>
						 <p><small>Departure: <b><?php echo date('h:i A',strtotime($row['departure_datetime'])) ?></b></small></p>
						 <p><small>Arrival: <b><?php echo (date('M d,Y',strtotime($row['departure_datetime'])) == date('M d,Y',strtotime($row['arrival_datetime']))) ? date('h:i A',strtotime($row['arrival_datetime'])) : date('M d,Y h:i A',strtotime($row['arrival_datetime'])) ?></b></small></p>
						 <p>Available Seats : <b><h4><?php echo $row['seats'] - $booked ?></h4></b></p>
					</div>
					<div class="col-md-3 text-center align-self-end-sm">
						<h4 class="text-right"><b><?php echo number_format($row['price'],2) ?></b></h4>
						<button class="btn-outline-primary  btn  mb-4 book_flight" type="button" data-id="<?php echo $row['id'] ?>"  data-name="<?php echo $aname[$row['departure_airport_id']].' - '.$aname[$row['arrival_airport_id']] ?>" data-max="<?php echo $row['seats'] - $booked ?>">Book Now</button>
					</div>
				</div>
				<hr class="divider" style="max-width: 60vw">
				<?php endwhile; ?>
				<?php else: ?>
					<div class="row align-items-center">
						<h5 class="text-center"><b>لاتوجد نتائج</b></h5>
					</div>
				<?php endif; ?>
					
				<?php if(isset($trip) && $trip ==2): ?>
					<hr>
					<div class="row">
						<div class="col-md-12 text-center">
							<h2><b><?php echo isset($trip) && $trip == 2 ? "نتائج بحث رحله الوصول" : ( !isset($trip)? "الرحلات المتاحه" :"نتائج البحث عن رحلات الطيران...")  ?></b></h2>
						</div>
					</div>
						<hr class="divider">
				<?php 
				$airport = $conn->query("SELECT * FROM airport_list ");
				while($row = $airport->fetch_assoc()){
					$aname[$row['id']] = ucwords($row['airport'].', '.$row['location']);
				}
				$where = " where date(f.departure_datetime) > '".date("Y-m-d")."' ";
				if($_SERVER['REQUEST_METHOD'] == "POST" )
				$where .= " and f.departure_airport_id ='$arrival_airport_id' and f.arrival_airport_id = '$departure_airport_id' and date(f.departure_datetime) = '".date('Y-m-d',strtotime($date_return))."'  ";
				$flight = $conn->query("SELECT f.*,a.airlines,a.logo_path FROM flight_list f inner join airlines_list a on f.airline_id = a.id $where order by rand()");
				if($flight->num_rows > 0):
				while($row=$flight->fetch_assoc()):
					$booked = $conn->query("SELECT * FROM booked_flight where flight_id = ".$row['id'])->num_rows;

				?>
				<div class="row align-items-center">
					<div class="col-md-3">
						<img src="assets/img/<?php echo $row['logo_path'] ?>" alt="">
					</div>
					<div class="col-md-6">
						 <p><b><?php echo $aname[$row['departure_airport_id']].' - '.$aname[$row['arrival_airport_id']] ?></b></p>
						 <p><small>Airline: <b><?php echo $row['airlines'] ?></b></small></p>
						 <p><small>Departure: <b><?php echo date('h:i A',strtotime($row['departure_datetime'])) ?></b></small></p>
						 <p><small>Arrival: <b><?php echo (date('M d,Y',strtotime($row['departure_datetime'])) == date('M d,Y',strtotime($row['arrival_datetime']))) ? date('h:i A',strtotime($row['arrival_datetime'])) : date('M d,Y h:i A',strtotime($row['arrival_datetime'])) ?></b></small></p>
						 <p>Available Seats : <b><h4><?php echo $row['seats'] - $booked ?></h4></b></p>
					</div>
					<div class="col-md-3 text-center align-self-end-sm">
						<h4 class="text-right"><b><?php echo number_format($row['price'],2) ?></b></h4>
						<button class="btn-outline-primary  btn  mb-4 book_flight" type="button" data-id="<?php echo $row['id'] ?>"  data-name="<?php echo $aname[$row['departure_airport_id']].' - '.$aname[$row['arrival_airport_id']] ?>" data-max="<?php echo $row['seats'] - $booked ?>">Book Now</button>
					</div>
				</div>
				<hr class="divider" style="max-width: 60vw">
				<?php endwhile; ?>
				<?php else: ?>
					<div class="row align-items-center">
						<h5 class="text-center"><b>لاتوجد نتائج</b></h5>
					</div>
				<?php endif; ?>
				<?php endif; ?>
				</div>
				</div>
        	</div>
        </div> -->
    </section>
    <style>
    	#flight img{
    		max-height: 300px;
    		max-width: 200px; 
    	}
    	#flight p{
    		margin: unset
      	}
    </style>
    <script>
        
       $('.view_schedule').click(function(){
			uni_modal($(this).attr('data-name')+" - Schedule","view_doctor_schedule.php?id="+$(this).attr('data-id'))
		})
       $('.book_flight').click(function(){
       	if($(this).attr('data-max') <= 0){
       		alert("There is no Available Seats for the selected flight");
       		return false;
       	}
			uni_modal($(this).attr('data-name'),"book_flight.php?id="+$(this).attr('data-id')+"&max="+$(this).attr('data-max'),'mid-large')
		})
        $('[name="trip"]').on("keypress change keyup",function(){
            if($(this).val() == 1){
                $('#rdate').hide()
            }else{
                $('#rdate').show()
            }
        })
    </script>
	
