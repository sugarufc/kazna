@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="card m-2">
        <div class="card-header">
            <h3 class="card-title">Редактирование отдела</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{ route('otdel.update', $otdel->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="f_name">Полное наименование отдела</label>
                    <input type="text" class="form-control @error('f_name') is-invalid @enderror" id="exampleInputEmail1" name="f_name" value="{{ $otdel->f_name }}" placeholder="Полное наименование отдела">
                    @error('f_name')
                    <label class="col-form-label text-danger" for="inputError"><i class="far fa-times-circle"></i> {{ $message }}</label>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="s_name">Сокращенное наименование отдела</label>
                    <input type="text" class="form-control @error('s_name') is-invalid @enderror" id="exampleInputEmail1" name="s_name" value="{{ $otdel->s_name }}" placeholder="Сокращенное наименование отдела">
                    @error('s_name')
                    <label class="col-form-label text-danger" for="inputError"><i class="far fa-times-circle"></i> {{ $message }}</label>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sort">Сортировка</label>
                    <input type="text" class="form-control @error('sort') is-invalid @enderror" id="exampleInputEmail1" name="sort" value="{{ $otdel->sort }}"  placeholder="500">
                    @error('sort')
                    <label class="col-form-label text-danger" for="inputError"><i class="far fa-times-circle"></i> {{ $message }}</label>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="parent_id">Отдел</label>
                    <select name="parent_id" id="parent_id" class="custom-select">
                        <option value="0">УФК</option>
                        <option value="1" @php if($otdel->parent_id){ echo 'selected';}@endphp>ТОФК</option>
                    </select>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
    <!-- /.content -->
@endsection

