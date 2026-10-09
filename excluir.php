<?php
require_once 'conn.php';

$id = $_GET["id"];

$sql = "DELETE FROM brinquedos WHERE id = ?";

$stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        header('Location: index.php');
?>