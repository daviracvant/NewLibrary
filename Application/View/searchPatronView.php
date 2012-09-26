<?php
include ('container/headerView.php')?>

<div id="logout"><?php
echo "welcome " . $_SESSION ['username'];
?> <a href="../user/logout"> Logout</a></div>

<div id="body_search_index">
<form method="POST" action="../search/searchDisplay">
<table width="90%" border="0" cellspacing="4" cellpadding="5">
	<tr>
		<td align=right>Search Patron</td>
		<td><input name="searchPatron" type="text" id="searchPatron" size="30"></td>
		<td><select name="type" id="type">
			<option>lastname</option>
			<option>firstname</option>
			<option>username</option>
		</select></td>

		<td><input type="submit" name="Search" id="Search" value="Search" /></td>
	</tr>
</table>

</form>

<?php
if (isset ( $result ) && ! empty ( $result ) && ! is_string ( $result )) {
	?>
<form method="POST" action="../user/removeUser">
<table id="table_2">
	<tr>
		<th align=left>ID</th>
		<th align=left>LASTNAME</th>
		<th align=left>FIRSTNAME</th>
		<th align=left>USERNAME</th>
		<th align=left>ACCT_BALANCE</th>
	</tr>
<?php
	foreach ( $result as $value ) {
		echo '<tr><td width = 120><input type="radio" name="check" value = ' . $value [0] . '>' . $value [0] . '</td>';
		echo '<td width = 100>' . $value [1] . '</td>';
		echo '<td width = 100>' . $value [2] . '</td>';
		echo '<td width = 100>' . $value [3] . '</td>';
		echo '<td width = 100>' . $value [4] . '</td></tr>';
	}
} else {
	echo $result;

}
?>
</table>
<br />
<input type="submit" name="submit" id="submit" value="Remove" /></form>
</div>
<?php
include ('container/footerView.php')?>