@extends('layouts.app')

@section('content')
    <div class="main-container">
        <!-- Navigation -->
        <!--- Image Slider -->
        <div id="slides" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#slides" data-slide-to="0" class="active"></li>
                <li data-target="#slides" data-slide-to="1"></li>
                <li data-target="#slides" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/football/background.png" alt="Photo1">
                    <div class="carousel-caption">
                        <h1 class="display-2">CNCSportTips</h1>
                        <h3>Free Football and Hockey Tips, Accumulators and Superbets</h3>
                        <a href="tips.html" target="_blank"><button type="button" class="btn btn-outline-light btn-lg">Football</button></a>
                        <a href="tips.html" target="_blank"><button type="button" class="btn btn-primary btn-lg">Ice Hockey</button></a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/football/background1.png" alt="Photo2">
                </div>
                <div class="carousel-item">
                    <img src="img/football/background2.png" alt="Photo3">
                </div>
            </div>
        </div>

        <!--- Jumbotron -->
        <div class="container-fluid">
            <div class="row jumbotron">
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
                    <p class="lead">Welcome to our website, here we would like to offer you free football predictions and tips from our analysts. We can create superbets, helping everyone win over the bookies. This will be a place for betting community where you can have an like, dislike and comment.</p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
                    <a href="#contact"><button type="button" class="btn btn-outline-secondary btn-lg">Contact</button></a>
                </div>
            </div>
        </div>

        <!--- Welcome Section -->
        <div class="container-fluid padding">
            <div class="row welcome text-center">
                <div class="col-12">
                    <h1 class="display-4">Keep Betting Fun</h1>
                </div>
                <hr>
                <div class="col-12">
                    <p class="lead">Our custom advertising is not exclusive for the big companies, we will give opportunity to smaller businesses and traders. If this interests you please click the contact button above!</p>
                </div>
            </div>
        </div>

        <!--- Three Column Section -->
        <div class="container-fluid padding">
            <div class="row text-center padding">
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <i class="fas fa-chess-king"></i>
                    <h3>Be King of Game Pula</h3>
                    <p>Keep the game under control and bet responsible!</p>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <i class="fas fa-futbol"></i>
                    <h3>Donations</h3>
                    <p>Any donations go to further investments and future expansion of the website</p>
                </div>
                <div class="col-sm-12 col-md-4">
                    <i class="fab fa-css3"></i>
                    <h3>Engage</h3>
                    <p>Be an active member on our website and let us know your opinion!</p>
                </div>
            </div>
            <hr>
        </div>

        <!--- Connect -->
        <div class="container-fluid padding">
            <div class="row text-center padding">
                <div class="col-12">
                    <h2>About</h2>
                </div>
                <div class="col-12 social padding">
                    <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
                    <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                    <a href="https://vk.com/"><i class="fab fa-vk"></i></a>
                </div>
            </div>
        </div>


    </div>
@endsection
