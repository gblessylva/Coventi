<div class="container-fluid" >
    <div class="row flex-nowrap" >
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0" id="sidebar-container">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2  min-vh-100" >

                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                     <li class='coventi-lists'>
                        <a href="/user-dashboard" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-house-door"></i> <span class="ms-1 d-none d-sm-inline">Home</span></a>
                    </li>

                    <li class='coventi-lists'>
                        <a href="/user-dashboard/past-events" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-calendar4-event"></i> <span class="ms-1 d-none d-sm-inline">Events</span></a>
                    </li>
                    
                    <li class='coventi-lists'>
                        <a href="/user-dashboard/profile" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-person"></i> <span class="ms-1 d-none d-sm-inline">Profile</span></a>
                    </li>
                <li class='coventi-lists logout'>
                    <a class="d-flex align-items-center text-decoration-none " href="<?php echo wp_logout_url( home_url('/login') ); ?>">
                    <i class="fs-4 bi-box-arrow-right"></i> <span class="ms-1 d-none d-sm-inline">Logout</span></a>
                </li>
                </ul>
        
               
                
                
            </div>
</div>