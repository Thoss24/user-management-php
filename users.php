<?php

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