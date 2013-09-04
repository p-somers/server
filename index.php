<html>
	<head>
	  <link rel="stylesheet" type="text/css" href="./main.css">
		<title>Aww yeah</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
    <script src="./main.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        Init.init();
      });
    </script>
	</head>
	<body>
	  <div id="wrapper">
	    <div id="top">
	      <span>Awesome</span>
	    </div>
      <div id="content">Hi
        <!--h3>Users:</h3>
        <?php
          include "./UserTable.php";
          $userTable = new UserTable();
          //$users->addUser("Peter","MacBook1-9");
          $users = $userTable->allUsers();
          foreach($users as $user) {
            foreach($user as $key=>$val) {
              echo "<div>$key: $val</div>";
            }
          }
        ?> -->
		  </div>
		</div>
	</body>
</html>
