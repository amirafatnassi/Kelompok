@extends('layouts.doctor', ['title' => 'Créer Patient'])

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Créer un patient</h2>

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
            <div class="row">
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

                <div class="mb-3 col-md-4">
                    <label for="email" class="form-label">Adresse e-mail</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                </div>

                <div class="mb-3 col-md-4">
                    <label for="phone" class="form-label">Téléphone</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
                </div>

                <div class="mb-3 col-md-4">
                    <label for="date_of_birth" class="form-label">Date de naissance</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}">
                </div>

                <div class="mb-3 col-md-4">
                    <label for="country">Pays</label>
                    <select name="country_id" id="country" class="form-control" required>
                        <option value="">-- Sélectionnez un pays --</option>
                        @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
                            {{ $country->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="state">Gouvernorat / État</label>
                    <select name="state_id" id="state" class="form-control" required>
                        <option value="">-- Sélectionnez une région --</option>
                    </select>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="city">Ville</label>
                    <select name="city_id" id="city" class="form-control" required>
                        <option value="">-- Sélectionnez une ville --</option>
                    </select>
                </div>

                <div class="mb-3 col-md-6">
                    <label for="emergency_contact_name" class="form-label">Contact d'urgence (Nom)</label>
                    <input type="text" name="emergency_contact_name" id="emergency_contact_name" class="form-control" value="{{ old('emergency_contact_name') }}">
                </div>

                <div class="mb-3 col-md-6">
                    <label for="emergency_contact_phone" class="form-label">Téléphone du contact d'urgence</label>
                    <input type="text" name="emergency_contact_phone" id="emergency_contact_phone" class="form-control" value="{{ old('emergency_contact_phone') }}">
                </div>

                <div class="mb-3 col-12">
                    <label for="address_line1" class="form-label">Adresse 1</label>
                    <input name="address_line1" id="address_line1" class="form-control" value="{{ old('address_line1') }}" />
                </div>

                <div class="mb-3 col-12">
                    <label for="address_line2" class="form-label">Adresse 2</label>
                    <input name="address_line2" id="address_line2" class="form-control" value="{{ old('address_line2') }}" />
                </div>
            </div>

            <p align="center" style="padding-top: 20px">
                <button type="submit" class="btn btn-primary">Créer</button>
                <a href="{{ route('patients') }}" class="btn btn-secondary">Annuler</a>
            </p>
        </div>
    </form>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const countrySelect = document.getElementById('country');
        const stateSelect = document.getElementById('state');
        const citySelect = document.getElementById('city');

        countrySelect.addEventListener('change', function() {
            const countryId = this.value;
            stateSelect.innerHTML = '<option value="">Chargement...</option>';
            citySelect.innerHTML = '<option value="">-- Sélectionnez une ville --</option>';

            fetch(`/states/${countryId}`)
                .then(res => res.json())
                .then(data => {
                    stateSelect.innerHTML = '<option value="">-- Sélectionnez une région --</option>';
                    data.forEach(state => {
                        stateSelect.innerHTML += `<option value="${state.id}">${state.name}</option>`;
                    });
                });
        });

        stateSelect.addEventListener('change', function() {
            const stateId = this.value;
            citySelect.innerHTML = '<option value="">Chargement...</option>';

            fetch(`/cities/${stateId}`)
                .then(res => res.json())
                .then(data => {
                    citySelect.innerHTML = '<option value="">-- Sélectionnez une ville --</option>';
                    data.forEach(city => {
                        citySelect.innerHTML += `<option value="${city.id}">${city.name}</option>`;
                    });
                });
        });

    });
</script>
@endsection
