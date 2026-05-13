<!DOCTYPE html>
<html>
<head>
    <title>Razorpay Checkout</title>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>

<body>

<form action="{{ route('payment.success') }}"
      method="POST"
      id="razorpay-form">

    @csrf

    <input type="hidden"
           name="razorpay_payment_id"
           id="razorpay_payment_id">

</form>

<script>

    var options = {

        "key": "{{ $data['key'] }}",

        "amount": "{{ $data['amount'] }}",

        "currency": "INR",

        "name": "{{ $data['name'] }}",

        "description": "{{ $data['description'] }}",

        "image": "{{ $data['image'] }}",

        "order_id": "{{ $data['order_id'] }}",

        "prefill": {

            "name": "{{ $data['prefill']['name'] }}",

            "email": "{{ $data['prefill']['email'] }}",

            "contact": "{{ $data['prefill']['contact'] }}"
        },

        "theme": {

            "color": "{{ $data['theme']['color'] }}"
        },

        "handler": function (response){

            document.getElementById('razorpay_payment_id').value =
                response.razorpay_payment_id;

            document.getElementById('razorpay-form').submit();
        }
    };

    var rzp = new Razorpay(options);

    rzp.open();

</script>

</body>
</html>