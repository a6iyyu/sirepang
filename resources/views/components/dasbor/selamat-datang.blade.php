<div class="min-h-screen bg-primary flex flex-col md:flex-row">
    <!-- Sidebar -->
    <div id="sidebar" class="fixed md:static w-64 bg-primary text-green-dark flex flex-col p-6 h-full z-50 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">
        <div class="flex items-center justify-between mb-10">
            <div class="flex items-center">
                <img src="{{ asset('img/logodkp.webp') }}" alt="logo"
                     class="w-12 h-12 rounded-lg mr-3 object-cover" />
                <h1 class="text-xl font-bold tracking-tight">SIREPANG</h1>
            </div>
            <button onclick="toggleSidebar()" class="md:hidden">
                <i class="fa-solid fa-times text-xl"></i>
            </button>
        </div>

        <nav class="space-y-5">
            <a href="{{ route('dasbor') }}"
               class="flex items-center px-4 py-3 rounded-xl text-white
                      bg-green-dark transition-all duration-300 ease-in-out
                      transform hover:scale-105 hover:shadow-md
                      group relative">
                <i class="fa-solid fa-gauge-high mr-4 z-10 relative"></i>
                <span class="z-10 relative">Dashboard</span>
            </a>
            <a href="#"
               class="flex items-center px-4 py-3 rounded-xl text-green-dark
                      hover:bg-green-light/50 transition-all duration-300 ease-in-out
                      transform hover:scale-105 hover:shadow-md
                      group relative">
                <i class="fa-solid fa-users mr-4 z-10 relative"></i>
                <span class="z-10 relative">Data Keluarga</span>
            </a>
        </nav>

        <div class="mt-auto md:hidden">
            <button onclick="logout()"
                    class="bg-logout text-white w-full py-2 rounded-lg hover:opacity-90">
                Keluar
            </button>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 bg-primary p-4 md:p-8">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 space-y-4 md:space-y-0">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-green-dark mb-2">
                        Selamat Datang
                    </h2>
                    <p class="text-lg md:text-xl text-green-medium">{{ Auth::user()->login_username }}</p>
                </div>
                <div class="flex items-center space-x-2">
                    <button onclick="toggleSidebar()" class="md:hidden mr-2 text-green-dark">
                        <i class="fa-solid fa-bars text-2xl"></i>
                    </button>
                    <button onclick="logout()"
                            class=" bg-red-600 text-white px-4 py-2 rounded-lg duration-150 hover:bg-red-700  ease-in  hidden md:block">
                        Keluar
                    </button>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-4 md:gap-6 mb-8">
                <div class="bg-green-dark text-white p-4 md:p-6 rounded-xl relative overflow-hidden">
                    <h3 class="text-base md:text-lg opacity-80 mb-2">Jumlah Desa</h3>
                    <div class="text-3xl md:text-4xl font-bold z-10 relative">
                        {{ $jumlahDesa }}
                    </div>
                    <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-green-medium rounded-full opacity-30"></div>
                </div>
                <div class="bg-green-medium text-white p-4 md:p-6 rounded-xl relative overflow-hidden">
                    <h3 class="text-base md:text-lg opacity-80 mb-2">Jumlah Keluarga</h3>
                    <div class="text-3xl md:text-4xl font-bold z-10 relative">
                        {{ $jumlahKeluarga }}
                    </div>
                    <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-green-dark rounded-full opacity-30"></div>
                </div>
            </div>
            <div class="bg-primary rounded-xl overflow-hidden">
                <div class="bg-green-medium px-6 py-4 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-white">Riwayat Data Keluarga</h3>
                    <div class="flex items-center space-x-2">
                        <button class="text-white hover:bg-green-light/50 p-2 rounded-lg">
                            <i class="fa-solid fa-filter"></i>
                        </button>
                        <button class="text-white hover:bg-green-light/50 p-2 rounded-lg">
                            <i class="fa-solid fa-sort"></i>
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-green-light/50">
                                <th class="px-6 py-3 text-left text-xs text-green-dark uppercase">
                                    Nama
                                </th>
                                <th class="px-6 py-3 text-left text-xs text-green-dark uppercase">
                                    Desa
                                    <button class="ml-1 text-green-dark/50 hover:text-green-dark">
                                        <i class="fa-solid fa-sort"></i>
                                    </button>
                                </th>
                                <th class="px-6 py-3 text-left text-xs text-green-dark uppercase">Alamat</th>
                                <th class="px-6 py-3 text-left text-xs text-green-dark uppercase">Anggota</th>
                                <th class="px-6 py-3 text-left text-xs text-green-dark uppercase">Umur</th>
                                <th class="px-6 py-3 text-left text-xs text-green-dark uppercase">
                                    Pangan
                                    <button class="ml-1 text-green-dark/50 hover:text-green-dark">
                                        <i class="fa-solid fa-sort"></i>
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i <= 5; $i++)
                            <tr class="hover:bg-green-light/30 transition-colors duration-200">
                                <td class="px-6 py-4 text-green-dark">John Doe {{ $i }}</td>
                                <td class="px-6 py-4 text-green-medium">Desa Hijau {{ $i }}</td>
                                <td class="px-6 py-4 text-green-medium">Jl. Pertanian No. {{ $i * 10 }}</td>
                                <td class="px-6 py-4 text-green-medium">{{ $i + 2 }}</td>
                                <td class="px-6 py-4 text-green-medium">{{ 30 + $i * 2 }}</td>
                                <td class="px-6 py-4">
                                    <button class="text-accent-orange hover:opacity-80 flex items-center">
                                        Detail
                                        <i class="fa-solid fa-chevron-down ml-1 text-xs"></i>
                                    </button>
                                </td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>

               <!-- Pagination -->
