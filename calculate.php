<?php

		require_once("dbconnect.php");
	date_default_timezone_set("Asia/Calcutta");


			if( isset($_POST['sd1']) && isset($_POST['sd2']) && isset($_POST['sd2']) && isset($_POST['canteen']))
			{
				$canteen=$_POST['canteen'];
				$md=$_POST['md'];
				$sd1=$_POST['sd1'];
				$sd2=$_POST['sd2'];
				$date=date("Y/m/d");
				if($canteen=='ANNAPURNA')
					$query="select price1,price2 from ann_menu where date='$date'";
				else if($canteen=='PRIVATE')
					$query="select price1,price2 from private_menu  where date='$date'";

				$db=mysqli_query($con,$query);
				$row=mysqli_fetch_array($db);	
				$p1=$row['price1'];
				$p2=$row['price2'];
				
				if($canteen=='ANNAPURNA')
					$total=$md*15+$sd1*$p1+$sd2*$p2;
				else if($canteen=='PRIVATE')
					$total=$md*40+$sd1*$p1+$sd2*$p2;

				echo $total;
			}
?>