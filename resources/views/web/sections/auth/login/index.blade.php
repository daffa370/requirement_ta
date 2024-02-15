@extends("main")


@section("container")

    @if(session()->has('succes'))
        <div class="alert  alert-success alert-dismissible" role="alert">
            <div> {{session('succes')}}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

        </div>
    @endif

    @if(session()->has('error'))
        <div class="alert  alert-info alert-dismissible" role="alert">
            <div> {{session('error')}}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

        </div>
    @endif

    <div class="row justify-content-center">

        <div class="col-md-4">


            <main class="form-signin w-100 m-auto">

                <h1 class="h2 mb-3 fw-normal text-center">Please login</h1>


                <form action="/login" method="post">
                    @csrf

                    <div class="form-floating">
                        <input type="text" class="form-control  @error("email") is-invalid @enderror" id="email"
                               placeholder="email" name="email" autofocus value="{{old("email")}}">
                        <label for="email">Email</label>

                        @error("email")
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control " id="password" name="password"
                               placeholder="Password">
                        <label for="password">Password</label>

                    </div>


                    <button class="btn btn-primary w-100 py-2" type="submit">Login</button>

                </form>
                <small class="d-block text-center mt-3">

                    Not registered? <a href="/regist" class="text-decoration-none">Register Now</a>
                </small>
            </main>
        </div>

    </div>

@endsection
