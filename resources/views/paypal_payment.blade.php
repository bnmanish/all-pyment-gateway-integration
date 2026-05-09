<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure PayPal Payment</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:'Poppins',sans-serif;
            min-height:100vh;
            background:
                linear-gradient(135deg,#0f172a,#1e293b,#111827);
            display:flex;
            align-items:center;
            justify-content:center;
            overflow:hidden;
            position:relative;
        }

        /* Background Glow */
        body::before{
            content:'';
            position:absolute;
            width:500px;
            height:500px;
            background:#0070ba;
            border-radius:50%;
            filter:blur(150px);
            top:-120px;
            left:-120px;
            opacity:0.35;
        }

        body::after{
            content:'';
            position:absolute;
            width:450px;
            height:450px;
            background:#00c6ff;
            border-radius:50%;
            filter:blur(150px);
            bottom:-120px;
            right:-120px;
            opacity:0.25;
        }

        .payment-wrapper{
            width:100%;
            max-width:1100px;
            position:relative;
            z-index:2;
        }

        .payment-card{
            border:none;
            border-radius:30px;
            overflow:hidden;
            background:rgba(255,255,255,0.08);
            backdrop-filter:blur(20px);
            box-shadow:
                0 10px 40px rgba(0,0,0,0.4);
        }

        .left-side{
            padding:60px;
            color:#fff;
            background:
                linear-gradient(160deg,#0070ba,#003087);
            position:relative;
        }

        .paypal-logo{
            width:70px;
            margin-bottom:20px;
        }

        .left-side h1{
            font-size:42px;
            font-weight:700;
            line-height:1.2;
            margin-bottom:20px;
        }

        .left-side p{
            color:rgba(255,255,255,0.8);
            font-size:15px;
            line-height:1.8;
        }

        .secure-box{
            margin-top:40px;
            background:rgba(255,255,255,0.15);
            border-radius:18px;
            padding:18px;
            display:flex;
            align-items:center;
            gap:15px;
        }

        .secure-box i{
            font-size:32px;
            color:#fff;
        }

        .right-side{
            padding:50px;
            background:#ffffff;
        }

        .payment-title{
            font-size:30px;
            font-weight:700;
            margin-bottom:8px;
            color:#111827;
        }

        .payment-subtitle{
            color:#6b7280;
            margin-bottom:35px;
        }

        .form-label{
            font-weight:600;
            margin-bottom:8px;
            color:#111827;
        }

        .form-control{
            height:55px;
            border-radius:14px;
            border:1px solid #d1d5db;
            padding-left:18px;
            font-size:15px;
            transition:0.3s;
        }

        .form-control:focus{
            border-color:#0070ba;
            box-shadow:0 0 0 0.2rem rgba(0,112,186,0.15);
        }

        .input-icon{
            position:relative;
        }

        .input-icon i{
            position:absolute;
            top:18px;
            right:18px;
            color:#9ca3af;
        }

        .pay-btn{
            height:58px;
            border:none;
            border-radius:16px;
            background:linear-gradient(135deg,#0070ba,#003087);
            color:#fff;
            font-size:18px;
            font-weight:600;
            transition:0.3s;
            box-shadow:0 10px 20px rgba(0,112,186,0.25);
        }

        .pay-btn:hover{
            transform:translateY(-3px);
            box-shadow:0 15px 25px rgba(0,112,186,0.35);
        }

        .payment-icons{
            display:flex;
            gap:15px;
            margin-top:30px;
        }

        .payment-icons div{
            width:60px;
            height:40px;
            border-radius:10px;
            background:#f3f4f6;
            display:flex;
            align-items:center;
            justify-content:center;
            font-weight:600;
            color:#111827;
        }

        .amount-badge{
            background:#eff6ff;
            color:#0070ba;
            padding:10px 18px;
            border-radius:12px;
            font-weight:600;
            display:inline-block;
            margin-bottom:25px;
        }

        @media(max-width:991px){

            .left-side{
                display:none;
            }

            .right-side{
                padding:35px;
            }

        }

    </style>
</head>

<body>

<div class="container payment-wrapper">

    <div class="card payment-card">

        <div class="row g-0">

            <!-- LEFT SIDE -->
            <div class="col-lg-5">

                <div class="left-side h-100">

                    <img src="https://www.paypalobjects.com/webstatic/icon/pp258.png"
                         class="paypal-logo"
                         alt="PayPal">

                    <h1>
                        Fast,<br>
                        Secure & Trusted<br>
                        Payments
                    </h1>

                    <p>
                        Complete your transaction securely using PayPal.
                        Your payment information is encrypted and protected
                        with advanced security technology.
                    </p>

                    <div class="secure-box">

                        <i class="bi bi-shield-lock-fill"></i>

                        <div>
                            <h6 class="mb-1 fw-bold">100% Secure Payment</h6>
                            <small>Your transaction is fully encrypted</small>
                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT SIDE -->
            <div class="col-lg-7">

                <div class="right-side">

                    <div class="amount-badge">
                        <i class="bi bi-lightning-charge-fill"></i>
                        Instant Checkout
                    </div>

                    <h2 class="payment-title">
                        Complete Payment
                    </h2>

                    <p class="payment-subtitle">
                        Fill in your details and continue to PayPal checkout.
                    </p>

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('paypal.payment') }}" method="POST">

                        @csrf

                        <!-- NAME -->
                        <div class="mb-4">

                            <label class="form-label">
                                Full Name
                            </label>

                            <div class="input-icon">

                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       placeholder="Enter your full name"
                                       required>

                                <i class="bi bi-person-fill"></i>

                            </div>

                        </div>

                        <!-- EMAIL -->
                        <div class="mb-4">

                            <label class="form-label">
                                Email Address
                            </label>

                            <div class="input-icon">

                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       placeholder="Enter your email"
                                       required>

                                <i class="bi bi-envelope-fill"></i>

                            </div>

                        </div>

                        <!-- AMOUNT -->
                        <div class="mb-4">

                            <label class="form-label">
                                Payment Amount
                            </label>

                            <div class="input-icon">

                                <input type="number"
                                       step="0.01"
                                       name="amount"
                                       class="form-control"
                                       placeholder="Enter amount"
                                       required>

                                <i class="bi bi-currency-dollar"></i>

                            </div>

                        </div>

                        <!-- BUTTON -->
                        <button type="submit"
                                class="btn pay-btn w-100">

                            <i class="bi bi-paypal me-2"></i>
                            Continue to PayPal

                        </button>

                    </form>

                    <!-- PAYMENT METHODS -->
                    <div class="payment-icons">

                        <div>VISA</div>
                        <div>MC</div>
                        <div>AMEX</div>
                        <div>PP</div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>