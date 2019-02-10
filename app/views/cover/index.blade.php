@extends('commons.template')

@push('style')
    <link rel="stylesheet" href="/assets/css/cover-v1.css"/>
@endpush

@section('content')
    <main class="content">
        <article>
            <img src="/assets/images/logo.png" alt="Jaguaribanos">
            <nav class="menu">
                <h2 class="menuTitle">Menu</h2>
                <ul class="menuItems">
                    <li class="menuItem"><a class="menuLink" href="/sobre/">Sobre</a></li>
                    <li class="menuItem"><a class="menuLink" href="/personalidades/">Personalidades</a></li>
                </ul>
            </nav>
        </article>
    </main>
@endsection
