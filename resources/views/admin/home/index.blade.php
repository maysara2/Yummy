@extends('admin.master')

@php
    $title = 'title_'.app()->currentLocale();
@endphp
@php
$content = 'content_'.app()->currentLocale();
@endphp
@section('title', 'Home|'.env('APP_NAME'))
@section('content')



<h1>Home</h1>

@if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('msg') }}
    </div>
@endif

<table class="table table-bordered m-5 ">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
            <tbody>
                <tr>
                    @foreach ($home as $home )


                    <td>{{ $home->id }}</td>
                    <td>{{ $home->$title }}</td>
                    <td>{{ $home->$content }}</td>
                    <td><img width="80" src="{{ asset('uploads/Home/'.$home->image) }}" alt=""></td>
                    <td>
                        <form class="d-inline" action="{{ route('admin.home.destroy', $home->id) }}" method="POST">
                            @csrf
                            @method('delete')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                    @endforeach
                </tr>
            </tbody>
        </table>

@stop
