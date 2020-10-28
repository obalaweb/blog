 <!--  newsletter Section -->
<div class="block-7 rounded card shadow mx-3 mt-3">
              <form id="offer_form" onsubmit="return false">
                <label for="email_subscribe" class="ml-3 mt-3 lead">Subscribe</label>
                <div class="form-group mail">
                  <input style="width:300px;" type="email" name="email" class="input form-control py-4" id="email email_subscribe" placeholder="Email">
                  <input style="position:relative; margin-right: 20px; top: -47px; padding: 10px;" type="submit" class="px-3 newsletter-btn btn btn-sm btn-primary float-right" value="Send" onclick="obala()" name="signup_button">
                </div>
              </form>
              <div class="" id="offer_msg">
                                <!--Alert from signup form-->
                            </div>
             <div class="social">
               <ul class="ml-5" style="list-style:none; display:flex; font-size:16px">
                 <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                 <li class="ml-3"><a href="#"><i class="fa fa-twitter"></i></a></li>
                 <li class="ml-3"><a href="#"><i class="fa fa-instagram"></i></a></li>
                 <li class="ml-3"><a href="#"><i class="fa fa-github"></i></a></li>
                
                 <li class="ml-3"><a href="#"><i class="fa fa-rss"></i></a></li>
               </ul>
             </div>
             </div>
             <script>
               function obala() {
                 alert($("email").val());
               }
             </script>