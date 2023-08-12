@extends('admin.layouts.main')


@section('content')

    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">

            <div class="container-fluid">

                <div class="row mb-2">

                    <div class="col-sm-6 d-flex align-items-center">

                        <h1 class="m-0 mr-2">{{$post->title}}</h1>

                        <a href="{{route('admin.post.edit', $post->id)}}" class="text-success mr-2">

                            <i class="fas fa-pencil-alt"></i>

                        </a>

                        <form action="{{route('admin.post.delete', $post->id)}}" method="POST">

                            @csrf
                            @method('delete')

                            <button type="submit" class="border-0">

                                <i class="fas fa-trash text-danger" role="button"></i>

                            </button>

                        </form>

                    </div><!-- /.col -->

                    <div class="col-sm-6">

                        <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item"><a href="#">{{__('Админ')}}</a></li>

                            <li class="breadcrumb-item active">{{__('Просмотр поста')}}</li>

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

                    <div class="col-2">

                        <a href="{{route('admin.post.index')}}" class="btn btn-block btn-primary mb-3">Назад</a>

                    </div>

                </div>

                <div class="row">

                    <div class="col-6">

                        <div class="card">

                            <div class="card-body table-responsive p-0">

                                <table class="table table-hover text-nowrap">

                                    <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{$post->id}}</td>

                                    </tr>

                                    <tr>
                                        <td>Название</td>
                                        <td>{{$post->title}}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>

                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->

        </section>
        <!-- /.content -->

    </div>

@endsection
