 <?php
    
    //connect to the server and select database

  $con = mysqli_connect("localhost", "root", "", "catering");

    // query the database for user asd
    
if (isset($_POST['submit_login'])) {

    if (!empty($_POST['username']) && !empty($_POST['password'])) {

    $result =  mysqli_query($con, "SELECT * FROM accounts WHERE username = '$_POST[username]' AND password = '$_POST[password]'");
    $row = mysqli_fetch_array($result);

    if ($row['username'] == $_POST['username'] && $row['password'] == $_POST['password']){

        mysqli_query($con, "UPDATE accounts SET mode = '1' WHERE username = '$_POST[username]'");
        $_SESSION['username'] = $_POST['username'];
        echo"<script type='text/javascript'> window.location.href='admin.php';  </script>";

    }
    else
    {
        echo"<script type='text/javascript'> alert('Unsuccessful login attempt. Username and Password does not match.'); window.location.href='login.php';  </script>";
    }

        
    }
    else
        echo"<script type='text/javascript'> alert('Please fill in all fields'); window.location.href='login.php';  </script>";

}
    ?>
