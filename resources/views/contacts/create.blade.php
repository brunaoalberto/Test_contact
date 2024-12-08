@extends('layouts.app')

@section('content')
<div class="card">
    <a href="{{ route('contatos.index') }}" class="back-link">&#8592; Voltar</a>
    <h1>Criar Novo Contato</h1>
    <form action="{{ route('contatos.store') }}" method="POST" class="contact-form">
        @csrf
        <div class="form-group">
            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Nome" required minlength="6" maxlength="250" class="input-field">
            <small class="error-message">O nome deve ter mais de 5 caracteres.</small>
        </div>

        <div class="form-group">
            <input type="text" id="contact" name="contact" value="{{ old('contact') }}" placeholder="Contato" required pattern="\d{9}" maxlength="9" class="input-field">
            <small class="error-message">O contato deve ter 9 dígitos.</small>
        </div>

        <div class="form-group">
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required class="input-field">
            <small class="error-message">Por favor, insira um e-mail válido.</small>
        </div>

        <button type="submit" class="submit-btn">Salvar Contato</button>
    </form>
</div>
@endsection

<style>
    /* Estilos gerais */
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
    // Este script valida os campos ao submeter o formulário
    const form = document.querySelector('.contact-form');
    form.addEventListener('submit', function(e) {
        const nameField = document.getElementById('name');
        const contactField = document.getElementById('contact');
        const emailField = document.getElementById('email');

        // Validações dos campos
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
