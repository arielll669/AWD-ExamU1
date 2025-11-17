<?php
header("Content-Type: application/json");
require_once "conection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_farmer = $_POST["farmer_id"] ?? '';

    if (empty($id_farmer)) {
        echo json_encode(["status" => "error", "message" => "Farmer ID required"]);
        exit;
    }

    $sql = "INSERT INTO chicken_coop (id_farmer) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_farmer);
    $ok = $stmt->execute();

    if ($ok) {
        echo json_encode(["status" => "success", "message" => "Chicken Coop saved"]);
    } else {
        echo json_encode(["status" => "error", "message" => $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}
?>
