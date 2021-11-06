@extends('layouts.master', ['title' => 'Список заявок'])

@php
    function setParam(string $name): string {
        if (isset($_GET[$name]) && $_GET[$name] === 'asc') {
            return $name . '=desc';
        }

        return $name . '=asc';
    }
@endphp

@section('content')
    @if($requests->isEmpty())
        Заявок нет!
    @else
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col"><a href="?{{ setParam('title') }}">Название</a></th>
                <th scope="col"><a href="?{{ setParam('created_at') }}">Дата создания</a></th>
                <th scope="col"><a href="?{{ setParam('completion_at') }}">Дата завершения</a></th>
                <th scope="col"><a href="?{{ setParam('status') }}">Статус</a></th>
            </tr>
            </thead>
            <tbody>
            @foreach($requests as $request)
                <tr>
                    <th scope="row">{{ $request->id }}</th>
                    <td>{{ $request->title }}</td>
                    <td>{{ $request->created_at->format('Y-m-d') }}</td>
                    <td>{{ $request->completion_at }}</td>
                    <td>{{ $request->status->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
    @include('layouts.pagination', ['paginator' => $requests])
@endsection
