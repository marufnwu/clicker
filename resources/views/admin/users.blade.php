@extends("admin.layout")
@section("title", "All Users")
@section("content")
<!-- CONTENT -->
<div class = "content  transform ease-in-out duration-500 pt-20 px-2 pb-4 ">
    <!-- ===============add main content here============== -->
    <!-- =======user list start========= -->
    <section class="py-4">
        <div class="container max-w-screen-xl mx-auto px-4">
            <div class="row">
                <div class="w-full ">
                    <div class=" overflow-auto align-middle border-b border-gray-200 shadow rounded-md sm:rounded-lg">
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th
                                        class=" px-1 sm:px-3 md:px-6 py-2 md:py-3 text-[10px] sm:text-xs font-bold leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Name</th>
                                    <th
                                        class=" px-1 sm:px-3 md:px-6 py-2 md:py-3 text-[10px] sm:text-xs font-bold leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Email</th>
                                    <th
                                        class=" px-1 sm:px-3 md:px-6 py-2 md:py-3 text-[10px] sm:text-xs font-bold leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Phone</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white">

                                @isset($users)
                                    @foreach ($users as $user)
                                    <tr>
                                        <td class="px-1 sm:px-3 md:px-6 py-2 md:py-4 whitespace-no-wrap border-b border-gray-200">
                                            <a href="{{route("admin.profile", ["user"=>$user->id])}}" class="flex items-center">
                                                <div class="flex-shrink-0 w-8 sm:w-10 h-8 sm:h-10">
                                                    <img class="w-8 sm:w-10 h-8 sm:h-10 rounded-full"
                                                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                                        alt="">
                                                </div>
                                                <div class=" ml-2 sm:ml-4">
                                                    <div class="text-xs sm:text-sm font-medium sm:leading-5 text-gray-900">{{$user->name}}
                                                    </div>
                                                </div>
                                            </a>
                                        </td>

                                        <td class="px-1 sm:px-3 md:px-6 py-2 md:py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-xs sm:text-sm sm:leading-5 text-gray-900">{{$user->email}}</div>
                                        </td>

                                        <td class="px-1 sm:px-3 md:px-6 py-2 md:py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-xs sm:text-sm sm:leading-5 text-gray-500">{{$user->phone}}</div>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endisset




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
