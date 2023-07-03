<x-app-layout>
    <!-- SECTION -->
    <div class="section">
        <!-- container shop -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="{{ asset('img/shop01.png') }}" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Laptop<br>Collection</h3>
                            <a href="#" class="cta-btn">Acheter Maintenant <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="{{ asset('img/shop03.png') }}" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Accessoires<br>Collection</h3>
                            <a href="#" class="cta-btn">Acheter Maintenant <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="{{ asset('img/shop02.png') }}" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Cameras<br>Collection</h3>
                            <a href="#" class="cta-btn">Acheter Maintenant <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /shop -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
    <!-- SECTION -->
    <div class="section" style="background-color: rgb(80, 80, 79)">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    
                                    @foreach ($produits as $p)
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="{{ $p['image'] }}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{ $p['categorie'] }}</p>
                                            <h3 class="product-name">{{ $p['libelle'] }}</h3>
                                            <h4 class="product-price">{{ $p['prixUnitaire'] }} FCFA</h4>
                                            
                                            <div class="product-btns">
                                                <button class="quick-view"><i class="fa fa-eye"></i><span
                                                        class="tooltipp">Visualiser le produit</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <form action="{{ route('paniers.create') }}" method="post">
                                                @csrf
                                                @if (Auth::user()!=null)
                                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                @endif
                                                <input type="hidden" name="produit_id" value="{{ $p['id'] }}">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Ajouter au panier</button>
                                            </form>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab2" class="tab-pane fade in active">
                                <div class="products-slick" data-nav="#slick-nav-2">
                                    
                                    @foreach ($produits2 as $p)
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="{{ $p['image'] }}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{ $p['categorie'] }}</p>
                                            <h3 class="product-name">{{ $p['libelle'] }}</h3>
                                            <h4 class="product-price">{{ $p['prixUnitaire'] }} FCFA</h4>
                                            
                                            <div class="product-btns">
                                                <button class="quick-view"><i class="fa fa-eye"></i><span
                                                        class="tooltipp">Visualiser le produit</span></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <form action="{{ route('paniers.create') }}" method="post">
                                                @csrf
                                                @if (Auth::user()!=null)
                                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                @endif
                                                <input type="hidden" name="produit_id" value="{{ $p['id'] }}">
                                                
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Ajouter au panier</button>
                                            </form>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div id="slick-nav-2" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- /Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

</x-app-layout>
