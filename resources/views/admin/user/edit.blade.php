@extends('admin.layouts.main')


@section('content')

    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">

            <div class="container-fluid">

                <div class="row mb-2">

                    <div class="col-sm-6">

                        <h1 class="m-0">{{__('Редактирование пользователя')}}</h1>

                    </div><!-- /.col -->

                    <div class="col-sm-6">

                        <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item"><a href="#">{{__('Админ')}}</a></li>

                            <li class="breadcrumb-item active">{{__('Редактирование пользователя')}}</li>

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

                        <form action="{{route('admin.user.update', $user->id)}}" class="w-25" method="POST">

                            @csrf
                            @method('patch')

                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input type="text" name="name" class="form-control" placeholder="Введите имя пользователя" value="{{$user->name}}">

                                @error('name')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Введите email пользователя" value="{{$user->email}}">

                                @error('email')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-success mt-3 mr-3" value="Обновить">

                                <a href="{{route('admin.user.index')}}" class="btn btn-primary mt-3">Назад</a>
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
