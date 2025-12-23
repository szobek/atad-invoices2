<x-guest-layout>
    <h1 class="text-3xl font-bold underline">
        Üdv az Atád rendszerben!
    </h1>
    @auth
    <a href="{{ route('pages.dashboard') }}"
       class="">
       Menj a műszerfalra
    @else
     <a href="{{ route('login') }}"
        class="">
        Log in
    </a>
    @endauth
   
</x-guest-layout>