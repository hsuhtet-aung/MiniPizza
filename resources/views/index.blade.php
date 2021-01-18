@extends("layout.layout")

@section('content')
  <div class="container">
      <h1 class="grey-text mt-4 d-inline">Welcome From My Pizza Project</h1>
      <img src="{{asset("images/Pizza.png")}}" width="400px" height="200px" class="img-responsive mt-3" alt="">
      @if(Session("success"))
      <div class="alert alert-success">
          {{Session('success')}}
      </div>
      @endif
    <!-- Material form register -->
    <div class="card mt-4">

        <h5 class="card-header indigo white-text text-center py-4">
            <strong>Pizza Order Form</strong>
        </h5>

        <!--Card content-->
        <div class="card-body px-lg-5 pt-0">

            <!-- Form -->
            <form class="text-center"  action="{{ route ('insert') }}" method="post">
            @csrf
                <!-- User Name-->
                <div class="md-form mt-4">
                    <input type="text" id="materialRegisterFormEmail" class="form-control" name="username">
                    <label for="materialRegisterFormEmail">User Name</label>
                    @error("username")
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <!-- Pizza Name-->
                <div class="md-form mt-4">
                    <input type="text" id="materialRegisterFormEmail" class="form-control" name="pizza_name">
                    <label for="materialRegisterFormEmail">Pizza Name</label>
                    @error("pizza_name")
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="md-form mt-4">
                    <input type="text" id="materialRegisterFormEmail" class="form-control" name="topping">
                    <label for="materialRegisterFormEmail">Topping</label>
                    @error("topping")
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="md-form mt-4">
                    <input type="text" id="materialRegisterFormEmail" class="form-control" name="sauce">
                    <label for="materialRegisterFormEmail">Sauce</label>
                    @error("sauce")
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="md-form mt-4">
                    <input type="text" id="materialRegisterFormEmail" class="form-control" name="price">
                    <label for="materialRegisterFormEmail">Price</label>
                    @error("price")
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                

                <!-- Order button -->
                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Order</button>

                <!-- Social register -->
                <p>or sign up with:</p>

                <a type="button" class="btn-floating btn-fb btn-sm">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a type="button" class="btn-floating btn-tw btn-sm">
                    <i class="fab fa-twitter"></i>
                </a>
                <a type="button" class="btn-floating btn-li btn-sm">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a type="button" class="btn-floating btn-git btn-sm">
                    <i class="fab fa-github"></i>
                </a>

                <hr>

                <!-- Terms of service -->
                <p>By clicking
                    <em>Sign up</em> you agree to our
                    <a href="" target="_blank">terms of service</a>

            </form>
            <!-- Form -->

        </div>

    </div>
    <!-- Material form register -->

  </div>
@endsection