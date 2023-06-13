<!DOCTYPE html>
<html>
<head>
  <title>Hospital Management System</title>
  <style>
      body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background: url("/frontend/h2.jpg") no-repeat center center fixed;
        background-size: cover;
      }
    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.8);
    }
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    
    .login-box {
      width: 350px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      position: relative;
      z-index: 1;
    }
    
    .login-header {
      background-color: #3f51b5;
      color: #fff;
      padding: 20px;
      text-align: center;
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
    }
    
    .login-header h2 {
      margin: 0;
      font-size: 24px;
    }
    
    .login-form {
      padding: 20px;
    }
    
    .form-group {
      margin-bottom: 18px;
    }
    
    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 8px;
        color: #595959;
        font-size: 14px;
    }
    
    .form-group input[type="email"],
    .form-group input[type="text"],
    .form-group input[type="password"],
    .form-group select {
      width: 100%;
      padding: 8px;
      border: none;
      border-radius: 5px;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .login-bottom-links a.link {
        display: block;
        color: #72818e;
        text-decoration: none;
        text-align: center;
    }
    
    .form-group input[type="submit"] {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 5px;
      background-color: #3f51b5;
      color: #fff;
      cursor: pointer;
      font-weight: bold;
    }
    
    .form-group input[type="submit"]:hover {
      background-color: #2c387e;
    }
    
    .error-message {
      color: red;
      font-size: 14px;
      margin-top: -10px;
      margin-bottom: 10px;
    }
    .invalid-feedback {
      font-size: 13px;
      color: red!important;
    }
  </style>
</head>
<body>
  <div class="overlay"></div>
  <div class="container">
    <div class="login-box">
      <div class="login-header">
        <h2>Hospital Management System</h2>
      </div>
      <div class="login-form">
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="error-message"></div>
          <div class="form-group">
            <label for="email">User Email</label>
            <input type="email" name="email" id="email" required class="@error('email') is-invalid @enderror" autocomplete="off">
            @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password"  name="password" required class="@error('passowrd') is-invalid @enderror">
            @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="password">User Role</label>
            <select name="role" id="" class="@error('role') is-invalid @enderror">
              <option value="" selected disabled>Select user role</option>
              <option value="admin">Admin</option>
              <option value="doctor">Doctor</option>
            </select>
            @error('role')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="form-group">
            <input type="submit" value="Login">
          </div>
        </form>

        <div class="login-bottom-links">
            <a href="javascript:void(0)" class="link">
                Forgot Your Password ?
            </a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
