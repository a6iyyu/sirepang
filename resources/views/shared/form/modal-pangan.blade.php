@props(['id_modal', 'title'])

<section id="{{ $id_modal }}" class="hidden overflow-y-scroll fixed place-items-center min-h-screen h-full w-full inset-0 z-20 bg-black/75" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <figure class="my-12 w-4/5 p-10 rounded-lg [box-shadow:_0.5rem_0.5rem_0.5rem_#bcbcbc50] bg-gradient-to-tr from-[#fff8eb] to-[#efebe2] lg:w-[55%] lg:rounded-2xl">
        <span class="flex items-center justify-between">
            <h2 class="cursor-default text-green-dark text-xl font-bold text-slate-900 lg:text-3xl" id="modal-title">
                <i class="text-green-dark fa-solid fa-utensils text-lg lg:text-2xl"></i>
                &ensp;{{ $title }}
            </h2>
            <button type="button" onclick="close_modal('{{ $id_modal }}')" class="cursor-pointer transition-all duration-300 ease-in-out text-slate-900 hover:text-slate-600">
                <i class="fa-solid fa-times mt-1 text-xl lg:text-2xl"></i>
            </button>
        </span>
        <hr class="my-5 w-full text-slate-900" />
        <form id="tambah-pangan-form" class="w-full">
            <div class="flex items-center mb-4">
                <button type="button" class="bg-green-500 text-white rounded-full p-2 mr-2" onclick="addPanganField()">
                    <i class="fa-solid fa-plus"></i>
                </button>
                <span class="text-lg font-semibold">Tambah Data Pangan</span>
            </div>
            <div id="pangan-fields">
                <!-- Dynamic fields will be added here -->
            </div>
        </form>
        <span class="flex justify-end space-x-3 py-4">
            <button
                type="button"
                onclick="close_modal('{{ $id_modal }}')"
                class="cursor-pointer font-medium px-7 py-2.5 rounded-md transition-colors duration-300 shadow-lg border border-slate-200 bg-slate-50 text-slate-700 lg:hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500"
            >
                Batal
            </button>
            <button
                type="submit"
                form="tambah-pangan-form"
                class="cursor-pointer font-medium px-7 py-2.5 rounded-md transition-colors duration-300 shadow-lg border border-green-200 bg-green-700 text-green-50 lg:hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
            >
                Simpan
            </button>
        </span>
    </figure>
</section>