<doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/autofill/2.4.0/css/autoFill.dataTables.min.css">
    <title>Tawfex-Salihy</title>
  </head>
  <body> 
<div class="card-body" style="box-shadow:2px 2px 20px blue,2px 2px 20px grey ; text-align:center;">
    <div class="card-header" style="background: rgb(2,36,36); color:white;text-align:center;">Liste Des Gestionnaires</div>
        <table class="table table-bordered" id="list">
            <tr>
                <th>NOM</th>
                <th>PRENOM</th>
                <th>Email</th>
                <th>ACTIONS</th>
            </tr>
            @foreach($gestionnaires as $gestionnaire)
            <tr>
                <td>{{ $gestionnaire->nom }}</td>
                <td>{{ $gestionnaire->prenom }}</td>
                <td>{{ $gestionnaire->email }}</td>
                <td>
                    <a href="">✍🏽</a>
                    <a href="" class="btn btn-warning">👁‍🗨</a>
                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#suppression">🗑</a>
                </td>
            </tr>
            @endforeach
        </table>  
    </div>