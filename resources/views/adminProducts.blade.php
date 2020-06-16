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

      <div class="container" style="margin-top: 25px; width: 750px;">

        <center>

          <h3 style="font-family: Arial; font-size: 25px; color: grey; text-transform: uppercase;">Products</h3>

        </center>

        <hr>

        <form action="/adminProducts/store" method="POST">

        @csrf

          <div class="form-group">

            <label>Product Name</label>

            <input type="text" class="form-control" name="productName" placeholder="Enter Product Name">

          </div>

          <div class="form-group">

            <label>Product Category</label>

            <select class="form-control" id="productCategorySelector" name="productCategorySelector">

                @foreach ($productsCategory ?? '' as $pC)

                <option>{{$pC->category_name}}</option>

                @endforeach

              </select>

          </div>

          <div class="form-group">

            <label>Price</label>

            <input type="text" class="form-control" name="productPrice" placeholder="Enter Product Price">

          </div>

          <div class="form-group">

            <label for="exampleInputEmail1">Product Description</label>

            <textarea class="form-control" name="productDescription" placeholder="Product Description" rows="3"></textarea>

          </div>

          {{-- <div class="form-group">

            <label for="exampleInputEmail1">Product Image</label>

            <input type="file" class="form-control-file" name="productImage">

          </div> --}}

          <div class="form-group">

            <label for="exampleInputEmail1">Product Rate</label>

            <input type="text" name="productRate" class="form-control" placeholder="Product Rate">

          </div>

          <div class="form-group">

            <label for="exampleInputEmail1">Stock</label>

            <input type="text" name="productStock" class="form-control" placeholder="Product Stock">

          </div>

          <div class="form-group">

            <label for="exampleInputEmail1">Weight</label>

            <input type="text" name="productWeight" class="form-control" placeholder="Product Weight">

          </div>

          <center>

            <button type="submit" class="btn btn-success">Submit</button>

            <button type="submit" class="btn btn-danger">Clear</button>

          </center>

        </form>

      </div>

      <div class="container" style="margin-top: 50px; width: 1200px;">
        <center>

          <h3 style="font-family: Arial; font-size: 25px; color: grey; text-transform: uppercase; margin-top: 20px;">Products Data</h3>

        </center>

        <table class="table" style="margin-top: 20px;">

            <thead>

              <tr>

                <th scope="col">#</th>

                <th scope="col"><center>Product Name </center></th>

                <th scope="col"><center>Price</center></th>

                <th scope="col"><center>Description</center></th>

                <th scope="col"><center>Product Rate</center></th>

                <th scope="col"><center>Stock</center></th>

                <th scope="col"><center>Weight</center></th>

                <th scope="col"><center>Actions</center></th>

              </tr>

            </thead>

            <tbody>
              <?php $i = 1; ?>

               @foreach ($products as $products)

              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$products->product_name}}</td>
                <td>{{$products->price}}</td>
                <td style="width: 500px;">{{$products->description}}</td>
                <td style="width: 50px;"><center>{{$products->product_rate}}</center></td>
                <td style="width: 50px;"><center>{{$products->stock}}</center></td>
                <td style="width: 50px;"><center>{{$products->weight}}</center></td>
                <td style="width: auto;">
                    <div class="row d-flex justify-content-center">
                        <div class="col-sm-4">
                            <a href="/adminProducts/update/{{$products->id}} " class="btn btn-xs btn-info mr-5">
                                <i class="fas fa-pen"></i>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <form action="{{route('DeleteProducts', ['id'=>$products->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-xs btn-danger ml-2" onclick="return confirm('Delete?');">
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

  </div>

@endsection
