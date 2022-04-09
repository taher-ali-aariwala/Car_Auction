<?php 

include(APPPATH.'views/dealer/stripe_info.php'); 

$order_id = $get_order->order_id;
$price    = $get_order->price;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ASTEMOTOR Payment | Design By Developer Bazaar Technology</title>
    <!-- site favicon -->

    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png">

    <!-- main style css link -->

    <link rel="stylesheet" href="assets/css/style.css">



    <!-- responsive css link -->



    <link rel="stylesheet" href="assets/css/responsive.css">



    <!-- Twitter Meta Property Started -->



    <meta property="twitter:image" content="assets/images/favicon.png" />



    <meta property="twitter:image:width" content="350" />



    <meta property="twitter:image:height" content="597" />



    <meta name="twitter:domain" content="Kwiki Sweepstakes" />



</head>
<body>
<section class="pay-section bg-light">
<div class="container">
<div class="row justify-content-center">
<div class="col-4">
<div class="shadow pb-3">
<img src="<?php echo base_url('assets/payment_image.jpg');?>">
<form action="<?php echo base_url('Dealer/charge_deduct');?>" method="post">

<script src="https://checkout.stripe.com/checkout.js" class="stripe-button"

data-key="<?php echo $publishableKey;?>"

data-amount= "<?php echo $price."00"; ?>"

data-name="ASTEMOTOR"

data-description="ASTEMOTOR"

data-image="https://pragya.dbtechserver.online/astemotori//assets/images/brand/logo.png"

data-currency="eur"

data-email = "xyz@gmail.com">

</script>

<input type="hidden" name="order_id" value="<?php echo $order_id; ?>">

</form>
</div>
</div>
</div>
</section>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
$(document).ready(function() {
function disableBack() {
window.history.forward()
}
window.onload = disableBack();
window.onpageshow = function(e) {
if (e.persisted)
disableBack();
}
});
</script>

