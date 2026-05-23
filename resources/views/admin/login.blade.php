<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modern Healthcare Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: radial-gradient(circle at top right, #f0f9ff 0%, #e0f2fe 50%, #dbeafe 100%);
            min-height: 100vh;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08);
        }
        .input-focus-effect:focus {
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15);
            border-color: #3b82f6;
        }
        .medical-gradient {
            background: linear-gradient(135deg, #0ea5e9 0%, #2563eb 100%);
        }
    </style>
</head>
<body class="flex items-center justify-center p-4">

    <div class="w-full max-w-5xl">
        <div class="glass-card rounded-[2rem] overflow-hidden flex flex-col md:flex-row min-h-[600px]">
            
            <!-- Image Side (Left) -->
            <div class="hidden md:flex md:w-1/2 medical-gradient p-12 flex-col justify-between relative overflow-hidden">
                <!-- Abstract Decoration -->
                <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 bg-white opacity-10 rounded-full"></div>
                <div class="absolute bottom-0 left-0 -ml-16 -mb-16 w-48 h-48 bg-white opacity-10 rounded-full"></div>

                <div class="relative z-10">
                    <div class="flex items-center gap-3 mb-8">
                        <div class="bg-white p-2 rounded-xl shadow-lg">
                            <i class="bi bi-heart-pulse-fill text-blue-600 text-2xl"></i>
                        </div>
                        <span class="text-white font-bold text-xl tracking-tight">HealthCare Portal</span>
                    </div>
                    <h1 class="text-white text-4xl font-extrabold leading-tight mb-4">
                        Solusi Kesehatan <br> Masa Kini.
                    </h1>
                    <p class="text-blue-100 text-lg max-w-sm">
                        Kelola data pasien dan layanan kesehatan Anda dengan sistem yang aman, cepat, dan terintegrasi.
                    </p>
                </div>

                <div class="relative z-10 mt-auto">
                    <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl border border-white/20">
                        <p class="text-white italic font-light">"Efisiensi administrasi adalah langkah awal menuju pelayanan pasien yang lebih baik."</p>
                    </div>
                </div>
            </div>

            <!-- Form Side (Right) -->
            <div class="w-full md:w-1/2 p-8 lg:p-16 flex flex-col justify-center bg-white">
                <div class="mb-10 text-center md:text-left">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Selamat Datang</h2>
                    <p class="text-gray-500">Silakan masuk ke akun Anda untuk melanjutkan</p>
                </div>

                <!-- Catatan: Ganti action dan method sesuai Laravel Anda -->
                <form action="#" method="POST" class="space-y-6">
                    <div>
                        <label for="username" class="block text-sm font-semibold text-gray-700 mb-2">Username</label>
                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 group-focus-within:text-blue-500 transition-colors">
                                <i class="bi bi-person"></i>
                            </span>
                            <input type="text" id="username" name="username" 
                                class="w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl outline-none transition-all input-focus-effect text-gray-800" 
                                placeholder="Masukkan username" required>
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <label for="password" class="text-sm font-semibold text-gray-700">Password</label>
                            <a href="#" class="text-xs font-medium text-blue-600 hover:text-blue-700">Lupa Password?</a>
                        </div>
                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 group-focus-within:text-blue-500 transition-colors">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input type="password" id="password" name="password" 
                                class="w-full pl-11 pr-12 py-3.5 bg-gray-50 border border-gray-200 rounded-2xl outline-none transition-all input-focus-effect text-gray-800" 
                                placeholder="••••••••" required>
                            <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400 hover:text-gray-600">
                                <i id="toggleIcon" class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" id="remember" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label for="remember" class="ml-2 text-sm text-gray-600">Ingat saya di perangkat ini</label>
                    </div>

                    <button type="submit" 
                        class="w-full py-4 medical-gradient text-white font-bold rounded-2xl shadow-lg shadow-blue-200 hover:shadow-blue-300 transform transition-all active:scale-[0.98] focus:ring-4 focus:ring-blue-200">
                        Login Sekarang
                    </button>
                </form>

                <div class="mt-12 pt-8 border-t border-gray-100">
                    <p class="text-center text-sm text-gray-500">
                        Butuh bantuan teknis? <a href="#" class="text-blue-600 font-semibold hover:underline">Hubungi IT Support</a>
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Bottom Branding (Mobile) -->
        <div class="mt-8 text-center md:hidden">
            <p class="text-gray-500 text-sm font-medium">© 2024 HealthCare Portal System</p>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.replace('bi-eye-slash', 'bi-eye');
            }
        }
    </script>
</body>
</html>