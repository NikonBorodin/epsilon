<?php
$s = new Acme\Service( $auth->access_token );
$arr = $s->get($id);

if ( $arr['error'] ) {
	header('Location: index.php');
}
?>

<div class="container">
	<h1>
		<a class="float-right" href="index.php">&laquo; back</a>
		Service <b><?php echo $arr['name'] ?></b>
	</h1>

	<h2 class="bg-<?php echo $arr['csp_status']['color'] ?>" style="margin-bottom: 1em; padding: 11px;">Status: <b><?php echo $arr['csp_status']['state'] ?></b></h2>

	<div class="table-responsive">

<?php if ( isset( $arr['statistics'] ) && count( $arr['statistics'] ) > 0 ): ?>
		<h3>Statistics</h3>
		<table class="table">
		<?php
		foreach ( $arr['statistics'] as &$row ) {
			echo '
			<tr>
				<td>'.$row['name'].'</td>
				<td>'.$row['lastvalue'].'</td>
			</tr>';
		}
		?>
		</table>
<?php endif; ?>

		<h3>Port info</h3>
		<table class="table">
			<tr>
				<td>Bandwith</td>
				<td><?php echo $arr['bandwidth'] ?></td>
			<tr>
			<tr>
				<td>Port name</td>
				<td><?php echo $arr['port']['name'] ?></td>
			<tr>
			<tr>
				<td>Port datacenter name</td>
				<td><?php echo $arr['port']['datacentre_datacentre_name'].', '.$arr['port']['datacentre_name'] ?></td>
			<tr>
			<tr>
				<td>Port speed</td>
				<td><?php echo $arr['port']['speed'] ?></td>
			<tr>
			<tr>
				<td>Port utilisation</td>
				<td><?php echo $arr['port']['utilisation'] ?></td>
			<tr>
			<tr>
				<td>Port services</td>
				<td>
				<?php
				if ( count( $arr['port']['services'] ) > 0 ) {
					echo '<table class="table">';
					foreach ( $arr['port']['services'] as &$row ) {
						echo '<tr><td><a href="index.php?id='.$row['id'].'">'.$row['name'].'</a></td></tr>';
					}
					echo '</table>';
				}
				?>
				</td>
			<tr>

			<?php if ( isset( $arr['b_port'] ) && count( $arr['b_port'] ) > 0 ): ?>

			<tr>
				<td>B-Port name</td>
				<td><?php echo $arr['b_port']['name'] ?></td>
			<tr>
			<tr>
				<td>B-Port datacenter name</td>
				<td><?php echo $arr['b_port']['datacentre_datacentre_name'].', '.$arr['b_port']['datacentre_name'] ?></td>
			<tr>
			<tr>
				<td>B-Port speed</td>
				<td><?php echo $arr['b_port']['speed'] ?></td>
			<tr>
			<tr>
				<td>B-Port utilisation</td>
				<td><?php echo $arr['b_port']['utilisation'] ?></td>
			<tr>
			<tr>
				<td>B-Port services</td>
				<td>
				<?php
				if ( count( $arr['b_port']['services'] ) > 0 ) {
					echo '<table class="table">';
					foreach ( $arr['b_port']['services'] as &$row ) {
						echo '<tr><td><a href="index.php?id='.$row['id'].'">'.$row['name'].'</a></td></tr>';
					}
					echo '</table>';
				}
				?>
				</td>
			<tr>

			<?php endif; ?>
			
		</table>
	</div>
</div>