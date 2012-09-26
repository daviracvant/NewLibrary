<?php
include ('container/headerView.php')?>

<div id="logout"><?php
echo "welcome " . $_SESSION ['username'];
?> <a href="../user/logout"> Logout</a></div>

<div id="body_search_index">
<form method="POST" action="../search/bookDisplay">
<table width="90%" border="0" cellspacing="4" cellpadding="5">
	<tr>
		<td align=right>Search Book</td>
		<td><input name="searchBook" type="text" id="searchBook" size="30"></td>
		<td><select name="type" id="type">
			<option>isbn</option>
			<option>author</option>
			<option>title</option>
			<option>year</option>
		</select></td>

		<td><input type="submit" name="Search" id="Search" value="Search" /></td>
	</tr>
</table>
</form>
<?php
if (isset ( $result ) && (!empty ( $result )) && (!is_string($result))) {
	?>
<form method="POST" action="../book/checkout">
<table id="table_2">
	<tr>
		<th align=left>ISBN</th>
		<th align=left>AUTHOR</th>
		<th align=left>TITLE</th>
		<th align=left>YEAR</th>
		<th align=left>COPY</th>
		<th align=left>STATUS</th>
	</tr>
 <?php
	foreach ( $result as $value ) {
		echo '<tr><td width = 120><input type="radio" name="check" value =' . $value [0] . '/' . $value [1] . '>' . $value [0] . '</td>';
		echo '<td width = 100>' . $value [2] . '</td>';
		echo '<td width = 100>' . $value [3] . '</td>';
		echo '<td width = 100>' . $value [4] . '</td>';
		echo '<td width = 50>' . $value [1] . '</td>';
		echo '<td width = 50>' . $value [5] . '</td></tr>';
	
	}
} else {
	echo $result;
}
?>
</table>
<br />
<input type="submit" name="submit" id="submit" value="Check Out" /></form>
</div>
<?php
include ('container/footerView.php')?>