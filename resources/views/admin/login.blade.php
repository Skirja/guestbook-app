<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin</title>

  <link rel="shortcut icon" href="{{ asset('assets/icon.svg') }}" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: #f5f5f5;
      font-family: 'Poppins', sans-serif;
    }

    .login-container {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }

    .login-card {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
      padding: 40px;
      width: 400px;
      max-width: 90%;
    }

    .login-card h3 {
      text-align: center;
      margin-bottom: 30px;
      color: #333;
    }

    .form-control {
      border-radius: 5px;
      border: 1px solid #ced4da;
      padding: 12px 18px;
      font-size: 16px;
    }

    .form-control:focus {
      border-color: #007bff;
      box-shadow: none;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      border-radius: 5px;
      padding: 12px 18px;
      font-size: 16px;
    }

    .btn-primary:hover {
      background-color: #0069d9;
      border-color: #0062cc;
    }

    .alert {
      border-radius: 5px;
    }
  </style>
</head>

<body>
  <div class="container login-container">
    <div class="login-card">
      <h3 class="mb-4">Login Admin</h3>

      @if(session('success'))
      <div class="alert alert-warning">
        {{ session('success') }}
      </div>
      @endif

      <form action="{{ route('admin.login.submit') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
            value="{{ old('email') }}" required>
          @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
            name="password" required>
          @error('password')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100">Login</button>
      </form>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
