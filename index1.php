<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include('demoserver/demo.php');
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
                
                $sql = "INSERT INTO `users`(`user_id`, `user_name`, `password`, `email`, `phone`) VALUES ('$userid', '$username', '$password', '$email', '$phone')";
                $sql1 = "SELECT * FROM `users` WHERE `user_id` = '$userid' OR `user_name` = '$username' OR `email` = '$email'";
                $check = $conn->query($sql1);
                $sql1_array = mysqli_fetch_array($check);

                if($sql1_array)
                {
                    echo '<script>alert("This user seems to already exist in our system try registering another user");window.location="index.php"</script>';
                }else
                {
                    if($conn->query($sql))
                    {
                        echo '<script>alert("Registration successful!!");window.location="index.php"</script>';
                    }else
                    {
                        echo `<script>alert("Oops, something went wrong! Registration unsuccessful");window.location="index.php"</script>.$conn->errorno`;
                    }
                }
            }else
            {
                echo '<script>alert("Wrong formart in your form submissions, couldn\'t be registered successfully.");window.location="index.php"</script>';
            }
        }

        if(isset($_REQUEST['login']))
        {
            if((preg_match($email_pattern, $_REQUEST['userid']) || preg_match($username_pattern, $_REQUEST['userid'])) && preg_match($pass_pattern, $_REQUEST['pwd']))
            {
                $username = $_REQUEST['userid'];
                $pwd  = md5($_REQUEST['pwd']);

                $sql = "SELECT * FROM `users` WHERE (`email` ='$username' OR `user_name` = '$username') AND `password`='$pwd'";
                $check = $conn->query($sql);
                
                if(mysqli_fetch_array($check))
                {
                    echo '<script>alert("Login successful!!");window.location="index.php"</script>';
                }else
                {
                    echo '<script>alert("Oops, something went wrong! Login unsuccessful");window.location="index.php"</script>';
                }
            }else
            {
                echo '<script>alert("Wrong formart in your form submissions, couldn\'t log in successfully.");window.location="index.php"</script>';
            }
        }
        
    ?>
</body>
</html>
