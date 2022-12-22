<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="border-bottom: 5px solid #000;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('admin') }}" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('contact') }}" class="nav-link">Contact</a>
        </li>
        <li>
            <div>
                <h5 style="height: 100%; margin:0; transform: translateY(6px);color: rgba(0,0,0,.5);">Xin chào!!!{{Auth::user()->name}}</h5>
            </div>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">

                <form action="{{ route('managementBooks.show') }}" method="POST" class="form-inline">
                    <div class="input-group input-group-sm">
                        @csrf
                        <input class="form-control form-control-navbar" id="search" type="search" placeholder="Search" aria-label="Search" name="search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </li>

        <!-- Messages Dropdown Menu -->

        <!-- Notifications Dropdown Menu -->

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>