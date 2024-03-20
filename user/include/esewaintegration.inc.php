<html>

<head>
    <title>Confirmation Page | Traverse Nepal</title>
    <link flex href="../assets/boxicons/css/boxicons.min.css" rel="stylesheet" />
</head>
<style>
    body {
        margin: 0;
        background: rgb(7, 48, 100);
    }

    h2 {
        color: white;
    }

    .confirmation {
        margin-top: 100px;
    }

    .submit-button {
        color: #FFF;
        background: #44CC44;
        padding: 15px 20px;
        box-shadow: 0 4px 0 0 #2EA62E;
        transition: all 0.1s linear;
    }

    .submit-button:hover {
        background: #6FE76F;
        box-shadow: 0 4px 0 0 #7ED37E;
    }

    .cancel-button {
        color: #FFF;
        background: tomato;
        padding: 15px 20px;
        box-shadow: 0 4px 0 0 #CB4949;
        transition: all 0.1s linear;
    }

    .cancel-button:hover {
        background: rgb(255, 147, 128);
        box-shadow: 0 4px 0 0 #EF8282;
    }
</style>


<?php
// Function to generate a unique transaction ID
function generateTransactionID()
{
    // Generating a unique ID using uniqid() combined with user-specific information and a prefix
    return uniqid(time() . " - " . mt_rand(), true);
}

if (isset($_POST['submit-amount'])) {
    $amt = $_POST['amount'];
    $tax = 0;
    $trans_uuid = generateTransactionID();
    $product_code = "EPAYTEST";
    $product_service_charge = 0;
    $product_delivery_charge = 0;
    $total_amt = $amt + $tax + $product_service_charge + $product_delivery_charge;
    $parameter = "total_amount,transaction_uuid,product_code";
    $signed_field_names = "total_amount=$total_amt,transaction_uuid=$trans_uuid,product_code=$product_code";
    $secret_key = "8gBm/:&EnhH.1/q";
    $s = hash_hmac("sha256", $signed_field_names, $secret_key, true);
}
?>

<body>


    <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST" class="bmc-button" id="form">
        <input type="hidden" id="amount" name="amount" value="<?= $amt ?>" required>
        <input type="hidden" id="tax_amount" name="tax_amount" value="<?= $tax ?>" required>
        <input type="hidden" id="total_amount" name="total_amount" value="<?= $total_amt ?>" required>
        <input type="hidden" id="transaction_uuid" name="transaction_uuid" value="<?= $trans_uuid ?>" required>
        <input type="hidden" id="product_code" name="product_code" value="<?= $product_code ?>" required>
        <input type="hidden" id="product_service_charge" name="product_service_charge" value="<?= $product_service_charge ?>" required>
        <input type="hidden" id="product_delivery_charge" name="product_delivery_charge" value="<?= $product_delivery_charge ?>" required>
        <input type="hidden" id="success_url" name="success_url" value="http://localhost/Tourism-Information-System/search.php" required>
        <input type="hidden" id="failure_url" name="failure_url" value="http://localhost/Tourism-Information-System/search.php?data=FAILED" required>
        <input type="hidden" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
        <input type="hidden" id="signature" name="signature" value="<?= base64_encode($s) ?>" required>
        <center class="confirmation">
            <h2>Are you sure you want to proceed? (Amount : Rs. <?= $amt ?>)</h2>
            <input value="Proceed" type="submit" name="submit" class="submit-button">
            <i class='bx bx-check'></i>
            <input value="Cancel" type="reset" name="cancel" class="cancel-button" onclick="window.location.href='http://localhost/Tourism-Information-System/search.php'">
            <i class='bx bx-x'></i>
        </center>
    </form>

    <script>
        document.getElementById("form").addEventListener("submit", function(event) {
            // event.preventDefault();
            // Serialize form data
            var formData = new FormData(this);
            console.log(formData); // Log formData;

            // Send POST request to the same page
            var xhr1 = new XMLHttpRequest();
            xhr1.open("POST", "../ajax_processing/transaction.php");
            xhr1.send(formData);

            // Optionally handle responses if needed
            xhr1.onload = function() {
                console.log(xhr1.responseText);
            };
        });
    </script>
</body>

</html>