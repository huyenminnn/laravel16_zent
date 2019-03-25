<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Mint Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="{{ asset('blog_assets/img/favicon.png')}}"/>
    <!-- STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('blog_assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('blog_assets/css/slippry.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('blog_assets/css/fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('blog_assets/css/style.css')}}">
    <!-- GOOGLE FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,300italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Sarina' rel='stylesheet' type='text/css'>
</head>

<body>


    <!-- *****************************************************************
    ** Preloader *********************************************************
    ****************************************************************** -->

    <div id="preloader-container">
        <div id="preloader-wrap">
            <div id="preloader"></div>
        </div>
    </div>

    
    <!-- *****************************************************************
    ** Header ************************************************************ 
    ****************************************************************** --> 

    <header class="tada-container">
    
    
        <!-- LOGO -->    
        <div class="logo-container">
            <a href="{{ asset('blog_assets/index.html')}}"><img src="{{ asset('blog_assets/img/logo.png')}}" alt="logo" ></a>
            <div class="tada-social">
                <a href="{{ asset('blog_assets/#')}}"><i class="icon-facebook5"></i></a>
                <a href="{{ asset('blog_assets/#')}}"><i class="icon-twitter4"></i></a>
                <a href="{{ asset('blog_assets/#')}}"><i class="icon-google-plus"></i></a>
                <a href="{{ asset('blog_assets/#')}}"><i class="icon-vimeo4"></i></a>
                <a href="{{ asset('blog_assets/#')}}"><i class="icon-linkedin2"></i></a>
            </div>
        </div>
        
        
        <!-- MENU DESKTOP -->
        <nav class="menu-desktop menu-sticky">
    
            <ul class="tada-menu">
                    @foreach($categories as $category)
                        @if($category->parent_id == 0)
                            <li><a href="#" class="active">{{ $category->name }} <i class="icon-arrow-down8"></i></a>
                        @endif
                        <ul class="submenu">
                        @foreach($categories as $menu)
                            @if($menu->parent_id == $category->id)

                                <li><a href="#">{{ $category->name }}</a></li>
                                
                            @endif                                                                      
                        @endforeach
                        </ul>   
                        </li>
                    @endforeach
                     <li><a href="{{ asset('blog_assets/about-us.html')}}">ABOUT US</a></li>
                    <li><a href="{{ asset('blog_assets/contact.html')}}">CONTACT</a></li>
            </ul>
        
        </nav>
        
        
        <!-- MENU MOBILE -->  
        <div class="menu-responsive-container"> 
            <div class="open-menu-responsive">|||</div> 
            <div class="close-menu-responsive">|</div>              
            <div class="menu-responsive">   
                <ul class="tada-menu">
                      @foreach($categories as $category)
                        @if($category->parent_id == 0)
                            <li><a href="#" class="active">{{ $category->name }} <i class="icon-arrow-down8"></i></a>
                        @endif
                        <ul class="submenu">
                        @foreach($categories as $menu)
                            @if($menu->parent_id == $category->id)

                                <li><a href="#">{{ $category->name }}</a></li>
                                
                            @endif                                                                      
                        @endforeach
                        </ul>   
                        </li>
                    @endforeach
                    <li><a href="{{ asset('blog_assets/about-us.html')}}">ABOUT US</a></li>
                    <li><a href="{{ asset('blog_assets/contact.html')}}">CONTACT</a></li>
                </ul>                        
            </div>
        </div> <!-- # menu responsive container -->
        
        
        <!-- SEARCH -->
        <div class="tada-search">
            <form>
                <div class="form-group-search">
                    <input type="search" class="search-field" placeholder="Search and hit enter...">
                    <button type="submit" class="search-btn"><i class="icon-search4"></i></button>
                </div>
            </form>
        </div>
        
        
        <!-- SLIDER -->
        <div class="tada-slider">
            <ul id="tada-slider">
                <li>
                    <img src="{{ asset('blog_assets/img/xien.jpg')}}" alt="image slider 1">
                    <div class="pattern"></div>
                    <div class="tada-text-container">
                        <h1>ĐỒ ĂN VẶT</h1>
                        <h2>Ăn khi buồn</h2>
                        <span class="button"><a href="{{ asset('blog_assets/#')}}">Chi tiết --></a></span>
                    </div>
                </li>
                <li>
                    <img src="{{ asset('blog_assets/img/download2.jpg')}}" alt="image slider 2">
                    <div class="pattern"></div>
                    <div class="tada-text-container">
                        <h1>ĐỒ ĂN NHANH</h1>
                        <h2>Ăn khi đói</h2>
                        <span class="button"><a href="{{ asset('blog_assets/#')}}">Chi tiết --></a></span>
                    </div>
                </li>
                <li>
                    <img src="{{ asset('blog_assets/img/images2.jpg')}}" alt="image slider 3">
                    <div class="pattern"></div>
                    <div class="tada-text-container">
                        <h1>ĐỒ UỐNG</h1>
                        <h2>Uống cùng bạn bè</h2>
                        <span class="button"><a href="{{ asset('blog_assets/#')}}">Chi tiết --></a></span>
                    </div>                
                </li>
            </ul>
            
        </div><!-- #SLIDER -->
                
                
    </header><!-- #HEADER -->

    
    <!-- *****************************************************************
    ** Section ***********************************************************
    ****************************************************************** -->
    
    <section class="tada-container content-posts">
        @yield('content')
        
        <!-- SIDEBAR -->
        <div class="sidebar col-xs-4">
            
            
            <!-- ABOUT ME -->                    
            <div class="widget about-me">
                <div class="ab-image">
                    <img src="{{ asset('blog_assets/img/about-me.jpg')}}" alt="about me">
                    <div class="ab-title">About Me</div>
                </div>
                <div class="ad-text">
                    <p>Lorem ipsum dolor sit consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                    <span class="signing"><img src="{{ asset('blog_assets/img/signing.png')}}" alt="signing"></span>
                </div>
            </div>


            <!-- LATEST POSTS -->                             
            <div class="widget latest-posts">
                <h3 class="widget-title">
                    Latest Posts
                </h3>
                <div class="posts-container">
                
                    <div class="item">
                        <img src="{{ asset('blog_assets/img/latest-posts-1.jpg')}}" alt="post 1" class="post-image">
                        <div class="info-post">
                            <h5><a href="{{ asset('blog_assets/#')}}">MAECENAS <br> CONSECTETUR</a></h5>
                            <span class="date">07 JUNE 2016</span>  
                        </div> 
                        <div class="clearfix"></div>   
                    </div>

                    <div class="item">
                        <img src="{{ asset('blog_assets/img/latest-posts-2.jpg')}}" alt="post 2" class="post-image">
                        <div class="info-post">
                            <h5><a href="{{ asset('blog_assets/#')}}">MAURIS SIT AMET</a></h5>
                            <span class="date">06 JUNE 2016</span>                          
                        </div> 
                        <div class="clearfix"></div>   
                    </div>

                    <div class="item">
                        <img src="{{ asset('blog_assets/img/latest-posts-3.jpg')}}" alt="post 3" class="post-image">
                        <div class="info-post">
                            <h5><a href="{{ asset('blog_assets/#')}}">NAM EGET <br> PULVINAR ANTE</a></h5>
                            <span class="date">05 JUNE 2016</span>                          
                        </div> 
                        <div class="clearfix"></div>   
                    </div>

                    <div class="item">
                        <img src="{{ asset('blog_assets/img/latest-posts-4.jpg')}}" alt="post 4" class="post-image">
                        <div class="info-post">
                            <h5><a href="{{ asset('blog_assets/#')}}">VIVAMUS ET TURPIS LACINIA</a></h5>
                            <span class="date">04 JUNE 2016</span>                      
                        </div>    
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
            </div>


            <!-- FOLLOW US -->                             
            <div class="widget follow-us">
                <h3 class="widget-title">
                    Follow Us
                </h3>
                <div class="follow-container">
                    <a href="{{ asset('blog_assets/#')}}"><i class="icon-facebook5"></i></a>
                    <a href="{{ asset('blog_assets/#')}}"><i class="icon-twitter4"></i></a>
                    <a href="{{ asset('blog_assets/#')}}"><i class="icon-google-plus"></i></a>
                    <a href="{{ asset('blog_assets/#')}}"><i class="icon-vimeo4"></i></a>
                    <a href="{{ asset('blog_assets/#')}}"><i class="icon-linkedin2"></i></a>                
                </div>
                <div class="clearfix"></div>
            </div>            


            <!-- TAGS -->                            
            <div class="widget tags">
                <h3 class="widget-title">
                    Tags
                </h3>
                <div class="tags-container">
                    @foreach($tags as $tag)
                    <a href="{{ asset('blog_assets/#')}}">{{ $tag->name }}</a>

                    @endforeach
                                                    
                </div>
                <div class="clearfix"></div>
            </div> 


            <!-- ADVERTISING -->                           
            <div class="widget advertising">
                <div class="advertising-container">
                    <img src="{{ asset('blog_assets/img/350x300.png')}}" alt="banner 350x300">
                </div>
            </div>


            <!-- NEWSLETTER -->                          
            <div class="widget newsletter">
                <h3 class="widget-title">
                    Newsletter
                </h3>
                <div class="newsletter-container">
                    <h4>DO NOT MISS OUR NEWS</h4>
                    <p>Sign up and receive the <br> latest news of our company</p> 
                    <form>
                       <input type="email" class="newsletter-email" placeholder="Your email address...">
                       <button type="submit" class="newsletter-btn">Send</button>
                    </form>                                  
                </div>
                <div class="clearfix"></div>
            </div>  
            
        </div> <!-- #SIDEBAR -->
        
        <div class="clearfix"></div>
        
        
    </section>

    
    <!-- *****************************************************************
    ** Footer ************************************************************
    ****************************************************************** -->    
    
    <footer class="tada-container">
    
    
        <!-- INSTAGRAM -->    
        <div class="widget widget-gallery">
            <h3 class="widget-title">INSTAGRAM</h3>
            <div class="image">
                <a href="{{ asset('blog_assets/#')}}"><img src="{{ asset('blog_assets/img/img-gallery-1.jpg')}}" alt="image gallery 1"></a>
                <a href="{{ asset('blog_assets/#')}}"><img src="{{ asset('blog_assets/img/img-gallery-2.jpg')}}" alt="image gallery 2"></a>
                <a href="{{ asset('blog_assets/#')}}"><img src="{{ asset('blog_assets/img/img-gallery-3.jpg')}}" alt="image gallery 3"></a>
                <a href="{{ asset('blog_assets/#')}}"><img src="{{ asset('blog_assets/img/img-gallery-4.jpg')}}" alt="image gallery 4"></a>
                <a href="{{ asset('blog_assets/#')}}"><img src="{{ asset('blog_assets/img/img-gallery-5.jpg')}}" alt="image gallery 5"></a>
                <a href="{{ asset('blog_assets/#')}}"><img src="{{ asset('blog_assets/img/img-gallery-6.jpg')}}" alt="image gallery 6"></a>
            </div>
            <div class="clearfix"></div>
        </div>
        
        
        <!-- FOOTER BOTTOM -->        
        <div class="footer-bottom">
            <span class="copyright">Theme Created by <a href="{{ asset('blog_assets/#')}}">AD-Theme</a> Copyright © 2016. All Rights Reserved</span>
            <span class="backtotop">TOP <i class="icon-arrow-up7"></i></span>
            <div class="clearfix"></div>
        </div>
        
        
    </footer>
    
    
    <!-- *****************************************************************
    ** Script ************************************************************
    ****************************************************************** -->  
    
    <script src="{{ asset('blog_assets/js/jquery-1.12.4.min.js')}}"></script>
    <script src="{{ asset('blog_assets/js/slippry.js')}}"></script>
    <script src="{{ asset('blog_assets/js/main.js')}}"></script>

</body>
</html>
