<?php

$valid_users = array(
    "admin" => "precious1",
    "bob" => "cheerleader",
);

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    if (isset($valid_users[$username]) && $valid_users[$username] == $password) {
        if ($username === 'admin') {
            $message = "<p style='color:green; font-size: 24px; font-weight:bold; text-align:center;</p>";
        } else {
            $message = "<p style='color:red; font-size: 24px; font-weight:bold; text-align:center;'>Not the right privileages! Try harder!</p>";
        }
    } else {
        $message = "<p style='color:red; font-size: 24px; font-weight:bold; text-align:center;'>Invalid username or password.</p>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login System</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            margin: 10px 0;
            width: 100%;
            border: none;
            border-radius: 5px;
            box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.1);
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        input[type="submit"]:hover {
            background-color: #3e8e41;
        }

        label {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .message {
            margin-top: 20px;
            text-align: center;
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
        }
    </style>
</head>
<body>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password">

        <input type="submit" value="Submit">
    </form>

    <div class="message">
        <?php echo $message; ?>
    </div>
</body>
</html>
