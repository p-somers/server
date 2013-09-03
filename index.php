<html>
	<head>
		<title>Aww yeah</title>
	</head>
	<body>
		<?php
		  include "./UserTable.php";
		  $users = new UserTable();
		  $result = $users->allUsers();
		  echo "<div>Username: ".$result['name']."</div>";
      echo password_hash("rasmuslerdorf", PASSWORD_DEFAULT)."</br>";
		?>
	</body>
</html>
