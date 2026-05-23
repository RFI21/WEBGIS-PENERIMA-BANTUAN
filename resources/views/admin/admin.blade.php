<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | WEBGIS TERPADU KELURAHAN BATTANG BARAT</title>
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


    <!-- Admin -->
    <div id="admin" >
      <div class="card p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="fw-bold">Data Admin</h5>
          <a href="{{ route('admin.tambahadmin') }}" class="btn btn-primary">+ Tambah </a>
          
        </div>
        <table class="table table-bordered table-hover">
          <thead class="text-center">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Username</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($admins as $index => $admin)
              <tr class="text-center">
                <td>{{ $index + 1 }}</td>
                <td>{{ $admin->nama }}</td>
                <td>{{ $admin->username }}</td>
                <td>Admin</td>
                <td>
                  <div class="d-flex justify-content-center gap-2">
                    <a href="{{ route('admin.editadmin', $admin->id) }}" class="btn btn-sm btn-warning me-1 ">
                       Edit
                    </a>
                    <form action="{{ route('admin.hapus', $admin->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus admin ini?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
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

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
