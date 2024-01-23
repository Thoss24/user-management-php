<?php
    require 'requests.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="queries.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="index.css">
    <title>Document</title>
</head>
<body>

    <div class="users-list">
        <?php
        echo getUsers();
        ?>
    </div>

</body>
</html>