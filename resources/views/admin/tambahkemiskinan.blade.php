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

    <!-- Form Tambah Data Kemiskinan -->
    <div class="container">

      <div class="card mb-4">
        <div class="card-header bg-dark text-white">Form Tambah Data Kemiskinan</div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.kemiskinan.simpan') }}">
              @csrf

              <!-- Nama Kecamatan -->
                <div class="mb-3">
                  <label class="form-label">Nama Kecamatan</label>
                  <select name="nama_kecamatan" class="form-control" required>
                    <option value="">-- Pilih Kecamatan --</option>
                    <option value="Wara">Wara</option>
                    <option value="Wara Timur">Wara Timur</option>
                    <option value="Wara Barat">Wara Barat</option>
                    <option value="Wara Utara">Wara Utara</option>
                    <option value="Wara Selatan">Wara Selatan</option>
                    <option value="Bara">Bara</option>
                    <option value="Sendana">Sendana</option>
                    <option value="Telluwanua">Telluwanua</option>
                    <option value="Mungkajang">Mungkajang</option>
                  </select>
                </div>

                <!-- Kelurahan (TAMBAHAN) -->
                <div class="mb-3">
                  <label class="form-label">Kelurahan</label>
                  <input type="text" name="kelurahan" class="form-control" required>
                </div>

              <!-- Desil -->
              <div class="mb-3">
                <label class="form-label">Desil Kemiskinan</label>
                <select name="desil" class="form-control" required>
                  <option value="">-- Pilih Desil --</option>
                  <option value="1">Desil 1 (Sangat Miskin)</option>
                  <option value="2">Desil 2 (Miskin)</option>
                  <option value="3">Desil 3 (Rentan Miskin)</option>
                  <option value="4">Desil 4 (Hampir Miskin)</option>
                  <option value="5">Desil 5 (Menengah Bawah)</option>
                  <option value="6-10">Desil 6 - 10 (Menengah Atas)</option>
                </select>
              </div>

              <!-- Jumlah Keluarga -->
              <div class="mb-3">
                <label class="form-label">Jumlah Keluarga</label>
                <input type="number" name="jumlah_keluarga" class="form-control" required>
              </div>

              <!-- Jumlah Jiwa -->
              <div class="mb-3">
                <label class="form-label">Jumlah Jiwa</label>
                <input type="number" name="jumlah_jiwa" class="form-control" required>
              </div>

              <button class="btn btn-success rounded-pill mt-3 ms-2 d-inline-flex align-items-center shadow-sm">Simpan</button>
                      <a href="{{ route('admin.kemiskinan') }}"
           class="btn btn-outline-success rounded-pill mt-3 ms-2 d-inline-flex align-items-center shadow-sm">

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

</body>
</html>