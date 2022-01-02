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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Создание пользователя</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('user.store') }}" method="POST" class="col-4">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Имя</label>
              <input type="text" name="name" class="form-control" placeholder="Имя">
              @error('name')
                <div class="text-danger mt-1">
                  {{$message}}
                </div>
              @enderror
              <label for="exampleInputEmail1">Почта</label>
              <input type="email" name="email" class="form-control" placeholder="Почта">
              @error('email')
                <div class="text-danger mt-1">
                  {{$message}}
                </div>
              @enderror
              
                <label>Выберите роль</label>
                <select class="form-control" name="role">
                  @foreach($roles as $id => $role)
                    <option value="{{$id}}"
                      {{$id == old ('role') ? 'selected' : ''}}
                      >{{$role}}</option>
                  @endforeach
                </select>
            </div>
            <input type="submit" class=" mt-2 btn btn-primary" value="Добавить">
          </div>
          <!-- /.card-body -->
        </form>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection