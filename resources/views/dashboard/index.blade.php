@extends('dashboard.layouts.main')
@section('page-heading', 'Dashboard')

@section('content')
  <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
    <!-- card -->
    <div class="card ">
      <!-- card body -->
      <div class="card-body">
        <!-- heading -->
        <div class="d-flex justify-content-between align-items-center
                mb-3">
          <div>
            <h4 class="mb-0 fw-bold">Tool Network</h3>
          </div>
          <div class="icon-shape icon-md bg-light-primary text-primary
                  rounded-2">
            <i class="bi bi-briefcase fs-4"></i>
          </div>
        </div>

        <!-- project number -->
        <div>
          <h5 class="fw-bold">{{ $tool_network }} Barang</h5>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
    <!-- card -->
    <div class="card ">
      <!-- card body -->
      <div class="card-body">
        <!-- heading -->
        <div class="d-flex justify-content-between align-items-center
                mb-3">
          <div>
            <h4 class="mb-0 fw-bold">Storage</h4>
          </div>
          <div class="icon-shape icon-md bg-light-primary text-primary
                  rounded-2">
            <i class="bi bi-list-task fs-4"></i>
          </div>
        </div>
        <!-- project number -->
        <div>
          <h5 class="fw-bold">{{ $storage }} Barang</h5>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
    <!-- card -->
    <div class="card ">
      <!-- card body -->
      <div class="card-body">
        <!-- heading -->
        <div class="d-flex justify-content-between align-items-center
                mb-3">
          <div>
            <h4 class="mb-0 fw-bold">Multimedia</h4>
          </div>
          <div class="icon-shape icon-md bg-light-primary text-primary
                  rounded-2">
            <i class="bi bi-people fs-4"></i>
          </div>
        </div>
        <!-- project number -->
        <div>
          <h5 class="fw-bold">{{ $multimedia }} Barang</h5>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
    <!-- card -->
    <div class="card ">
      <!-- card body -->
      <div class="card-body">
        <!-- heading -->
        <div class="d-flex justify-content-between align-items-center
                mb-3">
          <div>
            <h4 class="mb-0 fw-bold">Habis Pakai</h4>
          </div>
          <div class="icon-shape icon-md bg-light-primary text-primary
                  rounded-2">
            <i class="bi bi-bullseye fs-4"></i>
          </div>
        </div>
        <!-- project number -->
        <div>
          <h5 class="fw-bold">{{ $habis_pakai }} Barang</h5>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
    <!-- card -->
    <div class="card ">
      <!-- card body -->
      <div class="card-body">
        <!-- heading -->
        <div class="d-flex justify-content-between align-items-center
                mb-3">
          <div>
            <h4 class="mb-0 fw-bold">PC</h4>
          </div>
          <div class="icon-shape icon-md bg-light-primary text-primary
                  rounded-2">
            <i class="bi bi-list-task fs-4"></i>
          </div>
        </div>
        <!-- project number -->
        <div>
          <h5 class="fw-bold">{{ $pc }} Barang</h5>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
    <!-- card -->
    <div class="card ">
      <!-- card body -->
      <div class="card-body">
        <!-- heading -->
        <div class="d-flex justify-content-between align-items-center
                mb-3">
          <div>
            <h4 class="mb-0 fw-bold">Access Point</h4>
          </div>
          <div class="icon-shape icon-md bg-light-primary text-primary
                  rounded-2">
            <i class="bi bi-list-task fs-4"></i>
          </div>
        </div>
        <!-- project number -->
        <div>
          <h5 class="fw-bold">{{ $access_point }} Barang</h5>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
    <!-- card -->
    <div class="card ">
      <!-- card body -->
      <div class="card-body">
        <!-- heading -->
        <div class="d-flex justify-content-between align-items-center
                mb-3">
          <div>
            <h4 class="mb-0 fw-bold">Switch</h4>
          </div>
          <div class="icon-shape icon-md bg-light-primary text-primary
                  rounded-2">
            <i class="bi bi-list-task fs-4"></i>
          </div>
        </div>
        <!-- project number -->
        <div>
          <h5 class="fw-bold">{{ $switch }} Barang</h5>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
    <!-- card -->
    <div class="card ">
      <!-- card body -->
      <div class="card-body">
        <!-- heading -->
        <div class="d-flex justify-content-between align-items-center
                mb-3">
          <div>
            <h4 class="mb-0 fw-bold">Router</h4>
          </div>
          <div class="icon-shape icon-md bg-light-primary text-primary
                  rounded-2">
            <i class="bi bi-list-task fs-4"></i>
          </div>
        </div>
        <!-- project number -->
        <div>
          <h5 class="fw-bold">{{ $router }} Barang</h5>
        </div>
      </div>
    </div>
  </div>
@endsection
