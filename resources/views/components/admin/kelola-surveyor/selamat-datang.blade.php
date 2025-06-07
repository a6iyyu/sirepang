<section class="flex flex-col justify-between lg:flex-row">
    <div class="text-green-dark cursor-default">
        <h2 class="text-base font-bold lg:text-xl">Kelola Surveyor</h2>
        <h5 class="mt-1 text-sm italic">Daftar Surveyor yang sudah terdaftar di SIREPANG.</h5>
    </div>
    <a
        href="{{ route('kelola-surveyor.tambah') }}"
        class="bg-green-dark mt-4 flex h-fit w-fit transform cursor-pointer items-center justify-center rounded-lg px-4 py-3 text-sm text-white transition-all duration-300 ease-in-out lg:mt-0 lg:px-5 lg:py-3 lg:hover:bg-emerald-500"
    >
        <i class="fa-solid fa-plus"></i>
        <h5 class="ml-4">Surveyor</h5>
    </a>
</section>
@if ($errors->any())
    <ul class="my-5 list-inside list-disc rounded-lg border border-red-500 bg-red-50 p-4 text-sm text-red-500">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@elseif (session('success'))
    <ul class="my-5 list-inside list-disc rounded-lg border border-green-500 bg-green-50 p-4 text-sm text-green-500">
        {{ session('success') }}
    </ul>
@endif