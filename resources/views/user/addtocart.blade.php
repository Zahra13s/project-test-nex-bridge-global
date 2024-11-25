@extends('user.layouts.master')
@section('main')
    <div class="container-fluid p-5">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Image</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Category</th>
                        <th scope="col" class="text-end">Price</th>
                        <th scope="col" class="text-end">Quantity</th>
                        <th scope="col" class="text-end">Sub_total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                        <tr>
                            <td class="text-center">
                                <img src="{{ asset('products/' . $item->image) }}" alt="" width="100px">
                            </td>
                            <td class="text-center">{{ $item->product_name }}</td>
                            <td class="text-center">{{ $item->category_name }}</td>
                            <td class="text-end">{{ number_format($item->price, 2) }}</td>
                            <td class="text-end">
                                <form method="POST" action="{{ route('cart.update', $item->cart_id) }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="qty" value="{{ $item->qty }}" min="1" class="form-control text-end" style="width: 80px;" onchange="this.form.submit()">
                                </form>
                            </td>
                            <td class="text-end">{{ number_format($item->sub_total, 2) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="5" class="text-end"><strong>Total</strong></td>
                        <td class="text-end"><strong>{{ number_format($total, 2) }}</strong></td>
                    </tr>
                </tbody>
            </table>
            <div class="text-end">
                <form method="POST">
                    @csrf
                    <button class="btn btn-primary">Proceed to Checkout</button>
                </form>
            </div>
        </div>
    </div>
@endsection
