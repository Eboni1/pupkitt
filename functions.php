<?php

function check_login($con)
{

	if(isset($_SESSION['id']))
	{

		$id = $_SESSION['id'];

		
				$query = "select * from users where id = '$id' limit 1";

				$result = mysqli_query($con,$query);
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					return $user_data;
				}
			
				
		
	
	}

	//redirect to login
	header("Location: ../index.php");
	die;

}

function generateRandom8DigitNumber() {
    // Generate a random number between 10000000 and 99999999
    $randomNumber = rand(10000000, 99999999);
    return $randomNumber;
}