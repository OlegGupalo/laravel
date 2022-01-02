<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block" style="color: #c2c7d0;" href="">
            {{Auth::user()->name}}
          </a>
        </div>
      </div>
  <!-- Sidebar -->
  <div class="sidebar">
      <ul class="nav nav-pills nav-sidebar flex-column pt-3" data-widget="treeview" role="menu" data-accordion="false">
         <li class="nav-item">
            <a href="{{route('personal.main.index')}}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Главная
              </p>
            </a>
          </li>
         <li class="nav-item">
            <a href="{{route('personal.like.index')}}" class="nav-link">
              <i class="nav-icon far fa-thumbs-up"></i>
              <p>
                Понравившиеся посты
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('personal.comment.index')}}" class="nav-link">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Комментарии
              </p>
            </a>
          </li>
        </ul>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>