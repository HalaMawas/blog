@extends('master')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Manage Article</h1>
            <a href="{{ route('article.create') }}" class="btn btn-success" style="float: right">Create New Article</a>
             @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
            <table class="table table-bordered">
                <thead>
                    <th width="80px">Id</th>
                    <th>Title</th>
                    <th width="150px">Action</th>
                </thead>
                <tbody>
                @foreach(Auth::user()->articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                   
                     <td>
                <form action="{{ route('article.destroy',$article->id) }}" method="POST" style="display: flex;">
   
                    <a class="btn btn-info" href="{{ route('article.show',$article->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('article.edit',$article->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
                </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection