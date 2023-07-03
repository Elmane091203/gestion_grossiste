@include('header')
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ajoutProduit">
  Acheter Produit
</button>
</div>
<div class="container">
<div style="box-shadow:2px 2px 20px blue,2px 2px 20px grey ; text-align:center;">
    <div class="card-header" style="background: rgb(2,36,36); color:white;text-align:center;">Liste Des Produit</div>
        <table class="table table-bordered bg-white" id="list">
            <tr>
                <th>IMAGE</th>
                <th>LIBELLE</th>
                <th>DESCRIPTION</th>
                <th>STOCK</th>
                <th>PRIX UNITAIRE</th>
                <th>ACTIONS</th>
            </tr>
            @foreach($produits as $produit)
            <tr>
                <td><img src="{{ url('public/images/'.$produit->image) }}" width="60" height="60" class="img img-responsive" alt=""></td>
                <td>{{ $produit->libelle }}</td>
                <td>{{ $produit->description }}</td>
                <td>{{ $produit->stock }}</td>
                <td>{{ $produit->prixUnitaire }}</td>
                <td>
                    <a href="{{route('produit.modif',$produit->id)}}" class="btn btn-">✍🏽</a>
                    <a href="{{$produit->id}}" class="btn btn-danger" data-toggle="modal" data-target="#suppression">🗑</a>
                </td>
            </tr>
            @endforeach
        </table>  
    </div>

    <!-- Ajout Produit -->
<div class="modal fade" id="ajoutProduit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <div class="card-header" style="background: rgb(2,36,36); color:white;text-align:center;">Ajout Produit</div>
            <div class="card-body">
            <form action="{{route('produit.store')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <label for="">Image</label>
                <input type="file" class="form-control" name="image">
                <label for="">Libelle</label>
                <input type="text" class="form-control" name="libelle">
                <label for="">Description</label>
                <input type="text" class="form-control" name="description">
                <label for="">Stock</label>
                <input type="text" class="form-control" name="stock">
                <label for="">Prix Unitaire</label>
                <input type="text" class="form-control" name="prixUnitaire">
                <!-- <button type="button" class="btn btn-secondary">Close</button> -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary offset-5">Enregistrer</button>
                </div>
            </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="suppression" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="exampleModalLabel">Suppression D'un Produit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('produit.destroy',$produit->id) }}" method="post">
                <div class="modal-body">
                    <h4>Voulez vous supprimer cet produit?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                    @csrf @method('DELETE') 
                    <button type="submit" id="btnDelete" class="btn alert-danger">Oui</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/autofill/2.4.0/js/dataTables.autoFill.min.js"></script>
<script>
$(document).ready(function () {
 
 $('#list').DataTable({

     language: {  url: "//cdn.datatables.net/plug-ins/1.11.5/i18n/fr-FR.json" }

 });

});
</script>

</body>
<!-- <script type="javascript">
       document.onsubmit=function(){
           return confirm('Sure?');
       }
</script> -->
</html>