@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-black">
                    <h4 class="mb-0">Admin Dashboard</h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">Welcome, Admin! Manage users below.</p>

                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle table-bordered border-dark">
                            <thead class="table-dark">
                                <tr>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        <span class="badge bg-secondary">{{ ucfirst($user->role) }}</span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('user.profile', $user->id) }}" class="btn btn-primary btn-sm">
                                                <i class="bi bi-eye-fill"></i> View
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteUser({{ $user->id }})">
                                                <i class="bi bi-trash3-fill"></i> Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    @if ($users->isEmpty())
                        <p class="text-center text-muted">No users found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
