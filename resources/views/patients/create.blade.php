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
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="firstname" class="form-label">Prénom</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" value="{{ old('firstname') }}" required>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="lastname" class="form-label">Nom</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" value="{{ old('lastname') }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Adresse e-mail</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Téléphone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
            </div>

            <div class="mb-3">
                <label for="birth_date" class="form-label">Date de naissance</label>
                <input type="date" name="birth_date" id="birth_date" class="form-control" value="{{ old('birth_date') }}">
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Sexe</label>
                <select name="gender" id="gender" class="form-select">
                    <option value="">-- Sélectionner --</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Homme</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Femme</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Adresse</label>
                <textarea name="address" id="address" class="form-control" rows="3">{{ old('address') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Créer</button>
            <a href="{{ route('patients') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
