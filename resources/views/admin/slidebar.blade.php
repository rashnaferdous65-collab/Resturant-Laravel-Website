<div class="d-flex align-items-stretch">

    <!-- Sidebar Start -->
    <nav id="sidebar">

        <!-- Profile -->
        <div class="sidebar-header">
            <div class="d-flex align-items-center">
                <div class="avatar">
                    <img src="{{ asset('admin_css/img/avatar-6.jpg') }}"
                         alt="Profile"
                         class="img-fluid rounded-circle">
                </div>

                <div class="title ml-3">
                    <h1 class="h5 mb-1">Mark Stephen</h1>
                    <p class="mb-0">Web Designer</p>
                </div>
            </div>
        </div>

        <span class="heading">Main</span>

        <ul class="list-unstyled">

            <li class="active">
                <a href="{{ url('admin/dashboard') }}">
                    <i class="icon-home"></i>
                    <span>Home</span>
                </a>
            </li>

            <li>
                <a href="{{ url('category') }}">
                    <i class="icon-grid"></i>
                    <span>Food Category</span>
                </a>
            </li>

            <li>
                <a href="#foodMenu"
                   data-toggle="collapse"
                   aria-expanded="false">
                    <i class="icon-windows"></i>
                    <span>Food</span>
                </a>

                <ul id="foodMenu" class="collapse list-unstyled">
                    <li>
                        <a href="{{ url('add_food') }}">Add Food Details</a>
                    </li>
                    <li>
                        <a href="{{ url('view_food') }}">View Food Details</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{ url('view_order') }}">
                    <i class="icon-user"></i>
                    <span>View Order</span>
                </a>
            </li>

            <li>
                <a href="{{ url('reservation') }}">
                    <i class="icon-user"></i>
                    <span>View Reservation</span>
                </a>
            </li>

        </ul>

    </nav>
    <!-- Sidebar End -->

</div>