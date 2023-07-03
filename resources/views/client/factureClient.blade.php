<doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/autofill/2.4.0/css/autoFill.dataTables.min.css">
    <title>Gestion Stock</title>
  </head>
  <body> 
<div class="container mt-2">
    <div class="row bg-info p-3 mb-4">
        <h3 style="box-shadow:2px 2px 20px blue,2px 2px 20px grey ; text-align:center;">Gestion Stock</h3>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            return {{session('success')}}
        </div>
    @endif
    
    <div class="row">
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
        window.print();
    }

</script>