<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('admin.index')) active @endif" aria-current="page" href="{{ route('admin.index')}}">
            <span data-feather="home"></span>
            Главная
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('admin.violets.*')) active @endif" href="{{ route('admin.violets.index')}}">
            <span data-feather="file"></span>
            Фиалки
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('admin.selectioners.*')) active @endif" href="{{ route('admin.selectioners.index')}}">
            <span data-feather="list"></span>
            Селекционеры
          </a>
        </li>
        
      </ul>

      
    </div>
  </nav>