{{-- Sidebar --}}
<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar"
    style="background-color: rgb(255, 128, 0);">

    {{-- Sidebar - Brand --}}
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        {{--            <div class="sidebar-brand-icon rotate-n-15">--}}
        {{--                <i class="fas fa-laugh-wink"></i>--}}
        {{--            </div>--}}
        <div class="sidebar-brand-text mx-3">powerhouse</div>
    </a>

    {{-- Divider --}}
    <hr class="sidebar-divider my-0">

    {{-- Nav Item - Dashboard --}}
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    {{-- Divider --}}
    <hr class="sidebar-divider">

    {{-- Heading --}}
    <div class="sidebar-heading">
        Interface
    </div>

    {{-- Nav Item - News Menu --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#news" aria-expanded="true"
            aria-controls="news">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>News</span>
        </a>
        <div id="news" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.news.index')}}">index</a>
                <a class="collapse-item" href="{{route('admin.news.create')}}">create</a>
            </div>
        </div>
    </li>

    {{-- Nav Item - Slider Menu --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#slider" aria-expanded="true"
            aria-controls="slider">
            <i class="fas fa-fw fa-sliders-h"></i>
            <span>Slider</span>
        </a>
        <div id="slider" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('admin.sliders.index')}}">index</a>
                <a class="collapse-item" href="{{route('admin.sliders.create')}}">create</a>
            </div>
        </div>
    </li>

    {{-- Nav Item - Products Menu --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#product" aria-expanded="false"
            aria-controls="product">
            <i class="fab fa-product-hunt"></i>
            <span>Product</span>
        </a>
        <div id="product" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class=" py-2 collapse-inner rounded" style="background-color: rgba(255, 172, 32, 1)">

                <ul id="sidebar" class="sidebar_position">
                    <a class="nav-link collapsed sidebar_width" href="#" data-toggle="collapse" data-target="#category"
                        aria-expanded="false" aria-controls="category">
                        <span style="font-size:100%">categories</span>
                    </a>
                </ul>
                <div id="category" class="collapse" aria-labelledby="headingUtilities" data-parent="#sidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item text-black" href="{{route('admin.category.index')}}">index</a>
                        <a class="collapse-item text-black" href="{{route('admin.category.create')}}">create</a>
                    </div>
                </div>
                <ul id="sidebar2" class="sidebar_position">
                    <a class="nav-link collapsed sidebar_width" href="#" data-toggle="collapse" data-target="#comment"
                        aria-expanded="false" aria-controls="comment">
                        <span style="font-size:100%">comments</span>
                    </a>
                </ul>
                <div id="comment" class="collapse" aria-labelledby="headingUtilities" data-parent="#sidebar2">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item text-black" href="{{route('admin.product.comment.index')}}">index</a>
                    </div>
                </div>
                <a class="collapse-item" href="{{route('admin.products.index')}}">index</a>
                <a class="collapse-item" href="{{route('admin.products.create')}}">create</a>

            </div>
        </div>



    </li>

    {{-- Divider --}}
    <hr class="sidebar-divider d-none d-md-block">

    {{-- Sidebar Toggler (Sidebar) --}}
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
{{-- End of Sidebar --}}
