<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paypal Payment</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main id="cart-main">
        <div class="site-title text-center">
            <h1 class="font-title">Cash Donation</h1>
        </div>

        <div class="container">
            <div class="grid">
                <div class="col-2">
                    <div class="subtotal text-center">
                        <h3>Donation Details</h3>

                        <ul>
                            <li class="flex justify-content-between">
                                <label for="price">Donation Amount : </label>
                                <span>$100</span>
                            </li>
                            <hr>
                            <li class="flex justify-content-between">
                                <label for="price">Amout Payable : </label>
                                <span class="text-red font-title">$100</span>
                            </li>
                        </ul>
                        <div id="paypal-payment-button">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://www.paypal.com/sdk/js?client-id=AVWTJOEOH1kiqRPwOKjAusLWTmziRlphrKP896L4BVkizkX4b5Q2R94B1vQYlCIE4nCsefI5ABg3Qpcs"></script>
    <script src="index.js"></script>
</body>
</html>
