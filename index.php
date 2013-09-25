<html>
	<head>
    <!--link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"-->
    <link href='http://fonts.googleapis.com/css?family=Cinzel+Decorative:400,700,900' rel='stylesheet' type='text/css'>
	  <link rel="stylesheet" type="text/css" href="./css/main.css">
	  <link rel="stylesheet" type="text/css" href="./css/dialog.css">
		<title>
      <?php
        $words = array('awesome','superb','sublime','elegant','splendid');
        $index = rand(0,count($words)-1);
        echo trim($words[$index]);
      ?>
    </title>
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="./js/main.js" type="text/javascript"></script>
    <script src="./js/Init.js" type="text/javascript"></script>
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
          <div class="menu_item" id="main">Main</div>
          <div class="menu_item" id="about">About</div>
          <div class="menu_item" id="stuff">...stuff.</div>
          <div class="menu_item" id="contact">Contact Me</div>
        </div>
        <div id="content">
          <?php
            include("php/getContents.php");
            if(isset($_GET['target'])) {
              echoFile(filter_input(INPUT_GET,'target'));
            }
            else
              echoFile('main.html');
          ?>
        </div>
		  </div>
		  <div id="footer">Random coding stuff by Peter Somers</div>
		</div>
	</body>
</html>
