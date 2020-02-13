<?php
$servername = "smdb2.ckwlewdgil7r.us-east-2.rds.amazonaws.com";
$username = "smartmirror";
$password = "hksahfih18$?";
$dbname = "smartmirror";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if($conn->connect_error){
        die('Connect error: ' . $conn->connect_error);
}

else{
	$sql = 'SELECT clock_state, clockX, clockY, weather_state, weatherX, weatherY, greeting_state, greetingX, greetingY FROM settings WHERE currently_used=1';

        $result = $conn->query($sql);

	if($result->num_rows > 0){
		//output data of each row
		while($row = $result->fetch_assoc()){
			echo "clockX: " . $row["clockX"]. " - clockY: " . $row["clockY"]. " - clock state: ". $row["clock_state"]. " - ". "weatherX: ". $row["weatherX"]. " - weatherY: ". $row["weatherY"]. " - weather state: ". $row["weather_state"]. " - greetingX: ". $row["greetingX"]. " - greetingY: ". $row["greetingY"]. " - greeting state: ". $row["greeting_state"];

			//package up the output data into variables to be passed into an array and encoded in a json string
			$clockX = $row["clockX"];
			$clockY = $row["clockY"];
			$clock_state = $row["clock_state"];
			$weatherX = $row["weatherX"];
			$weatherY = $row["weatherY"];
			$weather_state = $row["weather_state"];
			$greetingX = $row["greetingX"];
			$greetingY = $row["greetingY"];
			$greeting_state = $row["greeting_state"];

			//reassigning clock X & Y position as a string value
			if (($clockX >= 361 && $clockX <= 720) && ($clockY >= 1648 && $clockY <= 1920))
			{
				$clockPos = "top_bar";
			}

			if (($clockX >= 0 && $clockX <= 360) && ($clockY >= 960 && $clockY <= 1920))
			{
				$clockPos = "top_left";
			}

			if (($clockX >= 361 && $clockX <= 720) && ($clockY >= 1373 && $clockY <= 1647))
			{
				$clockPos = "top_center";
			}

			if (($clockX >= 721 && $clockX <= 1080) && ($clockY >= 960 && $clockY <= 1920))
			{
				$clockPos = "top_right";
			}

			if (($clockX >= 361 && $clockX <= 720) && ($clockY >= 1099 && $clockY <= 1372))
			{
				$clockPos = "upper_third";
			}

			if (($clockX >= 361 && $clockX <= 720) && ($clockY >= 824 && $clockY <= 1098))
			{
				$clockPos = "middle_center";
			}

			if (($clockX >= 361 && $clockX <= 720) && ($clockY >= 550 && $clockY <= 823))
			{
				$clockPos = "lower_third";
			}

			if (($clockX >= 0 && $clockX <= 360) && ($clockY >= 0 && $clockY <= 959))
			{
				$clockPos = "bottom_left";
			}

			if (($clockX >= 361 && $clockX <= 720) && ($clockY >= 275 && $clockY <= 549))
			{
				$clockPos = "bottom_center";
			}


			if (($clockX >= 721 && $clockX <= 1080) && ($clockY >= 0 && $clockY <= 959))
			{
				$clockPos = "bottom_right";
			}

			if (($clockX >= 361 && $clockX <= 720) && ($clockY >= 0 && $clockY <= 274))
			{
				$clockPos = "bottom_bar";
			}


			//reassigning weather X & Y position as a string value
                        if (($weatherX >= 361 && $weatherX <= 720) && ($weatherY >= 1648 && $weatherY <= 1920))
                        {
                                $weatherPos = "top_bar";
                        }

                        if (($weatherX >= 0 && $weatherX <= 360) && ($weatherY >= 960 && $weatherY <= 1920))
                        {
                                $weatherPos = "top_left";
                        }

                        if (($weatherX >= 361 && $weatherX <= 720) && ($weatherY >= 1373 && $weatherY <= 1647))
                        {
                                $weatherPos = "top_center";
                        }

                        if (($weatherX >= 721 && $weatherX <= 1080) && ($weatherY >= 960 && $weatherY <= 1920))
                        {
                                $weatherPos = "top_right";
                        }

                        if (($weatherX >= 361 && $weatherX <= 720) && ($weatherY >= 1099 && $weatherY <= 1372))
                        {
                                $weatherPos = "upper_third";
                        }

                        if (($weatherX >= 361 && $weatherX <= 720) && ($weatherY >= 824 && $weatherY <= 1098))
                        {
                                $weatherPos = "middle_center";
                        }

                        if (($weatherX >= 361 && $weatherX <= 720) && ($weatherY >= 550 && $weatherY <= 823))
                        {
                                $weatherPos = "lower_third";
                        }

                        if (($weatherX >= 0 && $weatherX <= 360) && ($weatherY >= 0 && $weatherY <= 959))
                        {
                                $weatherPos = "bottom_left";
                        }

                        if (($weatherX >= 361 && $weatherX <= 720) && ($weatherY >= 275 && $weatherY <= 549))
                        {
                                $weatherPos = "bottom_center";
                        }

                        if (($weatherX >= 721 && $weatherX <= 1080) && ($weatherY >= 0 && $weatherY <= 959))
                        {
                                $weatherPos = "bottom_right";
                        }

                        if (($weatherX >= 361 && $weatherX <= 720) && ($weatherY >= 0 && $weatherY <= 274))
                        {
                                $weatherPos = "bottom_bar";
                        }


			//reassigning greeting X & Y position as a string value
                        if (($greetingX >= 361 && $greetingX <= 720) && ($greetingY >= 1648 && $greetingY <= 1920))
                        {
                                $greetingPos = "top_bar";
                        }

                        if (($greetingX >= 0 && $greetingX <= 360) && ($greetingY >= 960 && $greetingY <= 1920))
                        {
                                $greetingPos = "top_left";
                        }

                        if (($greetingX >= 361 && $greetingX <= 720) && ($greetingY >= 1373 && $greetingY <= 1647))
                        {
                                $greetingPos = "top_center";
                        }

                        if (($greetingX >= 721 && $greetingX <= 1080) && ($greetingY >= 960 && $greetingY <= 1920))
                        {
                                $greetingPos = "top_right";
                        }

                        if (($greetingX >= 361 && $greetingX <= 720) && ($greetingY >= 1099 && $greetingY <= 1372))
                        {
                                $greetingPos = "upper_third";
                        }

                        if (($greetingX >= 361 && $greetingX <= 720) && ($greetingY >= 824 && $greetingY <= 1098))
                        {
                                $greetingPos = "middle_center";
                        }

                        if (($greetingX >= 361 && $greetingX <= 720) && ($greetingY >= 550 && $greetingY <= 823))
                        {
                                $greetingPos = "lower_third";
                        }

                        if (($greetingX >= 0 && $greetingX <= 360) && ($greetingY >= 0 && $greetingY <= 959))
                        {
                                $greetingPos = "bottom_left";
                        }

                        if (($greetingX >= 361 && $greetingX <= 720) && ($greetingY >= 275 && $greetingY <= 549))
                        {
                                $greetingPos = "bottom_center";
                        }

                        if (($greetingX >= 721 && $greetingX <= 1080) && ($greetingY >= 0 && $greetingY <= 959))
                        {
                                $greetingPos = "bottom_right";
                        }

                        if (($greetingX >= 361 && $greetingX <= 720) && ($greetingY >= 0 && $greetingY <= 274))
                        {
                                $greetingPos = "bottom_bar";
                        }

		}

		//create payload of data to be gotten by ajax call
		//We will follow the format of [state, x-coord, y-coord] in all payloads
		$data = array([$clock_state, $clockPos],[$weather_state, $weatherPos],[$greeting_state, $greetingPos]);

		//$fp = fopen('userDetails.json', 'w');
		//fwrite();

		//encode $data and echo the result
		echo json_encode($data);

	}

	else{
		echo "0 results";
	}

        $conn->close();
}

?>

