<html>
	<head>
		<title>Aww yeah</title>
	</head>
	<body>
		<?php
		  include "./UserTable.php";
		  $users = new UserTable();
		  //$users->addUser("Peter","MacBook1-9");
		  $result = $users->allUsers();
		?>
	</body>
</html>
