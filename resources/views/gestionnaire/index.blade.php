<x-app-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Ventes récentes Client</h6>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">Nom Gestionnaire</th>
                            <th scope="col">Numero commande</th>
                            <th scope="col">total</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
    
                    <tbody>
                       @foreach ($commandeClients as $CommandeClient)
                           <tr>
                            <td>{{ $CommandeClient->user->prenom.' '.$CommandeClient->user->nom }}</td>
                            <td>{{ $CommandeClient->panier_id }}</td>
                            <td>{{ $CommandeClient->panier->quantite * $CommandeClient->panier->produit->prixUnitaire }}</td>
                            <td></td>
                           </tr>
                       @endforeach 
                    </tbody>
                    
                </table>
            </div>
        </div>
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Ventes récentes Gestionnaire</h6>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">Nom fournisseur</th>
                            <th scope="col">Numero commande</th>
                            <th scope="col">total</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($commandeGestionnaires as $CommandeClient)
                           <tr>
                            <td>{{ $CommandeClient->user->prenom.' '.$CommandeClient->user->nom }}</td>
                            <td>{{ $CommandeClient->panier_id }}</td>
                            <td>{{ $CommandeClient->panier->quantite * $CommandeClient->panier->produit->prixUnitaire }}</td>
                            <td></td>
                           </tr>
                       @endforeach 
                     </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
