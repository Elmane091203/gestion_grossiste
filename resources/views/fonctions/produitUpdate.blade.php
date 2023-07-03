<x-app-layout>
    <div class="container">
        <div class="card" style="box-shadow:2px 2px 20px blue,2px 2px 20px grey ;">
            <div class="card-header" style="background: rgb(2,36,36); color:white;text-align:center;">Modification Produit
            </div>
            <div class="card-body">
                <form action="{{ route('produit.update', $produit->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <label for="">Image</label><br>
                    <img src="{{ file_exists(public_path($produit->image))?asset($produit->image):url('public/images/' . $produit->image) }}" width="50" height="50"
                        value="{{ $produit->image }}">
                    <input type="file" class="form-control" name="image" value="{{ $produit->image }}">
                    <label for="">Libelle</label>
                    <input type="text" class="form-control" name="libelle" value="{{ $produit->libelle }}">
                    <label for="">Description</label>
                    <input type="text" class="form-control" name="description" value="{{ $produit->description }}">
                    <label for="">Stock</label>
                    <input type="text" class="form-control" name="stock" value="{{ $produit->stock }}">
                    <label for="">Prix Unitaire</label>
                    <input type="text" class="form-control" name="prixUnitaire" value="{{ $produit->prixUnitaire }}">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary offset-5">Sauvegarder</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
