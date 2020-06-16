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

          <h3 style="font-family: Arial; font-size: 25px; color: grey; text-transform: uppercase; margin-top: 20px;">Transaction</h3>

          <small>Your Transaction will be displayed here.</small>

        </center>

        <table class="table" style="margin-top: 20px;">

            <thead>

              <tr>

                <th scope="col">#</th>

                <th scope="col"><center>Timeout </center></th>

                <th scope="col"><center>Address</center></th>

                <th scope="col"><center>Regency</center></th>

                <th scope="col"><center>Province</center></th>

                <th scope="col"><center>Total</center></th>

                <th scope="col"><center>Shipping Cost</center></th>

                <th scope="col"><center>Sub Total</center></th>

                <th scope="col"><center>User ID</center></th>

                <th scope="col"><center>Courier ID</center></th>

                <th scope="col"><center>Action</center></th>

              </tr>

            </thead>

            <tbody>
              <?php $i = 1; ?>

               @foreach ($userTransaction as $userTransaction)

              <tr>
                <td>{{$loop->iteration}}</td>
                <td><span class="badge badge-info">{{$userTransaction->timeout}}</span></td>
                <td>{{$userTransaction->address}}</td>
                <td style="width: 50px;"><center>{{$userTransaction->regency}}</center></td>
                <td style="width: 50px;"><center>{{$userTransaction->province}}</center></td>
                <td style="width: 50px;"><center>{{$userTransaction->total}}</center></td>
                <td style="width: 50px;"><center>{{$userTransaction->shipping_cost}}</center></td>
                <td style="width: 50px;"><center>{{$userTransaction->sub_total}}</center></td>
                <td style="width: 50px;"><center>{{$userTransaction->user_id}}</center></td>
                <td style="width: 50px;"><center>{{$userTransaction->courier_id}}</center></td>
                <td style="width: 50px;">
                    <div class="row d-flex justify-content-center">
                            <form action="{{route('DeleteTransactions', ['id'=>$userTransaction->idTransactions]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-xs btn-danger ml-2" onclick="return confirm('Delete?');">
                                    CANCEL TRANSACTION
                                </button>
                                <input type="hidden" name="_method" value="DELETE">
                            </form>
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
