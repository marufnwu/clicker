@extends('layout')
@section('body')
    @include('message');
    <!-- profile-body section starts  -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="py-5 ">
        <div class="container max-w-screen-xl  mx-auto px-4">

            @if (isset($notice))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                    role="alert">
                    <div class="flex">
                        <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                            </svg></div>
                        <div>
                            <p class="font-bold">Informational message</p>
                            <p class="text-sm">{{ $notice->info }}</p>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row py-4">
                <div class="w-full sm:w-1/3 px-4">
                    <div class="flex items-center justify-center px-4 py-4 ">
                        <img class="w-44 rounded-full text-center"
                            src="{{ $user->photo_url ? asset('storage/' . $user->photo_url) : asset('img/man.png') }}"
                            alt="person-pic">
                    </div>
                    <div class="flex justify-center py-2">

                        <button id="ChangeImage"
                            class=" hover:scale-110 transition ease-in-out duration-300 rounded bg-sky-700 text-white font-medium hover:bg-sky-400 px-6 py-1">Change
                            Imgae</button>
                    </div>
                    <div class="py-2">
                        <p class="text-lg text-center font-medium ">Balance: {{ $clickBalance ?? 0 }} PTS</p>
                        <div class="flex justify-center py-2">
                            <button id="withdraw"
                                class=" hover:scale-110 transition ease-in-out duration-300 rounded bg-sky-700 text-white font-medium hover:bg-sky-400 px-6 py-1">Withdraw</button>
                        </div>

                    </div>
                </div>
                <div class="w-full sm:w-2/3 px-4 sm:px-20 text-center space-x-2 space-y-2">
                    <h2 class="text-2xl font-medium text-center py-3 border-b-2">Information</h2>
                    <table class="w-full">
                        <tr>
                            <th class="text-lg font-medium text-left">Name :</th>
                            <td class="text-gray-600 text-left">{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th class="text-lg font-medium text-left">Phone :</th>
                            <td class="text-gray-600 text-left">{{ $user->phone }}</td>
                        </tr>
                        <tr>
                            <th class="text-lg font-medium text-left">Email :</th>
                            <td class="text-gray-600 text-left">{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th class="text-lg font-medium text-left">Gender :</th>
                            <td class="text-gray-600 text-left">{{ $user->gender }}</td>
                        </tr>
                        <tr>
                            <th class="text-lg font-medium text-left">Area :</th>
                            <td class="text-gray-600 text-left">{{ $user->area }}</td>
                        </tr>
                        <tr>
                            <th class="text-lg font-medium text-left">Refer Code :</th>
                            <td class="text-gray-600 text-left">{{ $user->refer_code }}</td>
                        </tr>
                        <tr>
                            <th class="text-lg font-medium text-left">Level:</th>
                            <td class="text-gray-600 text-left">{{ $level }}</td>
                        </tr>
                    </table>
                </div>






            </div>
        </div>
    </div>
    <!-- profile-body section ends  -->

    <!-- =======withdraw modal start========= -->
    <section>
        <div id="withdraw-modal" tabindex="-1" aria-hidden="true"
            class="glass shadow-2xl shadow-blue-900 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-screen max-h-full">
            <div class="relative p-4 w-full h-full">
                <!-- Modal content -->
                <div
                    class="bg-gray-300 absolute w-full md:w-1/2 lg:w-2/5 transform -translate-x-4 md:translate-x-2/3 lg:translate-x-3/4 md:-left-4 lg:left-16 translate-y-1/3 -top-12 rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Withdraw Money
                        </h3>
                        <button id="close" type="button"
                            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-hide="authentication-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 ">
                        <form action="{{ route('payout') }}" method="POST">
                            <div class=" space-y-4">
                                <div class="space-y-1">
                                    <label for="withdraw-amount"
                                        class="block text-sm font-medium leading-6 text-gray-900">Amount</label>
                                    <input id="withdraw-amount" name="amount" type="tel" autocomplete="withdraw-amount"
                                        placeholder="Enter your withdraw amount"
                                        class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6"
                                        required />
                                </div>
                                <div class="space-y-1">
                                    <label for="status" class="block text-sm font-medium text-gray-900">Payment
                                        Method</label>
                                    <select name="method" id="method"
                                        class=" default-font-1 px-2 py-1.5 bg-white block w-full rounded-md border-sky-300 shadow-sm focus:border-sky-300 ring-1 ring-inset ring-gray-300">
                                        <option value="Bkash" class=" font-medium text-gray-700">Bkash</option>
                                        <option value="ROcket" class=" font-medium text-gray-700">Rocket</option>
                                        <option value="Nagad" class=" font-medium text-gray-700">Nagad</option>
                                    </select>
                                </div>
                                <div class="space-y-1">
                                    <label for="textarea" class="block text-sm font-medium text-gray-700">Payment
                                        Details</label>
                                    <textarea name="pay_number" placeholder="Write here..."
                                        class="resize-y px-2 w-full border rounded-md text-gray-900 shadow-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6"></textarea>
                                </div>
                            </div>

                            <div class="mt-8">
                                <main class=" flex flex-wrap gap-4 w-full items-center justify-center">
                                    <button type="submit"
                                        class="flex w-44 justify-center rounded-md bg-sky-700 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-700">Submit</button>
                                </main>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =======withdraw modal end========= -->


    <section>
        <div id="updateProfileImageModal" tabindex="-1" aria-hidden="true"
            class="glass hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-screen max-h-full">
            <div class="relative p-4 w-full h-full">
                <!-- Modal content -->
                <div
                    class="absolute w-full md:w-1/2 transform -translate-x-4 md:translate-x-2/3 md:-left-16 translate-y-1/3 -top-16 bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Update Profile Image
                        </h3>
                        <button id="changeImageClose" type="button"
                            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-hide="updateProfileImageModal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <form method="POST" action="{{ route('changeProfileImage') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Input for profile image -->
                            <div class="space-y-4">
                                <div class="space-y-1">
                                    <label for="profile-photo"
                                        class="block text-sm font-medium leading-6 text-gray-900">Choose Profile
                                        Image</label>
                                    <input id="profile-photo" name="profile-photo" type="file"
                                        class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6"
                                        accept="image/*" required />
                                </div>
                            </div>

                            <div class="mt-8">
                                <main class="pb-8 flex flex-wrap gap-4 w-full items-center justify-center">
                                    <button type="submit"
                                        class="flex w-44 justify-center rounded-md bg-sky-700 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-700">Upload
                                        Image</button>
                                </main>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script>
        document.getElementById("withdraw").addEventListener('click', () => {
            document.getElementById("withdraw-modal").classList.remove("hidden")
        })
        document.getElementById("close").addEventListener('click', () => {
            document.getElementById("withdraw-modal").classList.add("hidden")
        })


        document.getElementById("ChangeImage").addEventListener('click', () => {
            document.getElementById("updateProfileImageModal").classList.remove("hidden")
        })
        document.getElementById("changeImageClose").addEventListener('click', () => {
            document.getElementById("updateProfileImageModal").classList.add("hidden")
        })
    </script>
@endsection
