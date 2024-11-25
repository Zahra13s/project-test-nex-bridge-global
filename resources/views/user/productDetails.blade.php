@extends('user.layouts.master')
@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-4 p-4 text-center">
                <img src="{{asset('products/'.$products->image)}}" alt="Product Image" class="w-50">
            </div>
            <div class="col-md-12 col-lg-8 p-4">
                <h3>{{$products->name}}</h3>
                <h5>{{$products->price}}</h5>
                <p>{{$products->description}}</p>
                <button class="btn btn-sm btn-primary add-to-cart" data-product-id="{{ $products->id }}" data-product-price="{{ $products->price }}">
                    <i data-feather="shopping-cart"></i>
                </button>
            </div>
        </div>
    </div>
    <script>
            const cartButtons = document.querySelectorAll('.add-to-cart');

cartButtons.forEach(button => {
    button.addEventListener('click', function () {
        const productId = this.dataset.productId;
        const productPrice = parseFloat(this.dataset.productPrice);

        // Send a request to the server
        fetch('{{ route("cartAdd") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({
                product_id: productId,
                qty: 1, // Default quantity
                price: productPrice
            }),
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Product added to cart successfully!');
                } else {
                    alert('Error adding product to cart.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
});
    </script>
@endsection
