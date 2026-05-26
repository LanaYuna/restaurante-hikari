<header class="w-full sticky top-0 z-50 bg-zinc-900 border-b border-zinc-800">
    <nav class="w-full max-w-[1440px] mx-auto flex items-center justify-between px-6 h-20 gap-12">

        <a href="#" class="shrink-0">
            <img src="assets/img/logo.png" alt="Logo do Hikari" class="h-10 w-auto object-contain">
        </a>

        <input 
            type="search" 
            id="busca-pratos"
            placeholder="Busque por comida ou categoria..." 
            class="flex-1 max-w-xl bg-zinc-800 text-zinc-100 placeholder-zinc-500 px-5 py-2.5 rounded-full border border-zinc-700 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 text-sm transition-all"
        >

        <div class="flex items-center gap-8 shrink-0">

            <button class="text-zinc-400 hover:text-red-500 transition-colors hover:scale-105 duration-200 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                </svg>
                <span>Seu endereço</span>
            </button>

            <button class="text-zinc-400 hover:text-red-500 transition-colors hover:scale-105 duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </button>

            <button class="flex items-center gap-4 bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-full font-medium shadow-md shadow-red-950/30 transition-all group">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 group-hover:scale-110 transition-transform">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>

                <div class="flex flex-col text-left leading-tight border-l border-red-500 pl-3">
                    <span class="text-sm font-bold">R$ 0,00</span>
                    <span class="text-xs text-red-200">0 itens</span>
                </div>
            </button>

        </div>
    </nav>
</header>