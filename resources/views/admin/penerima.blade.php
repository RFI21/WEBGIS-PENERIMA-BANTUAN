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

    <!-- Daftar penerima -->
    <div id="wisata">
      <div class="card p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="fw-bold">Daftar Penerima Bantuan</h5>
          <a href="{{ route('admin.penerima.tambah') }}" class="btn btn-primary">+ Tambah</a>

        </div>
        <table class="table table-bordered table-hover">
 <thead>
    <tr class="text-center bg-emerald-700">
        <th>No</th>
        <th>Tahun</th>
        <th>Kecamatan</th>
        <th>Kelurahan</th>
        <th>PKH</th>
        <th>BPNT</th>
        <th>Keluarga</th>
        <th>Aksi</th>
    </tr>
</thead>

<tbody>

    @forelse($penerimas as $i => $p)

    <tr class="text-center">

        <td>
            {{ $penerimas->firstItem() + $i }}
        </td>

        <td>
            {{ $p->tahun }}
        </td>

        <td class="text-start">
            {{ $p->kecamatan }}
        </td>

        <td class="text-start">
            {{ $p->kelurahan }}
        </td>

        <td>
            {{ number_format($p->jumlah_pkh) }}
        </td>

        <td>
            {{ number_format($p->jumlah_bpnt) }}
        </td>

        <td>
            {{ number_format($p->jumlah_keluarga) }}
        </td>

        <td>

            <a href="{{ route('admin.penerima.edit', $p->id) }}"
               class="btn btn-warning btn-sm">

                Edit

            </a>

            <form action="{{ route('admin.penerima.hapus', $p->id) }}"
                  method="POST"
                  style="display:inline;">

                @csrf
                @method('DELETE')

                <button type="submit"
                        onclick="return confirm('Yakin hapus data ini?')"
                        class="btn btn-sm btn-danger">

                    Hapus

                </button>

            </form>

        </td>

    </tr>

    @empty

    <tr>
        <td colspan="8" class="text-center text-muted">
            Belum ada data penerima.
        </td>
    </tr>

    @endforelse

</tbody>

        </table>
        <div class="d-flex justify-content-center mt-3">
          {{ $penerimas->links() }}
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
