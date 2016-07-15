<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clean Blog</title>

    <!-- Bootstrap Core CSS -->
    <?php echo Asset::css('bootstrap.min.css'); ?>
    
    <!-- Theme CSS -->
    <?php echo Asset::css('clean-blog.min.css'); ?>

    <!-- Custom Fonts -->
    <?php echo Asset::css('font-awesome.min.css'); ?>
    
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/">Start Bootstrap</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>
                        <a href="/register">Register</a>
                    </li>
                    <li>
                        <a href="/login">Login</a>
                    </li>                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('<?php echo Asset::get_file('home-bg.jpg', 'img');?>')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <hr class="small">
                        <span class="subheading">A Clean Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <?php 
                $success = Session::get_flash('success');
                $error = Session::get_flash('error');
                
                if( $success ){
            ?>
                    <div class="alert alert-success">
                        <strong>Success!</strong> <?php echo $success; ?>
                     </div>
            <?php }else if($error){ ?>
                     <div class="alert alert-danger">
                        <strong>Warning!</strong> <?php echo $error; ?>
                     </div>
            <?php } ?>
               <form action="" method="POST">
                <div class="form-group row">
                    <label for="firstname" class="col-sm-2 form-control-label">First Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lastname" class="col-sm-2 form-control-label">Last Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="last_name" id="lastname" placeholder="Last Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-2 form-control-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                    </div>
                </div>
                <div class="form-group row">
                  <label for="email_address" class="col-sm-2 form-control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email_address" id="email_address" placeholder="Email">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password" class="col-sm-2 form-control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                  </div>
                </div>
                                
                <div class="form-group row">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-secondary">Register</button>
                  </div>
                </div>
              </form>             
        </div>
    </div>

    <hr>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; Your Website 2016</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <?php Asset::js('jquery.min.js'); ?>

    <!-- Bootstrap Core JavaScript -->
    <?php echo Asset::js('bootstrap.min.js'); ?>

    <!-- Contact Form JavaScript -->
    <?php echo Asset::js('jqBootstrapValidation.js'); ?>
    <?php echo Asset::js('contact_me.js'); ?>

    <!-- Theme JavaScript -->
    <?php echo Asset::js('clean-blog.min.js'); ?>

</body>

</html>
