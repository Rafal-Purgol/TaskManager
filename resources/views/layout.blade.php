@section('header')
    

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Task Manager') }}</title>
        {{-- bootstrap CSS --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
    </head>
</html>
<html>
    <body>
        
        {{-- Navbar --}}
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
              <a class="navbar-brand" href="#">{{ config('app.name', 'Task Manager') }}</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link btn btn-dark"  href="{{route('index')}}">Home</a>
                  </li>
                  @guest
                    <li class="nav-item">
                      <a class="nav-link btn btn-dark"   href="{{route('register')}}">Register</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link btn btn-dark" class="btn btn-dark" href="{{route('login')}}">Login</a>
                    </li>    
                      
                  @else 
                  <li class="nav-item">
                    <a class="nav-link btn btn-dark"  href="{{route('task.create')}}">New Task</a>
                  </li>
                  <li class="nav-item">
                    <form action="{{route('logout'), Auth::user()->id}}" method="POST">
                      @csrf
                      @method('POST')
                      <button type="" class="nav-link btn btn-dark">Logout</button>
                      {{-- <a class="nav-link"  href="{{route('logout')}}" >@csrf@method('POST')Logout</a> --}}
                    </form>
                    </li>   
                    <p style="color: white; margin-top:auto; margin-bottom:auto; font-weight:bolder">{{Auth::user()->name}}</p>
                    {{-- <li class="nav-item">
                      <a class="nav-link" style="color: white; font-size:20px">{{Auth::user()->name}}</a>
                    </li>  --}}
                      
                  @endguest
                  
                  
              </div>
            </div>
          </nav>
          @endsection
@yield('header')
        {{-- Body --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                  @yield('card-header')
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                        
                          @yield('card-body')  
                        
                      
                          
                        
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
        {{-- Bootstrap JS --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
