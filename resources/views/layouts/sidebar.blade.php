<body data-base-url="#">
    <script src="assets/js/spinner.js"></script>
    <div class="main-wrapper" id="app">
        <nav class="sidebar">
            <div class="sidebar-header">
                <a href="#" class="sidebar-brand">
                    POS<span>UI</span>
                </a>
                <div class="sidebar-toggler not-active">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="sidebar-body">
                <ul class="nav">
                    <li class="nav-item nav-category">Main</li>
                    <li class="nav-item active">
                        <a href="#" class="nav-link">
                            <i class="link-icon" data-feather="box"></i>
                            <span class="link-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">Manajemen Produk</li>
                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#email" role="button" aria-expanded="false" aria-controls="email">
                            <i class="link-icon" data-feather="mail"></i>
                            <span class="link-title">Manajemen Produk</span>
                            <i class="link-arrow" data-feather="chevron-down"></i>
                        </a>
                        <div class="collapse " id="email">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="email/inbox.html" class="nav-link ">Produk</a>
                                </li>
                                <li class="nav-item">
                                    <a href="email/read.html" class="nav-link ">Kategori</a>
                                </li>
                               
                            </ul>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </nav>
        <div class="page-wrapper">
            <nav class="navbar">
                <a href="#" class="sidebar-toggler">
                    <i data-feather="menu"></i>
                </a>
                <div class="navbar-content">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown nav-profile">
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="assets/images/faces/face1.jpg" alt="profile">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="profileDropdown">
                                <div class="dropdown-header d-flex flex-column align-items-center">
                                    <div class="figure mb-3">
                                        <img src="assets/images/faces/face1.jpg" alt="">
                                    </div>
                                    <div class="info text-center">
                                        <p class="name font-weight-bold mb-0">Amiah Burton</p>
                                        <p class="email text-muted mb-3">amiahburton@gmail.com</p>
                                    </div>
                                </div>
                                <div class="dropdown-body">
                                    <ul class="profile-nav p-0 pt-3">
                                        <li class="nav-item">
                                            <a href="general/profile.html" class="nav-link">
                                                <i data-feather="user"></i>
                                                <span>Profile</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:;" class="nav-link">
                                                <i data-feather="edit"></i>
                                                <span>Edit Profile</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:;" class="nav-link">
                                                <i data-feather="repeat"></i>
                                                <span>Switch User</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:;" class="nav-link">
                                                <i data-feather="log-out"></i>
                                                <span>Log Out</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>