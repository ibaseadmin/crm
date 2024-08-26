@extends('layouts.main')

@section('content')
<div class="pc-container">
  <div class="pc-content">
    <div class="page-header">
      <div class="page-block">
        <div class="row align-items-center">
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">Users</a></li>
              <li class="breadcrumb-item" aria-current="page">My Account</li>
            </ul>
          </div>
          <div class="col-md-12">
            <div class="page-header-title">
              <h2 class="mb-0">My Account</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <!-- Aici începe conținutul paginii de profil -->
            <!-- Adaptează conținutul din template-ul tău -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
