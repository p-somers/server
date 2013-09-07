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
	      <span>
	        <?php
	          $words = array('awesome','superb','sublime','elegant','splendid');
	          $index = rand(0,count($words)-1);
	          echo trim($words[$index]);
	        ?>
	      </span>
	    </div>
      <div id="content_wrapper">
        <div id="content">Hi
        <?php
          include "./UserTable.php";
          $userTable = new UserTable();
          
          //echo $userTable::generateId();
          
          //$users->addUser("Peter","MacBook1-9");
          $users = $userTable->allUsers();
          foreach($users as $user) {
            foreach($user as $key=>$val) {
              //echo "<div>$key: $val</div>";
            }
          }
          $blah = $userTable->getUserId("Peter");
          var_dump($blah);
        ?>
        </div>
		  </div>
		</div>
	</body>
</html>
