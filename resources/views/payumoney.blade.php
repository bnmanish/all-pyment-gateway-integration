<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PayUMoney Payment</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        body{
            margin:0;
            min-height:100vh;
            font-family:'Poppins',sans-serif;
            background:
                linear-gradient(135deg,#051937,#004d7a,#008793,#00bf72);
            display:flex;
            align-items:center;
            justify-content:center;
            overflow:hidden;
        }

        .payment-card{
            width:100%;
            max-width:1100px;
            border:none;
            overflow:hidden;
            border-radius:28px;
            background:rgba(255,255,255,0.08);
            backdrop-filter:blur(16px);
            box-shadow:0 15px 50px rgba(0,0,0,0.35);
        }

        .left-side{
            background:
                linear-gradient(180deg,#00bf72,#008793);
            color:#fff;
            padding:60px;
            position:relative;
        }

        .payu-logo{
            width:170px;
            margin-bottom:35px;
        }

        .left-side h1{
            font-size:42px;
            font-weight:700;
            line-height:1.3;
            margin-bottom:20px;
        }

        .left-side p{
            color:rgba(255,255,255,0.85);
            line-height:1.9;
        }

        .feature-box{
            margin-top:40px;
        }

        .feature-item{
            display:flex;
            align-items:center;
            margin-bottom:20px;
            gap:15px;
        }

        .feature-item i{
            width:50px;
            height:50px;
            border-radius:14px;
            background:rgba(255,255,255,0.18);
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:22px;
        }

        .right-side{
            background:#fff;
            padding:55px;
        }

        .title{
            font-size:34px;
            font-weight:700;
            margin-bottom:10px;
            color:#111827;
        }

        .subtitle{
            color:#6b7280;
            margin-bottom:35px;
        }

        .form-label{
            font-weight:600;
            margin-bottom:8px;
            color:#111827;
        }

        .form-control{
            height:56px;
            border-radius:14px;
            border:1px solid #d1d5db;
            padding-left:18px;
            font-size:15px;
        }

        .form-control:focus{
            border-color:#00bf72;
            box-shadow:0 0 0 0.2rem rgba(0,191,114,0.18);
        }

        .input-group-custom{
            position:relative;
        }

        .input-group-custom i{
            position:absolute;
            right:18px;
            top:18px;
            color:#9ca3af;
        }

        .pay-btn{
            height:60px;
            border:none;
            border-radius:16px;
            background:
                linear-gradient(135deg,#00bf72,#008793);
            color:#fff;
            font-size:18px;
            font-weight:600;
            transition:0.3s;
            box-shadow:0 12px 22px rgba(0,191,114,0.28);
        }

        .pay-btn:hover{
            transform:translateY(-2px);
        }

        .secure-badge{
            display:inline-flex;
            align-items:center;
            gap:10px;
            background:#ecfdf5;
            color:#059669;
            padding:12px 18px;
            border-radius:12px;
            margin-bottom:28px;
            font-weight:600;
        }

        .cards{
            display:flex;
            gap:12px;
            margin-top:28px;
        }

        .cards div{
            width:65px;
            height:42px;
            background:#f3f4f6;
            border-radius:10px;
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

            <!-- LEFT SIDE -->
            <div class="col-lg-5">

                <div class="left-side h-100">

                    <img src="https://devguide.payu.in/website-assets/uploads/2021/12/new-payu-logo.svg"
                         class="payu-logo"
                         alt="PayU">

                    <h1>
                        Smart & Secure<br>
                        Online Payments
                    </h1>

                    <p>
                        Complete your transaction safely with PayUMoney.
                        Fast checkout, secure gateway and trusted payment protection.
                    </p>

                    <div class="feature-box">

                        <div class="feature-item">

                            <i class="bi bi-shield-check"></i>

                            <div>
                                <h6 class="mb-1">100% Secure</h6>
                                <small>SSL encrypted payment</small>
                            </div>

                        </div>

                        <div class="feature-item">

                            <i class="bi bi-lightning-charge"></i>

                            <div>
                                <h6 class="mb-1">Instant Processing</h6>
                                <small>Fast online transactions</small>
                            </div>

                        </div>

                        <div class="feature-item">

                            <i class="bi bi-credit-card"></i>

                            <div>
                                <h6 class="mb-1">Multiple Methods</h6>
                                <small>Cards, UPI & Net Banking</small>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT SIDE -->
            <div class="col-lg-7">

                <div class="right-side">

                    <div class="secure-badge">
                        <i class="bi bi-lock-fill"></i>
                        Trusted PayUMoney Checkout
                    </div>

                    <h2 class="title">
                        Complete Payment
                    </h2>

                    <p class="subtitle">
                        Fill your payment details below.
                    </p>

                    <form action="{{ route('payumoney.payment') }}"
                          method="POST">

                        @csrf

                        <!-- NAME -->
                        <div class="mb-4">

                            <label class="form-label">
                                Full Name
                            </label>

                            <div class="input-group-custom">

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

                            <div class="input-group-custom">

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

                            <div class="input-group-custom">

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

                            <div class="input-group-custom">

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

                            <i class="bi bi-wallet2 me-2"></i>
                            Proceed to PayUMoney

                        </button>

                    </form>

                    <div class="cards">

                        <div>VISA</div>
                        <div>UPI</div>
                        <div>MC</div>
                        <div>AMEX</div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>