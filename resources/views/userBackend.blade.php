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

      <div class="container" style="margin-top: 25px;">

        <div class="card" style="width: 18rem;">

          <center>

            <img class="card-img-top" src="{{asset('assets/images/icons/avatar-01.png')}}" alt="{{ Auth::user()->name }}" style="width: 50%; margin-top: 10px;">

          </center>

          <div class="card-body">

            <h5 class="card-title">{{ Auth::user()->name }}</h5>

            <hr>

            <p class="card-text" style="font-size: 12px;"><i class="fas fa-envelope" style="margin-right: 10px; "></i>{{ Auth::user()->email }}</p>

            <p class="card-text" style="font-size: 12px;"><i class="fas fa-clock" style="margin-right: 10px; "></i>{{ Auth::user()->email_verified_at }}</p>

            <center>

              <a href="#" class="btn btn-success" style="font-size: 0.75rem">Edit Profile</a>

            </center>

          </div>

        </div>

      </div>

    </div>

  </div>

@endsection
