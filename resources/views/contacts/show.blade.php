@extends('layouts.app')

@section('content')
<div class="card">
    <a href="{{ route('contatos.index') }}" class="back-link">&#8592; Back</a>
    <h1>Contact Details</h1>
    <form action="#" method="POST" class="contact-form">
        @csrf
        <div class="form-group">
            <input type="text" id="name" name="name" value="{{ old('name', $contact->name) }}" placeholder="Name" readonly class="input-field">
        </div>

        <div class="form-group">
            <input type="text" id="contact" name="contact" value="{{ old('contact', $contact->contact) }}" placeholder="Contact" readonly class="input-field">
        </div>

        <div class="form-group">
            <input type="email" id="email" name="email" value="{{ old('email', $contact->email) }}" placeholder="Email" readonly class="input-field">
        </div>
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
</style>
