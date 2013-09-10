<html>
	<head>
	  <link rel="stylesheet" type="text/css" href="./main.css">
		<title>
      <?php
        $words = array('awesome','superb','sublime','elegant','splendid');
        $index = rand(0,count($words)-1);
        echo trim($words[$index]);
      ?>
    </title>
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
	    <div id="header">
	      <span>cool stuff</span>
	    </div>
      <div id="content_wrapper">
        <div id="menu">
          <div class="menu_item">Main</div><!--div class="space"></div-->
          <div class="menu_item">About</div>
          <div class="menu_item">...stuff.</div>
          <div class="menu_item">Contact Me</div>
        </div>
        <div id="content">
          <?php
            include "./UserTable.php";
            $userTable = new UserTable();
            $users = $userTable->allUsers();
            foreach($users as $user) {
              foreach($user as $key=>$val) {
                //echo "<div>$key: $val</div>";
              }
            }
            //$blah = $userTable->getUserId("Peters");
            //var_dump($blah);
          ?>
        </div>
		  </div>
		  <div id="footer">Random coding stuff by Peter Somers</div>
		</div>
	</body>
</html>
