<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WEBGIS PEMERIMA PKH & BPNT KOTA PALOPO</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
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
            <i class="bi bi-person-circle text-secondary"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
            @foreach ($admins as $admin)
              <li><h6 class="dropdown-header">{{ $admin->nama }}</h6></li>
            @endforeach
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="{{ route('logout') }}">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Form Tambah penerima -->
    <div class="container">

      <div class="card mb-4">
        <div class="card-header bg-dark text-white">Form Tambah Penerima</div>
        <div class="card-body">
 <form method="POST" action="{{ route('admin.penerima.simpan') }}">
    @csrf

    <!-- Tahun -->
    <div class="mb-3">
        <label class="form-label">Tahun</label>

        <select name="tahun" class="form-control" required>
            <option value="">-- Pilih Tahun --</option>

            @for($tahun = date('Y'); $tahun >= 2020; $tahun--)
                <option value="{{ $tahun }}">
                    {{ $tahun }}
                </option>
            @endfor

        </select>
    </div>

    <!-- Kecamatan -->
    <div class="mb-3">
        <label class="form-label">Kecamatan</label>

        <select name="kecamatan" class="form-control" required>
            <option value="">-- Pilih Kecamatan --</option>

            <option>Wara</option>
            <option>Wara Timur</option>
            <option>Wara Barat</option>
            <option>Wara Utara</option>
            <option>Wara Selatan</option>
            <option>Bara</option>
            <option>Sendana</option>
            <option>Telluwanua</option>
            <option>Mungkajang</option>

        </select>
    </div>

    <!-- Kelurahan -->
    <div class="mb-3">
        <label class="form-label">Kelurahan</label>

        <input type="text"
               name="kelurahan"
               class="form-control"
               required>
    </div>

    <!-- PKH -->
    <div class="mb-3">
        <label class="form-label">Jumlah Penerima PKH</label>

        <input type="number"
               name="jumlah_pkh"
               class="form-control"
               required>
    </div>

    <!-- BPNT -->
    <div class="mb-3">
        <label class="form-label">Jumlah Penerima BPNT</label>

        <input type="number"
               name="jumlah_bpnt"
               class="form-control"
               required>
    </div>

    <!-- Jumlah Keluarga -->
    <div class="mb-3">
        <label class="form-label">Jumlah Keluarga</label>

        <input type="number"
               name="jumlah_keluarga"
               class="form-control"
               required>
    </div>

    <!-- BUTTON -->
    <button type="submit"
            class="btn btn-success mt-3 rounded-pill">
        Simpan
    </button>

    <a href="{{ route('admin.penerima') }}"
       class="btn btn-outline-success rounded-pill mt-3 ms-2">

        <i class="bi bi-arrow-left-circle me-2"></i>
        Kembali

    </a>

</form>
        </div>
      </div>
    </div>
  </div>

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>


</body>
</html>