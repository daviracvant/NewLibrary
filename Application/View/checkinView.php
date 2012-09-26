<?php
include ('container/headerView.php')?>

<div id="logout"><?php
echo "welcome " . $_SESSION ['username'];
?> <a href="../user/logout"> Logout</a></div>
<div id="body_index">
<h3>Check in book</h3>
<?php
if (isset ( $result ) && ! empty ( $result )) {
	?>
<form method="POST" action="../book/checkinProcess">
<table id="table_2">
	<tr>
		<th align=left>ISBN</th>
		<th align=left>AUTHOR</th>
		<th align=left>YEAR</th>
		<th align=left>COPY</th>
		<th align=left>DUE_DATE</th>
	</tr>	
	<?php
	foreach ( $result as $value ) {
		echo '<tr><td width =120><input type="radio" name="check"';
		echo 'value ="' . $value [0] . '/' . $value [1] . '/' . $value [4] . '"/>' . $value [0] . '</td>';
		echo '<td width = 100>' . $value [2] . '</td> ';
		echo '<td width = 100>' . $value [3] . '</td> ';
		echo '<td width = 100>' . $value [1] . '</td> ';
		echo '<td width = 100>' . $value [4] . '</td></tr>';
	
	}
} else {
	echo '<p>You do not have any book to return</p>';
}
?>
</table>
<br />
<input type="submit" name="submit" id="submit" value="Check In" /></form>
<?php
if (isset ( $display )) {
	echo $display;
}
?>
</div>
<?php
include ('container/footerView.php')?>