<?php include ('container/headerView.php')?>

<div id="logout"><?php echo "welcome " . $_SESSION ['username'];?> <a href="../user/logout"> Logout</a></div>
<div id="body_index">
<h3>Add a Book</h3>
<form method="POST" action="../book/addBook">
<table align=center width="80%" border="0" cellspacing="4"
	cellpadding="5">
	<tr>
		<td align=right>isbn</td>
		<td><input name="isbn" type="text" id="isbn" size="20">*</td>
	</tr>
	<tr>
		<td align=right>author</td>
		<td><input name="author" type="text" id="author" size="20">*</td>
	</tr>
	<tr>
		<td align=right>title</td>
		<td><input name="title" type="text" id="title" size="20">*</td>
	</tr>
	<tr>
		<td align=right>year</td>
		<td><input name="year" type="text" id="year" size="20">*</td>
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