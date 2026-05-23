 
    <!-- Icons & Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

 <!-- Sidebar -->
  <div class="sidebar d-flex flex-column p-3 text-white">
    <div class="text-center">
<div class="flex flex-col items-center text-center">
    
   <!-- Logo -->
    <div class="mb-2">
        <img 
            src="https://upload.wikimedia.org/wikipedia/commons/4/49/Lambang_Kota_Palopo.png" 
            alt="Logo Palopo"
            style="width:80px; height:auto;"
        >
    </div>

    <!-- Title -->
    <p class="text-light small fw-semibold">
        Sistem Informasi Geografis Penerima Bantuan PKH & BPNT
    </p>
  

</div>
  </div>
  <hr class="border-secondary opacity-100 my-3">
    <ul class="nav nav-pills flex-column  mb-auto">
      <li>
        <a href="{{ route('admin.index') }}" class="nav-link {{ Request::routeIs('admin.index') ? ' bg-emerald-700 text-white rounded-xl' : '' }}  d-flex align-items-center">
          <i class="bi-speedometer2 me-2"></i>
          Dashboard
        </a>
      </li>
      <li>
        <a href="{{ route('admin.kemiskinan') }}" class="nav-link {{ Request::routeIs('admin.kemiskinan') ? ' bg-emerald-700 text-white rounded-xl' : '' }} d-flex align-items-center">
          <i class="bi bi-clipboard-heart me-2"></i>
           Data Kemiskinan
        </a>
      </li>
      <li>
        <a href="{{ route('admin.penerima') }}" class="nav-link {{ Request::routeIs('admin.penerima') ? ' bg-emerald-700 text-white rounded-xl' : '' }} d-flex align-items-center">
          <i class="bi bi-map-fill me-2"></i>
           Data Penerima
        </a>
      </li>
    
      <li>
        <a href="{{ route('admin.admin') }}" class="nav-link {{ Request::routeIs('admin.admin') ? ' bg-emerald-700 text-white rounded-xl' : '' }} d-flex align-items-center">
          <i class="bi-person-badge me-2"></i>
          Admin
        </a>
      </li>
    </ul>
  </div>