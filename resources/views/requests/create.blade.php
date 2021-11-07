@extends('layouts.master', ['title' => 'Новая заявка'])

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/requests" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
            <label for="title" class="col-sm-2 col-form-label">Название</label>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="image" class="col-sm-2 col-form-label">Изображение</label>
            <div class="col-sm-10">
                <input type="file" name="image" class="form-control" id="image">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="content" class="col-sm-2 col-form-label">Описание</label>
            <div class="col-sm-10">
                <textarea name="content" id="content" rows="10" class="form-control">{{ old('content') }}</textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="date" class="col-sm-2 col-form-label">Дата завершения</label>
            <div class="col-sm-10">
                <input type="date" name="date" class="form-control" id="date" value="{{ old('date') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="status" class="col-sm-2 col-form-label">Статус</label>
            <div class="col-sm-10">
                <select class="form-control" name="status" id="status">
                    @foreach($statuses as $status)
                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row" style="float: right">
            <button style="width: 200px;" type="submit" class="btn btn-primary">Создать заявку</button>
        </div>
    </form>
@endsection
