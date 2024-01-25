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
            <button class='delete-button'>Delete</button>
            </div>
            </div>";
        }
    }

    function getUser() {

        $id = $_SERVER['QUERY_STRING'];

        $pageUrl = 'http://localhost/user_management_php/api.php';
        $urlWithId = $pageUrl . '?id=' .$id;

        $user_data = file_get_contents($urlWithId);
        $user = json_decode($user_data);

        print_r($user);

        echo '<div id="edit-user-form-container">
        <form method="PATCH" id="edit-user-form">
            <legend>Edit user form</legend>
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
        </div>';
    };
?>