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

        <form action="/adminProductsCategory/store" method="POST">

          @csrf

          <div class="form-group">

            <label>Category Name</label>

            <input type="text" class="form-control" name="productCategoryName" placeholder="Enter Product Category Name">

          </div>

          <center>

            <button type="submit" class="btn btn-success">Submit</button>

            <button type="submit" class="btn btn-danger">Clear</button>

          </center>

        </form>

        <center>

          <h3 style="font-family: Arial; font-size: 25px; color: grey; text-transform: uppercase; margin-top: 50px;">Products Category Data</h3>

        </center>

        <table class="table" style="margin-top: 20px;">

          <thead>

            <tr>

              <th scope="col">#</th>

              <th scope="col">Category Name</th>

              <th scope="col">Created At</th>

              <th scope="col">Updated At</th>

              <th scope="col"><center>Actions</center></th>

            </tr>

          </thead>

          <tbody>
            <?php $i = 1; ?>

             @foreach ($productsCategory as $pC)

            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$pC->category_name}}</td>
                <td>{{$pC->created_at}}</td>
                <td>{{$pC->updated_at}}</td>
                <td style="width: 150px;">
                    <div class="row d-flex justify-content-center">
                        <div class="col-sm-4">
                            <a href="/adminProductsCategory/update/{{$pC->id}} " class="btn btn-xs btn-info">
                                <i class="fas fa-pen"></i>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <form action="{{route('DeleteProductsCategory', ['id'=>$pC->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Delete?');">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <input type="hidden" name="_method" value="DELETE">
                            </form>
                        </div>
                    </div>
                </td>
            </tr>

            @endforeach

          </tbody>

        </table>

      </div>

    </div>

  </div>

@endsection
