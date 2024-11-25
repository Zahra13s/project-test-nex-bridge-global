@extends('user.layouts.master')

@section('main')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar for Filters -->
        <div class="col-sm-12 col-md-4 col-lg-2 card p-4 shadow-sm">
            <h3>Filters</h3>
            <div class="mb-3">
                <label for="searchInput" class="form-label">Search Products</label>
                <input type="text" id="searchInput" class="form-control" placeholder="Search by product name">
            </div>
            <div class="mb-3">
                <label for="categoryFilter" class="form-label">Select Category</label>
                <select id="categoryFilter" class="form-select">
                    <option value="">All Categories</option>
                    @foreach ($category as $c)
                    <option value="{{ $c->id }}">{{ $c->category }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="priceMin" class="form-label">Min Price</label>
                <input type="number" id="priceMin" class="form-control" placeholder="Min Price">
            </div>
            <div class="mb-3">
                <label for="priceMax" class="form-label">Max Price</label>
                <input type="number" id="priceMax" class="form-control" placeholder="Max Price">
            </div>
        </div>

        <!-- Product List -->
        <div class="col-sm-12 col-md-8 col-lg-10 p-4">
            <div class="row" id="productList">
                @foreach ($products as $p)
                <div class="col-sm-12 col-md-6 col-lg-4 mt-2 product-row" data-category-id="{{ $p->category_id }}" data-price="{{ $p->price }}">
                    <div class="card m-1">
                        <div class="card-header">
                            <img src="{{ asset('products/' . $p->image) }}" alt="" class="w-50 product">
                        </div>
                        <div class="card-body">
                            <h5 class="product-name">{{ $p->name }}</h5>
                            <h6>{{ $p->category_name }}</h6>
                            <p><strong>Price :</strong> {{ $p->price }}</p>
                            <div class="row d-flex justify-content-between">
                                <div class="col">
                                    <a href="{{ route('productDetailsPage', $p->id) }}">
                                        <button class="btn btn-sm btn-info">
                                            <i data-feather="info"></i>
                                        </button>
                                    </a>
                                </div>
                                <div class="col text-end">
                                    <button class="btn btn-sm btn-primary add-to-cart" data-product-id="{{ $p->id }}" data-product-price="{{ $p->price }}">
                                        <i data-feather="shopping-cart"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('searchInput').addEventListener('input', filterProducts);
    document.getElementById('categoryFilter').addEventListener('change', filterProducts);
    document.getElementById('priceMin').addEventListener('input', filterProducts);
    document.getElementById('priceMax').addEventListener('input', filterProducts);

    function filterProducts() {
        let searchTerm = document.getElementById('searchInput').value.toLowerCase();
        let selectedCategory = document.getElementById('categoryFilter').value;
        let minPrice = parseFloat(document.getElementById('priceMin').value) || 0;
        let maxPrice = parseFloat(document.getElementById('priceMax').value) || Infinity;

        let products = document.querySelectorAll('#productList .product-row');

        products.forEach(product => {
            let productName = product.querySelector('.product-name').textContent.toLowerCase();
            let productCategory = product.dataset.categoryId;
            let productPrice = parseFloat(product.dataset.price);

            if (
                (productName.includes(searchTerm) || searchTerm === '') &&
                (productCategory === selectedCategory || selectedCategory === '') &&
                (productPrice >= minPrice && productPrice <= maxPrice)
            ) {
                product.style.display = '';
            } else {
                product.style.display = 'none';
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
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
});

</script>
@endsection
