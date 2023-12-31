@extends('admin.layouts.main')


@section('content')

    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">

            <div class="container-fluid">

                <div class="row mb-2">

                    <div class="col-sm-6">

                        <h1 class="m-0">{{__('Добавление пользователя')}}</h1>

                    </div><!-- /.col -->

                    <div class="col-sm-6">

                        <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>

                            <li class="breadcrumb-item active"><a href="{{route('admin.user.index')}}">Пользователи</a></li>

                            <li class="breadcrumb-item active">Добавление пользователя</li>

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

                        <form action="{{route('admin.user.store')}}" class="w-25" method="POST">

                            @csrf

                            <div class="form-group">
                                <label for="name">Имя</label>

                                <input type="text" name="name" class="form-control" placeholder="Введите имя пользователя" value="{{old('name')}}">
                                @error('name')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Введите email пользователя" value="{{old('email')}}">

                                @error('email')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Выберите роль пользователя</label>
                                <select name="role" class="form-control">
                                    @foreach($roles as $id => $role)
                                        <option

                                            {{$id == old('role') ? 'selected' : ''}}
                                            value="{{$id}}">{{$role}}</option>

                                    @endforeach
                                </select>

                                @error('role')
                                <div class="text-danger m-0">
                                    {{$message}}
                                </div>
                                @enderror

                            </div>

                            <div class="form-group">

                                <input type="submit" class="btn btn-success mt-3 mr-3" value="Добавить">

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
