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

      <div class="container" style="margin-top: 50px; width: 1200px;">

        <center>

          <h3 style="font-family: Arial; font-size: 25px; color: grey; text-transform: uppercase; margin-top: 20px;">Transaction Data</h3>

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

                <th scope="col"><center>Proof of Payment</center></th>

                <th scope="col"><center>Status</center></th>

              </tr>

            </thead>

            <tbody>
              <?php $i = 1; ?>

               @foreach ($transactions as $transactions)

              <tr>
                <td>{{$loop->iteration}}</td>
                <td><span class="badge badge-danger">{{$transactions->timeout}}</span></td>
                <td>{{$transactions->address}}</td>
                <td style="width: 500px;">{{$transactions->regency}}</td>
                <td style="width: 50px;"><center>{{$transactions->province}}</center></td>
                <td style="width: 50px;"><center>{{$transactions->total}}</center></td>
                <td style="width: 50px;"><center>{{$transactions->shipping_cost}}</center></td>
                <td style="width: 50px;"><center>{{$transactions->sub_total}}</center></td>
                <td style="width: 50px;"><center>{{$transactions->user_id}}</center></td>
                <td style="width: 50px;"><center>{{$transactions->courier_id}}</center></td>
                <td style="width: 50px;">
                    <center>
                        <img src="{{asset('/images/proofofpayment/'.$transactions->proof_of_payment)}}" alt="" style="width: 100px;">
                    </center>
                </td>
                <td style="width: 50px;">
                    <center>
                        @if (($transactions->status) == 'unverified')
                            <span class="badge badge-warning">Unverified</span>
                        @elseif(($transactions->status) == 'verified')
                            <span class="badge badge-info">Verified</span>
                        @elseif(($transactions->status) == 'delivered')
                            <span class="badge badge-primary">Delivered</span>
                        @elseif(($transactions->status) == 'expired')
                            <span class="badge badge-secondary">Expired</span>
                        @elseif(($transactions->status) == 'canceled')
                            <span class="badge badge-dark">Canceled</span>
                        @elseif(($transactions->status) == 'success')
                            <span class="badge badge-success" style="width: 70px;">Success</span>
                        @endif
                    </center>
                    <a href="/adminTransactions/verify/{{$transactions->id}}">Verify</a>
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
