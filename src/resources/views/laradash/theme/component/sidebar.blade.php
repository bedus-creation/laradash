<nav id="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="logo-mini">
                <div class="logo-img">
                    <img src="/img/vue-logo.png" alt="">
                </div>
            </a>
            <a href="#" class="simple-text logo-normal">
                LaraDash
            </a>
        </div>
        <div class="logo">
            <a href="#" class="logo-mini">
                <div class="photo">
                    <img src="/img/default-avatar.png" alt="">
                </div>
            </a>
            <a href="#user" data-toggle="collapse" class="simple-text logo-normal">
                Bedram
                <b class="caret"></b>
            </a>
            <div class="collapse" id="user">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="/components/grid-system" class="nav-link">
                            <span class="sidebar-mini">G</span> 
                            <span class="sidebar-normal">Grid System</span>
                        </a>
                    </li> 
                </ul>
            </div>
        </div>
        <ul class="list-group list-group-flush pt-2">
            <li class="list-group-item">
                <a href="{{url(config('laradash.base_route'))}}" data-toggle="collapse" class="nav-link">
                    <i class="fas fa-chart-line"></i>
                    <p class="pl-2 mb-0">
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="list-group-item">
                <a href="#posts" data-toggle="collapse" class="nav-link">
                    <i class="far fa-chart-bar"></i>
                    <p class="pl-2 mb-0">Post
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="settings">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="/admin/posts" class="nav-link">
                                <span class="sidebar-mini">A</span> 
                                <span class="sidebar-normal">All Posts</span>
                            </a>
                        </li> 
                        <li class="nav-item">
                            <a href="/admin/posts/create" class="nav-link">
                                <span class="sidebar-mini">C</span> 
                                <span class="sidebar-normal">Create Post</span>
                            </a>
                        </li> 
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
