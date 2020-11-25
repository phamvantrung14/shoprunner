<?php
    $user = Auth::user();
?>
<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="{{route("admin.dashboard")}}"  aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                    </li>
                    @if($user->can("admin.product.index"))
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fab fa-fw fa-wpforms"></i>Products Manager</a>
                        <div id="submenu-2" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route("admin.product.index")}}">List Products <span class="badge badge-secondary">List Products</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route("admin.product.add")}}">Add New</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    @endif
                    @if($user->can("admin.categories.index"))
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("admin.categories.index")}}"  aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>Categories</a>
                    </li>
                    @endif
                    @if($user->can("admin.brand.index"))
                    <li class="nav-item ">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Brands Manager</a>
                        <div id="submenu-4" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route("admin.brand.index")}}">List brand</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    @endif
                    @if($user->can("admin.store.index"))
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>Store Manager</a>
                        <div id="submenu-5" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route("admin.store.index")}}">List Store</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route("admin.store.add")}}">Add Store New</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    @if($user->can("admin.area.index"))
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-map-marker-alt"></i>Place Manager</a>
                        <div id="submenu-6" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route("admin.area.index")}}">Area/Country</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route("admin.city.index")}}">City</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    @if($user->can("admin.arrtb-vl.index"))
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fas fa-fw fa-table"></i>Arrtibutes Value Manager</a>
                        <div id="submenu-7" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route("admin.arrtb-vl.index")}}">Arrtibutes Value</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    @if($user->can("admin.account.admin"))
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-8" aria-controls="submenu-7"><i class="fas fa-address-card"></i>Accounts Manager</a>
                        <div id="submenu-8" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route("admin.account.admin")}}">List's Account Admin</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route("admin.accustomer")}}">List's Account Customers</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    @if($user->can("admin.orders"))
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-7"><i class=" fas fa-cart-arrow-down"></i>Orders</a>
                        <div id="submenu-9" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route("admin.orders")}}">List's Orders</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    @if($user->can("admin.slide"))
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-10" aria-controls="submenu-7"><i class=" fas fa-images"></i>Slides</a>
                        <div id="submenu-10" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route("admin.slide")}}">List's Slides</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route("admin.slide.add")}}">Add New Slides</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    @if($user->can("admin.new.index"))
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-11" aria-controls="submenu-7"><i class=" fas fa-newspaper"></i>News Manager</a>
                            <div id="submenu-11" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route("admin.new.index")}}">List's News</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route("admin.new.create")}}">Add News</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if($user->can("admin.roles.index"))
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-12" aria-controls="submenu-7"><i class="fas fa-th"></i>Permission Manager</a>
                            <div id="submenu-12" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route("admin.roles.index")}}">List's Permissions</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if($user->can("admin.endow.index"))
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-13" aria-controls="submenu-7"><i class="fas fa-eject"></i>Endow Manager</a>
                            <div id="submenu-13" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route("admin.endow.index")}}">List's Endow</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</div>
