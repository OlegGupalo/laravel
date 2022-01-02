<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="{{route('home')}}">Главная</a>
  <a href="{{route('about')}}">Публикация</a>
  <a href="{{route('article-data')}}">Статьи</a>
  <a href="{{route('contact')}}">Контакты</a>
</div>

<!-- Use any element to open the sidenav -->
<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
</div>
<script>
  function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>