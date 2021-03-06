<?php
  require_once('./topbar.php');
  require_once('./config.php');
  require_once('./redirect.php');
  if (!isset($_GET['plan'])){
      redirect('pricing.php');
  }
  //Retrive the selected plan from the link
  $plan = $_GET['plan'];
?>
<script>Stripe.setPublishableKey("<?php echo $stripeKey; ?>");</script>
 <div id="container" class="container">
   	<div class="row">
     	<div class="col-xs-12">
             <div class="alert alert-dismissable alert-danger" style="display:none;">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <b></b>
             </div>
         </div>
     </div>
<div class="row">		
  	<div class="col-sm-4 col-xs-12 pull-right" id="order_summary">
    	  <?php
    	  if(isset($plan)){
          include('order_summary.php');
        }
        ?>
        <br><br>
        <div class="row hidden-xs">
        	<div class="col-sm-12">
            	<br><br><br><br>                
            	<img src="assets/images/secure.png" alt="secure server"/>
                <br><br>
                <div class="using">                    
                    <img src="assets/images/guarantee.jpg">
                    <br>
                    <hr class="dashed">
                    <h5>Powered by</h5>                    
                    <img src="assets/images/powered.png">
                </div>
            </div>
     	</div>
      </div>
      <div class="clearfix visible-xs"></div>
      <div class="col-sm-7" id="checkout_info">   
      	<!-- Add the needed fields in the form-->                            
          <form action="charge.php" method="post" id="subscribe-form">
                  <div class="row">
                      <div class="col-sm-12">
                          <div class="page-header">
                              <h3>Tell us about yourself</h3>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="first_name">First Name</label>
                              <input type="text" class="form-control" name="first_name" required data-msg-required="cannot be blank">
                              <small for="first_name" class="text-danger"></small>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="last_name">Last Name</label>
                              <input type="text" class="form-control" name="last_name" required data-msg-required="cannot be blank">
                              <small for="last_name" class="text-danger"></small>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="email">Email</label>
                              <input id="email" type="text" class="form-control" name="email" data-rule-required="true" data-rule-email="true" data-msg-required="Please enter your email address" data-msg-email="Please enter a valid email address">
                              <small for="email" class="text-danger"></small>
                          </div>
                      </div> 
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="phone">Phone</label>
                              <input id="phone" type="text" maxlength="10" class="form-control" name="phone" required data-msg-required="cannot be blank">
                              <small for="phone" class="text-danger"></small>
                          </div>
                      </div>                   
                  </div>
                  <div class="row">
                  	<div class="col-sm-12">
                      	<div class="form-group">
                          	<label for="">Choose the genre you would like to receive Comics for</label>
                              <div class="form-control multicheck">
                                  <label class="checkbox-inline col-sm-3 col-xs-12">
                                    	<input type="checkbox" value="option1"> Action
                                  </label>                                  
                                  <label class="checkbox-inline col-sm-3 col-xs-12">
                                    	<input type="checkbox" value="option1"> Adventure
                                  </label>
                                  <label class="checkbox-inline col-sm-3 col-xs-12">
                                    	<input type="checkbox" value="option1"> Childern's
                                  </label>
                                  <label class="checkbox-inline col-sm-3 col-xs-12">
                                    	<input type="checkbox" value="option1"> Comedy
                                  </label>
                                  <label class="checkbox-inline col-sm-3 col-xs-12">
                                    	<input type="checkbox" value="option1"> Drama
                                  </label>
                                  <label class="checkbox-inline col-sm-3 col-xs-12">
                                    	<input type="checkbox" value="option1"> Military
                                  </label>
                                  <label class="checkbox-inline col-sm-3 col-xs-12">
                                    	<input type="checkbox" value="option1"> Mystery
                                  </label>
                                  <label class="checkbox-inline col-sm-3 col-xs-12">
                                    	<input type="checkbox" value="option1"> Fantasy
                                  </label>                                 
                              </div>                                
                      	</div>
                      </div>
                  </div>      
                  <div class="row">
                      <div class="col-sm-12">
                          <div class="page-header">
                              <h3>Where would you like to deliver</h3>
                          </div>
                      </div>
                  </div>             
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="addr">Address</label>
                              <input type="text" class="form-control" name="addr" required data-msg-required="cannot be blank">
                              <small for="addr" class="text-danger"></small>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="extended_addr">Address2</label>
                              <input type="text" class="form-control" name="extended_addr">
                              <small for="extended_addr" class="text-danger"></small>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="city">City</label>
                              <input type="text" class="form-control" name="city" required data-msg-required="cannot be blank">
                              <small for="city" class="text-danger"></small>
                          </div>
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="state">State</label>
                              <input type="text" class="form-control" name="state" required data-msg-required="cannot be blank">
                              <small for="state" class="text-danger"></small>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="zip_code">Zip Code</label>
                              <input id="zip_code" type="text" class="form-control" name="zip_code" required data-msg-required="cannot be blank">
                              <small for="zip_code" class="text-danger"></small>
                          </div>
                      </div>                                                
                  </div>
				<div class="row">
                    <div class="col-sm-12">
                        <div class="page-header">
                        	<h3>Payment Information</h3>
                        </div>
                    </div>
                </div>                  
                <div class="row">                 	  
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="card_no">Credit Card Number</label>
                            <div class="row">
                            	<div class="col-sm-6">

                            	<input type="text" class="card-number form-control" id="card_no" required data-msg-required="cannot be blank"> 
                           	</div>
                            <div class="col-sm-6">                      	
                              <span class="cb-cards hidden-xs">                                        
                                  <span class="visa">  </span>                                        
                                  <span class="mastercard">  </span>                                        
                                  <span class="american_express">  </span>
                                  <span class="discover">  </span>
                              </span> 
                       	</div>
                 		</div>
                            <small for="card_no" class="text-danger"></small>
                        </div>
                    </div>                                                             
                </div>
                  <div class="row">                
                      <div class="col-sm-6">                                	
                          <div class="form-group">
                              <label for="expiry_month">Card Expiry</label>
                              <div class="row">
                                  <div class="col-xs-6">

                                      <select class="card-expiry-month form-control" id="expiry_month" required data-msg-required="empty">
                                          <option selected>01</option>
                                          <option>02</option>
                                          <option>03</option>
                                          <option>04</option>
                                          <option>05</option>
                                          <option>06</option>
                                          <option>07</option>
                                          <option>08</option>
                                          <option>09</option>
                                          <option>10</option>
                                          <option>11</option>
                                          <option>12</option>
                                      </select>
                                  </div>
                                  <div class="col-xs-6">

                                      <select class="card-expiry-year form-control" id="expiry_year" required data-msg-required="empty">
                                          <option>2013</option>
                                          <option>2014</option>
                                          <option>2015</option>
                                          <option>2016</option>
                                          <option>2017</option>
                                          <option>2018</option>
                                          <option>2019</option>
                                          <option selected="">2020</option>
                                          <option>2021</option>
                                          <option>2022</option>
                                          <option>2023</option>
                                      </select>
                                  </div>
                              </div> 
                              <small for="expiry_month" class="text-danger"></small>
                              <small for="expiry_year" class="text-danger"></small>
                          </div>                                       
                      </div>
                      <div class="col-sm-6">
                          <div class="form-group">
                              <label for="ccv">CCV</label>
                              <div class="row">                                    	
                                  <div class="col-xs-6">                                            
                                      <input type="text" class="card-cvc form-control" id="ccv" placeholder="CCV" required data-msg-required="empty">
                                  </div>
                                  <div class="col-xs-6">                                            	
                                      <h6 class="cb-cvv"><small>(Last 3-4 digits)</small></h6>
                                  </div>
                              </div>
                              <small for="ccv" class="text-danger"></small>
                          </div>
                      </div>                                      
                  </div>                      
                  <div class="row">
                      <div class="col-sm-12">
                      	<hr>                            
                          <p>By clicking Subscribe, you agree to our privacy policy and terms of service.</p>
                          <p><small class="text-danger" style="display:none;">There were errors while submitting</small></p>
                          <p><input type="submit" class="btn btn-primary btn-lg" value="Subscribe">&nbsp;&nbsp;&nbsp;&nbsp;<span class="subscribe_process process" style="display:none;">Processing&hellip;</span></p><br><br>                          
                      </div>
                  </div>     
                  <input type="hidden" name="plan" value="<?php echo $_GET['plan'] ?>">
              </form>
      </div>
  </div>
</div>
<?php
  require_once('./footer.php');
?>
