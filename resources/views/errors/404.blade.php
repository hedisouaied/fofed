@extends('frontend.layouts.master')


@section('content')


 <!-- Breadcumb Area -->
 <div class="breadcumb_area">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <h5>404</h5>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Accueil</a></li>
                    <li class="breadcrumb-item active">404</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Breadcumb Area -->

<!-- Not Found Area -->
<section class="error_page text-center section_padding_100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6">
                <div class="not-found-text">
                    <h2>404</h2>
                    <h5 class="mb-3">Oups! Page non trouvée</h5>
                    <p>Désolé! la page que vous recherchez n'est pas trouvée. Assurez-vous d'avoir tapé la bonne URL</p>
                    <a href="{{route('home')}}" class="btn btn-primary mt-3"><i class="fa fa-home" aria-hidden="true"></i> ACCUEIL</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Not Found Area End -->


@endsection
