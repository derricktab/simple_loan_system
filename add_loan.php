<?php
// addLoan.php
include 'db.php'; // Include your database connection setup file

// Extract data from the form
$cust_num = $_POST['cust_num'];
$name = $_POST['name'];
$amount = $_POST['amount'];
$no_of_inst = $_POST['no_of_inst'];
$amt_inst = $_POST['amt_inst'];
$no_of_inst_over = $_POST['no_of_inst_over'];

// Insert data into the database
$query = "INSERT INTO Loan (cust_num, name, amount, no_of_inst, amt_inst, no_of_inst_over) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssdiid", $cust_num, $name, $amount, $no_of_inst, $amt_inst, $no_of_inst_over);

if ($stmt->execute()) {
    echo "Loan added successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
