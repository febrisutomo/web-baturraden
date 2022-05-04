<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('admin') ? '' : 'collapsed' }}" href="{{ route('admin') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('place.*') ? '' : 'collapsed' }}" data-bs-target="#place-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-pin-map"></i><span>Destinasi</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>

            <ul id="place-nav" class="nav-content collapse {{ Request::routeIs('place.*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('place.index')}}" class="{{ Request::routeIs('place.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Daftar Destinasi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('place.create') }}" class="{{ Request::routeIs('place.create') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Tambah Destinasi</span>
                    </a>
                </li>
                
            </ul>
        </li>
        
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('post.*') ? '' : 'collapsed' }}" data-bs-target="#blog-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-newspaper"></i><span>Blog</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>

            <ul id="blog-nav" class="nav-content collapse {{ Request::routeIs('post.*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('post.index')}}" class="{{ Request::routeIs('post.index') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Daftar Post</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('post.create') }}" class="{{ Request::routeIs('post.create') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Tambah Post</span>
                    </a>
                </li>
                
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-gear"></i>
                <span>Pengaturan</span>
            </a>
        </li>


    </ul>

</aside>