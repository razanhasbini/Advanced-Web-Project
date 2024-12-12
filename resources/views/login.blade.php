@extends('layout')

@section('title', 'Login or Create Account - Coffee Shop')

@section('content')
<section class="auth-section py-5" style="background: #f8f9fa;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h2 id="form-title">Login</h2>
                        <button class="btn btn-link text-secondary switch-btn" id="switchForm">Switch to Create Account</button>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Login Form -->
                        <form id="loginForm" method="POST" action="{{ url('/login') }}" style="display: block;">
                            @csrf
                            <div class="mb-3">
                                <label for="emailLogin" class="form-label">Email</label>
                                <input type="email" class="form-control" id="emailLogin" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="passwordLogin" class="form-label">Password</label>
                                <input type="password" class="form-control" id="passwordLogin" name="password" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark">Login</button>
                            </div>
                        </form>

                        <!-- Register Form -->
                        <form id="registerForm" method="POST" action="{{ url('/register') }}" style="display: none;">
                            @csrf
                            <div class="mb-3">
                                <label for="usernameRegister" class="form-label">Username</label>
                                <input type="text" class="form-control" id="usernameRegister" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="emailRegister" class="form-label">Email</label>
                                <input type="email" class="form-control" id="emailRegister" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="passwordRegister" class="form-label">Password</label>
                                <input type="password" class="form-control" id="passwordRegister" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirmPasswordRegister" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPasswordRegister" name="password_confirmation" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark">Create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const switchButton = document.getElementById('switchForm');
        const loginForm = document.getElementById('loginForm');
        const registerForm = document.getElementById('registerForm');
        const formTitle = document.getElementById('form-title');

        switchButton.addEventListener('click', () => {
            if (loginForm.style.display === 'none') {
                loginForm.style.display = 'block';
                registerForm.style.display = 'none';
                formTitle.textContent = 'Login';
                switchButton.textContent = 'Switch to Create Account';
            } else {
                loginForm.style.display = 'none';
                registerForm.style.display = 'block';
                formTitle.textContent = 'Create Account';
                switchButton.textContent = 'Switch to Login';
            }
        });
    });
</script>
@endsection
