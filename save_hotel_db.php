<?php

//print_r($_POST); //ตรวจสอบมี input อะไรบ้าง และส่งอะไรมาบ้าง 
//ถ้ามีค่าส่งมาจากฟอร์ม
if (isset($_POST['name_hotel']) && isset($_POST['type'])) {
	// sweet alert 
	echo '
   <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

	//ไฟล์เชื่อมต่อฐานข้อมูล
	include('server.php');
	//ประกาศตัวแปรรับค่าจากฟอร์ม

	$name_hotel = $_POST['name_hotel'];
	$type_ = $_POST['type'];
	$sql = "INSERT INTO hotel(name_hotel) VALUES ('{$name_hotel} - {$type_}')";
	
	if ($con->query($sql) === TRUE) {
		echo '<script>
		setTimeout(function() {
		 swal({
			 title: "Success",
			 text: "Register Success",
			 type: "success"
		 }, function() {
			 window.location = "addhotel.php"; //หน้าที่ต้องการให้กระโดดไป
		 });
	   }, 1000);
   </script>';
	} else {
		echo '<script>
		setTimeout(function() {
		 swal({
			 title: "WebApp Error",
			 type: "error"
		 }, function() {
			 window.location = "index.php"; //หน้าที่ต้องการให้กระโดดไป
		 });
	   }, 1000);
   </script>';
		}
} else {
	echo '<script>
	setTimeout(function() {
	 swal({
		 title: "try again",
		 type: "try again"
	 }, function() {
		 window.location = "addhotel.php"; //หน้าที่ต้องการให้กระโดดไป
	 });
   }, 1000);
</script>';
}
		$con = null; //close connect db
?> 