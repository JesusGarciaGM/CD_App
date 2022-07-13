<div class="row mt-3">
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<h6>Registro de Avance</h6>
				<?php
					if (isset($_SESSION['item'])) {
						$itemId=$_SESSION['item'];
						include_once 'database.php';
						$db = new Database();
						$sql = mysqli_connect($db->getHost(),$db->getUser(),$db->getPassword(),$db->getDb());

						$query = $db->connect()->prepare('SELECT *FROM ciber_progress WHERE item_id = :itemId');
						$query->execute(['itemId' => $itemId]);
						$rows = $query->fetchAll();
						$i=0;
						if(count($rows)>0){
							while($i<count($rows)) {
				?>
				<div class="mb-1">
					<div class="input-group-text">
						<?php echo $rows[count($rows)-1-$i]['date_reg'];?>
					</div>
					<p class="input-group-text overflow-visible">
						<?php echo $rows[count($rows)-1-$i]['value'];?>
					</p>
				</div>
				<?php
							$i++;}
						}
					}
				?>
				
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<h6>Registro de Notificaciones</h6>
				<?php
					if (isset($_SESSION['item'])) {
						$itemId=$_SESSION['item'];
						include_once 'database.php';
						$db = new Database();
						$sql = mysqli_connect($db->getHost(),$db->getUser(),$db->getPassword(),$db->getDb());

						$query = $db->connect()->prepare('SELECT *FROM ciber_notification WHERE item_id = :itemId');
						$query->execute(['itemId' => $itemId]);
						$rows = $query->fetchAll();
						$i=0;
						if(count($rows)>0){
							while($i<count($rows)) {
				?>
				<div class="mb-1">
					<div class="input-group-text">
						<?php echo $rows[count($rows)-1-$i]['date_reg'];?>
					</div>
					<p class="input-group-text overflow-visible">
						<?php echo $rows[count($rows)-1-$i]['value'];?>
					</p>
				</div>
				<?php
							$i++;}
						}
					}
				?>
				
			</div>
		</div>
	</div>
</div>