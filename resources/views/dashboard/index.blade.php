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
            <h4 class="mb-0">Barang</h4>
          </div>
          <div class="icon-shape icon-md bg-light-primary text-primary
                  rounded-2">
            <i class="bi bi-briefcase fs-4"></i>
          </div>
        </div>

        <!-- project number -->
        <div>
          <h1 class="fw-bold">18</h1>
          <p class="mb-0"><span class="text-dark me-2">2</span>Completed</p>
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
            <h4 class="mb-0">Peminjaman</h4>
          </div>
          <div class="icon-shape icon-md bg-light-primary text-primary
                  rounded-2">
            <i class="bi bi-list-task fs-4"></i>
          </div>
        </div>
        <!-- project number -->
        <div>
          <h1 class="fw-bold">132</h1>
          <p class="mb-0"><span class="text-dark me-2">28</span>Completed</p>
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
            <h4 class="mb-0">Teams</h4>
          </div>
          <div class="icon-shape icon-md bg-light-primary text-primary
                  rounded-2">
            <i class="bi bi-people fs-4"></i>
          </div>
        </div>
        <!-- project number -->
        <div>
          <h1 class="fw-bold">12</h1>
          <p class="mb-0"><span class="text-dark me-2">1</span>Completed</p>
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
            <h4 class="mb-0">Productivity</h4>
          </div>
          <div class="icon-shape icon-md bg-light-primary text-primary
                  rounded-2">
            <i class="bi bi-bullseye fs-4"></i>
          </div>
        </div>
        <!-- project number -->
        <div>
          <h1 class="fw-bold">76%</h1>
          <p class="mb-0"><span class="text-success me-2">5%</span>Completed</p>
        </div>
      </div>
    </div>
  </div>
@endsection
