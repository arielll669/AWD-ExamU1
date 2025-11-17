<?php
header("Content-Type: application/json");
require_once "conection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name_farmer = $_POST["name"] ?? '';

    if (empty($name_farmer)) {
        echo json_encode(["status" => "error", "message" => "Name required"]);
        exit;
    }

    $sql = "INSERT INTO farmer (name_farmer) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $name_farmer);
    $ok = $stmt->execute();

    if ($ok) {
        echo json_encode(["status" => "success", "message" => "Farmer saved"]);
    } else {
        echo json_encode(["status" => "error", "message" => $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}
?>
