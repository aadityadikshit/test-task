@extends('main')
@section('title', 'Home')
@section('content')
<div class="dashboard-top-section">
    <a href="{{url('/addpost')}}">Add New</a>
    <a href="{{url('/logout')}}">Logout</a>
</div>

<div class="dashboard-main-contents">
<table id="posts-data">
    <thead>
        <tr>
            <th>Post Title</th>
            <th>Post Body</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $value)
            <tr data-value="{{$value['id']}}">
                <td data-value="{{$value['id']}}">{{$value['post_title']}}</td>
                <td data-value="{{$value['id']}}">{{$value['post_body']}}</td>
                <td data-value="{{$value['id']}}" class="edit-post"><a href="{{url('/editpost')}}/{{$value['id']}}">Edit</a></td>
                <td data-value="{{$value['id']}}" class="delete-post">Delete</td>
            </tr>
        @endforeach
    </tbody>   
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">     
</table>
<div id="messages"></div>
</div>
@endsection
