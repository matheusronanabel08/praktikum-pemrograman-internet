@extends('layouts.app')

@section('content')

<div id="wrapper">

  <!-- Sidebar are inside the views/components/sidebar.blade.php -->

  <x-sidebarAdmin/>

  <!-- Content Wrapper -->

  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->

    <div id="content">

      <!-- Topbar are inside the views/components/sidebar.blade.php -->

      <x-topbarAdmin/>

      <!-- Main Content of the Page -->

      <div class="container" style="margin-top: 25px;">

        <center>

        <h3 style="font-family: Arial; font-size: 25px; color: grey; text-transform: uppercase;">Products Update</h3>

        </center>

        <hr>

        <form action="/adminProducts/update/{{$products -> id}}" method="POST">

          @csrf

          <div class="form-group">

            <label for="exampleInputEmail1">Product Name</label>

          <input type="text" class="form-control" name="productName" placeholder="Enter Product Category Name" value="{{$products -> product_name}}">

          </div>

          {{-- <div class="form-group">

            <label>Product Category</label>

            <select class="form-control" id="productCategorySelector" name="productCategorySelector">

                @foreach ($productsCategory as $pC)

                <option>{{$pC->category_name}}</option>

                @endforeach

              </select>

          </div> --}}

          <div class="form-group">

            <label>Price</label>

            <input type="text" class="form-control" name="productPrice" placeholder="Enter Product Price" value="{{$products -> price}}">

          </div>

          <div class="form-group">

            <label for="exampleInputEmail1">Product Rate</label>

            <input type="text" name="productRate" class="form-control" placeholder="Product Rate" value="{{$products -> product_rate}}">

          </div>

          <div class="form-group">

            <label for="exampleInputEmail1">Stock</label>

            <input type="text" name="productStock" class="form-control" placeholder="Product Stock" value="{{$products -> stock}}">

          </div>

          <div class="form-group">

            <label for="exampleInputEmail1">Weight</label>

            <input type="text" name="productWeight" class="form-control" placeholder="Product Weight" value="{{$products -> weight}}">

          </div>

          <div class="form-group">

            <label for="exampleInputEmail1">Product Description</label>

            <textarea class="form-control" name="productDescription" placeholder="Product Description" rows="3">{{$products -> description}}
            </textarea>

          </div>

          <center>

            <button type="submit" class="btn btn-success">Update</button>

          </center>

        </form>

      </div>

    </div>

  </div>

@endsection
