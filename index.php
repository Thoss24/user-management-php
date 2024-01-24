<?php
    require 'requests.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <title>Document</title>
</head>
<body>
    <header><h2>User Management System</h2></header>
    <div class="new-user-form-container">
    <form action='api.php' method='POST' class="new-user-form">
        <div>
            <label for="name" >Name: </label>
            <input name="name" type="text" id="name">
        </div>
        <div>
            <label for="email" >Email: </label>
            <input name="email" type="text" id="email">
        </div>
        <div>
            <label for="position">Position: </label>
            <select name="select-position" id="position">
                <option value="Lecturer">Lecturer</option>
                <option value="Reader">Reader</option>
                <option value="Senior Lecturer">Senior Lecturer</option>
                <option value="Professor">Professor</option>
            </select>
        </div>
        <button type="submit">Submit</button>
    </form>
    </div>

    <div class="users-list">
        <?php
        echo getUsers();
        ?>
    </div>

</body>
</html>