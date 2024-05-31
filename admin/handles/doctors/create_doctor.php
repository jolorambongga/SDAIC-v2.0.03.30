<?php

require_once('../../../includes/config.php');

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the form data
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $contact = $_POST['contact'];
    
    // Decode JSON data
    $avail_dates = json_decode($_POST['avail_dates'], true);

    // Insert into tbl_Doctors
    $sql = "INSERT INTO tbl_Doctors (first_name, middle_name, last_name, contact)
            VALUES (?, ?, ?, ?);";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $first_name, PDO::PARAM_STR);
    $stmt->bindParam(2, $middle_name, PDO::PARAM_STR);
    $stmt->bindParam(3, $last_name, PDO::PARAM_STR);
    $stmt->bindParam(4, $contact, PDO::PARAM_STR);
    $stmt->execute();

    // Get the last inserted doctor ID
    $doctor_id = $pdo->lastInsertId();

    // Insert into tbl_DoctorAvailability for each available date
    $sql = "INSERT INTO tbl_DoctorAvailability (doctor_id, avail_date, avail_start_time, avail_end_time)
            VALUES (?, ?, ?, ?);";
    $stmt = $pdo->prepare($sql);

    foreach ($avail_dates as $avail_date) {
        $stmt->bindParam(1, $doctor_id, PDO::PARAM_INT);
        $stmt->bindParam(2, $avail_date['day'], PDO::PARAM_STR);
        $stmt->bindParam(3, $avail_date['start_time'], PDO::PARAM_STR);
        $stmt->bindParam(4, $avail_date['end_time'], PDO::PARAM_STR);
        $stmt->execute();
    }

    header('Content-Type: application/json');
    echo json_encode(array("status" => "success", "process" => "add doctor and availability", "data" => "Doctor added successfully"));

} catch (PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode(array("status" => "error", "message" => $e->getMessage(), "process" => "add doctor and availability"));
}
