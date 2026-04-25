<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Advanced Checkout</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Intl Tel Input -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.css"/>
  <style>
    body {
      background: linear-gradient(135deg, #ff7e5f, #feb47b);
    }
    .card-box {
      max-width: 850px;
      margin: 40px auto;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }
    .header {
      background: linear-gradient(90deg, #ff512f, #dd2476);
      color: white;
      padding: 20px;
      text-align: center;
    }
    .form-section {
      background: white;
      padding: 25px;
    }
    .pay-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 10px;
    }

    .pay-btn {
      font-size: 13px;
      padding: 8px;
      border-radius: 10px;
    }

    .iti {
      width: 100%;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="card card-box">

    <div class="header">
      <h4><i class="bi bi-credit-card"></i> Secure Checkout</h4>
    </div>

    <div class="form-section">
      <form id="paymentForm">

        <div class="row g-3">

          <!-- Name -->
          <div class="col-md-6">
            <div class="form-floating">
              <input type="text" id="name" class="form-control" placeholder="Name" required>
              <label>Full Name</label>
            </div>
          </div>

          <!-- Email -->
          <div class="col-md-6">
            <div class="form-floating">
              <input type="email" id="email" class="form-control" placeholder="Email" required>
              <label>Email</label>
            </div>
          </div>

          <!-- Mobile with Country Code -->
          <div class="col-md-6">
            <label class="form-label">Mobile</label>
            <input type="tel" id="mobile" class="form-control" required>
          </div>

          <!-- Currency -->
          <div class="col-md-3">
            <div class="form-floating">
              <select id="currency" class="form-select">
                <option value="INR">₹ INR</option>
                <option value="USD">$ USD</option>
                <option value="EUR">€ EUR</option>
                <option value="GBP">£ GBP</option>
              </select>
              <label>Currency</label>
            </div>
          </div>

          <!-- Amount -->
          <div class="col-md-3">
            <div class="form-floating">
              <input type="number" id="amount" class="form-control" placeholder="Amount" required>
              <label>Amount</label>
            </div>
          </div>

          <!-- Address -->
          <div class="col-12">
            <div class="form-floating">
              <input type="text" id="address" class="form-control" placeholder="Address" required>
              <label>Building / Plot No</label>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-floating">
              <input type="text" id="city" class="form-control" placeholder="City" required>
              <label>City</label>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-floating">
              <input type="text" id="state" class="form-control" placeholder="State" required>
              <label>State</label>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-floating">
              <input type="text" id="country" class="form-control" placeholder="Country" required>
              <label>Country</label>
            </div>
          </div>

        </div>

        <hr class="my-4">

        <h6 class="text-center mb-3">Select Payment Method</h6>

        <!-- Buttons -->
        <div class="pay-grid">
          <button type="button" class="btn btn-warning pay-btn" onclick="pay('paypal')">PayPal</button>
          <button type="button" class="btn btn-primary pay-btn" onclick="pay('payumoney')">PayU</button>
          <button type="button" class="btn btn-info pay-btn" onclick="pay('razorpay')">Razorpay</button>
          <button type="button" class="btn btn-success pay-btn" onclick="pay('cashfree')">Cashfree</button>
          <button type="button" class="btn btn-dark pay-btn" onclick="pay('stripe')">Stripe</button>
          <button type="button" class="btn btn-secondary pay-btn" onclick="pay('mollie')">Mollie</button>
          <button type="button" class="btn btn-primary pay-btn" onclick="pay('paytm')">Paytm</button>
          <button type="button" class="btn btn-success pay-btn" onclick="pay('phonepe')">PhonePe</button>
        </div>

      </form>
    </div>

  </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Intl Tel Input -->
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>

<script>
const phoneInput = document.querySelector("#mobile");

const iti = window.intlTelInput(phoneInput, {
  initialCountry: "in",
  separateDialCode: true,
  preferredCountries: ["in", "us", "gb"],
  utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js"
});

function pay(method) {

  let data = {
    name: name.value,
    email: email.value,
    mobile: iti.getNumber(),
    currency: currency.value,
    amount: amount.value,
    address: address.value,
    city: city.value,
    state: state.value,
    country: country.value,
    gateway: method
  };

  for (let key in data) {
    if (!data[key]) {
      alert("Please fill all fields!");
      return;
    }
  }

  console.log(data);
  alert("Proceeding with " + method.toUpperCase());
}
</script>

</body>
</html>