<?php
include 'conection.php';

// Guardar datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $farmer_id = $_POST['farmer_id'];

    if (!empty($farmer_id)) {
        $sql = "INSERT INTO chicken_coop (id_farmer) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $farmer_id);

        if ($stmt->execute()) {
            echo "Chicken Coop registrado correctamente.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Debe seleccionar un farmer.";
    }
}

// Obtener farmers para el select
$sql_farmer = "SELECT id_farmer, name_farmer FROM farmer";
$result_farmer = $conn->query($sql_farmer);
?>

<!-- Aquí llenamos el select desde PHP -->
<script>
    const selectFarmer = document.getElementById('farmer_id');
    <?php
    if ($result_farmer->num_rows > 0) {
        while($row = $result_farmer->fetch_assoc()) {
            echo "let option = document.createElement('option');";
            echo "option.value = '{$row['id_farmer']}';";
            echo "option.text = '{$row['name_farmer']}';";
            echo "selectFarmer.add(option);";
        }
    }
    $conn->close();
    ?>
</script>
