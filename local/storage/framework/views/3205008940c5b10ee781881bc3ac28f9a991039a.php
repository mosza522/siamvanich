<!--
    Author: W3layouts
    Author URL: http://w3layouts.com
    License: Creative Commons Attribution 3.0 Unported
    License URL: http://creativecommons.org/licenses/by/3.0/
    -->

    <!DOCTYPE html>
    <html>
    <head>
    <title>Backoffice |LOGIN</title>
    <!-- For-Mobile-Apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- <meta name="keywords" content="Lucid Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" /> -->
    <!-- <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script> -->
    <!-- //For-Mobile-Apps -->
    <!-- Style --> <?php echo e(Html::style('local/resources/views/backoffice/login/css/style.css')); ?>

    <?php echo e(Html::script('https://code.jquery.com/jquery-1.12.4.js')); ?>

    <?php echo e(Html::script('https://code.jquery.com/ui/1.12.1/jquery-ui.js')); ?>

    <?php echo e(Html::script('https://unpkg.com/sweetalert/dist/sweetalert.min.js')); ?>

    
    </head>
    <body>
      <style media="screen">
      .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
      }
      .alert h4 {
        margin-top: 0;
        color: inherit;
      }
      .alert .alert-link {
        font-weight: bold;
      }
      .alert > p,
      .alert > ul {
        margin-bottom: 0;
      }
      .alert > p + p {
        margin-top: 5px;
      }
      .alert-dismissable,
      .alert-dismissible {
        padding-right: 35px;
      }
      .alert-dismissable .close,
      .alert-dismissible .close {
        position: relative;
        top: -2px;
        right: -21px;
        color: inherit;
      }
      .alert-danger {
        color: #a94442;
        background-color: #f2dede;
        border-color: #ebccd1;
        font-family: Oswald-Light;
        font-size: 18px;
      }
      .alert-danger hr {
        border-top-color: #e4b9c0;
      }
      .alert-danger .alert-link {
        color: #843534;
      }
      </style>
    <div class="container">
    <h1>SIAMWANICH LOGIN FORM</h1>
    	<div class="signin">
        <?php if(session('wrong')): ?>
          <script>
              swal("Something Wrong!!", "<?php echo e(Session::get('wrong')); ?>", "error");
          </script>
        <?php 
          session()->forget('wrong');
         ?>
            <?php endif; ?>
        <?php echo e(Form::open(['url' => 'login_backoffice'])); ?>

                  <input name="user" type="text" class="user" value="Admin" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Admin';}" />
                  <input name="pass" type="password" class="pass" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" />
                  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                  <label>
                  <!-- <input type="checkbox" value="Remember-Me" /> Remember Me? -->
                </label>
                    <input type="submit" value="LOGIN" />
            <?php echo e(Form::close()); ?>

    	</div>
    </div>
    <div class="footer">
         <p> Design by <a href="http://w3layouts.com">W3layouts</a></p>
    </div>
    </body>
    </html>
