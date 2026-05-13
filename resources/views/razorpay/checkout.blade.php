<!DOCTYPE html>
<html>
<head>
    <title>Pay</title>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>

<script>

var options = {

    "key": "<?php echo $keyId; ?>",

    "amount": "<?php echo $amount; ?>",

    "currency": "INR",

    "name": "Test Company",

    "description": "Test Payment",

    "order_id": "<?php echo $orderId; ?>",

    "handler": function (response){

        window.location.href =
        "success.php?payment_id=" + response.razorpay_payment_id +
        "&order_id=" + response.razorpay_order_id +
        "&signature=" + response.razorpay_signature;

    },

    "prefill": {

        "name": "<?php echo $name; ?>",

        "email": "<?php echo $email; ?>"

    },

    "theme": {
        "color": "#3399cc"
    }

};

var rzp = new Razorpay(options);

rzp.open();

</script>

</body>
</html>