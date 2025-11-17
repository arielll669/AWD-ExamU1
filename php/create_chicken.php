<?php
include 'conection.php';

// Guardar datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $color = $_POST['color'];
    $age = $_POST['age'];
    $isMolting = isset($_POST['isMolting']) ? 1 : 0;
    $id_coop = $_POST['coop_id'];

    if (!empty($name) && !empty($color) && $age >= 0 && !empty($id_coop)) {
        $sql = "INSERT INTO chicken (name, color, age, isMolting, id_coop) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssiii", $name, $color, $age, $isMolting, $id_coop);

        if ($stmt->execute()) {
            echo "Chicken registrado correctamente.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Todos los campos son obligatorios.";
    }
}

// Obtener coops para el select
$sql_coop = "SELECT id_coop FROM chicken_coop";
$result_coop = $conn->query($sql_coop);
?>

<!-- Aquí llenamos el select desde PHP -->
<script>
    const selectCoop = document.getElementById('coop_id');
    <?php
    if ($result_coop->num_rows > 0) {
        while($row = $result_coop->fetch_assoc()) {
            echo "let option = document.createElement('option');";
            echo "option.value = '{$row['id_coop']}';";
            echo "option.text = 'Coop ID {$row['id_coop']}';";
            echo "selectCoop.add(option);";
        }
    }
    $conn->close();
    ?>
</script>
