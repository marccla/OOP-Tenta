@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">                   
                    <img src="{{ Auth::user()->user_img }}" alt="user avatar" style="max-width: 100px;">
                    <h2 class="d-inline ml-lg-5 ml-3">Dashboard</h2>
                </div>
                
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Welcome {{ Auth::user()->name }}, 
                    you are logged in!
                    <ul class="d-flex mt-5">
                        <li class="mr-3">
                            <a href="/posts/add">Add/Edit Post</a>
                        </li>                       
                         <li>
                            <a href="/posts/">View the latest posts</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
