<section class="flex flex-col justify-between lg:flex-row">
    <div class="text-green-dark cursor-default">
        <h2 class="text-xl font-bold md:text-2xl lg:text-3xl">
            Selamat datang,
            <br class="inline lg:hidden" />
            {{ ucfirst(strtolower(Auth::user()->kader->nama)) }}
        </h2>
        <h5 class="mt-1 text-sm italic lg:text-base">Apa yang bisa dibantu?</h5>
    </div>
</section>
