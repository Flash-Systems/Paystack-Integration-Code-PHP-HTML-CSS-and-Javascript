<?php
$amount = 1500;
//sanitize form input from users
$sanitizer = filter_var_array($_POST, FILTER_SANITIZE_STRING);

//Collect user's input from the form into regular variable
$first_name = $sanitizer['first_name'];
$last_name = $sanitizer['last_name'];
$email = $sanitizer['email'];
$phone = $sanitizer['phone'];
$product_name = "PHP Saavy E-book";

//make sure all fields are filled in
if(empty($first_name) OR empty($last_name) OR empty($phone) OR empty($email)){
    header("Location: index.php?error");
}else{
    session_start();
    $_SESSION['first_name'] = $first_name;
    $_SESSION['last_name'] = $last_name;
    $_SESSION['phone'] = $phone;
    $_SESSION['email'] = $email;
    $_SESSION['product_name'] = $product_name;
    $_SESSION['amount'] = $amount;
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Paystack payment Integration</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <div class ="container">
            <h2>Hi, <?php echo $email ?> </h2>
            <form>
                <script src="https://js.paystack.co/v1/inline.js"></script>
                <button type="button" onclick="payWithPaystack()"> Pay </button>
            </form>
            <script>
                function payWithPaystack(){
                    const api = "pk_test_63544a5a4a4a5a5a55c5c515f07ec"; //use your public key here
                    var handler = PaystackPop.setup({
                        key: api,
                        email: '<?php echo $email; ?>',
                        amount: <?php echo $amount * 100;?>,
                        ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                        firstname: "<?php echo $first_name; ?>",
                        lastname: "<?php echo $last_name; ?>",
                        metadata: {
                            custom_fields: [
                            {
                                display_name: "<?php echo $first_name; ?>",
                                variable_name: "<?php echo $last_name; ?>",
                                value: "<?php echo $phone; ?>",
                            }
                            ]
                        },
                        callback: function(response){
                            const referenced = response.reference;
                            window.location.href='success.php?successfullypaid='+referenced;
                        },
                        onClose: function(){
                            alert('window closed');
                        }
                    });
                    handler.openIframe();
                    }
                </script>
        </div>
    </body>
</html>