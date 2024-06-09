<?php

require("../includes/conn.php");

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (isset($data['id'])) {
    $id = $data['id'];
    $query = "DELETE FROM clients WHERE id = '$id'";
    $run = mysqli_query($conn, $query);

    if ($run) {
        http_response_code(200); // OK
        $response = json_encode(["message" => "Client deleted successfully", "code" => 200, "error" => false]);
    } else {
        http_response_code(500); // Internal Server Error
        $response = json_encode(["message" => "Something went wrong", "code" => 500, "error" => true]);
    }
} else {
    http_response_code(400); // Bad Request
    $response = json_encode(["message" => "Bad request. ID is missing.", "code" => 400, "error" => true]);
}

echo $response;
