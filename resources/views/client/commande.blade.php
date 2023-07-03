<x-app-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">Produit</th>
                            <th scope="col">Client</th>
                            <th scope="col">Quantite</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paniers as $p)
                            <tr class="text-white">
                                <td scope="col"><img width="50" height="50"
                                        src="{{ file_exists(public_path($p->produit->image)) ? asset($p->produit->image) : url('public/images/' . $p->produit->image) }}"
                                        alt="">{{ $p->produit->libelle }}</td>
                                <td scope="col">{{ $p->user->prenom . ' ' . $p->user->nom }}</td>
                                <td scope="col">{{ $p->quantite }}</td>
                                <td scope="col">{{ $p->quantite * $p->produit->prixUnitaire }}</td>
                                <td>
                                    @if ($p->quantite > $p->produit->stock)
                                    <form action="{{ route('gestionnaire.commandeC',['Annuler',$p->id]) }}" method="post">
                                        @csrf 
                                        <button class="btn btn-danger">Annuler</button>
                                    </form> 
                                    @else
                                    <form action="{{ route('gestionnaire.commandeC',['Valider',$p->id]) }}" method="post">
                                        @csrf 
                                        <button class="btn btn-success">Valider</button>
                                    </form> 
                                    @endif


                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
