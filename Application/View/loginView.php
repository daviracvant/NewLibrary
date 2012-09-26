<?php include ('container/headerView.php')?>

<div id="body_index">
	<h3> Please Login to Continue: </h3> 
	<form method="POST" action="/user/login">
	Username: <input type="text" name="username" size="15" />
	<br />
	Password: <input type="password" name="password" size="15" />
	<br />
	<input type="submit" name="login" value="Login" />
	</form>
</div>
<?php include ('container/footerView.php')?>