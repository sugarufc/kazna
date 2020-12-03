@extends('admin.layouts.layout')

@section('content')
    @if(session()->has('success'))
        <div class="container">
            <div class="row">
                <div class="col-md-6 pt-3 m-auto">
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i>{{session('success')}}</h5>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-2">
                        <div class="card-header">
                            <h3 class="card-title"><strong>{{ $otdel->f_name  }} ФК по РД</strong></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if(count($workers))
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ФИО</th>
                                    <th>Должность</th>
                                    <th>ВТС</th>
                                    <th>ГТС</th>
                                    <th>Отдел</th>
                                    <th>Каб №</th>
                                    <th>Sort</th>
                                    <th>Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 1
                                @endphp
                                @foreach($workers as $worker)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td><a href="{{ route('worker.edit', $worker->id) }}">{{ $worker->name }}</a></td>
                                        <td>{{ $worker->special }}</td>
                                        <td>{{ $worker->vts }}</td>
                                        <td>{{ $worker->gts }}</td>
                                        <td class="text-uppercase">{{ $worker->otdel->s_name }}</td>
                                        <td>{{ $worker->kab }}</td>
                                        <td>{{ $worker->sort }}</td>
                                        <td>
                                            <a href="{{ route('worker.edit', $worker->id) }}" class="btn btn-info btn-sm float-left mr-1"><i class="fas fa-pencil-alt"></i></a>
                                            <form action="{{ route('worker.destroy', $worker->id) }}" method="post" class="float-left">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Подтвердите удаление')"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php
                                        $i++
                                    @endphp
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>ФИО</th>
                                    <th>Должность</th>
                                    <th>ВТС</th>
                                    <th>ГТС</th>
                                    <th>Отдел</th>
                                    <th>Каб №</th>
                                    <th>Sort</th>
                                    <th>Действие</th>
                                </tr>
                                </tfoot>
                            </table>
                            @else
                                <div class="col-md-2">
                                    <p>Список сотрудников пуст...</p>
                                    <a href="{{ route('worker.create') }}">
                                        <button type="button" class="btn btn-block bg-gradient-primary">Добавить сотрудника</button>
                                    </a>
                                </div>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
@endsection
