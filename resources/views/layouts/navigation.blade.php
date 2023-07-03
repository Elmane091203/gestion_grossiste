<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- HEADER -->
    <header>
        <?php
        $somme = 0;
        $paniers =
            Auth::user() != null
                ? App\Models\Panier::where('user_id', '=', Auth::user()->id, 'and')
                    ->where('etatC', '=', 0)
                    ->get()
                : [];
        ?>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="tel:+221781208599"><i class="fa fa-phone"></i> +221 78 120 8599</a></li>
                    <li><a href="mailto:elmane@groupeisi.com"><i class="fa fa-envelope-o"></i>elmane@groupeisi.com</a>
                    </li>
                    <li><a href="https://goo.gl/maps/psjPrrLfL9uTL1De6" target="_blank"><i class="fa fa-map-marker"></i>
                            MGRW+VXF, Dakar</a></li>
                </ul>
                <ul class="header-links pull-right">
                    <li>
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i
                                    class="fa fa-user-o"></i>
                                @if (Auth::user() != null)
                                    {{ Auth::user()->prenom . ' ' . Auth::user()->nom }}
                                @else
                                    {{ __('Mon Compte') }}
                                @endif
                            </a>
                            <div
                                class="cart-dropdown"style="background-color: rgb(76, 74, 74); text-align: center; width: auto">
                                @if (Route::has('login'))
                                    @auth
                                        <div><a href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></div>
                                        <div>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                            this.closest('form').submit();">{{ __('Log Out') }}</a>
                                            </form>
                                        </div>
                                    @else
                                        <a href="{{ route('login') }}"
                                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                                            in</a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}"
                                                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                        @endif
                                    @endauth
                                @endif

                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="/" class="logo">
                                <img src="{{ asset('img/logo.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">

                            <!-- Cart -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Votre panier</span>
                                    <div class="qty">
                                        {{ count($paniers) }}
                                    </div>
                                </a>
                                <div class="cart-dropdown">
                                    <div class="cart-list">
                                        @foreach ($paniers as $pa)
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="{{ asset($pa->produit->image) }}" alt="">
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-name"><a
                                                            href="">{{ $pa->produit->libelle }}</a>
                                                    </h3>
                                                    <h4 class="product-price"><span
                                                            class="qty">{{ $pa->quantite }}x</span>{{ $pa->produit->prixUnitaire }}FCFA
                                                    </h4>
                                                </div>
                                                <form action="{{ route('paniers.delete', $pa->id) }}" method="post">
                                                    @csrf
                                                    <button class="delete"><i class="fa fa-close"></i></button>
                                                </form>
                                            </div>
                                            <?php $somme += $pa->quantite * $pa->produit->prixUnitaire; ?>
                                        @endforeach
                                    </div>
                                    <div class="cart-summary">
                                        <small>{{ count($paniers) . __(' Produit(s) selectionné(s)') }} </small>
                                        <h5>SOMME TOTAL: {{ $somme }} FCFA</h5>
                                    </div>
                                    <div class="cart-btns">
                                        <a class="w-full" href="">Commander <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Cart -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container d-relative">
            <!-- responsive-nav -->
            <div id="responsive-nav sticky-top">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li class={{ request()->routeIs('acceuil') ? __('active') : '' }}><a
                            href="{{ route('acceuil') }}">Home</a></li>
                    <li class={{ route('categorie', 'ordinateurs') == request()->url() ? __('active') : '' }}><a
                            href="{{ route('categorie', 'ordinateurs') }}">Ordinateurs</a></li>
                    <li class={{ route('categorie', 'smartphones') == request()->url() ? __('active') : '' }}><a
                            href="{{ route('categorie', 'smartphones') }}">Smartphones</a></li>
                    <li class={{ route('categorie', 'cameras') == request()->url() ? __('active') : '' }}><a
                            href="{{ route('categorie', 'cameras') }}">Cameras</a></li>
                    <li class={{ route('categorie', 'accessoires') == request()->url() ? __('active') : '' }}><a
                            href="{{ route('categorie', 'accessoires') }}">Accessoires</a></li>
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->

</nav>
