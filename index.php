
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Records</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .container {
            padding-top: 20px;
        }
        #totalAmount {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Loan Records</h2>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <!-- Updated button to trigger JavaScript function -->
                <button onclick="showTotalAmount()" class="btn btn-dark btn-sm px-3 rounded-pill my-3">Print Total Amount To Be Repaid</button>
                <a href="add_loan.html">
                    <button class="btn btn-success btn-sm px-3 rounded-pill my-3 ml-3">ADD LOAN</button>
                </a>
            </div>
        </div>
        <!-- Placeholder for total amount -->
        <div id="totalAmount" class="alert alert-info"></div>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                <th>ID</th>
                    <th>Customer Number</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>No. of Installments</th>
                    <th>Amount per Installment</th>
                    <th>No. of Overdue Installments</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db.php'; // Database connection
                                
                $query = "SELECT * FROM Loan";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["id"] . "</td>
                                <td>" . $row["cust_num"] . "</td>
                                <td>" . $row["name"] . "</td>
                                <td>" . $row["amount"] . "</td>
                                <td>" . $row["no_of_inst"] . "</td>
                                <td>" . $row["amt_inst"] . "</td>
                                <td>" . $row["no_of_inst_over"] . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No records found</td></tr>";
                }
                
                // Calculate total amount
                $totalAmountQuery = "SELECT SUM(amount) AS totalAmount FROM Loan";
                $totalResult = $conn->query($totalAmountQuery);
                $totalRow = $totalResult->fetch_assoc();
                $totalAmount = $totalRow['totalAmount'];

                // Pass total amount to JavaScript
                echo "<script>var totalAmount = $totalAmount;</script>";

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script>
        // JavaScript function to display total amount
        function showTotalAmount() {
            var amountDiv = document.getElementById('totalAmount');
            amountDiv.style.display = 'block';
            amountDiv.innerHTML = 'Total Amount to be Repaid: UGX ' + totalAmount;
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
