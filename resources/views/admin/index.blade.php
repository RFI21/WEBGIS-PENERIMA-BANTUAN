<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WEBGIS PEMERIMA PKH & BPNT KOTA PALOPO</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">


</head>
<body>

       {{-- header --}}
      @include('admin.header')
      {{-- header end --}}
  

  <!-- Main Content -->
  <div class="content">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow-sm rounded mb-4">
      <div class="container-fluid">
        <span class="navbar-brand mb-0 h4">WEBGIS PEMERIMA PKH & BPNT KOTA PALOPO</span>
        <div class="dropdown">
          <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
          
            <i class="bi bi-person-circle text-secondary "></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
            @foreach ($admins as $admin)
            <li><h6 class="dropdown-header">{{ $admin->nama }}</h6></li>
        @endforeach
        
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger " href="{{ route('logout') }}">Logout</a></li>
          </ul>
        </div>  
      </div>
    </nav>


 <div class="container-fluid">

  <div class="row g-3">

<div class="col-md-3">
  <div class="card shadow-sm border-0">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <div>
          <h6 class="text-muted">Penerima PKH</h6>

          <h3 class="fw-bold fs-4">
            {{ number_format($jumlahPKH) }} KK
          </h3>
        </div>

        <i class="bi bi-cash-coin fs-1 text-success"></i>
      </div>
    </div>
  </div>
</div>

<div class="col-md-3">
  <div class="card shadow-sm border-0">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <div>
          <h6 class="text-muted">Penerima BPNT</h6>

          <h3 class="fw-bold fs-4">
            {{ number_format($jumlahBPNT) }} KK
          </h3>
        </div>

        <i class="bi bi-wallet2 fs-1 text-warning"></i>
      </div>
    </div>
  </div>
</div>

 <div class="col-md-3">
  <div class="card shadow-sm border-0">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <div>
          <h6 class="text-muted">Keluarga Miskin</h6>

          <h3 class="fw-bold fs-4">
            {{ number_format($jumlahKeluarga) }} KK
          </h3>
        </div>

        <i class="bi bi-people-fill fs-1 text-danger"></i>
      </div>
    </div>
  </div>
</div>
 
  </div>
</div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
