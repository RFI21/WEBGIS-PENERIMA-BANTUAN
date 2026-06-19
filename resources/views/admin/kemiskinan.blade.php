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

<!-- Daftar Kemiskinan  -->
<div>
  <div class="card p-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
      <h5 class="fw-bold">Daftar Kemiskinan</h5>
      <a href="{{ route('admin.kemiskinan.tambah') }}" class="btn btn-primary">
        + Tambah Data
      </a>
    </div>

    <table class="table table-bordered table-hover">
      <thead class="text-center bg-emerald-700">
        <tr>
          <th>No</th>
          <th>Nama Kecamatan</th>
          <th>Kelurahan</th>
          <th>Desil</th>
          <th>Jumlah Keluarga</th>
          <th>Jumlah Jiwa</th>
          <th>Aksi</th>
        </tr>
      </thead>

      <tbody>
        @forelse ($kemiskinans as $index => $data)
          <tr class="text-center">

            <td>{{ $index + 1 }}</td>

            <td class="text-start">
              {{ $data->nama_kecamatan }}
            </td>

            <td>
              {{ $data->kelurahan }}
            </td>

            <td>
              <span class="badge 
                @if($data->desil <= 2) bg-danger
                @elseif($data->desil <= 4) bg-warning
                @elseif($data->desil <= 6) bg-info
                @else bg-success
                @endif">
                Desil {{ $data->desil }}
              </span>
            </td>

            <td>
              {{ number_format($data->jumlah_keluarga) }} KK
            </td>

            <td>
              {{ number_format($data->jumlah_jiwa) }} Jiwa
            </td>

            <td>
              <div class="d-flex justify-content-center gap-1">

                <a href="{{ route('admin.kemiskinan.edit', $data->id) }}"
                   class="btn btn-sm btn-warning">
                  Edit
                </a>

                <form action="{{ route('admin.kemiskinan.hapus', $data->id) }}"
                      method="POST">
                  @csrf
                  @method('DELETE')

                  <button type="submit"
                          onclick="return confirm('Yakin hapus data ini?')"
                          class="btn btn-sm btn-danger">
                    Hapus
                  </button>
                </form>

              </div>
            </td>

          </tr>
        @empty
          <tr>
            <td colspan="6" class="text-center text-muted">
              Belum ada data kecamatan.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>

    <div class="d-flex justify-content-end mt-3">
      {{ $kemiskinans->links() }}
    </div>

  </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
