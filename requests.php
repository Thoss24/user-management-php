<?php
function getUsers() {
            
    $users_data = file_get_contents('http://localhost/user_management_php/api.php');
    $users = json_decode($users_data);
   
    foreach($users as $user) {
        echo "<div class='user-shell' id='$user->id' key>
        <p><strong>Name:</strong> $user->name</p>
        <p><strong>Email:</strong> $user->email</p>
        <p><strong>Position:</strong> $user->position</p>
        <p><strong>Last Edited:</strong> $user->last_edited</p>
        <div>
        <button class='edit-button'>Edit</button>
        </div>
        </div>";
    }
}
?>

