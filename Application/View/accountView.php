<?php
include ('container/headerView.php')?>

<div id="logout"><?php
echo "welcome " . $_SESSION ['username'];
?> <a href="../user/logout"> Logout</a></div>

<div id="body_account_index">
<h3>Checked Out Book:</h3>
<?php
if (isset ( $result ) && (! empty ( $result ))) {
	?>
<table id="table_2">
	<tr>
		<th align=left>ISBN</th>
		<th align=left>AUTHOR</th>
		<th align=left>YEAR</th>
		<th align=left>COPY</th>
	</tr>	
	<?php
	foreach ( $result as $value ) {
		echo '<tr><td width = 125>' . $value [0] . '</td> ';
		echo '<td width = 125>' . $value [1] . '</td> ';
		echo '<td width = 125>' . $value [2] . '</td> ';
		echo '<td width = 125>' . $value [3] . '</td></tr>';
	}
} else {
	echo '<p>You have not check out anything</p>';
}
?>
</table>
</div>
<?php
include ('container/footerView.php')?>