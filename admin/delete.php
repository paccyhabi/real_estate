<?php 
include 'session.php';
if (isset($_GET['photo'])) {
$id=$_GET['photo'];

$del=$conn->query("DELETE FROM `photos` WHERE p_id='$id'");
if ($del) {
	?>
	<script>
		window.alert('image Deleted');
		window.location.href='album'
	</script>

	<?php
}
else{
	echo "invalid";
}
}

if (isset($_GET['eventdel'])) {
$id=$_GET['eventdel'];

$del=$conn->query("DELETE FROM `posts` WHERE postid='$id'");
if ($del) {
	?>
	<script>
		window.alert('Post Deleted');
		window.location.href='events_action'
	</script>

	<?php
}
else{
	echo "invalid";
}
}




 ?>