<html>
	<head>
    <!--link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"-->
    <link href='http://fonts.googleapis.com/css?family=Cinzel+Decorative:400,700,900' rel='stylesheet' type='text/css'>
	  <link rel="stylesheet" type="text/css" href="./main.css">
	  <link rel="stylesheet" type="text/css" href="./dialog.css">
		<title>
      <?php
        $words = array('awesome','superb','sublime','elegant','splendid');
        $index = rand(0,count($words)-1);
        echo trim($words[$index]);
      ?>
    </title>
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="./main.js" type="text/javascript"></script>
    <script src="./Init.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        Init.init();
        //$(window).unload(function(event){onUnload();return "hi";});
        window.onbeforeunload=function(){
          //return onUnload();//Used for recording session lengths
        }
      });
    </script>
	</head>
	<body>
	  <div id="wrapper">
	      <span id="user"><a href="javascript:showLogin();">login</a></span>
	      <div id="login_dialog">
	        <label>Username:</label><input type="text" id="username"></input></br>
	        <label>Password:</label><input type="password" id="password"></input>
	        <button type="button" onClick="javascript:login();">ok</button>
	      </div>
	    <div id="header">
	      <span>cool stuff</span>
	    </div>
      <div id="content_wrapper">
        <div id="menu">
          <div class="menu_item">Main</div>
          <div class="menu_item">About</div>
          <div class="menu_item">...stuff.</div>
          <div class="menu_item">Contact Me</div>
        </div>
        <div id="content">
          <p>Hi Sam! Basically none of this is functional yet. I might 
             have some time to work on it soon though.
             </br>
             The code is <a href="https://github.com/p-somers/server">here</a> 
             for anyone who's interested.</p>
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
