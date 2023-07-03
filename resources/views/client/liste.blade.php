<x-app-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-white text-center rounded p-4">
            <div class="table-responsive bg-secondary">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $c)
                            <tr class="text-white">
                                <td scope="col">{{ $c->nom }}</td>
                                <td scope="col">{{ $c->prenom }}</td>
                                <td scope="col">{{ $c->email }}</td>
                                <td scope="col">{{ $c->password }}</td>
                                <td>
                                    <a href="">✍🏽</a>
                                    <a href="" class="btn btn-warning">👁‍🗨</a>
                                    <a href="" class="btn btn-danger" data-toggle="modal"
                                        data-target="#suppression">🗑</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>