<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Register</title>

    <!-- Bootstrap core CSS -->
    <link href="/math/stylesheets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="/math/stylesheets/bootstrap/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/math/stylesheets/bootstrap/js/ie-emulation-modes-warning.js"></script>

    <script src="/math/scripts/jquery-3.2.0.min.js"></script>

    <script src="/math/scripts/register_by_invite.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-lg-offset-4 col-md-5 col-md-offset-4 col-sm-7 col-sm-offset-3 col-xs-12">
          
          <form name="reg_form" method="post">
            <div class="jumbotron">
           
              <div class="alert alert-danger" role="alert" id="alerts" style="display:none;"></div>
              <label for="email">Email address</label>
              <input type="email" class="form-control" name="email" placeholder="Email">
              <label for="passwd">Password</label>
              <input type="password" class="form-control" name="passwd" placeholder="Password">
              <small>Use at least one lowercase latin letter, one uppercase latin letter, one numeral, and seven characters.</small>
              <br>            
              <label for="invite">Invite key</label>
              <input type="text" class="form-control" name="invite" placeholder="Invite key">
              
              <div class="row" style="margin-top:10%">
                <div class="col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-5">
                  <button type="button" name="submit" class="btn btn-success btn-lg" 
                          onclick="try_register_by_invite()">Submit</button>
                </div>
              </div>

            </div>

          </form>

        </div>
      </div>
    </div>
  </body>
</html>