<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <!-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> -->
            </a>
        </x-slot>

<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />

<!-- Validation Errors -->
<x-auth-validation-errors class="mb-4" :errors="$errors" />

        <section class="login-content">
            <div class="container h-100">
                <div class="row justify-content-center align-items-center height-self-center">
                    <div class="col-md-5 col-sm-12 col-12 align-self-center">
                        <div class="card">
                            <div class="card-body text-center">
                                <h2>Sign Up</h2>
                                <p>Create your Gdrive account.</p>


                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="floating-input form-group">
                                                <input class="form-control" type="text" name="first_name" id="first_name" :value="old('first_name')" required autofocus />
                                                <label class="form-label" for="first_name">First Name</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="floating-input form-group">
                                                <input class="form-control" type="text" name="last_name" id="last_name" :value="old('last_name')" required autofocus />
                                                <label class="form-label" for="last_name">Last Name</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="floating-input form-group">
                                                <input class="form-control" type="text" name="email" id="email" :value="old('email')" required autofocus />
                                                <label class="form-label" for="email">Email</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="floating-input form-group">
                                                <input class="form-control" type="text" name="phone" id="phone" :value="old('phone')" required autofocus />
                                                <label class="form-label" for="phone">Phone</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="floating-input form-group">
                                                <input class="form-control" type="password" name="password" id="password" :value="old('password')" required autofocus />
                                                <label class="form-label" for="password">Password</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="floating-input form-group">
                                                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" :value="old('password_confirmation')" required autofocus />
                                                <label class="form-label" for="password_confirmation">Confirm Password</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="custom-control custom-checkbox mb-3 text-left">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">I agree with the terms of use</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Sign Up</button>
                                    <p class="mt-3">
                                        Already have an Account <a href="{{ route('login') }}" class="text-primary">Sign In</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>



    </x-auth-card>
</x-guest-layout>