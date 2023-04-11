<?php
date_default_timezone_set('Europe/Bucharest');
session_start();
include ('../admin/connect.php'); 
include ('add_comment.php');
include ('../admin/cards.php');

$id = $_GET['article_id'];
$sql = $conn->prepare("SELECT * FROM articles WHERE article_id = ?");
$sql->execute([$id]);
$articles = $sql->fetchAll(); 
?>
<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Site Metas -->
    <title>Post</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Site Icons -->
    <link rel="shortcut icon" href="../front/images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="../front/images/apple-touch-icon.png">
    
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet"> 

    <!-- Bootstrap core CSS -->
    <link href="../front/css/bootstrap.css" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="../front/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="../front/css/responsive.css" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="../front/css/colors.css" rel="stylesheet">

    <!-- Version Garden CSS for this template -->
    <link href="../front/css/version/garden.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <div id="wrapper">
        <div class="collapse top-search" id="collapseExample">
            <div class="card card-block">
                <div class="newsletter-widget text-center">
                    <form class="form-inline">
                        <input type="text" class="form-control" placeholder="What you are looking for?">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </form>
                </div><!-- end newsletter -->
            </div>
        </div><!-- end top-search -->

        <div class="topbar-section">
            <div class="container-fluid">
                <div class="row">
                   <div class="col-lg-4 col-md-6 col-sm-6 hidden-xs-down">
                    </div><!-- end col -->

                    <div class="col-lg-4 hidden-md-down">
                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="topsearch text-right">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-search"></i> Search</a> 
                        </div><!-- end search -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end header-logo -->
        </div><!-- end topbar -->

        <div class="header-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo">
                            <a href="garden-index.html"><img src="images/version/garden-logo.png" alt=""></a>
                        </div><!-- end logo -->
                    </div>
                </div><!-- end row -->
            </div><!-- end header-logo -->
        </div><!-- end header -->

        <header class="header">
            <div class="container">
                <nav class="navbar navbar-inverse navbar-toggleable-md">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Forest Timemenu" aria-controls="Forest Timemenu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-md-center" id="Forest Timemenu">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link color-green-hover" href="index.php">News</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-green-hover" href="contact.php">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div><!-- end container -->
        </header><!-- end header -->

        <div class="page-title wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2><i class="fa fa-leaf bg-green"></i> Blog</h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Blog</li>
                        </ol>
                    </div><!-- end col -->                    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end page-title -->
         
        <section class="section wb">
            <div class="container">
                <div class="row"> 
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-title-area">
                            <?php foreach($articles as $article):?>
                                <span class="color-green"><a href="garden-category.html" title="topic"
                                ><?php echo $article['topic']; ?>
                                </a></span> 
                                <h3><?php echo $article['title']; ?></h3>
                                <div class="blog-meta big-meta">
                                    <small><a href="garden-single.html" title="date"><?php echo $article['date']; ?></a></small>
                                    <small><a href="blog-author.html" title="">by Jessica</a></small>
                                    <small><a href="#" title=""><i class="fa fa-eye"></i> 2344</a></small>
                                </div><!-- end meta -->
                                
                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div><!-- end post-sharing -->
                            </div><!-- end title -->

                            <div class="single-post-media">
                                <img src="../admin/upload/<?php echo $article['image'];?>" alt="" class="img-fluid">
                            </div><!-- end media -->

                            <div class="blog-content">  
                                <div class="pp">
                                <p><?php echo $article['content']; ?></p>
                                </div><!-- end pp -->
                                <?php endforeach;?>
                            </div><!-- end content -->
                            
                            <div class="blog-title-area">
                                <div class="tag-cloud-single">
                                    <span>Tags</span>
                                    <small><a href="#" title="">lifestyle</a></small>
                                    <small><a href="#" title="">colorful</a></small>
                                    <small><a href="#" title="">trending</a></small>
                                    <small><a href="#" title="">another tag</a></small>
                                </div><!-- end meta -->

                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div><!-- end post-sharing -->
                            </div><!-- end title -->
        
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="banner-spot clearfix">
                                        <div class="banner-img">
                                            <img src="" alt="" class="img-fluid">
                                        </div><!-- end banner-img -->
                                    </div><!-- end banner -->
                                </div><!-- end col -->
                            </div><!-- end row -->
                            
                            <hr class="invis1">
                            
                            <div class="custombox authorbox clearfix">
                                <h4 class="small-title">About author</h4>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <img src="upload/author.jpg" alt="" class="img-fluid rounded-circle"> 
                                    </div><!-- end col -->
      
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                        <h4><a href="#">Jessica</a></h4>
                                        <p>Quisque sed tristique felis. Lorem <a href="#">visit my website</a> amet, consectetur adipiscing elit. Phasellus quis mi auctor, tincidunt nisl eget, finibus odio. Duis tempus elit quis risus congue feugiat. Thanks for stop Forest Time!</p>

                                        <div class="topsocial">
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                        </div><!-- end social -->

                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end author-box -->

                            <hr class="invis1">
                         <?php   $sql = $conn->prepare("SELECT * FROM articles WHERE topic = 'Lifestyle' LIMIT 2");
 $sql->execute();
 $articles = $sql->fetchAll(); ?>
                            <div class="custombox clearfix">
                                <h4 class="small-title">You may also like</h4>
                                <div class="row">
                            <?php foreach($articles as $article):?>
                                    <div class="col-lg-6">
                                        <div class="blog-box">
                                            <div class="post-media">
                                                <a href="garden-single.html" title="">
                                                    <img src="../admin/upload/<?php echo $article['image'];?>" alt="image" class="img-fluid">
                                                    <div class="hovereffect">
                                                        <span class=""></span>
                                                    </div><!-- end hover -->
                                                </a>
                                            </div><!-- end media -->
                                            <div class="blog-meta">
                                                <h4><a href="garden-single.html" title=""><?php echo substr($article['title'], 0, 100). '...';?></a></h4>
                                                <small><a href="blog-category-01.html" title=""><?php echo $article['topic'];?></a></small>
                                                <small><a href="blog-category-01.html" title=""><?php echo $article['date'];?></a></small>
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->
                                    </div><!-- end col -->
                                    <?php endforeach; ?>
                                </div><!-- end row -->
                            </div><!-- end custom-box -->

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title"><?php commentsCount($conn);?> Comments</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="comments-list">
<?php 
$sql = $conn->prepare("SELECT * FROM comments");
$sql->execute();
$comments = $sql->fetchAll(PDO::FETCH_ASSOC); ?>
                                        <?php foreach($comments as $comment): ?>
                                            <div class="media">
                                                <a class="media-left" href="#">
                                                    <img src="upload/author.jpg" alt="" class="rounded-circle">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading user_name"><?php echo $comment["user"]; ?><small><?php echo $comment["date"]; ?></small></h4>
                                                    <p><?php echo ($comment["comment"]); ?></p>
                                                    <a href="#" class="btn btn-primary btn-sm">Reply</a>
                                                    <a href="../delete_comments.php?id=<?= $comment['id']; ?>" class="btn btn-primary btn-sm">Delete</a>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end custom-box -->

                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title">Leave a Reply</h4>
                                <div class="row">
                                   <div class="col-lg-12">                                  
                                   <?php include('message.php');?> 
                                   <?php echo
                                       '<form class="form-wrapper" method="post" action="'.setComments($conn).'">
                                            <input type="text" name="user" class="form-control" placeholder="Your name">
                                            <input type="hidden" name="date" value="'.date('Y-m-d H:i:s').'" class="form-control">
                                            <textarea type="text" class="form-control" name="comment"
                                            rows="5" placeholder="Your comment"></textarea>
                                            <button type="submit" name="add_com" class="btn btn-primary">Submit Comment</button>
                                        </form>';
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->

                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="sidebar">
                            <div class="widget">
                                <h2 class="widget-title">Search</h2>
                                <form class="form-inline search-form">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search on the site">
                                    </div>
                                    <button type="submit" name="submit"class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </form>
                            </div><!-- end widget -->
                            <?php $sql = $conn->prepare("SELECT * FROM articles ORDER BY date DESC LIMIT 3");
 $sql->execute();
 $articles = $sql->fetchAll(); ?>
                            <div class="widget">
                                <h2 class="widget-title">Recent Posts</h2>
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                    <?php foreach($articles as $article) :?>
                                        <a href="garden-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                <img src="../admin/upload/<?php echo $article['image'];?>" alt="image" class="img-fluid float-left">
                                                <h5 class="mb-1"><?php echo substr($article['title'], 0, 100). '...';?></h5>
                                                <small><?php echo $article['date'];?></small>
                                            </div>
                                        </a>
                                        <?php endforeach; ?>
                                </div><!-- end blog-list -->
                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">Advertising</h2>
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <img src="../admin/upload/<?php echo $article['image'];?>" alt="AD" class="img-fluid">
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">Instagram Feed</h2>
                                <div class="instagram-wrapper clearfix">
                                    <a href="#"><img src="upload/garden_sq_01.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_02.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_03.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_04.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_05.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_06.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_07.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_08.jpg" alt="" class="img-fluid"></a>
                                    <a href="#"><img src="upload/garden_sq_09.jpg" alt="" class="img-fluid"></a>
                                </div><!-- end Instagram wrapper -->
                            </div><!-- end widget -->

                            <div class="widget">
                                <h2 class="widget-title">Popular Categories</h2>
                                <div class="link-widget">
                                    <ul>
                                        <li><a href="#">News<span>(21)</span></a></li>
                                        <li><a href="#">Sports <span>(15)</span></a></li>
                                        <li><a href="#">Travel <span>(31)</span></a></li>
                                        <li><a href="#">Design <span>(22)</span></a></li>
                                        <li><a href="#">Lifestyle <span>(66)</span></a></li>
                                    </ul>
                                </div><!-- end link-widget -->
                            </div><!-- end widget -->
                        </div><!-- end sidebar -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="widget">
                            <div class="footer-text text-center">
                                <a href="index.html"><img src="images/version/garden-footer-logo.png" alt="" class="img-fluid"></a>
                                <div class="social">
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>              
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Google Plus"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                </div>

                                <hr class="invis">

                                <div class="newsletter-widget text-center">
                                    <form class="form-inline">
                                        <input type="text" class="form-control" placeholder="Enter your email address">
                                        <button type="submit" class="btn btn-primary">Subscribe <i class="fa fa-envelope-open-o"></i></button>
                                    </form>
                                </div><!-- end newsletter -->
                            </div><!-- end footer-text -->
                        </div><!-- end widget -->
                    </div><!-- end col -->
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <br>
                        <br>
                        <div class="copyright">&copy; Forest Time. Design: <a href="http://html.design">HTML Design</a>.</div>
                    </div>
                </div>
            </div><!-- end container -->
        </footer><!-- end footer -->

        <div class="dmtop">Scroll to Top</div>
        
    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="../front/js/jquery.min.js"></script>
    <script src="../front/js/tether.min.js"></script>
    <script src="../front/js/bootstrap.min.js"></script>
    <script src="../front/js/custom.js"></script>

</body>
</html>