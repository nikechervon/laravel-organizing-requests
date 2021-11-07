@extends('layouts.master', ['title' => 'Детальная страница'])

@section('content')
    <h1>Просмотр заявки (<a href="/requests/{{ $request->id }}/edit">Редактировать</a>)</h1>
    <hr>

    @if (session()->has('success'))
        <div class="alert alert-success">
            <p>{{ session()->get('success') }}</p>
        </div>
        <hr>
    @endif

    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-3 col-form-label" style="font-size: 20px">ID</label>
        <div class="col-sm-9">
            <p class="form-control-plaintext" id="staticEmail">
                {{ $request->id }}
            </p>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-3 col-form-label" style="font-size: 20px">Название</label>
        <div class="col-sm-9">
            <p class="form-control-plaintext" id="staticEmail">
                {{ $request->title }}
            </p>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-3 col-form-label" style="font-size: 20px">Изображение</label>
        <div class="col-sm-9">
            <img src="{{ $imageURL }}" alt="image" width="200">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-3 col-form-label" style="font-size: 20px">Описание</label>
        <div class="col-sm-9">
            <p class="form-control-plaintext" id="staticEmail">
                {{ $request->content }}
            </p>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-3 col-form-label" style="font-size: 20px">Статус</label>
        <div class="col-sm-9">
            <p class="form-control-plaintext" style="color: #006eff; font-weight: bold" id="staticEmail">
                {{ $request->status->name }}
            </p>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-3 col-form-label" style="font-size: 20px">Дата создания</label>
        <div class="col-sm-9">
            <p class="form-control-plaintext" id="staticEmail">
                {{ $request->created_at->format('Y-m-d') }}
            </p>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-3 col-form-label" style="font-size: 20px">Дата завершения</label>
        <div class="col-sm-9">
            <p class="form-control-plaintext" id="staticEmail">
                {{ $request->completion_at }}
            </p>
        </div>
    </div>
@endsection
