@extends('layout')
@section('body')
    <section class=" pt-20">
        <div class="container max-w-screen-lg mx-auto px-4">
            <div class="row">
                <div class="w-full px-4">
                    <div class="mx-auto max-w-sm">
                        <div class="space-y-9 flex flex-col justify-center items-center">
                            <img src="{{ asset('img/login.png') }}" alt="login" class=" w-16">
                            <h2 class=" text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to
                                your account</h2>
                        </div>

                        @include("message")


                        <div>
                            <form action="{{ route('submitLogin') }}" method="POST">
                                <div class="mt-10 space-y-2">
                                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                                        Address</label>
                                    <input id="email" name="email" type="email" autocomplete="email"
                                        placeholder="Enter your email"
                                        class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">

                                    @error('email')
                                        <div class="pt-1 mb-2 text-sm text-red-800 rounded-lg bg-red-50 dark:text-red-400"
                                            role="alert">
                                            <span class="font-medium">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                                <div class="mt-4 space-y-2 relative">
                                    <div class="flex items-center justify-between">
                                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                                        <div class="text-sm">
                                            <a href="javascript:;" class="font-semibold text-sky-600 hover:text-sky-500">Forgot Password?</a>
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <input id="password" name="password" type="password" autocomplete="password" placeholder="Enter your password" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
                                        <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                                            <i id="eyeOpen" class="fa fa-eye " ></i>
                                            <i id="eyeClose" class="fa fa-eye-slash hidden " ></i>
                                        </span>
                                    </div>

                                    @error('password')
                                    <div class="pt-1 mb-2 text-sm text-red-800 rounded-lg bg-red-50 dark:text-red-400" role="alert">
                                        <span class="font-medium">{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>



                                <div class="mt-8">
                                    <button type="submit"
                                        class="flex w-full justify-center rounded-md bg-sky-700 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-700">Sign
                                        in</button>
                                </div>
                            </form>
                            <p class="mt-10 text-center text-sm text-gray-500">Not a member?<a href="{{route("signup")}}"
                                    class=" ml-2 font-semibold leading-6 text-sky-600 hover:text-sky-500">Sign Up Here</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
