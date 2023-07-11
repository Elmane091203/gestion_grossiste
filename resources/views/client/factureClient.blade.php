<x-app-layout>
<div class="container mt-2">
    <div class="row bg-info p-3 mb-4">
        <h3 style="box-shadow:2px 2px 20px blue,2px 2px 20px grey ; text-align:center;">Gestion Stock</h3>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            return {{session('success')}}
        </div>
    @endif
    
    <div id="factCli" class="row">
        <div class="card-header" style="background: rgb(2,36,36); color:white;text-align:center;"><h2> Reçue De nomClient prenomClient </h2></div>
            <div class="col-md-8 mt-5">               
                <h4> Numéro : </h4> <br>

                <h4> Nom : </h4> 

                <h4> Prénom :  </h4> <br>

                <h4 id="montant"> Total :  FCFA </h4>   
            </div>
            <div class="col-md-4 mt-5">   
            <table>
                <tr><td><img src=""></td></tr>
            </table>
            <h5 style="text-align: right;" class="mt-5">SIGNATURE</h5>
        </div> 
    </div>
</div>
<a href="" onclick="printme();" type="submit" class="btn btn-dark mt-3 offset-4">print</a>

<script>

    function  printme() {
        document.getElementById('factCli').print();
    }

</script>

</x-app-layout>