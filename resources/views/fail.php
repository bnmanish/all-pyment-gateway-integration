<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Payment Failed</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body{
      min-height:100vh;
      display:flex;
      justify-content:center;
      align-items:center;
      background: linear-gradient(135deg,#232526,#414345);
      font-family: Arial, sans-serif;
      overflow:hidden;
      position:relative;
    }

    .fail-card{
      width:100%;
      max-width:540px;
      background:#fff;
      border-radius:25px;
      padding:40px 30px;
      text-align:center;
      box-shadow:0 20px 50px rgba(0,0,0,0.35);
      position:relative;
      z-index:2;
      animation:fadeIn 0.6s ease;
    }

    .fail-icon{
      width:120px;
      height:120px;
      background:#fff2f2;
      border-radius:50%;
      display:flex;
      justify-content:center;
      align-items:center;
      margin:0 auto 25px;
      animation:pulse 1.5s infinite;
    }

    .fail-icon i{
      font-size:65px;
      color:#ff3b30;
    }

    .fail-title{
      font-size:36px;
      font-weight:700;
      color:#222;
    }

    .fail-text{
      color:#666;
      margin-top:12px;
      font-size:15px;
      line-height:1.8;
    }

    .details-box{
      background:#f8f9fa;
      border-radius:18px;
      padding:22px;
      margin-top:30px;
      text-align:left;
    }

    .details-item{
      display:flex;
      justify-content:space-between;
      margin-bottom:14px;
      font-size:15px;
    }

    .details-item:last-child{
      margin-bottom:0;
    }

    .label{
      color:#777;
    }

    .value{
      font-weight:600;
      color:#111;
    }

    .btn-custom{
      border-radius:12px;
      padding:12px;
      font-weight:600;
      font-size:15px;
    }

    .bg-circle{
      position:absolute;
      border-radius:50%;
      background:rgba(255,255,255,0.05);
      animation:move 10s linear infinite;
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

    @keyframes pulse{
      0%{
        transform:scale(1);
      }
      50%{
        transform:scale(1.08);
      }
      100%{
        transform:scale(1);
      }
    }

    @keyframes move{
      from{
        transform:translateY(100vh) rotate(0deg);
      }
      to{
        transform:translateY(-120vh) rotate(360deg);
      }
    }
  </style>
</head>
<body>

  <!-- Animated Background -->
  <script>
    for(let i=0; i<18; i++){

      let circle = document.createElement("div");

      circle.classList.add("bg-circle");

      let size = Math.random() * 100 + 40;

      circle.style.width = size + "px";
      circle.style.height = size + "px";

      circle.style.left = Math.random() * 100 + "vw";

      circle.style.animationDuration =
        (Math.random() * 10 + 8) + "s";

      document.body.appendChild(circle);
    }
  </script>

  <!-- Failure Card -->
  <div class="fail-card">

    <div class="fail-icon">
      <i class="bi bi-exclamation-octagon-fill"></i>
    </div>

    <h1 class="fail-title">Payment Failed</h1>

    <p class="fail-text">
      We were unable to process your payment.  
      This may have happened due to a network issue, insufficient balance,
      or the transaction being declined by your bank.
    </p>

    <!-- Transaction Details -->
    <div class="details-box">

      <div class="details-item">
        <span class="label">Transaction ID</span>
        <span class="value">#TXN84572619</span>
      </div>

      <div class="details-item">
        <span class="label">Amount</span>
        <span class="value">₹100.00</span>
      </div>

      <div class="details-item">
        <span class="label">Payment Method</span>
        <span class="value">PayPal</span>
      </div>

      <div class="details-item">
        <span class="label">Date</span>
        <span class="value">06 May 2026</span>
      </div>

      <div class="details-item">
        <span class="label">Status</span>
        <span class="value text-danger">Failed</span>
      </div>

    </div>

    <!-- Action Buttons -->
    <div class="d-grid gap-2 mt-4">

      <a href="/" class="btn btn-danger btn-custom">
        <i class="bi bi-arrow-clockwise"></i>
        Retry Payment
      </a>

      <a href="/" class="btn btn-outline-dark btn-custom">
        <i class="bi bi-house-door-fill"></i>
        Back To Home
      </a>

    </div>

  </div>

</body>
</html>