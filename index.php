<?php
    require './users.php';
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
    <div id="new-user-form-container">
    <form method='POST' id="new-user-form">
        <div>
            <label for="name" >Name: </label>
            <input name="name" type="text" id="name">
        </div>
        <div>
            <label for="email" >Email: </label>
            <input name="email" type="text" id="email" >
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
    <div>
    <label>Filter Staff</label>
    <select name='filter-users' id='filter-users'>
        <option value='All Staff'>All Staff</option>
        <option value='Lecturer'>Lecturer</option>
        <option value='Reader'>Reader</option>
        <option value='Senior Lecturer'>Senior Lecturer</option>
        <option value='Professor'>Professor</option>
    </select>
    </div>
    </div>
    <div class="users-list">
    
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./requests.js"></script>
</body>
</html>