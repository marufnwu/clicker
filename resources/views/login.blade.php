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

                        @if (session('success'))
                            <div class="alert alert-success">
                                <div class="flex items-center p-4 m-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 "
                                    role="alert">
                                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div>
                                        <span class="font-medium">{{ session('success') }}</span>
                                    </div>

                                </div>
                        @endif

                        @if (session('error'))
                            <div class="flex items-center p-4 m-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50"
                                role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium">{{ session('error') }}</span>
                                </div>
                            </div>
                        @endif


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
                                <div class="mt-4 space-y-2">
                                    <div class="flex items-center justify-between">
                                        <label for="password"
                                            class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                                        <div class="text-sm">
                                            <a href="javascript:;"
                                                class="font-semibold text-sky-600 hover:text-sky-500">Forgot Password?</a>
                                        </div>
                                    </div>
                                    <input id="password" name="password" type="password" autocomplete="password"
                                        placeholder="Enter your password"
                                        class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6">
                                    @error('password')
                                        <div class="pt-1 mb-2 text-sm text-red-800 rounded-lg bg-red-50 dark:text-red-400"
                                            role="alert">
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
                            <p class="mt-10 text-center text-sm text-gray-500">Not a member?<a href="./register.html"
                                    class=" ml-2 font-semibold leading-6 text-sky-600 hover:text-sky-500">Sign Up Here</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
