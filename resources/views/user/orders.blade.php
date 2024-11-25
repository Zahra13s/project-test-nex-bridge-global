@extends('user.layouts.master')
@section('main')
    <div class="container-fluid p-5">
        <div class="row">
          <table class="table">
            <thead>
                <th scope="col" class="text-center">Image</th>
                <th scope="col" class="text-center">Name</th>
                <th scope="col" class="text-center">Category</th>
                <th scope="col" class="text-end">Price</th>
                <th scope="col" class="text-end">Quantity</th>
                <th scope="col" class="text-end">Sub_total</th>
            </thead>
            <tbody>
               <tr>
                <td><img src="./images/product.svg" alt="" width="150px"></td>
                <td class="text-center">Product1</td>
                <td class="text-center">Category</td>
                <td class="text-end">5000</td>
                <td class="text-end">5</td>
                <td class="text-end">25000</td>
               </tr>
               <tr>
                <td colspan="5" class="text-end">Total</td>
                <td class="text-end">50000</td>
               </tr>
            </tbody>
          </table>
        </div>
    </div>
@endsection
