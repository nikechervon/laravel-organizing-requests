@extends('layouts.master', ['title' => 'Редактирование заявки'])

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

    <form action="/requests/{{ $request->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3 row">
            <label for="title" class="col-sm-2 col-form-label">Название</label>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="title"
                       value="{{ old('title', $request->title) }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="image" class="col-sm-2 col-form-label">Изображение</label>
            <div class="col-sm-10">
                <img src="{{ $imageURL }}" alt="image" width="200">
                <br>
                <input type="file" name="image" class="form-control" id="image">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="content" class="col-sm-2 col-form-label">Описание</label>
            <div class="col-sm-10">
                <textarea name="content" id="content" rows="10"
                          class="form-control">{{ old('content', $request->content) }}</textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="date" class="col-sm-2 col-form-label">Дата завершения</label>
            <div class="col-sm-10">
                <input type="date" name="completion_at" class="form-control" id="date"
                       value="{{ old('completion_at', $request->completion_at) }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="status" class="col-sm-2 col-form-label">Статус</label>
            <div class="col-sm-10">
                <select class="form-control" name="status_id" id="status">
                    @foreach($statuses as $status)
                        <option
                            value="{{ $status->id }}" {{ $status->id === old('status_id', $request->status->id) ? 'selected' : '' }}>{{ $status->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row" style="float: right">
            <button style="width: 200px;" type="submit" class="btn btn-primary">Создать заявку</button>
        </div>
    </form>
@endsection
