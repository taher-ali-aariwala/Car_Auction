<?php
       //for stripe 
        require_once(APPPATH.'third_party/stripe-php-master/init.php');
        
        $publishableKey="pk_test_51KOgTBFRvymUViQgcr8TlmWjz7LOR6gvRkYwZqe67M9PUWjPYoN1OjWZPXHmDR2uA59ex7W3LyVZTTM68i9CnWxG00BfbqWOyt";
        
        $secretKey="sk_test_51KOgTBFRvymUViQgjoFZnxcMj8JSVg5iv5PwllYY2Dma6ZLYW7g1HObEoKATySmN5eRAm0Tknp48f0mRzQaEHhdc00qzQvrBgU";
        
        Stripe\Stripe::setApiKey($secretKey);
        
        
        //end

?>