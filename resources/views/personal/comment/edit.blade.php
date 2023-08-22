@extends('personal.layouts.main')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Комментарии</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="{{route('personal.main.index')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Комментарии</li>
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
                    <form action="{{route('personal.comment.update', $comment->id)}}" class="w-50" method="POST">

                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <textarea name="message" class="form-control" id="message"  placeholder="Введите сообщение">{{$comment->message}}</textarea>

                            @error('message')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror

                            <input type="submit" class="btn btn-success mt-3 mr-3" value="Обновить">

                            <a href="{{route('personal.comment.index')}}" class="btn btn-primary mt-3">Назад</a>
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