<div class="flex justify-between items-center p-4">
    <div class="text-green-medium text-sm">
        Menampilkan <span id="startIndex">1</span>-<span id="endIndex">5</span> dari 25 data
    </div>
    <div class="flex items-center space-x-2">
        <button id="prevPage" class="px-3 py-1 text-green-dark hover:bg-green-light/50 rounded-lg" onclick="changePage(currentPage - 1)">
            Prev
        </button>
        <div class="flex space-x-1" id="paginationNumbers"></div>
        <button id="nextPage" class="px-3 py-1 text-green-dark hover:bg-green-light/50 rounded-lg" onclick="changePage(currentPage + 1)">
            Next
        </button>
    </div>
</div>

<script>
    let currentPage = 1;
    const totalData = 25;
    const dataPerPage = 5;
    const totalPages = Math.ceil(totalData / dataPerPage);

    function renderPagination() {
        const paginationNumbers = document.getElementById('paginationNumbers');
        paginationNumbers.innerHTML = '';

        for (let i = 1; i <= totalPages; i++) {
            const button = document.createElement('button');
            button.textContent = i;
            button.className = `px-3 py-1 rounded-lg ${i === currentPage ? 'bg-green-dark text-white' : 'text-green-dark hover:bg-green-light/50'}`;
            button.onclick = () => changePage(i);
            paginationNumbers.appendChild(button);
        }
    }

    function changePage(page) {
        if (page < 1 || page > totalPages) return;
        currentPage = page;
        updateDisplayedData();
        renderPagination();
    }

    function updateDisplayedData() {
        const startIndex = (currentPage - 1) * dataPerPage + 1;
        const endIndex = Math.min(currentPage * dataPerPage, totalData);
        document.getElementById('startIndex').textContent = startIndex;
        document.getElementById('endIndex').textContent = endIndex;
    }

    renderPagination();
    updateDisplayedData();

    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('-translate-x-full');
    }

    function logout() {
        window.location = "{{ route('logout') }}";
    }
</script>
