<?php
$s = new Acme\Service( $auth->access_token );
$arr = $s->getAll();
?>

<div class="container">
	<h1>Available “CloudLX” services</h1>
	<div class="table-responsive">
		<table class="table">
			<tr>
				<th>Service name</th>
				<th>Action</th>
			<tr>

<?php
foreach ( $arr['services'] as &$row ) {
	echo '
			<tr>
				<td>'.$row['name'].'</td>
				<td><a href="index.php?id='.$row['id'].'">View more info &raquo;</a></td>
			<tr>';
}
?>

		</table>
	</div> 
</div> 