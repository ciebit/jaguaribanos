@extends('commons.template')

@push('style')
    <link rel="stylesheet" href="/assets/css/commons-v1.css"/>
    <link rel="stylesheet" href="/assets/css/personality-v1.css"/>
@endpush

@section('content')
    @include('commons.header')

    <main class="content">
        <header>
            <h1>Personalidades</h1>
        </header>
        <div class="personalities">
            <article class="personality">
                <a href="osmar-negreiros/">
                    <img class="personalityPhoto" src="/assets/images/personalities/osmar-negreiros.jpeg" alt="Osmar Negreiros"/>
                    <h1>Osmar Negreiros</h1>
                    <p>Artista plástico, desenhista, pintor, escultor, projetista, professor e escritor</p>
                </a>
            </article>

            <article class="personality">
                <a href="diogenes-netto/">
                    <img class="personalityPhoto" src="/assets/images/personalities/osmar-negreiros.jpeg" alt="Diógenes Netto"/>
                    <h1>Diógenes Netto</h1>
                    <p>Artista plástico, pintor, escultor, poeta.</p>
                </a>
            </article>
        </div>
    </main>
@endsection
