<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah Admin | WEBGIS TERPADU KELURAHAN BATTANG BARAT</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

   
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons CDN -->
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
        <span class="navbar-brand mb-0 h4">WEBGIS TERPADU KELURAHAN BATTANG BARAT</span>
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

<!-- Tambahkan di dalam div class="content" setelah {{-- form --}} -->
<div class="container">

  
  <div class="card mb-4">
    <div class="card-header bg-dark text-white">
      Form Input Admin 
    </div>
    <div class="card-body">
      <form method="POST" action="{{ route('admin.simpanadmin') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="nama" >Nama </label>
          <input type="text" id="nama" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
        <label for="username" >Username </label>
        <input type="text" id="username" name="username" class="form-control" required>
      </div>
      <div class="mb-3">
      <label for="password" >Password </label>
      <input type="password" id="password" name="password" class="form-control" required>
    </div>

        <button type="submit" class="btn btn-success mt-3 rounded-pill">Simpan</button>
          <a href="{{ route('admin.admin') }}" class="btn btn-outline-success rounded-pill mt-3 ms-2 d-inline-flex align-items-center shadow-sm">
    <i class="bi bi-arrow-left-circle me-2"></i> Kembali
  </a>
      </form>
    </div>
  </div>
</div>

  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
  flatpickr("#jam_mulai", {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i", // 24 jam format
    time_24hr: true
  });
  flatpickr("#jam_selesai", {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    time_24hr: true
  });
</script>


</body>
</html>
