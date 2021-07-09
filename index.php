<?php include 'header.php'?>

<body>
	<div class="container">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo">Business <span>Ease</span></span></h1>
		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Log In</h2>
			</div>
			<form method="POST" >
			<label for="username">Username</label>
			<br/>
			<input type="text" id="username" name="id">
			<br/>
			<label for="password">Password</label>
			<br/>
			<input type="password" id="password" name="pass">
			<br/>
			<p id="hiding">Incorrect Details</p>
			
			<button type="submit" name="enter">Sign In</button>
			<br/>
			</form>
			<?php
			if(isset($_POST["enter"]))
			{

				include 'Mycon.php';
				$connect = new Mycon("minor");
				$id=$_POST["id"];
				$pass=$_POST["pass"];
				$query = "select * from minorlogin where username='$id' and password='$pass'";
				if($connect->select($query))
				{
					$_SESSION["user"] = $_POST["id"];
					//echo $_SESSION["user"];
					header("Location:minor_inner/docs/documentation.html");
				}
				else{
					?>
					<script>document.getElementById("hiding").style.display = "block";</script>
					<?php
				}
				
			}
			?> 
		</div>
	</div>
</body>
<style>
    #hiding
    {
        display:none;
        color:red;
    }
</style>
<?php include 'footer.php';?>