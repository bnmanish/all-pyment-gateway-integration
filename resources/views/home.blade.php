<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Gateway Hub</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            min-height:100vh;
            font-family:'Poppins',sans-serif;
            background:
                linear-gradient(135deg,#0f172a,#111827,#1e293b);
            overflow-x:hidden;
            position:relative;
        }

        /* BACKGROUND GLOW EFFECT */

        .glow{
            position:absolute;
            border-radius:50%;
            filter:blur(120px);
            opacity:0.25;
            z-index:0;
        }

        .glow-1{
            width:350px;
            height:350px;
            background:#00c6ff;
            top:-100px;
            left:-100px;
        }

        .glow-2{
            width:300px;
            height:300px;
            background:#ff0080;
            bottom:-80px;
            right:-80px;
        }

        .main-wrapper{
            position:relative;
            z-index:2;
            padding:60px 15px;
        }

        .hero-box{
            text-align:center;
            color:#fff;
            margin-bottom:50px;
        }

        .hero-badge{
            display:inline-flex;
            align-items:center;
            gap:10px;
            padding:12px 22px;
            border-radius:50px;
            background:rgba(255,255,255,0.08);
            backdrop-filter:blur(10px);
            color:#fff;
            margin-bottom:25px;
            font-weight:500;
            border:1px solid rgba(255,255,255,0.08);
        }

        .hero-title{
            font-size:55px;
            font-weight:800;
            line-height:1.2;
            margin-bottom:18px;
        }

        .hero-title span{
            background:linear-gradient(90deg,#00c6ff,#ff0080);
            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        .hero-subtitle{
            max-width:700px;
            margin:auto;
            color:rgba(255,255,255,0.75);
            font-size:17px;
            line-height:1.9;
        }

        /* CARD */

        .gateway-card{
            border:none;
            border-radius:30px;
            background:rgba(255,255,255,0.08);
            backdrop-filter:blur(18px);
            overflow:hidden;
            box-shadow:
                0 15px 40px rgba(0,0,0,0.35);
        }

        .card-header-custom{
            padding:35px;
            border-bottom:1px solid rgba(255,255,255,0.08);
            display:flex;
            justify-content:space-between;
            align-items:center;
            flex-wrap:wrap;
        }

        .header-left h2{
            color:#fff;
            font-weight:700;
            margin-bottom:10px;
        }

        .header-left p{
            color:rgba(255,255,255,0.65);
            margin:0;
        }

        .secure-chip{
            padding:12px 18px;
            border-radius:14px;
            background:rgba(0,255,163,0.12);
            color:#00ffa3;
            font-weight:600;
            display:flex;
            align-items:center;
            gap:10px;
        }

        /* GRID */

        .gateway-grid{
            padding:35px;
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
            gap:25px;
        }

        .gateway-btn{
            position:relative;
            overflow:hidden;
            text-decoration:none;
            border-radius:22px;
            padding:28px 22px;
            min-height:170px;
            transition:0.35s;
            display:flex;
            flex-direction:column;
            justify-content:space-between;
            color:#fff;
            box-shadow:
                0 10px 25px rgba(0,0,0,0.2);
        }

        .gateway-btn::before{
            content:'';
            position:absolute;
            width:180px;
            height:180px;
            background:rgba(255,255,255,0.12);
            border-radius:50%;
            top:-80px;
            right:-80px;
        }

        .gateway-btn:hover{
            transform:translateY(-8px) scale(1.02);
            color:#fff;
        }

        .gateway-icon{
            width:65px;
            height:65px;
            border-radius:18px;
            background:rgba(255,255,255,0.15);
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:30px;
            backdrop-filter:blur(10px);
        }

        .gateway-content h4{
            font-size:24px;
            font-weight:700;
            margin-bottom:8px;
        }

        .gateway-content p{
            font-size:14px;
            color:rgba(255,255,255,0.85);
            margin:0;
        }

        .gateway-arrow{
            font-size:24px;
            opacity:0.8;
        }

        /* INDIVIDUAL COLORS */

        .paypal{
            background:linear-gradient(135deg,#003087,#009cde);
        }

        .payu{
            background:linear-gradient(135deg,#00bf72,#008793);
        }

        .razorpay{
            background:linear-gradient(135deg,#1a1f71,#4f46e5);
        }

        .cashfree{
            background:linear-gradient(135deg,#11998e,#38ef7d);
        }

        .stripe{
            background:linear-gradient(135deg,#635bff,#0a2540);
        }

        .mollie{
            background:linear-gradient(135deg,#ff6a00,#ee0979);
        }

        .paytm{
            background:linear-gradient(135deg,#00baf2,#0f4c81);
        }

        .phonepe{
            background:linear-gradient(135deg,#5f259f,#8e44ad);
        }

        /* FOOTER */

        .footer-note{
            text-align:center;
            margin-top:35px;
            color:rgba(255,255,255,0.65);
            font-size:14px;
        }

        @media(max-width:768px){

            .hero-title{
                font-size:38px;
            }

            .card-header-custom{
                gap:20px;
            }

        }

    </style>
</head>

<body>

<!-- GLOW EFFECT -->
<div class="glow glow-1"></div>
<div class="glow glow-2"></div>

<div class="container main-wrapper">

    <!-- HERO -->
    <div class="hero-box">

        <div class="hero-badge">
            <i class="bi bi-lightning-charge-fill"></i>
            Advanced Multi Payment Checkout
        </div>

        <h1 class="hero-title">
            Choose Your <span>Payment Gateway</span>
        </h1>

        <p class="hero-subtitle">
            Securely integrate and test multiple online payment gateways
            including PayPal, PayU, Razorpay, Stripe, Paytm, PhonePe and more
            from one modern dashboard.
        </p>

    </div>

    <!-- CARD -->
    <div class="card gateway-card">

        <!-- HEADER -->
        <div class="card-header-custom">

            <div class="header-left">

                <h2>
                    Available Payment Methods
                </h2>

                <p>
                    Select a payment gateway to continue checkout.
                </p>

            </div>

            <div class="secure-chip">
                <i class="bi bi-shield-lock-fill"></i>
                SSL Secure Checkout
            </div>

        </div>

        <!-- GRID -->
        <div class="gateway-grid">

            <!-- PAYPAL -->
            <a href="{{ route('paypal') }}"
               class="gateway-btn paypal">

                <div class="gateway-icon">
                    <i class="bi bi-paypal"></i>
                </div>

                <div class="gateway-content">
                    <h4>PayPal</h4>
                    <p>
                        Global trusted online payment solution.
                    </p>
                </div>

                <div class="gateway-arrow">
                    <i class="bi bi-arrow-right-circle-fill"></i>
                </div>

            </a>

            <!-- PAYU -->
            <a href="{{ route('payumoney') }}"
               class="gateway-btn payu">

                <div class="gateway-icon">
                    <i class="bi bi-wallet2"></i>
                </div>

                <div class="gateway-content">
                    <h4>PayU</h4>
                    <p>
                        Fast Indian payment gateway integration.
                    </p>
                </div>

                <div class="gateway-arrow">
                    <i class="bi bi-arrow-right-circle-fill"></i>
                </div>

            </a>

            <!-- RAZORPAY -->
            <a href="{{ route('payumoney') }}"
               class="gateway-btn razorpay">

                <div class="gateway-icon">
                    <i class="bi bi-credit-card-2-front-fill"></i>
                </div>

                <div class="gateway-content">
                    <h4>Razorpay</h4>
                    <p>
                        Smart payments with UPI and cards.
                    </p>
                </div>

                <div class="gateway-arrow">
                    <i class="bi bi-arrow-right-circle-fill"></i>
                </div>

            </a>

            <!-- CASHFREE -->
            <a href="{{ route('payumoney') }}"
               class="gateway-btn cashfree">

                <div class="gateway-icon">
                    <i class="bi bi-cash-stack"></i>
                </div>

                <div class="gateway-content">
                    <h4>Cashfree</h4>
                    <p>
                        Instant settlements & secure checkout.
                    </p>
                </div>

                <div class="gateway-arrow">
                    <i class="bi bi-arrow-right-circle-fill"></i>
                </div>

            </a>

            <!-- STRIPE -->
            <a href="{{ route('payumoney') }}"
               class="gateway-btn stripe">

                <div class="gateway-icon">
                    <i class="bi bi-stripe"></i>
                </div>

                <div class="gateway-content">
                    <h4>Stripe</h4>
                    <p>
                        Developer friendly online payment APIs.
                    </p>
                </div>

                <div class="gateway-arrow">
                    <i class="bi bi-arrow-right-circle-fill"></i>
                </div>

            </a>

            <!-- MOLLIE -->
            <a href="{{ route('payumoney') }}"
               class="gateway-btn mollie">

                <div class="gateway-icon">
                    <i class="bi bi-bank2"></i>
                </div>

                <div class="gateway-content">
                    <h4>Mollie</h4>
                    <p>
                        European online payments made simple.
                    </p>
                </div>

                <div class="gateway-arrow">
                    <i class="bi bi-arrow-right-circle-fill"></i>
                </div>

            </a>

            <!-- PAYTM -->
            <a href="{{ route('payumoney') }}"
               class="gateway-btn paytm">

                <div class="gateway-icon">
                    <i class="bi bi-phone-fill"></i>
                </div>

                <div class="gateway-content">
                    <h4>Paytm</h4>
                    <p>
                        Popular Indian wallet and gateway.
                    </p>
                </div>

                <div class="gateway-arrow">
                    <i class="bi bi-arrow-right-circle-fill"></i>
                </div>

            </a>

            <!-- PHONEPE -->
            <a href="{{ route('payumoney') }}"
               class="gateway-btn phonepe">

                <div class="gateway-icon">
                    <i class="bi bi-phone-vibrate-fill"></i>
                </div>

                <div class="gateway-content">
                    <h4>PhonePe</h4>
                    <p>
                        Seamless UPI and mobile payments.
                    </p>
                </div>

                <div class="gateway-arrow">
                    <i class="bi bi-arrow-right-circle-fill"></i>
                </div>

            </a>

        </div>

    </div>

    <!-- FOOTER -->
    <div class="footer-note">

        <i class="bi bi-lock-fill"></i>
        Your payments are protected with industry-grade encryption.

    </div>

</div>

</body>
</html>