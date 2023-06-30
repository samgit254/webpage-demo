<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        
        $email_pattern = '/^[a-z\.0-9]{4,45}@[a-z]+\.(com){1}$/';
        $phone_pattern = '/^[0-9\+]{10,13}$/';
        $username_pattern = '/^@[a-zA-Z0-9_]{5,255}$/';
        $userid_pattern = '/^[a-zA-Z0-9-]+$/';
        $pass_pattern = '/^[a-zA-Z0-9@,\\\$%]{8,16}$/';

        if(isset($_REQUEST['submit']))
        {
            if(preg_match($pass_pattern, $_REQUEST['pwd']) && preg_match($userid_pattern, $_REQUEST['userid']) && preg_match($username_pattern, $_REQUEST['username']) && preg_match($phone_pattern, $_REQUEST['phone']) && preg_match($email_pattern, $_REQUEST['email']))
            {
                $password = md5($_REQUEST['pwd']);
                $userid = $_REQUEST['userid'];
                $username = $_REQUEST['username'];
                $phone = $_REQUEST['phone'];
                $email = $_REQUEST['email'];
                
                $sql = "INSERT INTO `users` VALUES ('$userid', '$username', '$password', '$email', '$phone')";
                $sql1 = "SELECT * FROM `users` WHERE userid = '$userid' OR username = '$username'";
                include('demoserver/demo.php');
                $check = $conn->query($sql1);
                $sql1_array = mysqli_fetch_array($check);

                if($sql1_array)
                {
                    echo '<script>alert("This user seems to already exist in our system try registering another user");window.location="index.html"</script>';
                }else
                {
                    if($conn->query($sql))
                    {
                        echo '<script>alert("Registration successful!!");window.location="index.html"</script>';
                    }else
                    {
                        echo `<script>alert("Oops, something went wrong!")</script>.$conn->errorno`;
                    }
                }
            }else
            {
                echo `<script>alert("Wrong formart in your form submissions, couldn't be registered succefully.");window.location="index.html"</script>`;
            }
        }
        
    ?>
</body>
</html>
