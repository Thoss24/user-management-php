<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PATCH, POST, GET, OPTIONS, DELETE');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "user_management_db";

try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " .$e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response(200);
    exit();

} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if ($_GET) {
        $id = $_GET['id'];
        $stmt = $pdo->prepare('SELECT * FROM staff_members WHERE id = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($user);
        
    } else {
        $stmt = $pdo->prepare('SELECT * FROM staff_members');
        $stmt->execute();

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($users);
    }

} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $request_data = json_decode(file_get_contents('php://input'), true);

    $name = $request_data['name'];
    $email = $request_data['email'];
    $position = $request_data['position'];

    $stmt = $pdo->prepare('INSERT INTO staff_members (name, email, position) VALUES (:name, :email, :position)');
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':position', $position);

    $stmt->execute();
}
else if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

    $request_data = json_decode(file_get_contents('php://input'), true);

    echo $request_data;

    $id = $request_data;

    $stmt = $pdo->prepare('DELETE FROM staff_members WHERE id = :id');
    $stmt->bindValue(':id', $id);
    $stmt->execute();

} else if ($_SERVER['REQUEST_METHOD'] === 'PATCH') {

    $request_data = json_decode(file_get_contents('php://input'), true);
    $name = $request_data['name'];
    $email = $request_data['email'];
    $position = $request_data['position'];
    $id = $request_data['id'];

    $stmt = $pdo->prepare('UPDATE staff_members SET name = :name, email = :email, position = :position, last_edited = NOW() WHERE id = :id');
    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':position', $position);
    $stmt->execute();

}
else {
    http_response(405);

    $data = array('error', 'Method not allowed');

    echo json_encode($data);
}

?>