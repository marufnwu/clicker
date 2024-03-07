@extends('admin.layout')
@section('title', $user->name . "'s Profile")
@section('content')
    <!-- CONTENT -->
    <div class = "content ml-7 sm:ml-12 transform ease-in-out duration-500 pt-20 px-2 pb-4 ">
        @include("message")
        <!-- ===============add main content here============== -->
        <!-- profile-body section starts  -->
        <div class="py-10 ">
            <div class="container max-w-screen-xl  mx-auto px-4">
                <div class="row items-start py-4">
                    <div class="w-full lg:w-3/12 px-4">
                        <div class="flex items-center justify-center px-4 py-4 ">
                            <img class=" w-20 sm:w-32 md:w-44 rounded-full text-center"
                            src="{{ $user->photo_url ? asset('storage/' . $user->photo_url) : asset('img/man.png') }}"  alt="profile picture">
                        </div>
                    </div>
                    <div class="w-full lg:w-5/12 px-4 sm:px-8 md:px-12 pb-8 lg:pb-0 ">
                        <table class="w-full flex justify-center">
                            <tr>
                                <th class=" text-2xl font-medium py-3 border-b-2 text-center" colspan="2">Information
                                </th>
                            </tr>
                            <tr class="text-left">
                                <td class=" text-base sm:text-md font-medium pr-4">Name :</td>
                                <td class="text-gray-600">{{ $user->name }}</td>
                            </tr>
                            <tr class="text-left">
                                <td class=" text-base sm:text-md font-medium pr-4">Phone :</td>
                                <td class="text-gray-600">{{ $user->phone }}</td>
                            </tr>
                            <tr>
                            <tr class=" sm:text-left">
                                <td class=" text-base sm:text-md font-medium pr-4">Email :</td>
                                <td class="text-gray-600">{{ $user->email }}</td>
                            </tr>

                            @if ($user->referBy)
                                <tr class=" sm:text-left">
                                    <td class=" text-base sm:text-md font-medium pr-4">Refer By :</td>
                                    <td class="text-blue-600"><a
                                            href="{{ route('admin.profile', ['user' => $user->referby->id]) }}">{{ $user->referBy->name }}</a>
                                    </td>
                                </tr>
                            @endif



                            <tr class=" sm:text-left">
                                <td class=" text-base sm:text-md font-medium pr-4">Area :</td>
                                <td class="text-gray-600">{{ $user->area }}</td>
                            </tr>
                            <tr class=" sm:text-left">
                                <td class=" text-base sm:text-md font-medium pr-4">Refer Code :</td>
                                <td class="text-gray-600">{{ $user->refer_code }}</td>
                            </tr>

                            <tr class=" sm:text-left">
                                <td class=" text-base sm:text-md font-medium pr-4">Acc Created At :</td>
                                <td class="text-gray-600">{{ $user->created_at }}</td>
                            </tr>

                            <tr class=" sm:text-left">
                                <td class=" text-base sm:text-md font-medium pr-4">Last Active :</td>
                                <td class="text-gray-600">{{ $user->last_active }}</td>
                            </tr>

                            <tr class=" sm:text-left">
                                <td class=" text-base sm:text-md font-medium pr-4">Acc Status :</td>
                                <td
                                    class="inline-flex px-1 sm:px-2 py-0 sm:py-1 text-[10px] sm:text-xs font-semibold leading-5 {{ $user->status == \App\Enums\AccountStatus::Active->value ? 'text-green-800 bg-green-100' : ($user->status == \App\Enums\AccountStatus::Under_Review->value ? 'text-blue-800 bg-blue-100' : 'text-red-800 bg-red-100') }} rounded-full">
                                    {{ $user->status == \App\Enums\AccountStatus::Active->value ? 'Active' : ($user->status == \App\Enums\AccountStatus::Under_Review->value ? 'Under Review' : 'Deactive') }}
                                </td>

                            </tr>
                            <tr class=" sm:text-left">
                                <td class=" text-base sm:text-md font-medium pr-4">Acc Level :</td>
                                <td class="text-gray-600">{{ $level }}
                                </td>

                            </tr>


                        </table>
                    </div>
                    <div class="w-full lg:w-4/12 px-4 sm:px-20 space-y-8">
                        <h2 class="text-2xl font-medium py-3 border-b-2 text-center">Actions</h2>
                        <div class=" flex flex-wrap flex-col items-center gap-3">
                            <a href="{{ route('admin.userReferral', ['user' => $user]) }}" type="button"
                                class=" block w-28 px-3 py-1.5 font-semibold text-sm text-center bg-indigo-50 hover:bg-indigo-200 text-indigo-800 rounded-lg focus:outline-none">Refer
                                List</a>
                            <form
                                action="{{ $user->status == 1 ? route('admin.suspendUser', ['user' => $user]) : route('admin.unSuspendUser', ['user' => $user]) }}"
                                method="post">
                                @csrf
                                <!-- Your form fields go here -->

                                <button type="submit"
                                    class="block w-28 px-3 py-1.5 font-semibold text-sm text-center bg-indigo-50 hover:bg-indigo-200 text-indigo-800 rounded-lg focus:outline-none">
                                    {{ $user->status == 1 ? 'Suspend' : 'Unsuspend' }}
                                </button>
                            </form>
                            <form
                                action="{{ route('admin.deleteUser', ['user' => $user])}}"
                                method="post">
                                @csrf
                                <!-- Your form fields go here -->

                                <button type="submit"
                                    class="block w-28 px-3 py-1.5 font-semibold text-sm text-center bg-indigo-50 hover:bg-indigo-200 text-indigo-800 rounded-lg focus:outline-none">
                                    Delete Account
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- profile-body section ends  -->
    </div>
@endsection
