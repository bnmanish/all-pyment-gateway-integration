<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Razorpay Checkout</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>

        body{
            margin:0;
            min-height:100vh;
            font-family:'Poppins',sans-serif;
            background:
                linear-gradient(135deg,#0f172a,#1e3a8a,#2563eb);
            display:flex;
            align-items:center;
            justify-content:center;
            overflow:hidden;
            position:relative;
        }

        body::before{
            content:'';
            position:absolute;
            width:450px;
            height:450px;
            background:#60a5fa;
            border-radius:50%;
            filter:blur(160px);
            top:-100px;
            left:-100px;
            opacity:0.25;
        }

        body::after{
            content:'';
            position:absolute;
            width:400px;
            height:400px;
            background:#38bdf8;
            border-radius:50%;
            filter:blur(150px);
            bottom:-120px;
            right:-120px;
            opacity:0.25;
        }

        .payment-card{
            width:100%;
            max-width:1100px;
            border:none;
            border-radius:30px;
            overflow:hidden;
            background:rgba(255,255,255,0.08);
            backdrop-filter:blur(18px);
            box-shadow:
                0 15px 45px rgba(0,0,0,0.35);
            position:relative;
            z-index:2;
        }

        .left-side{
            background:
                linear-gradient(180deg,#2563eb,#1d4ed8);
            padding:60px;
            color:#fff;
            position:relative;
        }

        .left-side img{
            width:190px;
            margin-bottom:40px;
        }

        .left-side h1{
            font-size:46px;
            font-weight:800;
            line-height:1.2;
            margin-bottom:20px;
        }

        .left-side p{
            color:rgba(255,255,255,0.8);
            line-height:1.9;
        }

        .feature-box{
            margin-top:40px;
        }

        .feature{
            display:flex;
            align-items:center;
            gap:15px;
            margin-bottom:22px;
        }

        .feature i{
            width:55px;
            height:55px;
            border-radius:16px;
            background:rgba(255,255,255,0.15);
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:24px;
        }

        .right-side{
            background:#fff;
            padding:55px;
        }

        .badge-secure{
            display:inline-flex;
            align-items:center;
            gap:10px;
            padding:12px 18px;
            border-radius:14px;
            background:#eff6ff;
            color:#2563eb;
            font-weight:600;
            margin-bottom:28px;
        }

        .title{
            font-size:36px;
            font-weight:800;
            color:#111827;
            margin-bottom:10px;
        }

        .subtitle{
            color:#6b7280;
            margin-bottom:35px;
        }

        .form-label{
            font-weight:600;
            margin-bottom:8px;
        }

        .form-control{
            height:58px;
            border-radius:16px;
            border:1px solid #d1d5db;
            padding-left:18px;
        }

        .form-control:focus{
            border-color:#2563eb;
            box-shadow:0 0 0 0.2rem rgba(37,99,235,0.18);
        }

        .input-box{
            position:relative;
        }

        .input-box i{
            position:absolute;
            right:18px;
            top:18px;
            color:#9ca3af;
        }

        .pay-btn{
            height:62px;
            border:none;
            border-radius:18px;
            background:
                linear-gradient(135deg,#2563eb,#1d4ed8);
            color:#fff;
            font-size:18px;
            font-weight:700;
            transition:0.3s;
            box-shadow:
                0 15px 25px rgba(37,99,235,0.28);
        }

        .pay-btn:hover{
            transform:translateY(-2px);
        }

        .payment-methods{
            display:flex;
            gap:12px;
            margin-top:28px;
        }

        .payment-methods div{
            width:70px;
            height:42px;
            border-radius:12px;
            background:#f3f4f6;
            display:flex;
            align-items:center;
            justify-content:center;
            font-weight:700;
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

<div class="container">

    <div class="card payment-card">

        <div class="row g-0">

            <!-- LEFT -->
            <div class="col-lg-5">

                <div class="left-side h-100">

                    <img src="https://razorpay.com/assets/razorpay-logo.svg"
                         alt="Razorpay">

                    <h1>
                        Fast & Secure<br>
                        Razorpay Payments
                    </h1>

                    <p>
                        Accept UPI, cards, wallets and net banking
                        securely using Razorpay payment gateway.
                    </p>

                    <div class="feature-box">

                        <div class="feature">

                            <i class="bi bi-lightning-charge-fill"></i>

                            <div>
                                <h6 class="mb-1">Instant Payments</h6>
                                <small>Quick online checkout</small>
                            </div>

                        </div>

                        <div class="feature">

                            <i class="bi bi-shield-lock-fill"></i>

                            <div>
                                <h6 class="mb-1">100% Secure</h6>
                                <small>Encrypted transactions</small>
                            </div>

                        </div>

                        <div class="feature">

                            <i class="bi bi-phone-fill"></i>

                            <div>
                                <h6 class="mb-1">UPI & Wallets</h6>
                                <small>All payment modes supported</small>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT -->
            <div class="col-lg-7">

                <div class="right-side">

                    <div class="badge-secure">
                        <i class="bi bi-shield-check"></i>
                        Razorpay Secure Checkout
                    </div>

                    <h2 class="title">
                        Complete Payment
                    </h2>

                    <p class="subtitle">
                        Enter your payment details below.
                    </p>

                    <form action="{{ route('razorpay.payment') }}"
                          method="POST">

                        @csrf

                        <!-- NAME -->
                        <div class="mb-4">

                            <label class="form-label">
                                Full Name
                            </label>

                            <div class="input-box">

                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       placeholder="Enter full name"
                                       required>

                                <i class="bi bi-person-fill"></i>

                            </div>

                        </div>

                        <!-- EMAIL -->
                        <div class="mb-4">

                            <label class="form-label">
                                Email Address
                            </label>

                            <div class="input-box">

                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       placeholder="Enter email"
                                       required>

                                <i class="bi bi-envelope-fill"></i>

                            </div>

                        </div>

                        <!-- PHONE -->
                        <div class="mb-4">

                            <label class="form-label">
                                Phone Number
                            </label>

                            <div class="input-box">

                                <input type="text"
                                       name="phone"
                                       class="form-control"
                                       placeholder="Enter phone number"
                                       required>

                                <i class="bi bi-phone-fill"></i>

                            </div>

                        </div>

                        <!-- AMOUNT -->
                        <div class="mb-4">

                            <label class="form-label">
                                Amount
                            </label>

                            <div class="input-box">

                                <input type="number"
                                       step="0.01"
                                       name="amount"
                                       class="form-control"
                                       placeholder="Enter amount"
                                       required>

                                <i class="bi bi-currency-rupee"></i>

                            </div>

                        </div>

                        <!-- BUTTON -->
                        <button type="submit"
                                class="btn pay-btn w-100">

                            <i class="bi bi-lightning-charge-fill me-2"></i>
                            Proceed to Razorpay

                        </button>

                    </form>

                    <div class="payment-methods">

                        <div>UPI</div>
                        <div>VISA</div>
                        <div>MC</div>
                        <div>NET</div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>