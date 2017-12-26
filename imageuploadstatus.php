<!DOCTYPE html>
<html>
<head>
	<title>Image Upload Status</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
				 <link rel="icon" href="images/logo_icon.png"/>
			<style>@import url('https://fonts.googleapis.com/css?family=Roboto|Source+Sans+Pro');</style>
			
			<style type="text/css">

			.form_status{
			 position: absolute;
		 	 top:60px; 
		     left: 50%;
		     width: auto;
		     background-color: white;
		     height: 300px;
		    -webkit-transform: translateX(-50%);
		    -moz-transform: translateX(-50%);
		    -ms-transform: translateX(-50%);
		    -o-transform: translateX(-50%);
		    transform: translateX(-50%);
		    text-align: center;
		
		 	}
		 	.form_status .status_1
		 	{
		 		color: green;
		 		font-size: 20px;
		 		font-weight: bold;
		 			font-family: 'Source Sans Pro', sans-serif;
		 	}
			.form_status .status_0
		 	{
		 		color: red;
		 		font-size: 20px;
		 		font-weight: bold;
		 			font-family: 'Source Sans Pro', sans-serif;
		 	}
			</style>
</head>
<body>

		<div class='form_status'>
<br><br><br>
					<img src="images/logo_1.png" width='250' height='auto'><br><br><br>
					<?php
							if(isset($_GET['status']))
							{
								$status = $_GET['status'];
								if($status == "success")
									echo "<div class='status_".$status."'><h1>Image Uploaded Successfully.</h1></div><br>
								<a class='btn btn-success' href='dashboard.php#/gallery'>GO BACK</a><br>
											<img src='images/correct.png' width='100' height='auto'>
										";
								else if($status == "error")
									echo "<div class='status_".$status."'><h1>There was an Error while Uploading the Image. Please Try Again!</h1></div><br>
											<a class='btn btn-danger' href='dashboard.php#/gallery'>GO BACK</a><br>
											<img src='images/wrong.png' width='100' height='auto'>

										";
							}	
					?>



			</div>

</body>
</html>

