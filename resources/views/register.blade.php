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
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Enter Name</label>
                        <input type="text"
                            class="form-control
                            @error('name')
                            is-invalid
                        @enderror"
                            id="name" name="name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email"
                            class="form-control
                        @error('email')
                            is-invalid
                        @enderror" " id="email" name="email">
                        @error('email')
    <small class="text-danger">{{ $message }}</small>
@enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone No.</label>
                        <input type="text" class="form-control
                        @error('phone')
                            is-invalid
                        @enderror
                        " id="phone" name="phone">
                        @error('phone')
    <small class="text-danger">{{ $message }}</small>
@enderror
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control
                        @error('address')
                            is-invalid
                        @enderror
                        " id="address" name="address">
                        @error('address')
    <small class="text-danger">{{ $message }}</small>
@enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control
                         @error('password')
                            is-invalid
                        @enderror
                        " id="password" name="password">
                    </div>
                    @error('password')
    <small class="text-danger">{{ $message }}</small>
@enderror
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control
                             @error('confirm_password')
                        is-invalid
                    @enderror
                        " id="confirm_password" name="confirm_password">
                        @error('confirm_password')
    <small class="text-danger">{{ $message }}</small>
@enderror
                    </div>
                    <p>Do you have account? <a href="{{ route('loginPage') }}">Sign In</a></p>
                    <div class="row p-2">
                        <a href="profile.html"><button type="submit" class="btn btn-primary">Sign Up</button></a>
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
