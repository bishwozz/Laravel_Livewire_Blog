
<main class="auth layout">
@if(!$registerForm)
  <div class="container">
    <div class="layout__box">
      <div class="layout__boxHeader">
        <div class="layout__boxTitle">
          <h3>Login</h3>
        </div>
      </div>
      <div class="layout__body">
        <h2 class="auth__tagline">Find your study partner</h2>
        

        <form class="form">
          <div class="form__group form__group">
            <label for="name">username</label>
            <input id="name" type="text" placeholder="username" wire:model="name"/>
            @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
          </div>
          <div class=" form__group">
            <label for="password">Password</label>
            <input id="password" type="password" wire:model="password"/>
            @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
          </div>
          <div style="text-align:center;">
            <button class="btn btn--main" type="submit" wire:click.prevent="validateLogin">
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                <title>lock</title>
                <path
                  d="M27 12h-1v-2c0-5.514-4.486-10-10-10s-10 4.486-10 10v2h-1c-0.553 0-1 0.447-1 1v18c0 0.553 0.447 1 1 1h22c0.553 0 1-0.447 1-1v-18c0-0.553-0.447-1-1-1zM8 10c0-4.411 3.589-8 8-8s8 3.589 8 8v2h-16v-2zM26 30h-20v-16h20v16z">
                </path>
                <path
                  d="M15 21.694v4.306h2v-4.306c0.587-0.348 1-0.961 1-1.694 0-1.105-0.895-2-2-2s-2 0.895-2 2c0 0.732 0.413 1.345 1 1.694z">
                </path>
              </svg>
              Login
            </button>
          </div>
        </form>

        <div class="auth__action">
          <p>Haven't signed up yet?</p>
          <a wire:click.prevent="register" class="btn btn--link">Sign Up</a>
        </div>
      </div>
    </div>
  </div>
@else
  <div class="container">
    <div class="layout__box">
      <div class="layout__boxHeader">
        <div class="layout__boxTitle">
          <h3>Register</h3>
        </div>
      </div>
      <div class="layout__body">
        <h2 class="auth__tagline">Find your study partner</h2>
          @if (session()->has('error'))
              <div class="alert alert-danger">
                  {{ session('error') }}
              </div>
          @elseif (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
          @endif
        <form class="form">
          <div class="form__group form__group">
            <label for="name">username</label>
            <input id="name" type="text" placeholder="username" wire:model="name"/>
            @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
          </div>
          <div class="form__group">
            <label for="email">Email</label>
            <input id="email" type="email" placeholder="Email" wire:model="email"/>
            @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
          </div>
          <div class="form__group">
            <label for="password">Password</label>
            <input id="password" type="password" wire:model="password"/>
            @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
          </div>
          <div class="form__group">
            <label for="confirmPassword">Confirm Password</label>
            <input id="confirmPassword" type="confirmPassword" wire:model="confirmPassword"/>
            @error('confirmPassword') <span class="text-danger error">{{ $message }}</span>@enderror
          </div>
          <div style="text-align:center;">
            <button class="btn btn--main" type="submit" wire:click.prevent="registerStore">
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                <title>lock</title>
                <path
                  d="M27 12h-1v-2c0-5.514-4.486-10-10-10s-10 4.486-10 10v2h-1c-0.553 0-1 0.447-1 1v18c0 0.553 0.447 1 1 1h22c0.553 0 1-0.447 1-1v-18c0-0.553-0.447-1-1-1zM8 10c0-4.411 3.589-8 8-8s8 3.589 8 8v2h-16v-2zM26 30h-20v-16h20v16z">
                </path>
                <path
                  d="M15 21.694v4.306h2v-4.306c0.587-0.348 1-0.961 1-1.694 0-1.105-0.895-2-2-2s-2 0.895-2 2c0 0.732 0.413 1.345 1 1.694z">
                </path>
              </svg>
              Register
            </button>
          </div>
        </form>

        <div class="auth__action">
          <p>Already a member ?</p>
          <a wire:click.prevent="login" class="btn btn--link">Sign In</a>
        </div>
      </div>
    </div>
  </div>
@endif
</main>