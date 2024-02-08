@extends('admin.layout')
@section('content')
    <!-- profile-body section starts  -->
    <div class="py-10">
        <div class="container max-w-screen-xl  mx-auto px-4">
            @include('message')

            <div class="row  justify-center space-x-4 py-4">
                <div class="w-full sm:w-2/3 px-4 sm:px-20 text-center space-x-2 space-y-2">
                    <h2 class="text-2xl font-medium text-center py-3 border-b-2">Payment Information</h2>
                    <table class="w-full">
                        <tr>
                            <th class="text-gray-600 text-left">Name :</th>
                            <td class="text-gray-600 text-left">{{ $payment->user->name }}</td>
                        </tr>
                        <tr>
                            <th class="text-gray-600 text-left">Amount :</th>
                            <td class="text-gray-600 text-left">{{ $payment->amount }}</td>
                        </tr>
                        <tr>
                            <th class="text-gray-600 text-left">Method :</th>
                            <td class="text-gray-600 text-left">{{ $payment->method }}</td>
                        </tr>
                        <tr>
                            <th class="text-gray-600 text-left">Payment Number :</th>
                            <td class="text-gray-600 text-left">{{ $payment->pay_number }}</td>
                        </tr>
                        <tr>
                            <th class="text-gray-600 text-left">Status :</th>
                            <td class="text-gray-600 text-left">
                                @if ($payment->status == 0)
                                    Pending
                                @elseif ($payment->status == 1)
                                    Completed
                                @elseif ($payment->status == 2)
                                    Rejected
                                @endif
                            </td>
                        </tr>

                    </table>
                </div>






            </div>
            <div class="flex justify-center space-x-4 py-4">
                <!-- Form for the "Complete" button -->
                <form method="POST" action="{{ route('payment.update', ['payment' => $payment->id, 'status' => 1]) }}">
                    @method('PUT')
                    @csrf
                    <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Complete</button>
                </form>

                <!-- Form for the "Reject" button -->
                <form method="POST" action="{{ route('payment.update', ['payment' => $payment->id, 'status' => 2]) }}">
                    @method('PUT')
                    @csrf
                    <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Reject</button>
                </form>
            </div>
        </div>
    </div>
    <!-- profile-body section ends  -->
@endsection
