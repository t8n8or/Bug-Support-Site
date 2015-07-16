<?
//require_once('authenticator.php');
//$authenticator = new AuthenticatorHelper();
?>
<html>
<head>
    <title>Bug Support</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container main">
    <div class="row">
      <? //if( $authenticator->isAuthenticated() ): ?>
          <ul class="col-xs-3">
              <li><a href="/ios/">iOS</a></li>
              <li><a href="/android/">Android</a></li>
              <li><a href="/home.php?logout=yes">Logout</a></li>
          </ul>
      <? //else: ?>
          <form class="col-xs-3 loginform" method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
              <h3>Bug Support</h3>
              <br />

              <input type="text" name="login[username]" placeholder="Username"/>
              <br />
              <br />
             
              <input type="password" name="login[password]" placeholder="Password"/>
              
              <br />
              <br />
              <button class="btn btn-primary">Login</button>
              <br />
              <br />
          </form>
      <? //endif; ?>
      
      <div class="col-xs-9">