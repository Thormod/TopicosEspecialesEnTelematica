<!-- ******HEADER****** -->
<header id="header" class="header navbar-fixed-top">
    <div class="container">
        <h1 class="logo">
            <a href="/"><span class="text"><img src="/images/logo-small.png"/></span></a>
        </h1><!--//logo-->
        <nav class="main-nav navbar-right" role="navigation">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button><!--//nav-toggle-->
            </div><!--//navbar-header-->
            <div id="navbar-collapse" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  @if (Auth::guest())
                      <li class="nav-item nav-item-cta last"><a class="btn btn-cta btn-cta-secondary" href="{{ url('/auth/login') }}">Login</a></li>
                      <li class="nav-item nav-item-cta last" style="margin-left: 4px;"><a class="btn btn-cta btn-cta-secondary" href="{{ url('/auth/register') }}">Sign Up</a></li>
                  @else
                      <li class="nav-item nav-item-cta last"><a class="btn btn-cta btn-cta-secondary" href="#">$ {{ Auth::user()->money }}</a></li>
                      <li class="nav-item nav-item-cta last" style="margin-left: 4px;"><a class="btn btn-cta btn-cta-secondary" href="/user/{{ Auth::user()->id }}">{{ Auth::user()->username }}</a></li>
                      <li class="nav-item nav-item-cta last" style="margin-left: 4px;"><a class="btn btn-cta btn-cta-secondary" href="{{ url('/auth/logout') }}">Logout</a></li>
                  @endif
                </ul><!--//nav-->
            </div><!--//navabr-collapse-->
        </nav><!--//main-nav-->
    </div><!--//container-->
</header><!--//header-->
