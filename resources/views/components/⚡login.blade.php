<?php

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


new #[Layout('layouts::login_layout')] class extends Component
{
    //

    public $operation="";
    public $email, $password;
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
          return redirect(url('/dashboard'));
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
    {{-- Simplicity is the essence of happiness. - Cedric Bledsoe --}}

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
</div>