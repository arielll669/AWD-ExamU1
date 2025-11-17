<?php
include 'conection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name_farmer = $_POST['name'];

    if (!empty($name_farmer)) {
        $sql = "INSERT INTO farmer (name_farmer) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $name_farmer);

        if ($stmt->execute()) {
            echo "Farmer registrado correctamente.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "El nombre del farmer no puede estar vacío.";
    }

    $conn->close();
}
?>
