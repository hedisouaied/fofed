@extends('frontend.layouts.master')


@section('content')

<!-- Breadcumb Area -->
<div class="breadcumb_area">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <h5>Se connecter &amp; S'inscrire</h5>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">accueil</a></li>
                    <li class="breadcrumb-item active">Se connecter &amp; S'inscrire</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Breadcumb Area -->

<!-- Login Area -->
<div class="bigshop_reg_log_area section_padding_100_50">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="login_form mb-50">
                    <h5 class="mb-3">Se connecter</h5>

                    <form action="my-account.html" method="post">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" id="username" placeholder="Email ou Idenfiant">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe">
                        </div>
                        <div class="form-check">
                            <div class="custom-control custom-checkbox mb-3 pl-1">
                                <input type="checkbox" class="custom-control-input" id="customChe">
                                <label class="custom-control-label" for="customChe">Se souvenir de moi pour cet ordinateur</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Se connecter</button>
                    </form>
                    <!-- Forget Password -->
                    <div class="forget_pass mt-15">
                        <a href="#">Oublier mot de passe ?</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="login_form mb-50">
                    <h5 class="mb-3">S'inscrire</h5>

                    <form action="my-account.html" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="full_name" id="username" placeholder="Nom & prènom">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Identifiant">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" id="username" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="confirm_password" id="password" placeholder="Repeter mot de passe">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">S'inscrire</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login Area End -->


@endsection
