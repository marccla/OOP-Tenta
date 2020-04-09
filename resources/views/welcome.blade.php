@extends('layouts.app')

@section('content')

    <main>
        <div class="jumbotron jumbotron-fluid mt-5">
            <div class="container">
              <h1 class="">Welcome to The Wall</h1>
              <p class="lead">Here we discuss everything and nothing.</p>
            </div>
          </div>
          <div class="container">
              <div class="row">
                  
                  <div class="col-12 col-lg-12 col-md-12">
                    <h2>Choose a subject</h2>
                    <nav class="navbar">
                      <ul class="">
                       <li class="mr-5">
                         <a href="/posts/">All posts in all categories</a>
                       </li>
                       @foreach ($cats as $cat)
                       <li class="mr-5">
                         <a href="/cats/{{ $cat->slug }}">{{ $cat->cat_item }}</a>  
                       </li>
                        @endforeach
                      </ul>
                    </nav>
                  </div>
              </div> <!-- row ends -->
           </div> <!-- container ends -->
    </main>

@endsection