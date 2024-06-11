@extends('layout.app', ['target' => 'mahasiswa'])

@section('body')
<header>
    <h1 class="text-2xl font-medium text-golden-600">Mahasiswa Universitas Ahmad Dahlan</h1>
    <p class="text-xs">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit doloribus nihil a placeat aliquid, ut odio excepturi impedit reiciendis perspiciatis!</p>
</header>
<main>
    <section class="mt-10">
        @livewire('list-mahasiswa', ['lazy' => true])
    </section>
</main>
@endsection