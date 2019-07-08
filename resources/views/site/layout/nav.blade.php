    <!-- Header_Area -->
    <nav class="navbar navbar-default header_aera" id="main_navbar">
        <div class="container">
            <!-- searchForm -->
            <div class="searchForm">
                <form action="#" class="row m0">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input type="search" name="search" class="form-control" placeholder="Type & Hit Enter">
                        <span class="input-group-addon form_hide"><i class="fa fa-times"></i></span>
                    </div>
                </form>
            </div><!-- End searchForm -->
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="col-md-2 p0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#min_navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><img src="{{ asset('storage/images/logo.png') }}" alt="Top Builder Logo"></a>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="col-md-10 p0">
                <div class="collapse navbar-collapse" id="min_navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="{{ request()->is('/services') ? 'active' : '' }}"><a href="/">Home</a></li>
                        
                        <li class="dropdown submenu {{ request()->is('/about') ? 'active' : '' }}">
                            <a href="/about" onclick="window.location.href='/about';" class="dropdown-toggle" data-toggle="dropdown">About Us</a>
                            <ul class="dropdown-menu other_dropdwn">
                                <li><a href="/about#quiNouSommes">Qui nous sommes</a></li>
                                <li><a href="/about#nosFonc">Nos fonctionnalités</a></li>
                                <li><a href="/about#notreEquipe">Notre équipe</a></li>
                            </ul>
                        </li>
                        <li class="dropdown submenu {{ request()->is('/services') ? 'active' : '' }}">
                            <a href="/services" onclick="window.location.href='/services';" class="dropdown-toggle" data-toggle="dropdown">Services</a>
                            <ul class="dropdown-menu other_dropdwn">
                                <li><a href="/services#nosFoncVed">Nos travaux en vedettes</a></li>
                                <li><a href="/services#notreEquipe">Notre équipe</a></li>
                            </ul>
                        </li>
                        <li class="{{ request()->is('/services') ? 'active' : '' }}"><a href="/gallery">Gallery</a></li>
                        <li class="{{ request()->is('/services') ? 'active' : '' }}"><a href="/blog">Blog</a></li>
                        <li class="{{ request()->is('/services') ? 'active' : '' }}"><a href="/contact">Contact</a></li>
                        <li><a href="#" class="nav_searchFrom"><i class="fa fa-search"></i></a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </div><!-- /.container -->
    </nav>
    <!-- End Header_Area -->