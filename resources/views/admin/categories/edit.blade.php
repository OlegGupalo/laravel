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
              <li class="breadcrumb-item"><a href="{{route('admin.category.index')}}">Категории</a></li>
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
            <h5><b>Редактирование категории</b></h5>
            <div class="row pt-3">
              <form action="{{route('category.update', $category->id)}}" method="POST" class="col-4">
                @csrf
                @method('PATCH')
                <div class="form-group">
                  <input type="text" name="title" class="form-control" placeholder="Название категории" value="{{$category->title}}">
                  @error('title')
                    <div class="text-danger mt-1">
                      Это поле необходимо для заполнения
                    </div>
                  @enderror
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