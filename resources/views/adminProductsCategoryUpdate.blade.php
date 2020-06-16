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

        <h3 style="font-family: Arial; font-size: 25px; color: grey; text-transform: uppercase;">Products Category</h3>

        </center>

        <hr>

        <form action="/adminProductsCategory/update/{{$productsCategory -> id}}" method="POST">

          @csrf

          <div class="form-group">

            <label for="exampleInputEmail1">Category Name</label>

          <input type="text" class="form-control" name="productCategoryName" placeholder="Enter Product Category Name" value="{{$productsCategory -> category_name}}">

          </div>

          <center>

            <button type="submit" class="btn btn-success">Update</button>

          </center>

        </form>

      </div>

    </div>

  </div>

@endsection
