@extends('admin.layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5><b>Редактирование поста</b></h5>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.main')}}">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.post.index')}}">Пользователи</a></li>
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
            <div class="row pt-3">
              <form action="{{ route('post.update', $post->id) }}" class="col-12" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group w-50">
                  <label for="title">Название</label>
                  <input type="text" name="title" class="form-control" placeholder="Название поста" value="{{$post->title}}">
                  @error('title')
                    <div class="text-danger mt-1">
                      Это поле необходимо для заполнения
                    </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="content">Статья</label>
                  <textarea id="summernote" name="content">{{$post->content}}</textarea>
                  @error('content')
                    <div class="text-danger mt-1">
                      Это поле необходимо для заполнения
                    </div>
                  @enderror
                </div>
                <div class="form-group w-50">
                  <div>
                    <img src="{{ url('storage/' . $post->preview_image)}}" alt="preview_image" class="w-75">
                  </div>
                    <label for="exampleInputFile">Обновить превью</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="preview_image">
                        <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Зазгрузить</span>
                      </div>
                   </div>
                   @error('preview_image')
                    <div class="text-danger mt-1">
                      Вам необходимо загрузить изображение
                    </div>
                  @enderror
                </div>
                <div class="form-group w-50">
                  <div>
                    <img src="{{ url('storage/' . $post->main_image)}}" alt="main_image" class="w-75">
                  </div>
                    <label for="exampleInputFile">Загрузка главного изображения</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="main_image">
                        <label class="custom-file-label" for="exampleInputFile">Выбирите файл</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Зазгрузить</span>
                      </div>
                    </div>
                </div>
                @error('main_image')
                <div class="text-danger mt-1">
                  Вам необходимо загрузить изображение
                </div>
              @enderror
              <div class="form-group w-25">
                  <label>Выберите категорию</label>
                  <select class="form-control" name="category_id">
                    @foreach($categories as $category)
                      <option value="{{$category->id}}"
                        {{$category->id ==old('category_id') ? 'selected' : ''}}
                        >{{$category->title}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group w-50">
                  <label>Multiple</label>
                  <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите тэги" style="width: 100%;">
                    @foreach($tags as $tag)
                    <option value="{{$tag->id}}"
                      {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray() ) ? " selected" : "" }}
                      >{{$tag->title}}
                    </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <button type="submit" class="mt-2 btn btn-primary">Обновить</button>
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