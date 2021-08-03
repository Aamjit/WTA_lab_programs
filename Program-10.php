<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, td, th{
            border: 1px solid black;
            width: 33%;
            text-align: center;
            border-collapse:collapse;
            background-color:lightblue;
        }
        table { margin: auto; }
    </style>
</head>
<body>
<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "program_10";
			$a=[];
            $m=[];
			// Create connection
			// Opens a new connection to the MySQL server
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			//	Check connection and return an error description from the last connection error, if any
			if ($conn->connect_error)
				die("Connection failed: " . $conn->connect_error);
			$sql = "SELECT * FROM student";
			//	performs a query against the database
			$result = $conn->query($sql);
			echo "<br>";
			echo "<center> BEFORE SORTING </center>";
			echo "<table border='2'>";
				echo "<tr>";
					echo "<th>USN</th><th>NAME</th><th>Address</th></tr>"; 
					if ($result->num_rows> 0) {
						//	output data of each row and fetches a result row as an associative array
						while($row = $result->fetch_assoc()) {
							echo "<tr>";
								echo "<td>". $row["USN"]."</td>";
								echo "<td>". $row["Name"]."</td>";
								echo "<td>". $row["Address"]."</td></tr>";
								array_push($a,$row["USN"]);
                                array_push($m,$row["Name"]);
						}
					}
					else
						echo "Table is Empty";
			echo "</table>";
			$n=count($a);
			$b=$a;
			for ( $i = 0 ; $i< ($n - 1) ; $i++ ) {
				$pos= $i;
				for ( $j = $i + 1 ; $j < $n ; $j++ ) {
					if ( $a[$pos] > $a[$j] )
					$pos= $j;
				}
				if ( $pos!= $i ) {
					$temp=$a[$i];
					$a[$i] = $a[$pos];
					$a[$pos] = $temp;
				}
			}
			$c=[];
			$d=[];
			$result = $conn->query($sql);
			if ($result->num_rows> 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					for($i=0;$i<$n;$i++) {
						if($row["USN"]== $a[$i]) {
							$c[$i]=$row["Name"];
							$d[$i]=$row["Address"];
						}
					}
				}
			}


			echo "<br>";
			echo "<center> AFTER SORTING (sorted based on USN) <center>";
			echo "<table border='2'>";
				echo "<tr>";
					echo "<th>USN</th><th>NAME</th><th>Address</th></tr>"; 
					for($i=0;$i<$n;$i++) {
						echo "<tr>";
							echo "<td>". $a[$i]."</td>";
							echo "<td>". $c[$i]."</td>";
							echo "<td>". $d[$i]."</td></tr>";
					}
			echo "</table>";

            $n=count($a);
			$b=$m;
			for ( $i = 0 ; $i< ($n - 1) ; $i++ ) {
				$pos= $i;
				for ( $j = $i + 1 ; $j < $n ; $j++ ) {
					if ( $m[$pos] > $m[$j] )
					$pos= $j;
				}
				if ( $pos!= $i ) {
					$temp=$m[$i];
					$m[$i] = $m[$pos];
					$m[$pos] = $temp;
				}
			}
			$c_1=[];
			$d_1=[];
			$result_1 = $conn->query($sql);
			if ($result_1->num_rows> 0) {
				// output data of each row
				while($row = $result_1->fetch_assoc()) {
					for($i=0;$i<$n;$i++) {
						if($row["Name"]== $m[$i]) {
							$c_1[$i]=$row["USN"];
							$d_1[$i]=$row["Address"];
						}
					}
				}
			}

            echo "<br>";
			echo "<center> AFTER SORTING (sorted based on Name) <center>";
			echo "<table border='2'>";
				echo "<tr>";
					echo "<th>USN</th><th>NAME</th><th>Address</th></tr>"; 
					for($i=0;$i<$n;$i++) {
						echo "<tr>";
							echo "<td>". $c_1[$i]."</td>";
							echo "<td>". $m[$i]."</td>";
							echo "<td>". $d_1[$i]."</td></tr>";
					}
			echo "</table>";
			$conn->close();
		?>
</body>
</html>