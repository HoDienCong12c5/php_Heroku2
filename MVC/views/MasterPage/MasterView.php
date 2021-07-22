<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bubbly - Boootstrap 5 Admin template by Bootstrapious.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <!-- Google fonts - Popppins for copy-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&amp;display=swap" rel="stylesheet">
    <!-- Prism Syntax Highlighting-->
    <link href="/Public/Admin/css/toolbar.css" rel="stylesheet">

    <link href="/Public/Admin/css/prism-okaidia.css" rel="stylesheet">
    <link rel="shortcut icon" href="https://d19m59y37dris4.cloudfront.net/bubbly/1-1/img/favicon.png">
    <link href="/Public/Admin/css/Boostrap.min.css" rel="stylesheet">
    <link href="/Public/font/all.css" rel="stylesheet">
    <link rel="stylesheet" href="/Public/All/css/font.css" rel="stylesheet">
    <link href="/Public/Admin/css/Chart.css" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">



</head>

<body>
    <!-- navbar-->
    <header class="header">
        <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow"><a class="sidebar-toggler text-gray-500 me-4 me-lg-5 lead" href="#">
            <i class="fas fa-align-left"></i></a><a class="navbar-brand fw-bold text-uppercase text-base" href="#"><span class="d-none d-brand-partial">Nhóm  </span><span class="d-none d-sm-inline">9</span></a>
            <ul class="ms-auto d-flex align-items-center list-unstyled mb-0">
                <li class="nav-item dropdown">
                    <form class="ms-auto me-4 d-none d-lg-block" id="searchForm">
                        <div class="input-group input-group-sm input-group-navbar">
                            <input class="form-control" id="searchInput" type="search" placeholder="Search">
                            <button class="btn" type="button"> <i class="fas fa-search"></i></button>
                        </div>
                    </form>
                    <div class="dropdown-menu dropdown-menu-animated text-sm" id="searchDropdownMenu">
                        <h6 class="dropdown-header text-uppercase fw-normal">Recent pages</h6><a class="dropdown-item py-1" href="http://localhost:3000/MVC/views/Admin/WordView.php"> <i class="far fa-file me-2"> </i>Posts</a><a class="dropdown-item py-1" href="widgets-stats.html"> <i class="far fa-file me-2"> </i>Widgets</a><a class="dropdown-item py-1" href="#"> <i class="far fa-file me-2"> </i>Profile</a>
                        <div class="dropdown-divider"></div>
                         <div class="dropdown-divider"></div>
                        <h6 class="dropdown-header text-uppercase fw-normal">Filters</h6><a class="dropdown-item py-1" href="#!"> <span class="badge me-2 badge-success-light">Posts</span><span class="text-xs">Search all posts</span></a><a class="dropdown-item py-1" href="#!"> <span class="badge me-2 badge-danger-light">Users</span><span class="text-xs">Only in users</span></a><a class="dropdown-item py-1" href="#!"> <span class="badge me-2 badge-warning-light">Campaigns</span><span class="text-xs">Only in campaigns</span></a>
                    </div>
                </li>
                <li class="nav-item dropdown me-2"><a class="nav-link nav-link-icon text-gray-400 px-1" id="notifications" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg class="svg-icon svg-icon-md svg-icon-heavy">
                            <use xlink:href="icons/orion-svg-sprite.57a86639.svg#sales-up-1"> </use>
                        </svg><span class="notification-badge bg-green"></span></a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated text-sm" aria-labelledby="notifications"><a class="dropdown-item" href="#">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-sm bg-indigo text-white"><i class="fab fa-twitter"></i></div>
                                <div class="text ms-2">
                                    <p class="mb-0">You have 2 followers</p>
                                </div>
                            </div>
                        </a><a class="dropdown-item" href="#">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-sm bg-green text-white"><i class="fas fa-envelope"></i></div>
                                <div class="text ms-2">
                                    <p class="mb-0">You have 6 new messages</p>
                                </div>
                            </div>
                        </a><a class="dropdown-item" href="#">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-sm bg-blue text-white"><i class="fas fa-upload"></i></div>
                                <div class="text ms-2">
                                    <p class="mb-0">Server rebooted</p>
                                </div>
                            </div>
                        </a><a class="dropdown-item" href="#">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-sm bg-indigo text-white"><i class="fab fa-twitter"></i></div>
                                <div class="text ms-2">
                                    <p class="mb-0">You have 2 followers</p>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div><a class="dropdown-item text-center" href="#"><small class="fw-bold text-uppercase">View all notifications</small></a>
                    </div>
                </li>
                <!-- Messages                        -->
                <li class="nav-item dropdown me-2 me-lg-3"> <a class="nav-link nav-link-icon text-gray-400 px-1" id="messages" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg class="svg-icon svg-icon-md svg-icon-heavy">
                        </svg><span class="notification-badge notification-badge-number bg-primary">10</span></a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated text-sm" aria-labelledby="messages"><a class="dropdown-item d-flex align-items-center p-3" href="#"> <img class="avatar avatar-sm p-1 me-2" src="https://d19m59y37dris4.cloudfront.net/bubbly/1-1/img/avatar-0.jpg" alt="Jason Doe">
                            <div class="pt-1">
                                <h6 class="fw-bold mb-0">Jason Doe</h6><span class="text-muted text-sm">Sent you a message</span>
                            </div>
                        </a><a class="dropdown-item d-flex align-items-center p-3" href="#"> <img class="avatar avatar-sm p-1 me-2" src="https://d19m59y37dris4.cloudfront.net/bubbly/1-1/img/avatar-1.jpg" alt="Frank Williams">
                            <div class="pt-1">
                                <h6 class="fw-bold mb-0">Frank Williams</h6><span class="text-muted text-sm">Sent you a message</span>
                            </div>
                        </a><a class="dropdown-item d-flex align-items-center p-3" href="#"> <img class="avatar avatar-sm p-1 me-2" src="https://d19m59y37dris4.cloudfront.net/bubbly/1-1/img/avatar-2.jpg" alt="Ashley Wood">
                            <div class="pt-1">
                                <h6 class="fw-bold mb-0">Ashley Wood</h6><span class="text-muted text-sm">Sent you a message</span>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div><a class="dropdown-item text-center" href="#"> <small class="fw-bold text-uppercase">View all messages </small></a>
                    </div>
                </li>
                <li class="nav-item dropdown ms-auto"><a class="nav-link pe-0" id="userInfo" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar p-1" src="https://d19m59y37dris4.cloudfront.net/bubbly/1-1/img/avatar-6.jpg" alt="Jason Doe"></a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated" aria-labelledby="userInfo">
                        <div class="dropdown-header text-gray-700">
                            <h6 class="text-uppercase font-weight-bold">Mark Stephen</h6><small>Web Developer</small>
                        </div>
                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Profile</a><a class="dropdown-item" href="#">Activity log </a>
                        <div class="dropdown-divider"></div><a class="dropdown-item" href="/Login">Đăng xuấtt</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <div class="d-flex align-items-stretch">
        <div class="sidebar py-3" id="sidebar">
            <ul class="list-unstyled">
                <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="/Admin/ListWork">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                            <path d="M8.277.084a.5.5 0 0 0-.554 0l-7.5 5A.5.5 0 0 0 .5 6h1.875v7H1.5a.5.5 0 0 0 0 1h13a.5.5 0 1 0 0-1h-.875V6H15.5a.5.5 0 0 0 .277-.916l-7.5-5zM12.375 6v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zM8 4a1 1 0 1 1 0-2 1 1 0 0 1 0 2zM.5 15a.5.5 0 0 0 0 1h15a.5.5 0 1 0 0-1H.5z" />
                        </svg> <label style="width: 10px;"></label><span class="sidebar-link-title"> Danh sách quản lý Bài tập</span></a></li>
                <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="/Admin/Customers">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                            <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z" />
                        </svg><label style="width: 10px;"></label><span class="sidebar-link-title">Danh sách quản lý hội viên</span></a></li>
                <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="/Admin/Food">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="60" fill="currentColor" class="bi bi-list-ol" viewBox="0 0 16 16">
                            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                            <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                        </svg><label style="width: 10px;"></label><span class="sidebar-link-title">Danh sách thực phẩm bổ sung</span></a></li>
                <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="/Admin/RegitsterW">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                            <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                        </svg><label style="width: 10px;"></label><span class="sidebar-link-title">Duyệt bài tập</span></a></li>

                <li class="sidebar-list-item"><a class="sidebar-link text-muted " href="#" data-bs-target="#cmsDropdown" role="button" aria-expanded="false" data-bs-toggle="collapse">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="30" fill="currentColor" class="bi bi-bar-chart" viewBox="0 0 16 16">
                            <path d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5v12h-2V2h2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3z" />
                        </svg><label style="width: 10px;"></label><span class="sidebar-link-title">Doanh thu </span></a>
                    <ul class="sidebar-menu list-unstyled collapse " id="cmsDropdown">
                        <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="/Admin/ExerciseRevenue">Doanh thu bài tập</a></li>
                        <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="/Admin/ProductRevenue">Doanh thu thực phẩm</a></li>
                    </ul>

                </li>
                <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="/Admin/Staff">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z" />
                        </svg><label style="width: 10px;"></label><span class="sidebar-link-title">Quản lý nhân viên </span></a></li>
                <li class="sidebar-list-item"><a class="sidebar-link text-muted" href="/Admin/Devices">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-hammer" viewBox="0 0 16 16">
                            <path d="M9.972 2.508a.5.5 0 0 0-.16-.556l-.178-.129a5.009 5.009 0 0 0-2.076-.783C6.215.862 4.504 1.229 2.84 3.133H1.786a.5.5 0 0 0-.354.147L.146 4.567a.5.5 0 0 0 0 .706l2.571 2.579a.5.5 0 0 0 .708 0l1.286-1.29a.5.5 0 0 0 .146-.353V5.57l8.387 8.873A.5.5 0 0 0 14 14.5l1.5-1.5a.5.5 0 0 0 .017-.689l-9.129-8.63c.747-.456 1.772-.839 3.112-.839a.5.5 0 0 0 .472-.334z" />
                        </svg><span class="sidebar-link-title">Thiết bị dụng cụ </span></a></li>
            </ul>
        </div>


        <!-- JavaScript files-->
        <script src="https://d19m59y37dris4.cloudfront.net/bubbly/1-1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
        <!-- Data Tables-->
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest"></script>
        <script src="/Public/All/js/Admin1.js"></script>
        <!-- Main Theme JS File-->
        <script src="/Public/All/js/Admin2.js"></script>
        <!-- Prism for syntax highlighting-->
        <script src="https://d19m59y37dris4.cloudfront.net/bubbly/1-1/vendor/prismjs/prism.js"></script>
        <script src="https://d19m59y37dris4.cloudfront.net/bubbly/1-1/vendor/prismjs/plugins/normalize-whitespace/prism-normalize-whitespace.min.js"></script>
        <script src="https://d19m59y37dris4.cloudfront.net/bubbly/1-1/vendor/prismjs/plugins/toolbar/prism-toolbar.min.js"></script>
        <script src="https://d19m59y37dris4.cloudfront.net/bubbly/1-1/vendor/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js"></script>
        <script type="text/javascript">
            // Optional
            Prism.plugins.NormalizeWhitespace.setDefaults({
                'remove-trailing': true,
                'remove-indent': true,
                'left-trim': true,
                'right-trim': true,
            });
        </script>
        <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
</body>

</html>