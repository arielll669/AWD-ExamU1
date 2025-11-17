<?php
header("Content-Type: application/json");
require_once "conection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = $_POST["name"] ?? '';
    $color = $_POST["color"] ?? '';
    $age = $_POST["age"] ?? '';
    $isMolting = isset($_POST["isMolting"]) ? 1 : 0;
    $id_coop = $_POST["coop_id"] ?? '';

    if (empty($name) || empty($color) || empty($age) || empty($id_coop)) {
        echo json_encode(["status" => "error", "message" => "Missing required fields"]);
        exit;
    }

    $sql = "INSERT INTO chicken (name, color, age, isMolting, id_coop) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiii", $name, $color, $age, $isMolting, $id_coop);
    $ok = $stmt->execute();

    if ($ok) {
        echo json_encode(["status" => "success", "message" => "Chicken saved"]);
    } else {
        echo json_encode(["status" => "error", "message" => $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}
?>
