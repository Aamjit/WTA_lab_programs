<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
            /* just ignore this and style it as you like. */
			table, td, th {
				border: 1px solid black;
				width: 35%;
				text-align: center;
				background-color: DarkGray;
			}
			table { margin: auto; }
			input,p { text-align:right; }
		</style>
    <title>Document</title>
</head>
<body>
<form method="post">
			<table>
				<caption>
				<h2> SIMPLE CALCULATOR </h2>
				</caption>
				<tr>
					<td>First Number:</td>
					<td><input type="text" name="num1" /></td>
					<td	rowspan="2"><input type="submit" name="submit" value="calculate"></td>
				</tr>
				<tr>
					<td>Second Number:</td>
					<td><input	type="text"	name="num2"/></td>
				</tr>
			</form>
			<?php
				if(isset($_POST['submit'])) {
						// it checks if the input submit is filled
					$num1 = $_POST['num1'];
					$num2 = $_POST['num2'];
					if(is_numeric($num1) and is_numeric($num1)) {
						echo "<tr><td> Addition :</td><td><p>".($num1+$num2)."</p></td>";
						echo "<tr><td> Subtraction :</td><td><p> ".($num1-$num2)."</p></td>";
						echo "<tr><td> Multiplication :</td><td><p>".($num1*$num2)."</p></td>";
						echo "<tr><td>Division :</td><td><p> ".($num1/$num2)."</p></td>";
						echo "</table>";
					}
					else {
						echo"<script type='text/javascript' > alert(' ENTER VALID NUMBER');</script>";
					}
				}
			?>
</body>
</html>