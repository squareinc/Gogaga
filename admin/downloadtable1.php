<?php
set_time_limit(0);
session_start();
   
$search_tran_val = $_SESSION['search_tran_val'];
$table_data = $_SESSION['table_data'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Transaction Data</title>
<style>
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    height: 30px;
}
</style>


</head>

<body>
	<?php
		echo "<br><b>GOGAGA TRANSACTIONS DATA : </b> $search_tran_val <br><br><br>";
		echo "<table>
				$table_data
				</table>

				";

	?>

</body>

</html>