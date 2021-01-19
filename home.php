


<!DOCTYPE html>
<html>
<head>
	<title>Banking-Home</title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="home.css">
	<script type="text/javascript">
		$(function() {
    
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
  
});
	</script>
</head>
<body >
	<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container" >
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#page-top">MONEY TRANSFER SYSTEM</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li class="page-scroll">
                    <a href="#customers">CUSTOMER DETAILS</a>
                </li>
                <li class="page-scroll">
                    <a href="#transactions">TRANSACTIONS</a>
                </li>
                
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<header id="page-top" >
<div class="intro-text">
                    <span class="name">MONEY TRANSFER SYSTEM</span>
                    <hr class="star-light">
                    <p class="skills">DESIGNED AND MAINTAINED BY PRAMOD BAVISKAR</p>
                    <p class="skills" style="font-style: italic;">Scroll to see our functionalities</p>
</div>
    <img class="img-responsive" src="b.png" alt="" style="height: 750px;">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                
                
            </div>
        </div>
    </div>
</header>
<div class="content-wrapper" >
    <section class="primary" id="customers" >
        <div class="container" >
            <div class="row" >
                <div class="col-lg-12 text-center" >
                    <h2 style="font-style: italic;">OUR CUSTOMERS</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="btn-toolbar">
    
</div>
<a href="customers.php" style="text-decoration: none;"><button class="btn btn-lg btn-default " style="background-color: #18bc9c;  margin:0 auto; display:block; ">View All Customers</button></a>

        </div>
    </section>
    <section class="success" id="transactions">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 style="font-style: italic;">ALL TRANSACTIONS</h2>
                    <hr class="star-light">
                </div>
            </div>

            <a href="history.php" style="text-decoration: none;"><button class="btn btn-lg btn-default " style="background-color: #fff;  margin:0 auto; display:block; ">View All Transactions</button></a>
</div>
            


    </section>
 
    <footer class="container" style="min-height:100px; background-color:#fff;color: #0fd6ff;text-align:center;padding-top:50px;">
        MADE BY PRAMOD BAVISKAR © 2021 
    </footer>
</div>

</body>
</html>