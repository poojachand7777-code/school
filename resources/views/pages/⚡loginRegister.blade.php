<?php

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

new #[Layout('layouts::login_layout')] class extends Component
{
    public $operation="login";
    public $name, $email, $password, $password_confirmation;
    public $terms = false;

    public function register(){
      $this->validate([
          'name' => 'required',
          'email' => 'required|email|unique:users,email',
          'password' => [
            'required',
            'confirmed',
            Password::min(4),
          ],
      ]);

      $user = new User();

      $user->name = $this->name;
      $user->email = $this->email;
      $user->password = Hash::make($this->password);

      $user->save();

      $this->dispatch(
          'success',
          message: 'Account created successfully'
      );
        return redirect()->intended('/loginRegister');


      
  }
  public function login(){

    $data = $this->validate([
        'email'=>'required',
        'password'=>'required'
    ]);

    if (Auth::attempt($data)) {
        session()->regenerate();
      $this->dispatch('success',message: 'login successfully');

        return redirect()->intended('/');
    }
    else{
        $this->dispatch('error',message: 'something went wrong');
    }
  }

  public function toggleOperation(){
      
    if($this->operation=="register"){
      $this->operation="login";
    }
    else if($this->operation=="login"){
      $this->operation="register";
    }
  }

};
?>

<div>
    <!-- Login -->
  <main class="container">

    <!-- Welcome Section -->
    <section class="welcome-section">

      <div class="logo">
        <div class="logo-icon">S</div>
        <span>Springfield Academy</span>
      </div>

      <div class="welcome-content">
        <h1>Welcome Back!</h1>

        <p>
          Access your school portal to stay connected with your
          classes, assignments, announcements, and school community.
        </p>

        <ul class="features">
          <li>
            <span class="check">✓</span>
            View your academic information
          </li>

          <li>
            <span class="check">✓</span>
            Check assignments and schedules
          </li>

          <li>
            <span class="check">✓</span>
            Stay updated with school announcements
          </li>
        </ul>
      </div>

    </section>

    @if($this->operation == "login")
    <!-- Login Section -->
    <section class="login-section">

      <div class="login-header">
        
        <h2>Sign In</h2>
        <p>Enter your details to access the school portal.</p>
      </div>

      <form id="loginForm" wire:submit="login">

        <div class="form-group">
          <label for="email">Email or Student ID</label>

          <div class="input-wrapper">
            <input
              type="text"
              name="email"
              wire:model="email"
              placeholder="Enter your email or student ID"
              required
            />

            <span class="input-icon">👤</span>
          </div>
        </div>

        <div class="form-group">
          <label for="password">Password</label>

          <div class="input-wrapper">
            <input
              type="password"
              id="password"
              name="password"
              wire:model="password"
              placeholder="Enter your password"
              autocomplete="current-password"
              required
            />

          
               <span
                  class="input-icon password-toggle"
                  onclick="togglePassword('password', this)"
                  title="Show password">
                  👁
              </span>
          </div>
        </div>

        <div class="options">

          <label class="remember">
            <input type="checkbox" id="remember">
            Remember me
          </label>

          <a href="#" class="forgot">
            Forgot password?
          </a>

        </div>

        <button type="submit" class="login-button" >
          Sign In
        </button>

      </form>

      <div class="divider">Need assistance?</div>

      <div class="help">
        Having trouble signing in?<br>
        Please contact your
        <a href="#">school administrator</a>.
        <br>
        <button wire:click="toggleOperation" class="text-primary fw-bold">Create Account</button>
      </div>
      
      <div class="copyright">
        © 2026 Springfield Academy. All rights reserved.
      </div>

    </section>


    @else($this->operation=="register")
      <section class="login-section">
        <div class="login-header">
            <h2>
                Create Account
            </h2>
            <p>
              Enter your details to register for the school portal.
            </p>
        </div>

        @if (session('success'))
          <div class="success-message">
              {{ session('success') }}
          </div>
        @endif


        <form wire:submit="register">

          {{-- NAME --}}
          <div class="form-group">

            <label for="name">
                Full Name
            </label>

            <div class="input-wrapper">
              <input
                type="text"
                id="name"
                wire:model="name"
                placeholder="Enter your full name"
                autocomplete="name">

              <span class="input-icon">
                👤
              </span>

            </div>

            @error('name')
              <div class="error">
                  {{ $message }}
              </div>
            @enderror

          </div>


          {{-- EMAIL --}}
          <div class="form-group">

            <label for="email">
                Email Address
            </label>

            <div class="input-wrapper">

              <input
                type="email"
                id="email"
                wire:model="email"
                placeholder="Enter your email address"
                autocomplete="email">

              <span class="input-icon">
                 ✉️
              </span>

            </div>

            @error('email')
              <div class="error">
                  {{ $message }}
              </div>
            @enderror

          </div>




            {{-- PASSWORD --}}
          <div class="form-group">

            <label for="password">
                Password
            </label>

            <div class="input-wrapper">

              <input
                type="password"
                id="password"
                wire:model="password"
                placeholder="Create a password"
                autocomplete="new-password">

              <span
                class="input-icon password-toggle"
                onclick="togglePassword('password', this)"
                title="Show password">
                  👁
              </span>

            </div>

            <small class="password-hint">
              Password must contain at least 8 characters.
            </small>

            @error('password')
              <div class="error">
                  {{ $message }}
              </div>
            @enderror

          </div>


            {{-- CONFIRM PASSWORD --}}
            <div class="form-group">

              <label for="password_confirmation">
                  Confirm Password
              </label>

              <div class="input-wrapper">

                <input
                    type="password"
                    id="password_confirmation"
                    wire:model="password_confirmation"
                    placeholder="Confirm your password"
                >

                <span
                    class="input-icon password-toggle"
                    onclick="togglePassword('password_confirmation', this)"
                    title="Show password"
                >
                    👁
                </span>
                  @error('password_confirmation')
                    <div class="error">
                        {{ $message }}
                    </div>
                @enderror

              </div>

            </div>


            {{-- TERMS --}}
            <div class="terms">

              <label>

                <input
                    type="checkbox"
                    wire:model="terms">
                <span>
                    I agree to the
                    <a href="#">
                        Terms & Conditions
                    </a>
                    and
                    <a href="#">
                        Privacy Policy
                    </a>.
                </span>

              </label>

              @error('terms')
                  <div class="error">
                      {{ $message }}
                  </div>
              @enderror

            </div>


            {{-- BUTTON --}}
            <button
              type="submit"
              class="login-button"
              wire:loading.attr="disabled" >

              <span wire:loading.remove>
                  Create Account
              </span>

              <span wire:loading>
                  Creating Account...
              </span>

            </button>

        </form>


        <div class="divider">
            Already have an account?
        </div>


        <div class="help">

            Already registered?

            <!-- <a href="{{ url('/loginRegister') }}">
                Sign in to your account
            </a>. -->
            <button wire:click="toggleOperation" class="text-primary fw-bold">Sign in to your Account</button>
            

        </div>


        <div class="copyright">
            © {{ date('Y') }} Springfield Academy.
            All rights reserved.
        </div>

    </section>
    
    @endif

  </main>

