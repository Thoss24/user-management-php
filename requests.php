<?php
function getUsers() {
            
    $users_data = file_get_contents('http://localhost/user_management_php/api.php');
    $users = json_decode($users_data);
   
    foreach($users as $user) {
        echo "<div class='user-shell' id='$user->id' key>
        <p>Name: <strong>$user->name</strong></p>
        <p>Email: <strong>$user->email</strong></p>
        <p>Position: <strong>$user->position</strong></p>
        <p>Last Edited: <strong>$user->last_edited</strong></p>
        <button class='edit-button'>Edit</button>
        </div>";
    }
}
?>

