@extends('admin.layout')
@section('content')
    <!-- CONTENT -->
    <div class = "content ml-9 sm:ml-12 transform ease-in-out duration-500 pt-20 px-2 pb-4 ">
        <!-- ===============add main content here============== -->
        <!-- =======link history start========= -->
        <section class="py-2">
            <div class="container max-w-screen-xl mx-auto px-4">
                <div class="row">
                    <div class="w-full px-4">
                        <div
                            class=" min-w-full overflow-auto align-middle border-b border-gray-200 shadow rounded-md sm:rounded-lg">
                            <table class="min-w-full">
                                <thead>
                                    <tr>
                                        <th
                                            class=" px-3 sm:px-6 py-2 sm:py-3 text-xs font-bold leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            Id</th>
                                        <th
                                            class=" px-3 sm:px-6 py-2 sm:py-3 text-xs font-bold leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            Link Id</th>
                                        <th
                                            class=" px-3 sm:px-6 py-2 sm:py-3 text-xs font-bold leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            Point</th>
                                        <th
                                            class=" px-3 sm:px-6 py-2 sm:py-3 text-xs font-bold leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            Link</th>
                                        <th
                                            class=" px-3 sm:px-6 py-2 sm:py-3 text-xs font-bold leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                            Time</th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white">


                                    @foreach ($user->clickHistory as $click)
                                        <tr>
                                            <td
                                                class="px-3 sm:px-6 py-2 sm:py-4 whitespace-no-wrap border-b border-gray-200">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium leading-5 text-gray-900">#{{$click->id}}</div>
                                                </div>
                                            </td>
                                            <td
                                                class="px-3 sm:px-6 py-2 sm:py-4 whitespace-no-wrap border-b border-gray-200">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium leading-5 text-gray-900">#{{$click->link_id}}</div>
                                                </div>
                                            </td>

                                            <td
                                                class="px-3 sm:px-6 py-2 sm:py-4 whitespace-no-wrap border-b border-gray-200">
                                                <div class="text-sm leading-5 text-gray-900">{{$click->point}}p</div>
                                            </td>

                                            <td
                                                class="px-3 sm:px-6 py-2 sm:py-4 whitespace-no-wrap border-b border-gray-200">
                                                <div class="text-sm leading-5 text-gray-900">
                                                    @if (isset($click->link->value))
                                                        {{$click->link->value}}
                                                    @else
                                                        Link Not Found
                                                    @endif
                                                </div>
                                            </td>

                                            <td
                                                class="px-3 sm:px-6 py-2 sm:py-4 whitespace-no-wrap border-b border-gray-200">
                                                <div class="text-sm leading-5 text-gray-500 ">{{$click->created_at}}</div>
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
        <!-- =======link history end========= -->
    </div>
@endsection

@section('title', $user->name."'s click history")
