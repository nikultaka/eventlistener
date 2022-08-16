<?php $routeName = Request::route()->getName(); ?>
<div class="sidebar-menu">
    <div class="sidebar-menu-inner">

        <header class="logo-env">

            <!-- logo -->
            <div class="logo">
                <a href="javascript:void(0);">
                    <img src="{{ asset('assets/admin/theme/images/logo.png') }}" width="10%" alt="Pyrium" />
                    &nbsp;<b>Pyrium</b>
                </a>
            </div>

            <!-- logo collapse icon -->
            <div class="sidebar-collapse">
                <a href="#" class="sidebar-collapse-icon">
                    <!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                    <i class="entypo-menu"></i>
                </a>
            </div>


            <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
            <div class="sidebar-mobile-menu visible-xs">
                <a href="#" class="with-animation">
                    <!-- add class "with-animation" to support animation -->
                    <i class="entypo-menu"></i>
                </a>
            </div>
        </header>

        <ul id="main-menu" class="main-menu">
            <!-- add class "multiple-expanded" to allow multiple submenus to open -->
            <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
            <li class="<?php echo $routeName == 'admin-dashboard' ? 'active' : ''; ?>">
                <a href="{{ route('admin-dashboard') }}"> <i class="entypo-gauge"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="<?php echo $routeName == 'admin-manage-users' ? 'active' : ''; ?>">
                <a href="{{ route('admin-manage-users') }}"> <i class="entypo-users"></i>
                    <span class="title">User Management</span>
                </a>
            </li>
            <li class="<?php echo $routeName == 'admin-role' ? 'active' : ''; ?>">
                <a href="{{ route('admin-role') }}"> <i class="entypo-layout"></i>
                    <span class="title">Role Management</span>
                </a>
            </li>
            <li class="<?php echo $routeName == 'admin-role' ? 'active' : ''; ?>">
                <a href="{{ route('admin-category') }}"> <i class="entypo-menu"></i>
                    <span class="title">Category</span>
                </a>
            </li>
            <li class="<?php echo $routeName == 'admin-role' ? 'active' : ''; ?>">
                <a href="{{ route('admin-subcategory') }}"> <i class="entypo-list-add"></i>
                    <span class="title">Sub Category</span>
                </a>
            </li>
            <!-- <li class="
            <?php //echo $routeName == 'admin-role' ? 'active' : ''; ?>
            ">
                <a href="{{ route('admin-feedwall') }}"> <i class="entypo-home"></i>
                    <span class="title">Feed Wall</span>
                </a>
            </li> -->
            <li class="<?php echo $routeName == 'admin-role' ? 'active' : ''; ?>">
                <a href="{{ route('admin-story') }}"> <i class="entypo-feather"></i>
                    <span class="title">Stories</span>
                </a>
            </li>
            <li class="<?php echo $routeName == 'admin-role' ? 'active' : ''; ?>">
                <a href="{{ route('admin-industries') }}"> <i class="entypo-chart-pie"></i>
                    <span class="title">Company</span>
                </a>
            </li>
            <li class="<?php echo $routeName == 'admin-role' ? 'active' : ''; ?>">
                <a href="{{ route('admin-discover') }}"> <i class="entypo-rocket"></i>
                    <span class="title">Discover</span>
                </a>
            </li>
            <li class="<?php echo $routeName == 'admin-role' ? 'active' : ''; ?>">
                <a href="{{ route('admin-communitytopics') }}"> <i class="entypo-book-open"></i>
                    <span class="title">Community Topics</span>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)" onclick="logout();"> <i class="entypo-logout right"></i>
                    <span class="title">Log Out</span>
                    <form id="logout-form" action="{{ route('logout-admin') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </a>
            </li>
        </ul>

    </div>

</div>
<script>
    // $(".swal2-container.in").css('background-color', 'rgba(43, 165, 137, 0.45)');//changes the color of the overlay
    function logout() {
        Swal.fire({
            title: 'Are you sure?',
            text: "Do you really want to logout?",
            icon: 'warning',
            showCancelButton: true,
            background: '#d33',
            confirmButtonColor: '#2778c4',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes,log me out!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("logout-form").submit()
            }
        })
    }
</script>