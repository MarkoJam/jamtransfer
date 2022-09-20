<!DOCTYPE html>
	<html style="background: transparent  url('i/header/121.jpg') center fixed;background-size:cover;">
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="css/theme.css" type="text/css" />

	<style>

      .shadow{
        -webkit-box-shadow: 0px 0px 16px 0px rgba(50, 50, 50, 0.75);
        -moz-box-shadow:    0px 0px 16px 0px rgba(50, 50, 50, 0.75);
        box-shadow:         0px 0px 16px 0px rgba(50, 50, 50, 0.75);
      }
      .form-signin {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin .checkbox {
        font-weight: normal;
      }
      .form-signin .form-control {
        position: relative;
        height: auto;
        -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
                box-sizing: border-box;
        padding: 10px;
        font-size: 16px;
      }
      .form-signin .form-control:focus {
        z-index: 2;
      }
      .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }
      .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }

      form b{
        font-size:20px;
      }
      form b.lFailed{
        color:rgb(207, 48, 48);
      }
    
      /* @media screen: */
      @media screen and (max-width:767px) {

        .form-signin {
          width: 100%;
          padding: 0;
          /* margin: 0; */
        }


      }

  </style>


	</head>

	<body style="background:transparent;display:block">

    <div class="container">
        <br><br><br><br>

        <!-- Form: -->
        <form class="form-signin" method="post" action="login.php">

          <h2 class="form-signin-heading">Sign in</h2>
          
          <label for="username" class="sr-only">User name</label>
          
          <input type="text" name="username" id="username" class="form-control" placeholder="User name" required autofocus>
          
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>

          <select name="language" id="language" class="form-control">
            <option value='en'>English</option>
            <option value='hr'>Hrvatski</option>
          </select>

          <button class="btn btn-lg btn-primary btn-block" name="Login" type="submit">Sign in</button>

          {if $error}

            {if $message eq 1}
            <br/><b>Your account has been blocked.</b><br/>
                    Please contact us immediately!
            {/if}
    
            {if $message eq 2}
              <br/><b class="lFailed">{LOGIN_FAILED}</b><br/>
            {/if}
    
            {if $message eq 3}
              <br/><b>{USE_BOTH}</b><br/>
            {/if}
    
    
          {/if}

        </form> <!-- End of form -->

        

    </div> <!-- /.container -->
		    <br><br><br><br>

	</body>
	</html>