@extends('admin.layouts.master')
@section('main')
    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-12 col-md-6 col-lg-4 card p-4 shadow-sm">
                <div class="row mt-3">
                    <img src="{{asset('user/images/undraw_coffee_time_e8cw.svg')}}" alt="" class="w-50 profile-image">
                </div>
                <div class="row profile">
                    <input type="file" class="form-control my-3">
                    <input type="submit" value="Upload" class="btn btn-primary">
                    <ul>
                        <li><strong>Name :</strong> {{$information->name}}</li>
                        <li><strong>Email :</strong> {{$information->email}}</li>
                        <li><strong>Phone :</strong> {{$information->phone}}</li>
                        <li><strong>Address :</strong> {{$information->address}}</li>
                    </ul>
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
