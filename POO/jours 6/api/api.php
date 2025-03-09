<?php
// RECUPERER GET
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM contacts";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $contacts = [];
        while($row = $result->fetch_assoc()) {
            $contacts[] = $row;
        }
        echo json_encode($contacts);
    } else {
        echo json_encode(["message" => "No contacts found"]);
    }
}


// AJOUTER POST

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    
    $name = $data->name;
    $email = $data->email;
    $phone = $data->phone;

    $sql = "INSERT INTO contacts (name, email, phone) VALUES ('$name', '$email', '$phone')";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "New contact created successfully"]);
    } else {
        echo json_encode(["message" => "Error: " . $conn->error]);
    }
}


// PUT
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents("php://input"));
    
    $id = $data->id;
    $name = $data->name;
    $email = $data->email;
    $phone = $data->phone;

    $sql = "UPDATE contacts SET name='$name', email='$email', phone='$phone' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Contact updated successfully"]);
    } else {
        echo json_encode(["message" => "Error: " . $conn->error]);
    }
}



// DELETE

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"));
    
    $id = $data->id;

    $sql = "DELETE FROM contacts WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Contact deleted successfully"]);
    } else {
        echo json_encode(["message" => "Error: " . $conn->error]);
    }
}
?>
    