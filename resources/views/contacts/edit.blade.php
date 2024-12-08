@extends('layouts.app')

@section('content')
<nav>
    <a href="{{ route('contatos.index') }}" class="back-link">&#8592; Back</a>
</nav>
<div>
    <h1>Edit Contact</h1>
    <form action="{{ route('contatos.update', $contact->id) }}" method="POST" class="contact-form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $contact->name) }}" required minlength="6" maxlength="250" class="input-field">
            <small class="error-message">Name must be more than 5 characters.</small>
        </div>

        <div class="form-group">
            <label for="contact">Contact</label>
            <input type="text" id="contact" name="contact" value="{{ old('contact', $contact->contact) }}" required pattern="\d{9}" maxlength="9" class="input-field">
            <small class="error-message">Contact must be 9 digits.</small>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $contact->email) }}" required class="input-field">
            <small class="error-message">Please enter a valid email address.</small>
        </div>

        <button type="submit" class="submit-btn">Save Changes</button>
    </form>
</div>
@endsection

<style>
    body, html {
        height: 100%;
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #fdf7f7e1;
    }

    .contact-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
        max-width: 600px;
        margin: 30px auto;
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .back-link {
        display: inline-block;
        margin-bottom: 20px;
        padding: 10px 15px;
        background-color: #007bff;
        color: white;
        border-radius: 5px;
        text-decoration: none;
        margin-top: 15px;
        margin-left: 15px;
    }

    .back-link:hover {
        background-color: #0056b3;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        width: 100%;
    }

    .form-group label {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .input-field {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        width: 100%;
    }

    .input-field:focus {
        border-color: #007bff;
        outline: none;
    }

    .error-message {
        font-size: 12px;
        color: #f44336;
        display: none;
    }

    .input-field:invalid + .error-message {
        display: block;
    }

    .submit-btn {
        padding: 10px 15px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .submit-btn:hover {
        background-color: #0056b3;
    }
</style>

<script>
    const form = document.querySelector('.contact-form');
    form.addEventListener('submit', function(e) {
        const nameField = document.getElementById('name');
        const contactField = document.getElementById('contact');
        const emailField = document.getElementById('email');

        if (nameField.value.length < 6) {
            e.preventDefault();
            nameField.nextElementSibling.style.display = 'block';
        } else {
            nameField.nextElementSibling.style.display = 'none';
        }

        if (!/^\d{9}$/.test(contactField.value)) {
            e.preventDefault();
            contactField.nextElementSibling.style.display = 'block';
        } else {
            contactField.nextElementSibling.style.display = 'none';
        }

        if (!/\S+@\S+\.\S+/.test(emailField.value)) {
            e.preventDefault();
            emailField.nextElementSibling.style.display = 'block';
        } else {
            emailField.nextElementSibling.style.display = 'none';
        }
    });
</script>
