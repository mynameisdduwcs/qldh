<?php 
	session_start();


	if(isset($_POST['username']))
		$username = $_POST['username'];
	else
		$username = "";

	if(isset($_POST['password']))
		$password = $_POST['password'];
	else
		$password = "";


	if($username=="admin" && $password=="123456")
	{
		//setcookie('logged_in', 'true', time() + 7*24*3600);
		$_SESSION['logged_in'] = true;
		header("Location: index.php");
	}
	



include('header.php');
?>

<div class="container">
<h3>ĐĂNG NHẬP</h3>

<form action="login.php" method="POST">
	<div class="form-group row">
		<label for="username" class="col-sm-2 col-form-label">Tên đăng nhập</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="username" name="username">
		</div>
	</div>
	<div class="form-group row">
		<label for="password" class="col-sm-2 col-form-label">Mật khẩu</label>
		<div class="col-sm-10">
			<input type="password" class="form-control" id="password" name="password">
		</div>
	</div>

	<div class="form-group row">
		<div class="col-sm-10">
			<button type="submit" class="btn btn-primary">Đăng nhập</button>
		</div>
	</div>
</form>

</div>
<?php
include('footer.php')
?>