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
Form Edit Fasilitas
</div>

<div class="card-body">

<form method="POST" action="{{ route('admin.kemiskinan.update', $kemiskinan->id) }}">
@csrf
@method('PUT')

<!-- Nama Kecamatan -->
<div class="mb-3">
    <label class="form-label">Nama Kecamatan</label>
    <select name="nama_kecamatan" class="form-control" required>
        <option value="">-- Pilih Kecamatan --</option>

        @foreach([
            'Wara','Wara Timur','Wara Barat','Wara Utara',
            'Wara Selatan','Bara','Sendana','Telluwanua','Mungkajang'
        ] as $kec)

        <option value="{{ $kec }}"
            {{ $kemiskinan->nama_kecamatan == $kec ? 'selected' : '' }}>
            {{ $kec }}
        </option>

        @endforeach
    </select>
</div>

<!-- Desil -->
<div class="mb-3">
    <label class="form-label">Desil</label>
    <select name="desil" class="form-control" required>
        <option value="">-- Pilih Desil --</option>

        @for($i = 1; $i <= 10; $i++)
            <option value="{{ $i }}"
                {{ $kemiskinan->desil == $i ? 'selected' : '' }}>
                Desil {{ $i }}
            </option>
        @endfor
    </select>
</div>

<!-- Jumlah Keluarga -->
<div class="mb-3">
    <label class="form-label">Jumlah Keluarga</label>
    <input type="number"
        name="jumlah_keluarga"
        class="form-control"
        value="{{ $kemiskinan->jumlah_keluarga }}"
        required>
</div>

<!-- Jumlah Jiwa -->
<div class="mb-3">
    <label class="form-label">Jumlah Jiwa</label>
    <input type="number"
        name="jumlah_jiwa"
        class="form-control"
        value="{{ $kemiskinan->jumlah_jiwa }}"
        required>
</div>

<button type="submit" class="btn btn-success">
Update
</button>

<a href="{{ route('admin.kemiskinan') }}" class="btn btn-secondary">
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


    var lat = {{ $long_lat[0] ?? -2.9678}};
    var lng = {{ $long_lat[1] ?? 120.1248}};

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




<script>

    const kategori = document.getElementById('kategori');
    const labeljumlah = document.getElementById('labeljumlah');

    function ubahLabel() {

        if (kategori.value === 'Sekolah') {

            labeljumlah.innerText = 'Jumlah Siswa';

        } else if (
            kategori.value === 'Rumah Ibadah' ||
            kategori.value === 'Balai' ||
            kategori.value === 'Posyandu'
        ) {

            labeljumlah.innerText = 'Daya Tampung';

        } else {

            labeljumlah.innerText = 'Keterangan';

        }
    }

    // jalankan saat halaman dibuka
    ubahLabel();

    // jalankan saat kategori berubah
    kategori.addEventListener('change', ubahLabel);

</script>
</body>
</html>