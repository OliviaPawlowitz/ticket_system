<?php 

include_once 'include/classUser.php';

$user = new User();



   

if (isset($_POST['submit'])){

        extract($_POST);

        $register = $user->reg_user($fullname, $username, $password, $email);

        if ($register) {

            

            echo "<div style='text-align:center'>Registration successful <a href='login.php'>Click here</a> to login</div>";

        } else {

           

            echo "<div style='text-align:center'>Registration failed. Email or Username already exits please try again.</div>";

        }

    }

?>

  <!DOCTYPE html>

  <html lang="en">



  <head>

    <meta charset="utf-8">

    <title>Register</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

  </head>



  <body>

    <div id="container" class="container">

      <h1>Registration</h1>

      <form action="" method="post" name="reg">

        <table class="table">

          <tr>

            <th>Name:</th>

            <td>

              <input type="text" name="fullname" required>

            </td>

          </tr>

          <tr>

            <th>Username:</th>

            <td>

              <input type="text" name="username" required>

            </td>

          </tr>

          <tr>

            <th>Email:</th>

            <td>

              <input type="email" name="email" required>

            </td>

          </tr>

          <tr>

            <th>Password:</th>

            <td>

              <input type="password" name="password" required>

            </td>

          </tr>

          <tr>

            <td>&nbsp;</td>

            <td>

              <input class="btn" type="submit" name="submit" value="Register" onclick="return(submitreg());">

            </td>

          </tr>

          <tr>

            <td>&nbsp;</td>

            <td><a class="btn btn-primary" href="login.php">Login</a></td>

          </tr>



        </table>

      </form>

    </div>



    <script> //Form validation; make sure information comes through to the user.

      function submitreg() {

        var form = document.reg;

        if (form.name.value == "") {

          alert("Enter name.");

          return false;

        } else if (form.username.value == "") {

          alert("Enter username.");

          return false;

        } else if (form.pass.value == "") {

          alert("Enter password.");

          return false;

        } else if (form.email.value == "") {

          alert("Enter email.");

          return false;

        }

      }

    </script>

  </body>



  </html>