@extends('layouts.app')

@section('content')

<div id="wrapper">

  <!-- Sidebar are inside the views/components/sidebar.blade.php -->

  <x-sidebarUser/>

  <!-- Content Wrapper -->

  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->

    <div id="content">

      <!-- Topbar are inside the views/components/sidebar.blade.php -->

      <x-topbarUser/>

      <!-- Main Content of the Page -->

      <div class="container" style="margin-top: 50px; width: 1200px;">

        <center>

          <h3 style="font-family: Arial; font-size: 25px; color: grey; text-transform: uppercase; margin-top: 20px;">Carts</h3>

          <small>All your selected item will be displayed here.</small> <br/>


        </center>

        <table class="table" style="margin-top: 20px;">

            <thead>

              <tr>

                <th scope="col">#</th>

                <th scope="col"><center>Product ID</center></th>

                <th scope="col"><center>Product Name</center></th>

                <th scope="col"><center>Quantity</center></th>

                <th scope="col"><center>Price</center></th>

              </tr>

            </thead>

            <tbody>
                @if (count($userCarts) == 0)
                    <tr>
                        <td>Empty carts</td>
                    </tr>
                @else

                <?php $i = 1; ?>

                @foreach ($userCarts as $userCarts)

               <tr>
                 <td>{{$loop->iteration}}</td>
                 <td><center>{{$userCarts->product_id}}</center></td>
                 <td><center>{{$userCarts->product_name}}</center></td>
                 <td><center>{{$userCarts->qty}}</center></td>
                 <td><center>{{$userCarts->price}}</center></td>
                 <td>
                     <form action="{{route('DeleteCarts', ['id'=>$userCarts->cartid]) }}" method="POST">
                         @csrf
                         <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Delete?');">
                             <i class="fas fa-trash"></i>
                         </button>
                         <input type="hidden" name="_method" value="DELETE">
                     </form>
                 </td>

               </tr>
               @endforeach
                @endif

              <tr>
                <td colspan="3"><center><b>Total</b></center></td>
                <td><center><b>{{$total}}</b></center></td>
                <td>
                    <center>
                    <b>
                        <a href="/productsCheckout" class="btn btn-xs btn-success">
                            Proceed to Checkout
                        </a>
                    </b>
                    </center>
                </td>
              </tr>
            </tbody>

          </table>
          <small>{{ Auth::user()->id }} - </small>
          <small>{{ Auth::user()->name }}</small>

        </div>

      </div>

    </div>

  </div>

@endsection
