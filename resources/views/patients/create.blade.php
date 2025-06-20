@extends('layouts.doctor', ['title' => ' All Patients'])

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Créer un nouveau patient</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Erreur !</strong> Veuillez corriger les erreurs suivantes :
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('patients.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body row">
                <div class="mb-3 col-md-2">
                    <label for="gender" class="form-label">Sexe</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="">-- Sélectionner --</option>
                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Homme</option>
                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Femme</option>
                    </select>
                </div>
                <div class="mb-3 col-md-5">
                    <label for="first_name" class="form-label">Prénom</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}" required>
                </div>
                <div class="mb-3 col-md-5">
                    <label for="last_name" class="form-label">Nom</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}" required>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">Adresse e-mail</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="phone" class="form-label">Téléphone</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="date_of_birth" class="form-label">Date de naissance</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}">
                </div>

                <div class="mb-3 col-md-6">
                    <label for="emergency_contact_name" class="form-label">Date de naissance</label>
                    <input type="text" name="emergency_contact_name" id="emergency_contact_name" class="form-control" value="{{ old('emergency_contact_name') }}">
                </div>

                <div class="mb-3 col-md-6">
                    <label for="emergency_contact_phone" class="form-label">Date de naissance</label>
                    <input type="text" name="emergency_contact_phone" id="emergency_contact_phone" class="form-control" value="{{ old('emergency_contact_phone') }}">
                </div>
                <div class="mb-3 col-12">
                    <label for="address" class="form-label">Adresse</label>
                    <textarea name="address" id="address" class="form-control" rows="3">{{ old('address') }}</textarea>
                </div>
            </div>
            <div class="card-footer mb-3">
                <button type="submit" class="btn btn-primary">Créer</button>
                <a href="{{ route('patients') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </div>
</div>

</form>
@endsection
