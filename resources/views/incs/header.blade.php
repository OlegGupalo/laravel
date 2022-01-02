<header class="py-3 shadow-sm p-3 mb-5 bg-white rounded header">
  <ul class="nav nav-pills d-flex justify-content-between">
    <li class="nav-item">
      @include('incs.sidebar')
    </li>
    <!-- <li class="nav-item"><a href="{{route('home')}}" class="nav-link active" aria-current="page">Главная</a></li>
    <li class="nav-item"><a href="{{route('about')}}" class="nav-link">Публикация</a></li>
    <li class="nav-item"><a href="{{route('contact')}}" class="nav-link">Контакты</a></li> --><!-- 
    <li class="nav-item"><a href="{{route('article-data')}}" class="nav-link">Статьи</a></li> -->
    @guest('web')
    <li class="nav-item"><a href="{{route('login')}}" class="nav-link">Войти</a></li>
    @endguest
    @auth('web')
    <li class="nav-item"><a href="{{route('logout')}}" class="nav-link">Выйти</a></li>
    @endauth
  </ul>
</header>