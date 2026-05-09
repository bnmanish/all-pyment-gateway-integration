<!DOCTYPE html>
<html>
<head>
    <title>Redirecting...</title>
</head>
<body>

<form action="{{ $payuData['action'] }}"
      method="POST"
      id="payuForm">

    <input type="hidden" name="key" value="{{ $payuData['key'] }}">
    <input type="hidden" name="txnid" value="{{ $payuData['txnid'] }}">
    <input type="hidden" name="amount" value="{{ $payuData['amount'] }}">
    <input type="hidden" name="productinfo" value="{{ $payuData['productinfo'] }}">
    <input type="hidden" name="firstname" value="{{ $payuData['firstname'] }}">
    <input type="hidden" name="email" value="{{ $payuData['email'] }}">
    <input type="hidden" name="phone" value="{{ $payuData['phone'] }}">
    <input type="hidden" name="surl" value="{{ $payuData['surl'] }}">
    <input type="hidden" name="furl" value="{{ $payuData['furl'] }}">
    <input type="hidden" name="hash" value="{{ $payuData['hash'] }}">

</form>

<script>

    document.getElementById('payuForm').submit();

</script>

</body>
</html>