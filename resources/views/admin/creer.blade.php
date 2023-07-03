<x-app-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h3>CREER UN COMPTE</h3>
                        </div>
                        <form action="{{ route('creer.store') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" required id="floatingText"
                                    placeholder="jhondoe" name="nom">
                                <label for="floatingText">Nom</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" required id="floatingText"
                                    placeholder="jhondoe" name="prenom">
                                <label for="floatingText">Prénom</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" :value="old('email')" required autofocus
                                    autocomplete="username" id="floatingInput" placeholder="name@example.com"
                                    name="email">
                                <label for="floatingInput">Adresse Email</label>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" required id="floatingPassword"
                                    placeholder="Password" name="password">
                                <label for="floatingPassword">Password</label>
                                <div class="password-icon">
                                    <i data-feather="eye"></i>
                                    <i data-feather="eye-off"></i>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" required id="floatingText"
                                    value="{{ Auth::user()->role == 'admin' ? strtoupper('gestionnaire') : strtoupper('fournisseur') }}"
                                    name="role" disabled>
                                <label for="floatingInput">Role</label>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Creer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
