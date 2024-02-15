@extends("main")


@section("container")

    @if(session()->has('error'))
        <div class="alert  alert-info alert-dismissible" role="alert">
            <div> {{session('error')}}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

        </div>
    @endif


    <div class="row justify-content-center">

        <div class="col-md-5">


            <main class="form-registration w-100 m-auto">

                <h1 class="h2 mb-3 fw-normal text-center">{{$title}}</h1>


                <form action="/regist" method="post">


                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name="name"
                               class="form-control rounded-top @error("name") is-invalid @enderror"
                               value="{{old("name")}}" id="name" required placeholder="name">
                        <label for="name">Name</label>

                        @error("name")
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>


                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control  @error("email") is-invalid @enderror"
                               value="{{old("email")}}" id="email" required placeholder="email">
                        <label for="email">Email address</label>
                        @error("email")
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password"
                               class="form-control rounde-bottom  @error("password") is-invalid @enderror" id="password"
                               required placeholder="Password">
                        <label for="password">Password</label>
                        @error("password")
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>


                    <button class="btn btn-info w-100 py-2 mt-4" type="submit">Register</button>

                </form>
                <small class="d-block text-center mt-3">

                    Already registered? <a href="/login" class="text-decoration-none">Login</a>
                </small>
            </main>
        </div>

    </div>

@endsection
