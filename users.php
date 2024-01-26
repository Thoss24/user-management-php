<?php

    function getUsers() {
            
        $users_data = file_get_contents('http://localhost/user_management_php/api.php');
        $users = json_decode($users_data);

        if (count($users) > 0) {
            foreach($users as $user) {
                echo "<div class='user-shell' id='$user->id' key>
                <p class='user-name'><strong>Name:</strong> $user->name</p>
                <p><strong>Email:</strong> $user->email</p>
                <p><strong>Position:</strong> $user->position</p>
                <p><strong>Last Edited:</strong> $user->last_edited</p>
                <div>
                <button class='edit-button'>Edit</button>
                <button class='delete-button'>Delete</button>
                </div>
                </div>";
            }
        } else {
            echo "<div><h2>Database Empty.</h2></div>";
        }
    }

    function getUser() {

        $id = $_SERVER['QUERY_STRING'];

        $pageUrl = 'http://localhost/user_management_php/api.php';
        $urlWithId = $pageUrl . '?id=' .$id;

        $user_data = file_get_contents($urlWithId);
        $user = json_decode($user_data);

        $name = $user[0]->name;
        $email = $user[0]->email;
        $position = $user[0]->position;

        if ($user_data) {
            echo "<div id='edit-user-form-container'>
            <form method='PATCH' id='edit-user-form'>
                <legend>Edit user form</legend>
                <div>
                    <label for='name' >Name: </label>
                    <input name='name' type='text' id='edit-name' value='$name'>
                </div>
                <div>
                    <label for='email' >Email: </label>
                    <input name='email' type='text' id='edit-email' value='$email'>
                </div>
                <div>
                    <label for='position'>Position: </label>
                    <select name='select-position' id='edit-position' required>
                        <option value='' selected disabled hidden>Choose here</option>
                        <option value='Lecturer'>Lecturer</option>
                        <option value='Reader'>Reader</option>
                        <option value='Senior Lecturer'>Senior Lecturer</option>
                        <option value='Professor'>Professor</option>
                    </select>
                </div>
                <button type='submit'>Submit</button>
            </form>
            </div>";
        }

    };
?>