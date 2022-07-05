<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lipa na mpesa</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="" rel="stylesheet" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" ">
    <script
      type=" text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <style>

    </style>
</head>

<body>
    <div class="navbar">
        <div class="holder1">
            <small>Make payment</small>
        </div>
        <div class="holder2 ">
            <a href="./records.php">
            <button class="btn btn-success"> <span> Transactions</span> </button>

            </a>
        </div>
    </div>
    <div class="host">
        <div class="subhost1 ">

            <h1 class="hero ">Make  <br> Payments</h1>



        </div>
        <div class="subhost2">
            <div class="card mt-5 px-3 py-4">
                <div class="d-flex flex-row justify-content-around">
                    <div class="mpesa"><span>Mpesa </span></div>
               
                </div>
                <div class="media mt-4 pl-2">
                    <img src="./images/1200px-M-PESA_LOGO-01.svg.png" class="mr-3" height="75" />
                    <div class="media-body">
                        <h6 class="mt-1">Enter Amount & Number</h6>
                    </div>
                </div>
                <div class="media mt-3 pl-2">
                    <!--bs5 input-->
                    <form class="row g-3" action="./index.php" method="POST">

                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Amount</label>
                            <input type="text" class="form-control" name="amount" placeholder="Enter Amount">
                        </div>
                        <div class="col-12">
                            <label for="inputAddress2" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number">
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-success" name="submit" value="submit">Pay</button>
                        </div>
                    </form>
                    <!--bs5 input-->
                </div>
            </div>


        </div>
    </div>
    </div>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    </script>
    <script type="text/javascript" src=""></script>
    <script type="text/javascript" src=""></script>
    <script type="text/Javascript"></script>
</body>

</html>





<?php

if(isset($_POST['submit'])){

    $amount = $_POST['amount']; //Amount to transact 
    $phone = $_POST['phone']; // Phone number paying
    
    $Account_no = 'COMRADE MARKET'; // Enter account number optional
    $url = 'https://tinypesa.com/api/v1/express/initialize';
    $data = array(
        'amount' => $amount,
        'msisdn' => $phone,
        'account_no'=>$Account_no
    );
    $headers = array(
        'Content-Type: application/x-www-form-urlencoded',
        'ApiKey: 0NGKwwa8WOa' // Replace with your api key
     );
    $info = http_build_query($data);
    
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $info);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $resp = curl_exec($curl);
    $msg_resp = json_decode($resp);
    
    
    if ($msg_resp ->success == 'true') {
        echo "WAIT FOR  STK POP UP🔥";
      } else {
        echo "Transaction Failed";
       
      }
}



?>
