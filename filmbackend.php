<?php require_once('connect.php');
	session_start();
	
		$rent_duration=$_POST['duration'];
		$amount=$_POST['amount'];
		$x=0;
		$film_id=$_SESSION['film_id'];
		$user_id=$_SESSION['user_id'];
		
		/*if(isset($_GET['title'])){
		$title=$_GET['title'];
		echo $title;
		}else{
			echo "Can not see title";
		}*/
		//add detial to inv
		$q="INSERT INTO inventory (amount,film_id)
			VALUES ('$amount','$film_id')";
		$result=$mysqli->query($q);
		//calculate replacementcost
		$q1="SELECT * FROM film WHERE film_id='$film_id'";
		$sel1= mysqli_query($mysqli,$q1);
		if(mysqli_num_rows($sel1)>0){
			 $row = mysqli_fetch_assoc($sel1);
			 $x=$amount*$rent_duration*$row['rental_rate'];
		}
		//echo $x;
		//update film
		$selq="SELECT * FROM inventory WHERE film_id='$film_id'";
		$sel= mysqli_query($mysqli,$selq);
		if(mysqli_num_rows($sel)>0){
				$row = mysqli_fetch_assoc($sel);
				$inv_id=$row['inventory_id'];
				//echo $inv_id;
				$q2="UPDATE film SET inventory_id = '$inv_id', replacement_cost='$x' WHERE film_id='$film_id'";
				$upd= mysqli_query($mysqli,$q2);
				echo ("<script LANGUAGE='JavaScript'>
						window.location.href='inventory.php';
						</script>");
		}else{
			echo "error";
		}
		//insert data to rental
		$rental_date=date('Y/m/d');
		$return_date=date('Y-m-d', strtotime($rental_date. ' + 30 days'));
		//echo $rental_date;
		//echo $return_date;
		
		$customer_id=$_SESSION['user_id'];
		//echo $customer_id;
		$q2="INSERT INTO rental (customer_id,inventory_id,rental_date,return_date,amount)
			VALUES ('$customer_id','$inv_id','$rental_date','$return_date','$amount')";
		$result2=$mysqli->query($q2);
		
	
?>