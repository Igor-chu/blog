@extends('admin.layouts.main')


@section('content')

    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">

            <div class="container-fluid">

                <div class="row mb-2">

                    <div class="col-sm-6">

                        <h1 class="m-0">{{__('Добавление поста')}}</h1>

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

            <div class="container-fluid">

                <!-- Small boxes (Stat box) -->
                <div class="row">

                    <div class="col-12">

                        <form action="{{route('admin.post.store')}}" class="w-75" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group">
                                <input type="text" name="title" class="form-control" placeholder="Введите название поста" value="{{old('title')}}">

                                @error('title')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                @enderror

                                <div class="form-group mt-3">

                                    <textarea id="summernote" name="content" class="form-control">{{old('content')}}</textarea>

                                    @error('content')
                                        <div class="text-danger m-0">
                                            {{$message}}
                                        </div>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Добавить превью</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="preview_image" class="custom-file-input" value="{{old('preview_image')}}">
                                            <label class="custom-file-label">Выберите изображение</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Загрузка</span>
                                        </div>
                                    </div>
                                    @error('preview_image')
                                    <div class="text-danger m-0">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Добавить главное изображение</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="main_image" class="custom-file-input" value="{{old('main_image')}}">
                                            <label class="custom-file-label">Выберите изображение</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Загрузка</span>
                                        </div>
                                    </div>
                                    @error('main_image')
                                    <div class="text-danger m-0">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    {{old('category_id')}}
                                    <label>Выберите категорию</label>
                                    <select name="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            <option
                                                {{(old('category_id') == $category->id ) ? 'selected' : ''}}

                                                value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                    <div class="text-danger m-0">
                                        {{$message}}
                                    </div>
                                    @enderror

                                </div>

                                <div class="form-group">

                                    <input type="submit" class="btn btn-success mt-3 mr-3" value="Добавить">

                                    <a href="{{route('admin.post.index')}}" class="btn btn-primary mt-3">Назад</a>

                                </div>

                            </div>

                        </form>


                    </div>

                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->

        </section>
        <!-- /.content -->

    </div>

@endsection
