<section class="flex flex-col justify-between lg:flex-row">
    <div class="text-green-dark cursor-default">
        <h2 class="text-base font-bold lg:text-xl">
            Selamat datang,
            <br class="inline lg:hidden" />
            {{ ucwords(strtolower(Auth::user()->kader->nama)) }}
        </h2>
        <h5 class="mt-1 text-sm italic">Apa yang bisa dibantu?</h5>
    </div>
</section>