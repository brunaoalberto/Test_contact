@extends('layouts.app')

@section('content')
<div>
    <h1>Contact List</h1>
    <a href="{{ route('contatos.create') }}" class="add-link">&#43; Add New Contact</a>

    <table id="contatos-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contatos as $contato)
            <tr>
                <td>{{ $contato->name }}</td>
                <td>{{ $contato->contact }}</td>
                <td>{{ $contato->email }}</td>
                <td>
                    <div class="q-toggle-container">
                        <button class="toggle-btn" onclick="toggleActions({{ $contato->id }})">
                            Actions
                            <span class="toggle-arrow">&#x2193;</span>
                        </button>

                        <div id="actions-{{ $contato->id }}" class="actions-panel">
                            <a href="/contatos/{{ $contato->id }}/edit" class="q-btn edit-button">Edit</a>
                            <a href="/contatos/{{ $contato->id }}" class="q-btn details-button">Details</a>
                            <form action="/contatos/{{ $contato->id }}" method="POST" style="display:inline;">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="q-btn delete-button">Delete</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

<style>
    #contatos-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 30px;
    }

    #contatos-table th, #contatos-table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    #contatos-table th {
        background-color: #f2f2f2;
        color: #333;
        font-weight: bold;
    }

    #contatos-table tr:hover {
        background-color: #f9f9f9;
    }

    .q-toggle-container {
        position: relative;
    }

    .toggle-btn {
        background-color: #ffffff;
        color: #007bff;
        padding: 10px 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        text-align: left;
    }

    .toggle-btn:hover {
        background-color: #f8f8f8;
    }

    .toggle-arrow {
        font-size: 18px;
        transition: transform 0.3s ease;
    }

    .toggle-arrow.open {
        transform: rotate(180deg);
    }

    .actions-panel {
        position: absolute;
        top: 100%;
        left: 0;
        background-color: white;
        padding: 10px;
        border-radius: 5px;
        width: 100%;
        display: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 10;
    }

    .actions-panel .q-btn {
        display: block;
        margin-top: 5px;
        width: 100%;
        padding: 8px 15px;
        border-radius: 5px;
        text-decoration: none;
        text-align: center;
        box-sizing: border-box;
    }

    .edit-button {
        background-color: #4CAF50;
        color: white;
    }

    .details-button {
        background-color: #007bff;
        color: white;
    }

    .delete-button {
        background-color: #f44336;
        color: white;
    }

    .add-link {
        text-decoration: none;
        padding: 10px 15px;
        background-color: #007bff;
        color: white;
        border-radius: 5px;
        display: inline-flex;
        align-items: center;
    }

    .add-link i {
        margin-right: 5px;
    }

    .add-link:hover {
        background-color: #0056b3;
    }
</style>

<script>
    function toggleActions(contactId) {
        const actions = document.getElementById('actions-' + contactId);
        const arrow = document.querySelector(`#actions-${contactId} .toggle-arrow`);

        if (actions.style.display === "none" || actions.style.display === "") {
            actions.style.display = "block";
            arrow.classList.add('open');
        } else {
            actions.style.display = "none";
            arrow.classList.remove('open');
        }
    }
</script>
