@props(['id_modal', 'title'])

<section id="{{ $id_modal }}" class="hidden overflow-y-scroll fixed place-items-center min-h-screen h-full w-full inset-0 z-20 bg-black/75" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <figure class="my-12 w-4/5 p-10 rounded-lg [box-shadow:_0.5rem_0.5rem_0.5rem_#bcbcbc50] bg-gradient-to-tr from-[#fff8eb] to-[#efebe2] lg:w-[55%] lg:rounded-2xl">
        <span class="flex items-center justify-between">
            <h2 class="cursor-default text-xl font-bold text-slate-900 lg:text-3xl" id="modal-title">
                <i class="fa-solid fa-users text-lg lg:text-2xl"></i>
                &ensp;{{ $title }}
            </h2>
            <button type="button" onclick="close_modal('{{ $id_modal }}')" class="cursor-pointer transition-all duration-300 ease-in-out text-slate-900 hover:text-slate-600">
                <i class="fa-solid fa-times mt-1 text-xl lg:text-2xl"></i>
            </button>
        </span>
        <hr class="my-5 w-full text-slate-900" />
        <div class="grid grid-cols-1 gap-6 py-4 lg:grid-cols-2">
            {{ $slot }}
        </div>
        <span class="flex justify-end space-x-3 py-4">
            <button
                type="button"
                onclick="close_modal('{{ $id_modal }}')"
                class="cursor-pointer font-medium px-7 py-2.5 rounded-md transition-colors duration-300 shadow-lg border border-slate-200 bg-slate-50 text-slate-700 lg:hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500"
            >
                Batal
            </button>
            @if ($id_modal === 'modal_edit')
                <button
                    type="submit"
                    form="edit-form"
                    class="cursor-pointer font-medium px-7 py-2.5 rounded-md transition-colors duration-300 shadow-lg border border-green-200 bg-green-700 text-green-50 lg:hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                >
                    Simpan Perubahan
                </button>
            @endif
        </span>
    </figure>
</section>