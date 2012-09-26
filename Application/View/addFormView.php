<?php include ('container/headerView.php')?>

<div id="logout"><?php
echo "welcome " . $_SESSION ['username'];
?> <a
	href="../user/logout"> Logout</a></div>
<div id="body_index">
<h3>Add a User</h3>
<form method="POST" action="../user/addUser">
<table align=center width="80%" border="0" cellspacing="4"
	cellpadding="5">
	<tr>
		<td align=right>Firstname</td>
		<td><input name="firstname" type="text" id="firstname" size="20">*</td>
	</tr>
	<tr>
		<td align=right>Lastname</td>
		<td><input name="lastname" type="text" id="lastname" size="20">*</td>
	</tr>
	<tr>
		<td align=right>Username</td>
		<td><input name="username" type="text" id="username" size="20">*</td>
	</tr>
	<tr>
		<td align=right>password</td>
		<td><input name="password" type="password" id="password" size="20">*</td>
	</tr>
	<tr>
		<td align=right>confirm password</td>
		<td><input name="confirm_password" type="password"
			id="confirm_password" size="20">*</td>
	</tr>
	<tr>
		<td align=right>E mail</td>
		<td><input name="email" type="text" id="email" size="20"></td>
	</tr>
	<tr>
		<td align=right>Address</td>
		<td><input name="address" type="text" id="address" size="20">*</td>
	</tr>
	<tr>
		<td align=right>City</td>
		<td><input name="city" type="text" id="city" size="10"></td>
	</tr>
	<tr>
		<td align=right>State</td>
		<td><input name="state" type="text" id="state" size="10"></td>
	</tr>
	<tr>
		<td align=right>Zip</td>
		<td><input name="zip" type="text" id="zip" size="10">*</td>
	</tr>
	<tr>
		<td align=right>Role</td>
		<td><select name="role" id="role">
			<option>patron</option>
			<option>librarian</option>
		</select></td>
	</tr>
	<tr>
		<td align=right></td>
		<td><input type="submit" name="Add" id="submit" value="Add" /></td>
	</tr>
</table>
</form>
<?php if (!empty($message)) {
	echo $message;
}?>
</div>
<?php include ('container/footerView.php')?>