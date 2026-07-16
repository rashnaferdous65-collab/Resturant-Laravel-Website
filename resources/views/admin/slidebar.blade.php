 <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="{{asset('admin_css/img/avatar-6.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Mark Stephen</h1>
            <p>Web Designer</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class="active"><a href="{{url('admin/dashboard')}}"> <i class="icon-home"></i>Home </a></li>
                <li class=""><a href="{{url('category')}}"> <i class="icon-grid"></i>Food Category </a></li>
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Food</a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{url('add_food')}}">Add Food Details</a></li>
                    <li><a href="{{url('view_food')}}">View Food Detalis</a></li>
                   
                  </ul>
                </li>
                <li class=""><a href="{{url('view_order')}}"> <i class="icon-user"></i>View Order </a></li>
                  <li class=""><a href="{{url('reservation')}}"> <i class="icon-user"></i>View Reservation </a></li>
           
           
        </ul>
      </nav>
      <!-- Sidebar Navigation end-->