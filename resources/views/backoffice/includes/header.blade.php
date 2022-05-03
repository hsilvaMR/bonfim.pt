<!--<header>
  <div class="container-fluid">
  	<a href="{{ asset('') }}" target="_blank"><div class="header-logo"></div></a>
  	<i class="fas fa-bars header-menu"></i>
  </div>
</header>
<div class="clearfix"> </div>-->
<header onmouseover="mcancel()" onmouseout="mcloset()">
  <div class="container-fluid">
  	<a href="{{ asset('') }}" target="_blank"><div class="header-logo"></div></a>
    <div class="header-icon header-icon-menu header-menu"><i class="fas fa-bars"></i></div>
    <div class="header-icon header-icon-menu menu-bt-hide"><i class="fas fa-bars"></i></div>

	  
      <div class="header-icon header-icon-account" onClick="mostrarMenuAccount();"><i class="fas fa-cogs"></i></div>
    

    <div id="menuAccount" class="header-menu-account">
      <a href="{{ route('logoutPageB') }}"><div class="header-menu-item">{{ trans('backoffice.Logout') }}</div></a>
    </div>
    <!--<a href="{ { route('logoutPageB') }}"><div class="header-icon header-icon-account">&nbsp;<i class="fas fa-sign-out-alt"></i></div></a>-->

    <!--<div class="header-icon"><i class="fas fa-envelope"></i></div>
  	<div class="header-icon"><i class="fas fa-bell"></i></div>-->
    
  
  	
  </div>
</header>
<div class="clearfix"> </div>