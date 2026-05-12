<script src="https://sdk.cashfree.com/js/v3/cashfree.js"></script>

<script>

    const cashfree = Cashfree({
        mode: "sandbox"
    });

    cashfree.checkout({

        paymentSessionId:
            "{{ $paymentSessionId }}",

        redirectTarget: "_self"

    });

</script>