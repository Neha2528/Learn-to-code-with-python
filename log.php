<?php
$dbhost = "localhost";
$dbuser = "id16878874_ccl";
$dbpass = "UV!n_L?Lq7ukuyPf";
$db = "id16878874_learneredge";
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) ;
    if($conn->connect_error){
        die("Failed to connect :" .$conn->connect_error);
    }else{
        $stmt = $conn->prepare("SELECT * from signup where username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['password'] == $password) {
                echo "<h2>Login Successfully!!</h2>";
            }else{
                echo "<h2>Invalid Email or password</h2>";
            }
        }else{
            echo "<h2>Invalid Username or password</h2>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<style>
		body{
			margin: 0;
			padding: 0;
			font-family: sans-serif;
			background: #34495e;
		}

		.box{
			width: 300px;
			padding: 40px;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
			background: #191919;
			text-align: center;
		}
		.box h1{
			color: white;
			text-transform: uppercase;
			font-weight: 500;
		}

		.box input[type="text"],.box input[type="password"],.box input[type="email"]{
			border :0;
			background: none;
			display: block;
			margin: 20px auto;
			text-align: center;
			border: 2px solid #3498db;
			padding: 14px 10px;
			width: 200px;
			outline: none;
			color: white;
			border-radius: 24px;
			transition: 0.25s;
			
		}
		.box input[type="text"]:focus,.box input[type="password"],.box input[type="email"]{
			width: 280px;
			border-color: #2ecc71;
				}
		.box input[type="submit"]{
			border:0;
			background: none;
		display: block;
		margin: 20px auto;
		text-align: center;
		border:2px solid #2ecc71;
		padding: 14px 40px;
		outline: none;
		color: white;
		border-radius: 24px;
		transition: 0.25s;
		cursor: pointer;
		}
		.box input[type="submit"]:hover{
			background:  #2ecc71;
		}
	</style>
</head>
<body>
	<div >
		<form class="box" action="section_index.html"  method="POST">
   			<input type="submit" name="" value="Next">
		</form>
	</div>
	
</body>
</html>