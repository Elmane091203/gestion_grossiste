<x-app-layout>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ajoutProduit">
        Ajouter Produit
    </button>
    </div>
    <div class="container">
        <div style="box-shadow:2px 2px 20px blue,2px 2px 20px grey ; text-align:center;">
            <div class="card-header" style="background: rgb(2,36,36); color:white;text-align:center;">Liste Des Produit
            </div>
            <table class="table table-bordered bg-white" id="list">
                <tr>
                    <th>IMAGE</th>
                    <th>LIBELLE</th>
                    <th>DESCRIPTION</th>
                    <th>STOCK</th>
                    <th>PRIX UNITAIRE</th>
                    <th>ACTIONS</th>
                </tr>
                @foreach ($produits as $produit)
                    <tr>
                        <td><img src="{{ file_exists(public_path($produit->image)) ? asset($produit->image) : url('public/images/' . $produit->image) }}"
                                width="60" height="60" class="img img-responsive" alt=""></td>
                        <td>{{ $produit->libelle }}</td>
                        <td>{{ $produit->description }}</td>
                        <td>{{ $produit->stock }}</td>
                        <td>{{ $produit->prixUnitaire }}</td>
                        <td>
                            <a href="{{ route('produit.modif', $produit->id) }}" class="btn btn-">✍🏽</a>
                            <a class="btn btn-danger" data-toggle="modal"
                                data-target="#suppression{{ $produit->id }}">🗑</a>
                        </td>
                    </tr>

                    <div class="modal fade" id="suppression{{ $produit->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-danger">
                                    <h5 class="modal-title text-white" id="exampleModalLabel">Suppression D'un Produit
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('produit.destroy', $produit->id) }}" method="post">
                                    <div class="modal-body ">
                                        <h5 class="text-dark">Voulez vous supprimer ce produit?</h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Non</button>
                                        @csrf @method('DELETE')
                                        <button type="submit" id="btnDelete" class="btn alert-danger">Oui</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </table>
        </div>

        <!-- Ajout Produit -->
        <div class="modal fade" id="ajoutProduit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajout Produit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card" style="box-shadow:2px 2px 20px blue,2px 2px 20px grey ;">
                            <div class="card-header" style="background: rgb(2,36,36); color:white;text-align:center;">
                                Ajout Produit</div>
                            <div class="card-body">
                                <form action="{{ route('produit.store') }}" enctype="multipart/form-data"
                                    method="POST">
                                    @csrf
                                    <label for="">Image</label>
                                    <input type="file" class="form-control" required name="image">
                                    <label for="">Libelle</label>
                                    <input type="text" class="form-control" required name="libelle">
                                    <label for="">Description</label>
                                    <input type="text" class="form-control" required name="description">
                                    <label for="">Stock</label>
                                    <input type="number" min="1"  class="form-control" required name="stock">
                                    <label for="">Prix Unitaire</label>
                                    <input type="number" min="1500"  class="form-control" required name="prixUnitaire">
                                    <label for="">Categorie</label>
                                    <select name="categorie" id="" @readonly(true) class="form-control">
                                        @foreach (App\Models\Produit::categories() as $c)
                                        <option value="{{ $c }}">{{ strtoupper($c) }}</option>
                                            
                                        @endforeach
                                    </select>
                                    <!-- <button type="button" class="btn btn-secondary">Close</button> -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary offset-5">Enregistrer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
