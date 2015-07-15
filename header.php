<?
require_once('authenticator.php');
$authenticator = new AuthenticatorHelper();
?>
<html>
<head>
    <title>Shame-n-ator!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/shaming9000/css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container main">
    <div class="row">
      <? if( $authenticator->isAuthenticated() ): ?>
          <ul class="col-xs-3">
              <li><a href="/shaming9000/admin.php?action=manage-shames">Manage Shame</a></li>
              <li><a href="/shaming9000/admin.php?action=manage-websites">Manage Websites</a></li>
              <li><a href="/shaming9000/admin.php?action=manage-users">Manage Users</a></li>
              <li><a href="/shaming9000/index.php?logout=yes">Logout</a></li>
          </ul>
      <? else: ?>
          <form class="col-xs-3 loginform" method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
              <h3>Shaming 9000</h3>
              <br>

              <input type="text" name="login[username]" placeholder="Username"/>
              <br>
              <br>
             
              <input type="password" name="login[password]" placeholder="Password"/>
              
              <br>
              <br>
              <button class="btn btn-primary">Login</button>
              <br>
              <br>
          </form>
      <? endif; ?>
      
      <div class="col-xs-9">