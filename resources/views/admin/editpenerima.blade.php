<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WEBGIS PEMERIMA PKH & BPNT KOTA PALOPO</title>
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

<!-- form edit -->
<div class="container">


<div class="card mb-4">
<div class="card-header bg-dark text-white">
Form Edit Penerima
</div>

<div class="card-body">

<form method="POST" action="{{ route('admin.penerima.update', $penerima->id) }}">
    @csrf
    @method('PUT')

    <!-- TAHUN -->
    <div class="mb-3">
        <label class="form-label">Tahun</label>

        <select name="tahun" class="form-control" required>

            <option value="">-- Pilih Tahun --</option>

            @for($tahun = date('Y'); $tahun >= 2020; $tahun--)

                <option value="{{ $tahun }}"
                    {{ $penerima->tahun == $tahun ? 'selected' : '' }}>

                    {{ $tahun }}

                </option>

            @endfor

        </select>
    </div>

    <!-- KECAMATAN -->
    <div class="mb-3">
        <label class="form-label">Kecamatan</label>

        <select name="kecamatan" class="form-control" required>

            <option value="">-- Pilih Kecamatan --</option>

            @php
                $kecamatanList = [
                    'Wara',
                    'Wara Timur',
                    'Wara Barat',
                    'Wara Utara',
                    'Wara Selatan',
                    'Bara',
                    'Sendana',
                    'Telluwanua',
                    'Mungkajang'
                ];
            @endphp

            @foreach($kecamatanList as $kec)

                <option value="{{ $kec }}"
                    {{ $penerima->kecamatan == $kec ? 'selected' : '' }}>

                    {{ $kec }}

                </option>

            @endforeach

        </select>
    </div>

    <!-- KELURAHAN -->
    <div class="mb-3">
        <label class="form-label">Kelurahan</label>

        <input type="text"
               name="kelurahan"
               class="form-control"
               value="{{ $penerima->kelurahan }}"
               required>
    </div>

    <!-- PKH -->
    <div class="mb-3">
        <label class="form-label">Jumlah Penerima PKH</label>

        <input type="number"
               name="jumlah_pkh"
               class="form-control"
               value="{{ $penerima->jumlah_pkh }}"
               required>
    </div>

    <!-- BPNT -->
    <div class="mb-3">
        <label class="form-label">Jumlah Penerima BPNT</label>

        <input type="number"
               name="jumlah_bpnt"
               class="form-control"
               value="{{ $penerima->jumlah_bpnt }}"
               required>
    </div>

    <!-- JUMLAH KELUARGA -->
    <div class="mb-3">
        <label class="form-label">Jumlah Keluarga</label>

        <input type="number"
               name="jumlah_keluarga"
               class="form-control"
               value="{{ $penerima->jumlah_keluarga }}"
               required>
    </div>

    <!-- BUTTON -->
    <button class="btn btn-success">
        Update
    </button>

    <a href="{{ route('admin.penerima') }}"
       class="btn btn-secondary">

        Kembali

    </a>

</form>

</div>
</div>
</div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Leaflet -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

   <script>


    var lat = {{ $lat_long[0] ?? -2.9678}};
    var lng = {{ $lat_long[1] ?? 120.1248}};

    var map = L.map('map').setView([lat, lng], 13);


    // =========================
    // TILE LAYER
    // =========================
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

        // =========================
    // MARKER
    // =========================
    var marker = L.marker([lat, lng]).addTo(map);

    map.on('click', function(e) {

        var latitude = e.latlng.lat.toFixed(6);
        var longitude = e.latlng.lng.toFixed(6);

        document.getElementById('latitude').value = latitude;
        document.getElementById('longitude').value = longitude;

        marker.setLatLng(e.latlng);

    });


  </script>





</body>
</html>