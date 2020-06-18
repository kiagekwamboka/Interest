<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="interest.css">

    </head>
    <body>
        <header id="header" class="navbar-fixed-to">
            <img id="header-img" src="https://storage.googleapis.com/piggybankservice.appspot.com/statics/piggy-png_1_.png" width="10%" height="1.5%" alt="color">
            <nav id="nav-bar">
                <a class="nav-link" href="#about">About</a>
                <a class="nav-link" href="#stories">Stories</a>
                <a class="nav-link" href="#faq">FAQ</a>
                <a class="nav-link" href="#blog">Blog</a>
            </nav>
          </header>
        <div>
        <div class="hero-image">
                <h1>Calculate Interest rate</h1>
            </div>
            <section>
            <p>
                Calculate the amount you will acquire at the end of saving period and see if its worthwhile.
                The interest rates are subject to change. 
            </p>
        </section>
            <section>
            <div class="row" >
              <div class="col-md-2" id="story" ></div>
                <div class="col-md-4" >
                    <img src="https://images.pexels.com/photos/669622/pexels-photo-669622.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940 alt="bar graph" width="84%" height="70%">   
                </div>
                <div class="col-md-4"id="about">
                <form id="interest-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <label >Amount you want to save</label>
                <input type="number"class="form-control" min="1000" name="amount" required placeholder="Enter the amount you want save">
                <label >Duration</label>
                <input type="number" class="form-control" name="year" placeholder="Enter how long you want to save" required>
                <!--<label for="dropdown">Package</label>
                <select id="dropdown" class="form-control" name="package">
                    <option disabled selected value>Select package</option>
                    <option value="piggy-bank">Piggy-bank</option>
                    <option value="safe-lock">Safe-lock</option>
                    <option value="target">Target</option>
                    <option value="flex">Flex</option>
                    <option value="flex-dollar">Flex Dollar</option>
                </select>
                <label for="dropdown">Currency</label>
                <select id="dropdown" class="form-control" name="currency">
                    <option disabled selected value>Select currency</option>
                    <option value="usd">USD</option>
                    <option value="naira">NAIRA</option>
                </select>-->
                
                <button id="calculate">Calculate</button>
            
            </form>
        </div>
        </section>
        
            
            <?php 
            $host="localhost";
            $user="root";
            $password="";
            $db="";
            $amount = "";
            $year = "";
            error_reporting(0);
            session_start(); 
            
            $_SESSION['amount']  =$_POST['amount'];
            $_SESSION['year']  =$_POST['year'];
            //$_SESSION['currency']  =$_POST['currency'];
            //$_SESSION['package']  =$_POST['package'];
            
            function interest($investment,$year,$rate=15,$n=1){
                $accumulated=0;
                if ($year > 1){
                        $accumulated=interest($investment,$year-1,$rate,$n);
                        }
                $accumulated += $investment;
                $accumulated = $accumulated * pow(1 + $rate/(100 * $n),$n);
                return $accumulated;
                }
            $amount=0;
            $years=0;
            $rate=15;
            $n=1;
            
            if (isset($_POST['amount'])){$amount=$_POST['amount'];}
            if (isset($_POST['year'])){$years=$_POST['year'];}
            if (isset($_POST['rate'])){$rate=$_POST['rate'];}
            if (isset($_POST['n'])){$n=$_POST['n'];}
            
            if (isset($_POST['amount'])){
                echo "After ". $years. " years, the accumulated interest is ". interest($amount,$years,$rate,$n)."\n";
            }
            
            ?> 
            <footer>
                <section class="ft-main">
                  <div class="ft-main-item">
                    <P>Quick Links</P>
                    <ul>
                      <li><a href="#index.html">Autosave</a></li>
                      <li><a href="#piggy.html">PiggyLink</a></li>
                      <li><a href="#quicksave.html">QuickSave</a></li>
                      <li><a href="#safelock.html">SafeLock</a></li>
                      <li><a href="#salary.html">Salary Management</a></li>
                    </ul>
                  </div>
                  <div class="ft-main-item">
                    <p>COMPANY</p>
                    <ul>
                      <li><a href="#">FAQ</a></li>
                      <li><a href="#">About</a></li>
                      <li><a href="#">Privacy policy</a></li>
                      <li><a href="#">Terms of Use</a></li>
                    </ul>
                  </div>
                </section>
                <section class="ft-legal">
                  <ul class="ft-legal-list">
                    <li>&copy; 2020 Copyright PiggyTech.</li>
                  </ul>
                </section>
              </footer>
    </body>
</html>