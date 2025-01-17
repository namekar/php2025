<?php
    require('user_validator.php');
    if(isset($_POST['submit'])){
        $validation = new UserValidation($_POST);
        $errors = $validation->validateForm();
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form_style.css">
    <title>Document</title>
</head>
<body>
    <div class="new-user">
        <h2>create new user</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <label>username</label>
            <input type="text" name="username">
            <div class="error">
                <?php echo $errors['username'] ?? ''?>
            </div>
            <label>Email:</label>
            <input type="text" name="email">
            <div class="error">
                <?php echo $errors['email'] ?? ''?>
            </div>
            <input type="submit" value="submit" name="submit">
        </form>
    </div>
</body>
</html>