<?php include 'includes/indexHeader.php'; ?>

<body>

  <?php include 'includes/indexNavbar.php'; ?>

  <div class="container login-register-container">
    <div class="auth-box">
      <ul class="tab-nav">
        <li class="active" data-tab="login">Log In</li>
        <li data-tab="register">Register</li>
      </ul>

      <div class="tab-content">
        <!-- Login Form -->
        <div class="tab-item active" id="login">
          <h3>Welcome Back!</h3>
          <p>Sign in to continue</p>
          <form method="post" id="login-form" action="./process/login.php">
            <select name="acctype">
              <option value="Applicant">Job Seeker/Applicant</option>
              <option value="Employer">Employer</option>
              <option value="Admin">Admin</option>
            </select>
            <input type="email" name="email" placeholder="Email Address" required />
            <input type="password" name="password" placeholder="Password" required minlength="6" />
            <button type="submit" name="loginbtn" class="btn">Log In</button>
          </form>
          <p class="switch-text">Don't have an account? <span class="switch-tab" data-tab="register">Sign Up</span></p>
        </div>

        <!-- Register Form -->
        <div class="tab-item" id="register">
          <h3>Create Account</h3>
          <p>Join us today!</p>
          <form method="post" id="register-form" action="./process/register.php">
            <select name="acctype">
              <option value="Applicant">Job Seeker/Applicant</option>
              <option value="Employer">Employer</option>
            </select>
            <input type="text" name="fullname" placeholder="Full Name / Company's Name" required />
            <input type="email" name="email" placeholder="Email Address" required />
            <input type="password" name="password" placeholder="Password" required minlength="6" />
            <input type="password" name="passwordrepeat" placeholder="Repeat Password" required minlength="6" />
            <button type="submit" name="registerbtn" class="btn">Register</button>
          </form>
          <p class="switch-text">Already have an account? <span class="switch-tab" data-tab="login">Log In</span></p>
        </div>
      </div>
    </div>
  </div>

  <style>
    body {
      font-family: 'Arial', sans-serif;
      background: #f4f7f9;
      margin: 0;
      padding: 0;
    }

    .login-register-container {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 85vh;
    }

    .auth-box {
      background: #ffffff;
      padding: 45px;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      width: 420px;
      transition: transform 0.3s ease;
    }

    .auth-box:hover {
      transform: translateY(-5px);
    }

    .tab-nav {
      display: flex;
      justify-content: space-around;
      margin-bottom: 25px;
      cursor: pointer;
      border-bottom: 2px solid #e0e0e0;
    }

    .tab-nav li {
      list-style: none;
      padding: 12px 25px;
      font-weight: bold;
      color: #555;
      transition: color 0.3s, border-bottom 0.3s;
    }

    .tab-nav li.active {
      border-bottom: 3px solid #0d6efd;
      color: #0d6efd;
    }

    .tab-nav li:hover {
      color: #0d6efd;
    }

    .tab-item {
      display: none;
      animation: fadeIn 0.3s ease;
    }

    .tab-item.active {
      display: block;
    }

    .tab-item h3 {
      margin-bottom: 10px;
      color: #222;
    }

    .tab-item p {
      margin-bottom: 20px;
      color: #666;
      font-size: 14px;
    }

    input, select {
      width: 100%;
      padding: 14px;
      margin-bottom: 18px;
      border-radius: 10px;
      border: 1px solid #ccc;
      box-sizing: border-box;
      transition: border 0.3s, box-shadow 0.3s;
    }

    input:focus, select:focus {
      border-color: #0d6efd;
      box-shadow: 0 0 5px rgba(13, 110, 253, 0.3);
      outline: none;
    }

    button.btn {
      width: 100%;
      padding: 14px;
      background: #0d6efd;
      color: #fff;
      border: none;
      border-radius: 10px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s, transform 0.2s;
    }

    button.btn:hover {
      background: #0b5ed7;
      transform: translateY(-2px);
    }

    .switch-text {
      text-align: center;
      font-size: 14px;
      color: #555;
    }

    .switch-tab {
      color: #0d6efd;
      cursor: pointer;
      transition: color 0.3s;
    }

    .switch-tab:hover {
      color: #0b5ed7;
    }

    @keyframes fadeIn {
      from {opacity: 0;}
      to {opacity: 1;}
    }
  </style>

  <script>
    // Tab switching
    document.querySelectorAll('.switch-tab, .tab-nav li').forEach(item => {
      item.addEventListener('click', function () {
        const tab = this.dataset.tab;

        document.querySelectorAll('.tab-item').forEach(t => t.classList.remove('active'));
        document.querySelectorAll('.tab-nav li').forEach(t => t.classList.remove('active'));

        document.getElementById(tab).classList.add('active');
        document.querySelector(`.tab-nav li[data-tab="${tab}"]`).classList.add('active');
      });
    });
  </script>

</body>
</html>
