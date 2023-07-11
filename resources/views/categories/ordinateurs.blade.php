<x-app-layout>
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row" style="display: flex; justify-content: center">
                <!-- STORE -->
                <div id="store" class="col-md-8">
                    <!-- store products -->
                    <div class="row" @if (count($produits) != 0) style="min-height: 600px" @endif>

                        @foreach ($produits as $p)
                            <!-- product -->
                            <div class="col-md-4 col-xs-6">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{ file_exists(public_path($p['image'])) ? asset($p['image']) : url('public/images/' . $p['image']) }}" alt="">
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
                            </div>
                            <!-- /product -->
                        @endforeach
                    </div>
                    <!-- /store products -->

                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
</x-app-layout>
