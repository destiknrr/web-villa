<?php
require '../backend/function.php';

if(isset($_GET['id'])) {
    $villa = ambilVilla($_GET['id']);
    header('Content-Type: application/json');
    echo json_encode($villa);
}
