<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
    <span class="mdi mdi-menu"></span>
</button>
<div class="search-field d-none d-md-block">

</div>
<ul class="navbar-nav navbar-nav-right">
    <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
        <div class="nav-profile-img">
            <img src="../assets/images/faces/face1.jpg" alt="image">
            <span class="availability-status online"></span>
        </div>
        <div class="nav-profile-text">
            <p class="mb-1 text-black">{{Auth::user()->nome}}</p>
        </div>
        </a>
        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
                <i class="mdi mdi-logout me-2 text-primary"></i> Sair </a>
        </div>
    </li>        
    <li class="nav-item nav-logout d-none d-lg-block">
        <a class="nav-link" href="{{route('logout')}}">
        <i class="mdi mdi-power"></i>
        </a>
    </li>
</ul>