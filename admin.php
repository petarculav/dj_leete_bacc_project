<?php

if(!isset($_GET['Key']) || $_GET['Key'] != 'sifra') die("Invalid login key.");
$key = $_GET['Key'];

function get_data() {
  $sql = "SELECT * FROM booking b ORDER BY b.id DESC";
	$servername = "localhost";
	$username = "CulavP";
	$password = "CulavP_2022";
	$database = "CulavP";
	$connection = new mysqli($servername, $username, $password, $database);
	
	if ($connection->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} else {
		$result = $connection->query($sql);
	}

  $response = array();
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $response[] = $row;
    }
  }

  return $response;
}

function set_data($id, $status) {
  $sql = "SELECT COUNT(1) FROM booking WHERE id = $id";
	$servername = "localhost";
	$username = "CulavP";
	$password = "CulavP_2022";
	$database = "CulavP";
	$connection = new mysqli($servername, $username, $password, $database);
  $sql_update = "UPDATE booking SET status = $status WHERE id = $id";
	$connection->query($sql_update);
}

if(isset($_GET['Id']) && isset($_GET['Status'])) {
	$id = $_GET['Id'];
	$status = $_GET['Status'];

	set_data($_GET['Id'], $_GET['Status']);
}

$data = get_data();

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0"
		/>
		<link
			rel="stylesheet"
			href="./assets/styles/style.css"
		/>
		<title>Admin</title>
	</head>
	<body>
		<div class="container admin">
			<h1 class="admin__title">Bookings</h1>
			<div class="admin-table__wrapper">
				<table class="admin__table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Date</th>
							<th>Status</th>
							<th>Full name</th>
							<th>Email address</th>
							<th>Phone number</th>
							<th>Action</th>
							<th>Inqury</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($data as $row) { ?>
							<tr>
								<td><?= $row['id']; ?></td>
								<td><?= date("d M, Y",strtotime('+2 hours', strtotime($row['date']))); ?></td>
								<td>
									<span class="<?= $row['status'] == "-1" ? 'admin-status--declined' : ''; ?><?= $row['status'] == "0" ? 'admin-status--pending' : ''; ?><?= $row['status'] == "1" ? 'admin-status--accepted' : ''; ?>">
										<?= $row['status'] == "-1" ? 'Declined' : ''; ?>
										<?= $row['status'] == "0" ? 'Pending' : ''; ?>
										<?= $row['status'] == "1" ? 'Accepted' : ''; ?>
									</span>
								</td>
								<td><?= $row['fullName']; ?></td>
								<td><?= $row['emailAddress']; ?></td>
								<td><?= $row['phoneNumber']; ?></td>
								<td>
									<form>
										<input
											type="hidden"
											name="Key"
											value="<?= $key; ?>"
										/>
										<input
											type="hidden"
											name="Id"
											value="<?= $row['id']; ?>"
										/>
										<input
											type="hidden"
											name="Status"
											value="1"
										/>
										<button <?= $row['status'] == "1" ? 'disabled': ''; ?>>Accept</button>
									</form>
									<form>
										<input
											type="hidden"
											name="Key"
											value="<?= $key; ?>"
										/>
										<input
											type="hidden"
											name="Id"
											value="<?= $row['id']; ?>"
										/>
										<input
											type="hidden"
											name="Status"
											value="-1"
										/>
										<button <?= $row['status'] == "-1" ? 'disabled': ''; ?>>Decline</button>
									</form>
								</td>
								<td><?= $row['inqury']; ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>
