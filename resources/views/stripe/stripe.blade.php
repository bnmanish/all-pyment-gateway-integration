<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Stripe Checkout</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>

        body{
            margin:0;
            min-height:100vh;
            background:
                linear-gradient(135deg,#1a1f71,#3b82f6,#6366f1);
            display:flex;
            align-items:center;
            justify-content:center;
            overflow:hidden;
            font-family:'Poppins',sans-serif;
            position:relative;
        }

        body::before{
            content:'';
            position:absolute;
            width:450px;
            height:450px;
            border-radius:50%;
            background:#8b5cf6;
            filter:blur(150px);
            top:-120px;
            left:-120px;
            opacity:0.22;
        }

        body::after{
            content:'';
            position:absolute;
            width:380px;
            height:380px;
            border-radius:50%;
            background:#06b6d4;
            filter:blur(150px);
            bottom:-100px;
            right:-100px;
            opacity:0.22;
        }

        .payment-card{
            width:100%;
            max-width:1120px;
            border:none;
            border-radius:32px;
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
                linear-gradient(180deg,#635bff,#1a1f71);
            padding:60px;
            color:#fff;
        }

        .left-side img{
            width:180px;
            margin-bottom:40px;
        }

        .left-side h1{
            font-size:44px;
            font-weight:800;
            line-height:1.25;
            margin-bottom:20px;
        }

        .left-side p{
            color:rgba(255,255,255,0.82);
            line-height:1.9;
        }

        .feature-list{
            margin-top:40px;
        }

        .feature-item{
            display:flex;
            gap:15px;
            margin-bottom:22px;
        }

        .feature-item i{
            width:58px;
            height:58px;
            border-radius:18px;
            background:rgba(255,255,255,0.12);
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:24px;
        }

        .right-side{
            background:#fff;
            padding:55px;
        }

        .secure-badge{
            display:inline-flex;
            align-items:center;
            gap:10px;
            background:#eef2ff;
            color:#4f46e5;
            padding:12px 18px;
            border-radius:14px;
            font-weight:600;
            margin-bottom:28px;
        }

        .title{
            font-size:36px;
            font-weight:800;
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
        }

        .form-control{
            height:58px;
            border-radius:16px;
            border:1px solid #d1d5db;
            padding-left:18px;
        }

        .form-control:focus{
            border-color:#635bff;
            box-shadow:0 0 0 0.2rem rgba(99,91,255,0.18);
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
                linear-gradient(135deg,#635bff,#4f46e5);
            color:#fff;
            font-size:18px;
            font-weight:700;
            transition:0.3s;
            box-shadow:
                0 15px 25px rgba(99,91,255,0.28);
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
            width:72px;
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
    <script src="https://code.jquery.com/jquery-4.0.0.min.js" integrity="sha256-OaVG6prZf4v69dPg6PhVattBXkcOWQB62pdZ3ORyrao=" crossorigin="anonymous"></script>
    <script src="https://js.stripe.com/v3/"></script>

</head>

<body>

<div class="container">

    <div class="card payment-card">

        <div class="row g-0">

            <!-- LEFT -->
            <div class="col-lg-5">

                <div class="left-side h-100">

                    <img style="width: 140px" src="{{url('images/stripe.gif')}}" alt="Stripe">

                    <h1>
                        Modern & Secure<br>
                        Stripe Payments
                    </h1>

                    <p>
                        Accept online payments globally using Stripe.
                        Secure, fast and developer-friendly checkout.
                    </p>

                    <div class="feature-list">

                        <div class="feature-item">

                            <i class="bi bi-lightning-charge-fill"></i>

                            <div>
                                <h6 class="mb-1">Instant Payments</h6>
                                <small>Quick online transactions</small>
                            </div>

                        </div>

                        <div class="feature-item">

                            <i class="bi bi-shield-lock-fill"></i>

                            <div>
                                <h6 class="mb-1">PCI Secure</h6>
                                <small>Encrypted card processing</small>
                            </div>

                        </div>

                        <div class="feature-item">

                            <i class="bi bi-globe2"></i>

                            <div>
                                <h6 class="mb-1">Global Payments</h6>
                                <small>Worldwide payment support</small>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT -->
            <div class="col-lg-7">

                <div class="right-side">

                    <div class="secure-badge">

                        <i class="bi bi-shield-check"></i>

                        Stripe Secure Checkout

                    </div>

                    <h2 class="title">
                        Complete Payment
                    </h2>

                    <p class="subtitle">
                        Enter your details to continue.
                    </p>

                    <form id="stripe-checkout-form" action="{{ route('stripe.payment') }}"
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
                        <button id="stripe-checkout-btn" type="button"
                                class="btn pay-btn w-100">

                            <i class="bi bi-credit-card-fill me-2"></i>

                            Proceed to Stripe

                        </button>

                    </form>

                    <div class="payment-methods">

                        <div>VISA</div>
                        <div>MC</div>
                        <div>AMEX</div>
                        <div>UPI</div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
<script>

const stripe = Stripe("{{env('STRIPE_PUBLISHABLE_KEY')}}");

$("#stripe-checkout-btn").click(function () {

    $("#stripe-checkout-btn").html("Processing...");

    $.ajax({

        url: $("#stripe-checkout-form").attr("action"),

        type: "POST",

        data: $("#stripe-checkout-form").serialize(),

        success: function (response) {

            if(response.status === true){

                stripe.redirectToCheckout({
                    sessionId: response.session_id
                });

            }else{

                alert(response.message);

                $("#stripe-checkout-btn").html(`
                    <i class="bi bi-credit-card-fill me-2"></i>
                    Proceed to Stripe
                `);

            }

        },

        error:function(){

            alert("Something went wrong");

            $("#stripe-checkout-btn").html(`
                <i class="bi bi-credit-card-fill me-2"></i>
                Proceed to Stripe
            `);

        }

    });

});

</script>
</body>
</html>