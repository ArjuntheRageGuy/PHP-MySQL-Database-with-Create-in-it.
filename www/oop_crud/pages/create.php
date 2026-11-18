<?php
include '../process/createprocess.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label{
            display: inline-block;
            width: 400px;
            text-align: left;
        }
        input[type="text"], 
        input[type="email"], 
        input[type="password"], 
        input[type="date"], 
        select,
        input[type="submit"] {
            width: 400px;
            height: 30px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border-radius: 4px;
            /* border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer; */
        }
        .gender-options {
            display: flex;
            justify-content: left;
            /* align-items: center; */
            /* gap: 0px; */
        }
        .gender-options label {
            width: 73px;
            margin-top: 5px;
        }
        form{
            width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 100px rgba(0, 0, 0, 0.2);
        }
        small{
            display: inline-block;
            text-align: left;
            font-size: 9px;
            margin-top: 5px;
            /* color: #666; */
        }
        button{
            background-color: #007bff;
            color: white;
            border-radius: 4px;
            padding: 5px 10px;
            cursor: pointer;
        }
        .user-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .error-box {
            box-sizing: border-box;
            width: 440px;
            margin: 10px auto;
            padding: 10px;
            border: 1px solid #b50000;
            border-radius: 4px;
            background-color: #fff0f0;
            color: #b50000;
            text-align: left;
        }
    </style>
</head>
<body>
    <center>
        <?php if ($emailError !== '') { ?>
            <div class="error-box"><?= htmlspecialchars($emailError, ENT_QUOTES, 'UTF-8') ?></div>
        <?php } ?>
        <?php if ($passwordError !== '') { ?>
            <div class="error-box"><?= htmlspecialchars($passwordError, ENT_QUOTES, 'UTF-8') ?></div>
        <?php } ?>
        <h1 style="color: gray;">Add User</h1>
        <form method="post" action="create.php">
            <label>Last Name: </label>
            <input type="text" name="lname" value="<?= htmlspecialchars($lname, ENT_QUOTES, 'UTF-8') ?>" required><br><br>

            <label>First Name: </label>
            <input type="text" name="fname" value="<?= htmlspecialchars($fname, ENT_QUOTES, 'UTF-8') ?>" required><br><br>

            <label>Username: </label>
            <input type="text" name="username" value="<?= htmlspecialchars($username, ENT_QUOTES, 'UTF-8') ?>" required><br><br>

            <label>Password: </label>
            <input type="password" name="password" required><br><br>

            <label>Email: </label>
            <input type="email" name="email" value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>" required><br><br>

            <!-- <input type="submit" value="Add User"> -->
            <div class="user-heading">
                <button type="submit">Add</button>
                <a href="read.php">Cancel</a>
            </div>
        </form>
    </center>
</body>
</html>