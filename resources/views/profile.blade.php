@extends('layouts.app')

@section('content')

<style>
    body {
    background-color: #f8f9fa;
}

.card {
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card-header {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.card-body img {
    border: 3px solid #007bff;
}

.table th, .table td {
    vertical-align: middle;
}

</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h2>Profile</h2>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="{{ Auth::user()->avatar ?? 'https://via.placeholder.com/150' }}" alt="Profile Picture" class="rounded-circle" width="150" height="150">
                    </div>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>:</td>
                                <td>{{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>:</td>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>:</td>
                                <td>{{ Auth::user()->created_at->format('d M Y') }}</td>
                            </tr>
                        </tbody>
                    </table>
                    {{-- <div class="text-center mt-4">
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
