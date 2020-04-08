@extends('layouts.app')

@section('content')
<section>
    <main>
        <div class="jumbotron jumbotron-fluid mt-5">
            <div class="container">
              <h1 class="">Welcome to Derppit</h1>
              <p class="lead">Here we discuss everything and nothing.</p>
            </div>
          </div>
          <div class="container">
              <div class="row">
                  <h2>Choose a subject</h2>
                  <div class="col-12 col-lg-12 col-md-12">
                  @foreach ($cats as $cat)
                      
                      <a href="/cats/{{ $cat->slug }}"><span>{{ $cat->cat_item }}</span></a>
                      
                  @endforeach
                </div>
              </div>
          </div>

    </main>
</section>
@endsection