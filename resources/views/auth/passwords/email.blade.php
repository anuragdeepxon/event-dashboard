@extends('layouts.main')
@section('content')
<div class="flex flex-wrap mt-40 p-2 lg:p-20 md:p-10">
    <div class="w-full sm:w-1/1 md:w-1/1 flex flex-col p-5">
        <div class="block bg-white drop-shadow-2xl rounded-lg">
            <div class="lg:flex lg:flex-wrap g-0">
                <div class="lg:w-6/12 px-4 md:px-0">
                    <div class="md:p-12 md:mx-6">
                        <div class="text-center">
                            <!-- <img class="mx-auto w-48" src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp" alt="logo" /> -->
                            <h4 class="text-xl font-semibold mt-1 mb-12 pb-1"> Eventia</h4>
                        </div>

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <p class="mb-4">Please login to your account</p>
                            <div class="mb-4">
                                 <input placeholder="Enter Email" id="email" type="email" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="text-center pt-1 mb-12 pb-1">
                                <button type="submit" class="inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3 bg-gradient-to-r from-gray-900 via-blue-800 to-blue-700" type="button" data-mdb-ripple="true" data-mdb-ripple-color="light">
                                   {{ __('Send Password Reset Link') }}
                                </button>

                            </div>
                        </form>




                    </div>
                </div>
                <div class="lg:w-6/12 flex items-center lg:rounded-r-lg rounded-b-lg lg:rounded-bl-none bg-gradient-to-r from-gray-900 via-blue-800 to-blue-700">
                    <div class="text-white px-4 py-6 md:p-12 md:mx-6">
                        <h4 class="text-xl font-semibold mb-6">We are more than just a company</h4>
                        <p class="text-sm">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.
                        </p>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection

