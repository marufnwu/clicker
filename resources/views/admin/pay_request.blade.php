@extends('admin.layout')
@section('content')
    <!-- =======link start========= -->
    <section class="py-4">
        <div class="container max-w-screen-xl mx-auto px-4">
            <div class="row">
                <div class="w-full px-0 sm:px-4">
                    @include('message')
                    </main>
                    <div
                        class="py-10 inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow rounded-md sm:rounded-lg">
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th
                                        class="px-1 sm:px-3 lg:px-6 py-2 sm:py-3 text-[10px] sm:text-xs font-bold leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Id</th>
                                    <th
                                        class="px-1 sm:px-3 lg:px-6 py-2 sm:py-3 text-[10px] sm:text-xs font-bold leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Name</th>
                                    <th
                                        class="px-1 sm:px-3 lg:px-6 py-2 sm:py-3 text-[10px] sm:text-xs font-bold leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Amount</th>
                                    <th
                                        class="px-1 sm:px-3 lg:px-6 py-2 sm:py-3 text-[10px] sm:text-xs font-bold leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Status</th>
                                    <th
                                        class="px-1 sm:px-3 lg:px-6 py-2 sm:py-3 text-[10px] sm:text-xs font-bold leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Date</th>
                                    <th
                                        class="px-1 sm:px-3 lg:px-6 py-2 sm:py-3 text-[10px] sm:text-xs font-bold leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Action</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white">

                                @foreach ($requests as $r)
                                    <tr>
                                        <td
                                            class="px-1 sm:px-3 lg:px-6 py-2 sm:py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="flex items-center">
                                                <div class="text-[10px] sm:text-sm font-medium leading-5 text-gray-900">
                                                    #{{ $r->user->id }}</div>
                                            </div>
                                        </td>

                                        <td
                                            class="px-1 sm:px-3 lg:px-6 py-2 sm:py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-[10px] sm:text-sm leading-5 text-gray-900">{{ $r->user->name }}
                                            </div>
                                        </td>

                                        <td
                                            class="px-1 sm:px-3 lg:px-6 py-2 sm:py-4 whitespace-no-wrap border-b border-gray-200">
                                            <a href="javascript:;"
                                                class="text-[10px] sm:text-sm leading-5 text-gray-900">{{ $r->amount }}</a>
                                        </td>

                                        <td
                                            class="px-1 sm:px-3 lg:px-6 py-0 sm:py-2 md:py-4 whitespace-no-wrap border-b border-gray-200">
                                            <span
                                                class="inline-flex px-1 sm:px-2 py-0 sm:py-1 text-[10px] sm:text-xs font-semibold leading-5 {{ $r->status == 1 ? 'text-green-800 bg-green-100' : 'text-red-800 bg-red-100' }} rounded-full">

                                                @if ($r->status == 0)
                                                    Pending
                                                @elseif ($r->status == 1)
                                                    Completed
                                                @elseif ($r->status == 2)
                                                    Rejected
                                                @endif

                                            </span>
                                        </td>

                                        <td
                                            class="px-1 sm:px-3 lg:px-6 py-2 sm:py-4 whitespace-no-wrap border-b border-gray-200">
                                            <a href="javascript:;"
                                                class="text-[10px] sm:text-sm leading-5 text-gray-900">{{ $r->created_at }}</a>
                                        </td>

                                        <td id="edit"
                                            class="px-1 sm:px-3 lg:px-6 py-2 sm:py-4 text-[10px] sm:text-sm font-medium leading-5 text-right whitespace-no-wrap border-b border-gray-200">
                                            <a href="{{ route('payment.edit', ['payment' => $r->id]) }}"
                                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        </td>

                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =======link end========= -->
@endsection
@section("title", "Payment requests")

