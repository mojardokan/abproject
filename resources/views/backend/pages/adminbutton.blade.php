
  <div class="row">

        <ul class="nav">
          <li class="nav-item p-2">
            <a href ="{{route('admin.carousels')}}" class="btn btn-primary btn-lg">Manage Carousel</a>
          </li>
          <li class="nav-item p-2">
            <a href ="{{route('admin.sliders')}}" class="btn btn-primary btn-lg">Manage Slider</a>
          </li>
          <li class="nav-item p-2">
            <a href ="{{route('admin.orders')}}" class="btn btn-primary btn-lg">Manage Order</a>
          </li>
          <li class="nav-item p-2">
            <a href ="{{route('admin.offers')}}" class="btn btn-primary btn-lg">Manage Offer</a>
          </li>
          <li class="nav-item p-2">
            <a href ="{{route('admin.brands')}}" class="btn btn-primary btn-lg">Manage Brand</a>
          </li>
          <li class="nav-item p-2">
            <a href ="{{route('admin.divisions')}}" class="btn btn-primary btn-lg">Manage Division</a>
          </li>
          <li class="nav-item p-2">
            <a href ="{{route('admin.districts')}}" class="btn btn-primary btn-lg">Manage District</a>
          </li>
          <li class="nav-item p-2">
            <a href ="{{route('admin.categories')}}" class="btn btn-primary btn-lg">Manage Category</a>
          </li>
          <li class="nav-item p-2">
            <a href ="{{route('admin.products')}}" class="btn btn-primary btn-lg">Manage Product</a>
          </li>
          <li class="nav-item p-2">
            <a href ="{{route('admin.addbanner1s')}}" class="btn btn-primary btn-lg">Manage Add Banner1</a>
          </li>
          <li class="nav-item p-2">
            <a href ="{{route('admin.banners')}}" class="btn btn-primary btn-lg">Manage Banner</a>
          </li>
        </ul>

  </div>

<hr>
  <div class="logoutbtn">
    <ul class="nav">
      <li class="nav-item p-2">
        <a href ="{!!route('index')!!}" class="btn btn-primary btn-lg float-left" target="_blank">Visit Main Site</a></li>
      <li class="nav-item float-right">
        <a class="nav-link "  href="">
          <form class="form-inline" action="{{ route('admin.logout')}}" method="post">
            @csrf
            <input type="submit" name="" value="Logout" class="btn btn-danger btn-lg">
          </form>
        </a>
      </li>
    </ul>
  </div>
