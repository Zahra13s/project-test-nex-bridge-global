<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="./css/register.css">
    <title>Product Details</title>
</head>

<body>
<div class="row d-flex justify-content-center mt-5 p-3">
    <div class="col-12 col-md-6 col-lg-4">
        <div class="card p-3 shadow-sm">
            <div class="row d-flex justify-content-center">
                <img src="./images/register.svg" alt="" class="w-50">
            </div>
            <h1 class="text-center">Welcome to Lyan</h1>
            <h1 class="text-center">Sign Up Form</h1>
            <hr class="mx-3">
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control
                         @error('email')
                        is-invalid
                    @enderror
                    " id="email" name="email">
                    @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control
                     @error('email')
                       is-invalid
                    @enderror
                    " id="password" name="password">
                    @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>
                <p>Don't you have account? <a href="{{route('registerPage')}}">Sign Up</a></p>
                <div class="row p-2">
                    <a href="{{route('login')}}"><button type="submit" class="btn btn-primary">Sign In</button></a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

<script>
    feather.replace();
</script>

</html>
