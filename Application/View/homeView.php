<?php include ('container/headerView.php')?>

<div id="logout"><?php echo "welcome " . $_SESSION ['username'] ;?> <a href="../user/logout"> Logout</a></div>
<div id="side">
	<table id="table_1">
	<?php if ($_SESSION ['Role'] == 'librarian') {
	?>
	<tr><td><a href="../user/accountInfo">Information</a></td></tr>
 	<tr><td><a href="../user/index">Add User</a></td></tr>
 	<tr><td><a href="../book/index">Add book</a></td></tr>
 	<tr><td><a href="../search/index">Search patron</a></td></tr>
 	<tr><td><a href="../search/searchBook">Search Book</a></td></tr>
 	<tr><td><a href="../book/checkinBook">Check In Book</a></td></tr>
	<?php 
	}else { 
	?>
	<tr><td><a href="../user/accountInfo">Information</a></td></tr>
 	<tr><td><a href="../search/searchBook">Search Book</a></td></tr>
 	<tr><td><a href="../book/checkinBook">Check In Book</a></td></tr>
	<?php }?>
	</table>
</div>
<div id="welcome">
	<h3> Welcome to Newport Oldtown Library System</h3>
</div>
<?php include ('container/footerView.php')?>

