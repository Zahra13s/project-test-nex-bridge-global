@extends('user.layouts.master')
@section('main')
    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-12 col-md-6 col-lg-4 card p-4 shadow-sm">
                <div class="row mt-3">
                    <img src="./images/undraw_coffee_time_e8cw.svg" alt="" class="w-50 profile-image">
                </div>
                <div class="row profile">
                    <input type="file" class="form-control my-3">
                    <input type="submit" value="Upload" class="btn btn-primary">
                    <ul>
                        <li><strong>Name :</strong> {{ $information->name }}</li>
                        <li><strong>Email :</strong> {{ $information->email }}</li>
                        <li><strong>Phone :</strong> {{ $information->phone }}</li>
                        <li><strong>Address :</strong> {{ $information->address }}</li>
                    </ul>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#updateModal">
                                <i data-feather="edit"></i> Edit
                            </button>
{{-- update modal --}}
                            <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST" action="{{ route('profileUpdate') }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateModalLabel">Update Profile</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        value="{{ $information->name }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        value="{{ $information->email }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="phone" class="form-label">Phone</label>
                                                    <input type="text" class="form-control" id="phone" name="phone"
                                                        value="{{ $information->phone }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="address" class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="address" name="address"
                                                        value="{{ $information->address }}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col">
                            <button class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i data-feather="trash"></i> Delete
                            </button>
                        </div>
                        <!-- Delete modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('profileDelete') }}">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete your profile? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md col-lg-6 p-4">
                <h2>Your Orders</h2>
                <div class="row">
                    <div class="col card p-0">
                        <div class="card-header d-flex justify-content-between">
                            <p> <strong>Order Code :</strong> Lyan12345</p>
                            <i data-feather="arrow-right"></i>
                        </div>
                        <div class="card-body">
                            <!-- 1 -->
                            <div class="row">
                                <div class="col">
                                    <strong>Product x 5</strong>
                                </div>
                                <div class="col text-end">
                                    5500
                                </div>
                            </div>
                            <!-- 2 -->
                            <div class="row">
                                <div class="col">
                                    <strong>Product x 5</strong>
                                </div>
                                <div class="col text-end">
                                    5500
                                </div>
                            </div>
                            <!-- 3 -->
                            <div class="row">
                                <div class="col">
                                    <strong>Product x 5</strong>
                                </div>
                                <div class="col text-end">
                                    5500
                                </div>
                            </div>
                            <!-- 4 -->
                            <div class="row">
                                <div class="col">
                                    <strong>Product x 5</strong>
                                </div>
                                <div class="col text-end">
                                    5500
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col card p-0">
                        <div class="card-header d-flex justify-content-between">
                            <p> <strong>Order Code :</strong> Lyan12345</p>
                            <i data-feather="arrow-right"></i>
                        </div>
                        <div class="card-body">
                            <!-- 1 -->
                            <div class="row">
                                <div class="col">
                                    <strong>Product x 5</strong>
                                </div>
                                <div class="col text-end">
                                    5500
                                </div>
                            </div>
                            <!-- 2 -->
                            <div class="row">
                                <div class="col">
                                    <strong>Product x 5</strong>
                                </div>
                                <div class="col text-end">
                                    5500
                                </div>
                            </div>
                            <!-- 3 -->
                            <div class="row">
                                <div class="col">
                                    <strong>Product x 5</strong>
                                </div>
                                <div class="col text-end">
                                    5500
                                </div>
                            </div>
                            <!-- 4 -->
                            <div class="row">
                                <div class="col">
                                    <strong>Product x 5</strong>
                                </div>
                                <div class="col text-end">
                                    5500
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
