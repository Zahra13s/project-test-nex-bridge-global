@extends('admin.layouts.master')

@section('main')
<div class="p-3">
    <!-- Search and Add Product Section -->
    <div class="row mb-3">
        <div class="col-lg-6">
            <input type="text" id="searchInput" class="form-control" placeholder="Search by product name...">
        </div>
        <div class="col-lg-4">
            <select id="categoryFilter" class="form-select">
                <option value="">All Categories</option>
                @foreach ($data as $d)
                    <option value="{{ $d->id }}">{{ $d->category }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-2 text-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
                Add Product
            </button>
        </div>
    </div>

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center mb-3">
                        <img src="{{ asset('default/product_default.jpg') }}" class="img-thumbnail w-50" alt="" id="addOutput">
                    </div>
                    <form action="{{ route('addProduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image" class="form-control mt-3" onchange="loadFile(event, 'addOutput')">
                        <input type="text" name="name" class="form-control mt-3" placeholder="Product Name">
                        <select name="category" class="form-control mt-3">
                            <option value="">Choose Category</option>
                            @foreach ($data as $d)
                                <option value="{{ $d->id }}">{{ $d->category }}</option>
                            @endforeach
                        </select>
                        <textarea name="description" class="form-control mt-3" placeholder="Description" rows="4"></textarea>
                        <input type="text" name="price" class="form-control mt-3" placeholder="Product Price">
                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Table -->
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th class="text-center">Edit</th>
                <th class="text-center">Delete</th>
            </tr>
        </thead>
        <tbody id="userTableBody">
            @foreach ($product as $index => $p)
                <tr class="user-row">
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <img src="{{ $p->image ? asset('products/' . $p->image) : asset('default/product_default.jpg') }}"
                             alt="Product Image"
                             class="img-thumbnail"
                             width="100">
                    </td>
                    <td>{{ $p->name }}</td>
                    <td data-category-id="{{ $p->category_id }}">{{ $p->category }}</td>
                    <td>{{ Str::limit($p->description, 50) }}</td>
                    <td class="text-center">
                        <!-- Edit Product Button -->
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProductModal-{{ $p->id }}">
                            Edit
                        </button>

                        <!-- Edit Product Modal -->
                        <div class="modal fade" id="editProductModal-{{ $p->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5>Edit Product</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex justify-content-center mb-3">
                                            <img src="{{ asset('products/' . $p->image) }}"
                                                 class="img-thumbnail w-50"
                                                 alt=""
                                                 id="editOutput-{{ $p->id }}">
                                        </div>
                                        <form action="{{ route('updateProduct', $p->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $p->id }}">
                                            <input type="file" name="image" class="form-control mt-3" onchange="loadFile(event, 'editOutput-{{ $p->id }}')">
                                            <input type="text" name="name" class="form-control mt-3" value="{{ $p->name }}" placeholder="Product Name">
                                            <select name="category" class="form-control mt-3">
                                                <option value="">Choose Category</option>
                                                @foreach ($data as $d)
                                                    <option value="{{ $d->id }}" {{ $d->id == $p->category_id ? 'selected' : '' }}>
                                                        {{ $d->category }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <textarea name="description" class="form-control mt-3" placeholder="Description" rows="4">{{ $p->description }}</textarea>
                                            <input type="text" name="price" class="form-control mt-3" value="{{ $p->price }}" placeholder="Product Price">
                                            <div class="text-end mt-3">
                                                <button type="submit" class="btn btn-primary">Update Product</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                        <!-- Delete Form -->
                        <form action="{{ route('deleteProduct', $p->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-end">
        {{ $product->links() }}
    </div>
</div>

<script>
    document.getElementById('searchInput').addEventListener('input', filterProducts);
    document.getElementById('categoryFilter').addEventListener('change', filterProducts);

    function filterProducts() {
        let searchTerm = document.getElementById('searchInput').value.toLowerCase();
        let selectedCategory = document.getElementById('categoryFilter').value;
        let rows = document.querySelectorAll('#userTableBody .user-row');

        rows.forEach(row => {
            let productName = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
            let productCategory = row.querySelector('td:nth-child(4)').dataset.categoryId;

            if ((productName.includes(searchTerm) || searchTerm === '') &&
                (productCategory === selectedCategory || selectedCategory === '')) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    // Function to handle image preview
    function loadFile(event, outputId) {
        const output = document.getElementById(outputId);
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = () => URL.revokeObjectURL(output.src); // Free memory
    }
</script>
@endsection
