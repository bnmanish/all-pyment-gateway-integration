<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Cancelled</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body{
      min-height:100vh;
      display:flex;
      align-items:center;
      justify-content:center;
      background: linear-gradient(135deg,#ff416c,#ff4b2b);
      font-family: Arial, sans-serif;
      overflow:hidden;
    }

    .cancel-card{
      width:100%;
      max-width:520px;
      background:#fff;
      border-radius:25px;
      padding:40px 30px;
      text-align:center;
      box-shadow:0 15px 40px rgba(0,0,0,0.2);
      animation:fadeIn 0.6s ease;
      position:relative;
    }

    .cancel-icon{
      width:110px;
      height:110px;
      background:#fff0f0;
      border-radius:50%;
      display:flex;
      align-items:center;
      justify-content:center;
      margin:0 auto 25px;
      animation:shake 0.5s ease;
    }

    .cancel-icon i{
      font-size:60px;
      color:#ff3b3b;
    }

    .cancel-title{
      font-size:34px;
      font-weight:700;
      color:#222;
    }

    .cancel-text{
      color:#666;
      margin-top:10px;
      line-height:1.7;
      font-size:15px;
    }

    .payment-details{
      background:#f8f9fa;
      border-radius:15px;
      padding:20px;
      margin-top:30px;
      text-align:left;
    }

    .payment-details .item{
      display:flex;
      justify-content:space-between;
      margin-bottom:12px;
      font-size:15px;
    }

    .payment-details .item:last-child{
      margin-bottom:0;
    }

    .payment-details .label{
      color:#777;
    }

    .payment-details .value{
      font-weight:600;
      color:#111;
    }

    .btn-custom{
      margin-top:25px;
      border-radius:12px;
      padding:12px 20px;
      font-weight:600;
      font-size:15px;
    }

    .floating-x{
      position:absolute;
      font-size:20px;
      color:rgba(255,255,255,0.3);
      animation:float 6s linear infinite;
    }

    @keyframes fadeIn{
      from{
        opacity:0;
        transform:translateY(20px);
      }
      to{
        opacity:1;
        transform:translateY(0);
      }
    }

    @keyframes shake{
      0%{ transform:translateX(0); }
      25%{ transform:translateX(-5px); }
      50%{ transform:translateX(5px); }
      75%{ transform:translateX(-5px); }
      100%{ transform:translateX(0); }
    }

    @keyframes float{
      from{
        transform:translateY(100vh) rotate(0deg);
      }
      to{
        transform:translateY(-120px) rotate(360deg);
      }
    }
  </style>
</head>
<body>

  <!-- Cancel Card -->
  <div class="cancel-card">

    <div class="cancel-icon">
      <i class="bi bi-x-circle-fill"></i>
    </div>

    <h1 class="cancel-title">Payment Cancelled</h1>

    <p class="cancel-text">
      Your payment was cancelled or could not be completed.  
      No amount has been deducted from your account.
    </p>

    <!-- Payment Details -->
    <div class="payment-details">

      <div class="item">
        <span class="label">Transaction ID</span>
        <span class="value">#TXN84572619</span>
      </div>

      <div class="item">
        <span class="label">Amount</span>
        <span class="value">₹100.00</span>
      </div>

      <div class="item">
        <span class="label">Payment Method</span>
        <span class="value">PayPal</span>
      </div>

      <div class="item">
        <span class="label">Date</span>
        <span class="value">06 May 2026</span>
      </div>

      <div class="item">
        <span class="label">Status</span>
        <span class="value text-danger">Cancelled</span>
      </div>

    </div>

    <!-- Buttons -->
    <div class="d-grid gap-2">

      <a href="/" class="btn btn-dark btn-custom">
        <i class="bi bi-arrow-repeat"></i>
        Try Again
      </a>

      <a href="/" class="btn btn-outline-secondary rounded-3 py-2">
        <i class="bi bi-house-door-fill"></i>
        Back To Home
      </a>

    </div>

  </div>

  <!-- Floating X Animation -->
  <script>
    for(let i=0; i<30; i++){

      let x = document.createElement("div");

      x.classList.add("floating-x");

      x.innerHTML = "✕";

      x.style.left = Math.random() * 100 + "vw";

      x.style.fontSize = (Math.random() * 20 + 15) + "px";

      x.style.animationDuration = (Math.random() * 5 + 3) + "s";

      document.body.appendChild(x);
    }
  </script>

</body>
</html>