@script
<script>
    // console.log('LIVEWIRE SCRIPT LOADED');

    $wire.on('success', (event) => {
        console.log('SUCCESS EVENT:', event);

        alert(event.message);
    });

     $wire.on('error', (event) => {
        console.log('ERROR EVENT:', event);

        alert(event.message);
    });

    window.togglePassword = function (inputId, button) {
        const input = document.getElementById(inputId);

        if (!input) {
            return;
        }

        if (input.type === 'password') {
            input.type = 'text';
            button.textContent = '🙈';
            button.title = 'Hide password';
        } else {
            input.type = 'password';
            button.textContent = '👁';
            button.title = 'Show password';
        }
    };
</script>
@endscript


</div>


 <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Segoe UI", Arial, sans-serif;
    }

    body {
      min-height: 100vh;
      background: linear-gradient(135deg, #0f3d5e, #1677a8);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .container {
      width: 100%;
      max-width: 1050px;
      min-height: 620px;
      background: #fff;
      border-radius: 24px;
      overflow: hidden;
      display: grid;
      grid-template-columns: 1fr 1fr;
      box-shadow: 0 25px 60px rgba(0, 0, 0, 0.2);
    }

    /* Left Section */
    .welcome-section {
      position: relative;
      padding: 55px;
      color: white;
      background:
        linear-gradient(rgba(8, 47, 73, 0.85), rgba(8, 47, 73, 0.9)),
        url("https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=1200&q=80")
        center/cover;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .logo {
      position: absolute;
      top: 35px;
      left: 45px;
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .logo-icon {
      width: 48px;
      height: 48px;
      background: #fbbf24;
      color: #0f3d5e;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 23px;
      font-weight: 800;
    }

    .logo span {
      font-size: 20px;
      font-weight: 700;
    }

    .welcome-content {
      max-width: 450px;
    }

    .welcome-content h1 {
      font-size: 46px;
      line-height: 1.1;
      margin-bottom: 20px;
    }

    .welcome-content p {
      font-size: 17px;
      line-height: 1.7;
      color: #dbeafe;
    }

    .features {
      margin-top: 35px;
      list-style: none;
    }

    .features li {
      margin: 15px 0;
      font-size: 15px;
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .check {
      width: 25px;
      height: 25px;
      border-radius: 50%;
      background: #fbbf24;
      color: #0f3d5e;
      display: flex;
      justify-content: center;
      align-items: center;
      font-weight: bold;
    }

    /* Login Section */
    .login-section {
      padding: 65px 60px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .login-header {
      margin-bottom: 35px;
    }

    .login-header h2 {
      color: #12344d;
      font-size: 32px;
      margin-bottom: 10px;
    }

    .login-header p {
      color: #718096;
      font-size: 15px;
    }

    .form-group {
      margin-bottom: 22px;
    }

    .form-group label {
      display: block;
      color: #334155;
      font-size: 14px;
      font-weight: 600;
      margin-bottom: 8px;
    }

    .input-wrapper {
      position: relative;
    }

    .input-wrapper input {
      width: 100%;
      height: 52px;
      padding: 0 45px 0 16px;
      border: 1px solid #d8dee7;
      border-radius: 10px;
      outline: none;
      font-size: 15px;
      color: #1e293b;
      transition: 0.25s;
    }

    .input-wrapper input:focus {
      border-color: #1677a8;
      box-shadow: 0 0 0 3px rgba(22, 119, 168, 0.12);
    }

    .input-icon {
      position: absolute;
      right: 16px;
      top: 50%;
      transform: translateY(-50%);
      color: #94a3b8;
      font-size: 18px;
    }

    .password-toggle {
      cursor: pointer;
      user-select: none;
    }

    .options {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 5px 0 25px;
      font-size: 14px;
    }

    .remember {
      display: flex;
      align-items: center;
      gap: 8px;
      color: #64748b;
      cursor: pointer;
    }

    .remember input {
      accent-color: #1677a8;
      width: 16px;
      height: 16px;
    }

    .forgot {
      color: #1677a8;
      text-decoration: none;
      font-weight: 600;
    }

    .forgot:hover {
      text-decoration: underline;
    }

    .login-button {
      width: 100%;
      height: 40px;
      border: none;
      border-radius: 10px;
      background: linear-gradient(135deg, #12618c, #1689bd);
      color: white;
      font-size: 16px;
      font-weight: 700;
      cursor: pointer;
      transition: 0.25s;
      box-shadow: 0 8px 18px rgba(22, 119, 168, 0.25);
    }

    .login-button:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 24px rgba(22, 119, 168, 0.3);
    }

    .login-button:active {
      transform: translateY(0);
    }

    .divider {
      display: flex;
      align-items: center;
      gap: 12px;
      margin: 28px 0;
      color: #94a3b8;
      font-size: 13px;
    }

    .divider::before,
    .divider::after {
      content: "";
      flex: 1;
      height: 1px;
      background: #e2e8f0;
    }

    .help {
      text-align: center;
      color: #64748b;
      font-size: 14px;
      line-height: 1.6;
    }

    .help a {
      color: #1677a8;
      font-weight: 600;
      text-decoration: none;
    }

    .copyright {
      text-align: center;
      margin-top: 30px;
      color: #a0aec0;
      font-size: 12px;
    }

    /* Responsive */
    @media (max-width: 800px) {
      .container {
        grid-template-columns: 1fr;
        max-width: 500px;
      }

      .welcome-section {
        min-height: 300px;
        padding: 40px;
      }

      .logo {
        position: static;
        margin-bottom: 55px;
      }

      .welcome-content h1 {
        font-size: 34px;
      }

      .features {
        display: none;
      }

      .login-section {
        padding: 45px 35px;
      }
    }

    @media (max-width: 450px) {
      body {
        padding: 0;
      }

      .container {
        min-height: 100vh;
        border-radius: 0;
      }

      .welcome-section {
        min-height: 270px;
        padding: 30px;
      }

      .login-section {
        padding: 40px 25px;
      }


      .options {
        font-size: 13px;
      }
    }
</style>

