@extends('admin.master')

@section('title', 'Courses | ' . env('APP_NAME'))

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">All Courses</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>btn_text</th>
            <th>btn_link</th>
           {{-- <th>Registrations</th> --}}
            <th>Teachers</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($courses as $course)

        <tr>
            <td>{{ $course->id}}</td>
            <td><img width="80" src="{{ asset('uploads/courses/'.$course->image) }}" alt=""></td>
            <td>{{ $course->title}}</td>
            <td>{{ $course->description}}</td>
            <td>{{ $course->btn_text}}</td>
            <td>{{ $course->btn_link}}</td>

            <td>{{$course->teacher->name}}</td>
            <td>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.courses.edit', $course->id) }}"><i class="fas fa-edit"></i></a>
                <form class="d-inline" action="{{ route('admin.courses.destroy', $course->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
  <div style="height: 100px;width:100%">{{ $courses->links() }} </div>
@stop
