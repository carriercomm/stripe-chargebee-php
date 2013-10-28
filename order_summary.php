    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.js"></script>

<script>
     $(document).ready(function() {
             $('#checkout_form').on('submit', function(e) {
                 var postData = $(this).serializeArray();
                 var formURL = $(this).attr("action");
                 $.ajax({
                     url: "order_summary.php",
                     type: "GET",
                     data: postData,
                     success: function(data, textStatus, jqXHR)
                     {
                         $('#order_summary').html(data);
                         //$('#checkout_form').html(data);    
                         
                     },
                     error: function(jqXHR, textStatus, errorThrown)
                     {
                         alert(textstatus);
                     }
                 });
                 e.preventDefault();
             });
         });
    </script>
<div class="row">
	<div class="col-sm-12">
      <div class="page-header"><h3>Order Summary</h3></div>
  	</div>
</div>
<div class="row">
	<div class="col-sm-12">

<ul class="text-right list-unstyled">
<?php
  require_once('./config.php');
  require_once('./util.php');

  $plan = $_GET['plan'];
  //$addons = params("addons", explode('&', $_SERVER['QUERY_STRING']))

  if ($_GET) {
    $error = NULL;
    try {
        $subParams = array("planId" => $plan);
        if(isset($_GET['coupon']))
        {  
          $subParams["coupon"] = $_GET['coupon'];
        } 
        $result = ChargeBee_Estimate::createSubscription(array("subscription" => $subParams));
        $estimate = $result->estimate();
        foreach($estimate->lineItems as $li)
        {
          ?>
           <li class="row">
                <span class="col-xs-8 hellip"><?php echo $li->description; ?></span>
                <span class="col-xs-4">$<?php echo number_format($li->amount/100, 2, '.', ''); ?></span>
            </li>
        <?php
        }
        if(isset($estimate->discounts)) 
        {
          foreach($estimate->discounts as $disc)
          {
        ?>
        <li class="row">
              <span class="col-xs-8 hellip"><?php echo $disc->description; ?></span>
              <span class="col-xs-4">$<?php echo number_format($disc->amount/100, 2, '.', ''); ?></span>
          </li>
        <?php
        }
        
        }
        ?>
        <hr>
        <li class="row">
            <h4>
            	<strong class="col-xs-8 hellip">Order Total</strong>
            	<strong class="col-xs-4">$ <?php echo number_format($estimate->amount/100, 2, '.', ''); ?></strong>
          	</h4>                            
        </li>
        <?php
    }
    catch (Exception $e) 
    {
      $error = $e->getMessage();
      echo $error;
    }
  }
?>
</ul>
<hr>
<?php
  if(!isset($_GET['coupon']))
  {
    ?>
    <div class="row">        	
      <div class="col-md-12">
        <p>Have coupon code?</p>
        <form id="checkout_form" action="order_summary.php" method="GET">
        <input type="hidden" name="plan" value="<?php echo $plan ?>">
        <div class="input-group">
          <input type="text" class="form-control" name="coupon">
          <span class="input-group-btn">
          <input class="btn btn-info" type="submit" value="Apply Coupon">
          </span>
        </div>
        </form>
      </div>
    </div>    
<?php
  }
?>
  </div>
</div>