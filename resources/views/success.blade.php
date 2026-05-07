<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Payment Success</title>

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
      background: linear-gradient(135deg,#11998e,#38ef7d);
      font-family: Arial, sans-serif;
      overflow:hidden;
    }

    .success-card{
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

    .success-icon{
      width:110px;
      height:110px;
      background:#e9fff1;
      border-radius:50%;
      display:flex;
      align-items:center;
      justify-content:center;
      margin:0 auto 25px;
      animation:pop 0.5s ease;
    }

    .success-icon i{
      font-size:60px;
      color:#16c172;
    }

    .success-title{
      font-size:34px;
      font-weight:700;
      color:#222;
    }

    .success-text{
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

    .btn-home{
      margin-top:30px;
      border-radius:12px;
      padding:12px 25px;
      font-weight:600;
      font-size:15px;
    }

    .confetti{
      position:absolute;
      width:10px;
      height:10px;
      background:red;
      top:-10px;
      animation:fall linear infinite;
      opacity:0.7;
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

    @keyframes pop{
      0%{
        transform:scale(0.5);
      }
      100%{
        transform:scale(1);
      }
    }

    @keyframes fall{
      to{
        transform:translateY(110vh) rotate(360deg);
      }
    }
  </style>
</head>
<body>

  <!-- Success Card -->
  <div class="success-card">

    <div class="success-icon">
      <i class="bi bi-check-circle-fill"></i>
    </div>

    <h1 class="success-title">Payment Successful!</h1>

    <p class="success-text">
      Thank you for your payment. Your transaction has been completed successfully.
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
        <span class="value text-success">Success</span>
      </div>

    </div>

    <!-- Buttons -->
    <div class="d-grid gap-2">
      <a href="/" class="btn btn-success btn-home">
        <i class="bi bi-house-door-fill"></i>
        Back To Home
      </a>

      <button class="btn btn-outline-dark rounded-3 py-2">
        <i class="bi bi-download"></i>
        Download Receipt
      </button>
    </div>

  </div>

  <!-- Confetti -->
  <script>
    for(let i=0; i<40; i++){

      let confetti = document.createElement("div");
      confetti.classList.add("confetti");

      confetti.style.left = Math.random() * 100 + "vw";
      confetti.style.backgroundColor =
        ["#ff4d4d","#ffd11a","#00ccff","#00e676","#ff66cc"][Math.floor(Math.random()*5)];

      confetti.style.width = confetti.style.height =
        Math.random() * 8 + 5 + "px";

      confetti.style.animationDuration =
        Math.random() * 3 + 2 + "s";

      document.body.appendChild(confetti);
    }
  </script>

</body>
</html>