@extends('admin.layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.main')}}">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">Пользователи</a></li>
              <li class="breadcrumb-item active">Редактирование</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
            <h5><b>Редактирование пользователя</b></h5>
            <div class="row pt-3">
              <form action="{{route('user.update', $user->id)}}" method="POST" class="col-4">
                @csrf
                @method('PATCH')
                <div class="form-group">
                  <label>Имя</label>
                  <input type="text" name="name" class="form-control" placeholder="Имя пользователя" value="{{$user->name}}">
                  @error('title')
                    <div class="text-danger mt-1">
                      Это поле необходимо для заполнения
                    </div>
                  @enderror
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Почта" value="{{$user->email}}"> 
                  @error('email')
                    <div class="text-danger mt-1">
                      Это поле необходимо для заполнения
                    </div>
                  @enderror
                  <label>Роль</label>
                  <select class="form-control" name="role">
                    @foreach($roles as $id => $role)
                      <option value="{{$id}}"
                        {{$id == $user->role ? 'selected' : ''}}
                        >{{$role}}</option>
                    @endforeach
                  </select>
                  <input type="hidden" name="user_id" value="{{ $user->id }}">
                  <button type="submit" class=" mt-2 btn btn-primary">Обновить</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection