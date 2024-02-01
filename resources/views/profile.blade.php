@extends('layout')
@section('body')
    <!-- profile-body section starts  -->
    <div class="py-10 ">
        <div class="container max-w-screen-xl  mx-auto px-4">
            <div class="row py-4">
                <div class="w-full sm:w-1/3 px-4">
                    <div class="flex items-center justify-center px-4 py-4 ">
                        <img class="w-44 rounded-full text-center" src="{{ asset('img/person.png') }}" alt="person-pic">
                    </div>
                    <div class="py-2">
                        <p class="text-lg text-center font-medium ">Balance: {{$clickBalance ?? 0}} BDT</p>
                    </div>
                </div>
                <div class="w-full sm:w-2/3 px-4 sm:px-20 text-center space-x-2 space-y-2">
                    <h2 class="text-2xl font-medium text-center py-3 border-b-2">Information</h2>
                    <table class="w-full">
                        <tr>
                            <th class="text-lg font-medium text-left">Name :</th>
                            <td class="text-gray-600 text-left">{{$user->name}}</td>
                        </tr>
                        <tr>
                            <th class="text-lg font-medium text-left">Phone :</th>
                            <td class="text-gray-600 text-left">{{$user->phone}}</td>
                        </tr>
                        <tr>
                            <th class="text-lg font-medium text-left">Email :</th>
                            <td class="text-gray-600 text-left">{{$user->email}}</td>
                        </tr>
                        <tr>
                            <th class="text-lg font-medium text-left">Gender :</th>
                            <td class="text-gray-600 text-left">{{$user->gender}}</td>
                        </tr>
                        <tr>
                            <th class="text-lg font-medium text-left">Area :</th>
                            <td class="text-gray-600 text-left">{{$user->area}}</td>
                        </tr>
                        <tr>
                            <th class="text-lg font-medium text-left">Refer Code :</th>
                            <td class="text-gray-600 text-left">{{$user->refer_code}}</td>
                        </tr>
                    </table>
                </div>






            </div>
        </div>
    </div>
    <!-- profile-body section ends  -->
@endsection
