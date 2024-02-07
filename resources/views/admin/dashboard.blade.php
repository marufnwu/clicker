@extends('admin.layout')
@section('content')
    <!-- CONTENT -->
    <div class = "content ml-7 sm:ml-12 transform ease-in-out duration-500 pt-20 px-2 pb-4 ">
        <!-- ===============add main content here============== -->
        <!-- ==========Home start============ -->
        <section class="py-4">
            <div class="container max-w-screen-xl mx-auto px-4">
                <div class="row">
                    <div class="w-full px-4">
                        <div class = "flex flex-wrap my-5 -mx-2">


                            <div class = "w-full lg:w-1/3 p-2">
                                <div class = "flex items-center flex-row w-full bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-md p-3">
                                    <div class = "flex text-indigo-500 items-center bg-white p-2 rounded-md flex-none w-8 h-8 md:w-12 md:h-12 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="object-scale-down transition duration-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                        </svg>
                                    </div>
                                    <div class = "flex flex-col justify-around flex-grow ml-5 text-white">
                                        <div class = "text-xs whitespace-nowrap">
                                            Total Users
                                        </div>
                                        <div class = "">
                                            {{$totalUser}}
                                        </div>
                                    </div>
                                    <div class = " flex items-center flex-none text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class = "w-6 h-6">
                                            <path strokeLinecap="round" strokeLinejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                        </svg>

                                    </div>
                                </div>
                            </div>


                            <div class = "w-full md:w-1/2 lg:w-1/3 p-2 ">
                                <div class = "flex items-center flex-row w-full bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-md p-3">
                                    <div class = "flex text-indigo-500 items-center bg-white p-2 rounded-md flex-none w-8 h-8 md:w-12 md:h-12 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="object-scale-down transition duration-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                        </svg>
                                    </div>
                                    <div class = "flex flex-col justify-around flex-grow ml-5 text-white">
                                        <div class = "text-xs whitespace-nowrap">
                                            Today's Users
                                        </div>
                                        <div class = "">
                                            {{$todayUser}}

                                        </div>
                                    </div>
                                    <div class = " flex items-center flex-none text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class = "w-6 h-6">
                                            <path strokeLinecap="round" strokeLinejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                        </svg>

                                    </div>
                                </div>
                            </div>
                            <div class = "w-full md:w-1/2 lg:w-1/3 p-2">
                                <div class = "flex items-center flex-row w-full bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-md p-3">
                                    <div class = "flex text-indigo-500 items-center bg-white p-2 rounded-md flex-none w-8 h-8 md:w-12 md:h-12 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="object-scale-down transition duration-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                        </svg>
                                    </div>
                                    <div class = "flex flex-col justify-around flex-grow ml-5 text-white">
                                        <div class = "text-xs whitespace-nowrap">
                                            Yesterday's Users
                                        </div>
                                        <div class = "">
                                            {{$yesterdayUser}}
                                        </div>
                                    </div>
                                    <div class = " flex items-center flex-none text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class = "w-6 h-6">
                                            <path strokeLinecap="round" strokeLinejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                        </svg>

                                    </div>
                                </div>
                            </div>
                            <div class = "w-full md:w-1/2 lg:w-1/3 p-2">
                                <div class = "flex items-center flex-row w-full bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-md p-3">
                                    <div class = "flex text-indigo-500 items-center bg-white p-2 rounded-md flex-none w-8 h-8 md:w-12 md:h-12 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="object-scale-down transition duration-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                        </svg>
                                    </div>
                                    <div class = "flex flex-col justify-around flex-grow ml-5 text-white">
                                        <div class = "text-xs whitespace-nowrap">
                                            Total Clicks
                                        </div>
                                        <div class = "">
                                            {{$totalClickHistories}}
                                        </div>
                                    </div>
                                    <div class = " flex items-center flex-none text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class = "w-6 h-6">
                                            <path strokeLinecap="round" strokeLinejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                        </svg>

                                    </div>
                                </div>
                            </div>
                            <div class = "w-full md:w-1/2 lg:w-1/3 p-2">
                                <div class = "flex items-center flex-row w-full bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-md p-3">
                                    <div class = "flex text-indigo-500 items-center bg-white p-2 rounded-md flex-none w-8 h-8 md:w-12 md:h-12 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="object-scale-down transition duration-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                        </svg>
                                    </div>
                                    <div class = "flex flex-col justify-around flex-grow ml-5 text-white">
                                        <div class = "text-xs whitespace-nowrap">
                                            Today Clicks
                                        </div>
                                        <div class = "">
                                            {{$todayClickHistories}}

                                        </div>
                                    </div>
                                    <div class = " flex items-center flex-none text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class = "w-6 h-6">
                                            <path strokeLinecap="round" strokeLinejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                        </svg>

                                    </div>
                                </div>
                            </div>
                            <div class = "w-full md:w-1/2 lg:w-1/3 p-2">
                                <div class = "flex items-center flex-row w-full bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-md p-3">
                                    <div class = "flex text-indigo-500 items-center bg-white p-2 rounded-md flex-none w-8 h-8 md:w-12 md:h-12 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="object-scale-down transition duration-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                        </svg>
                                    </div>
                                    <div class = "flex flex-col justify-around flex-grow ml-5 text-white">
                                        <div class = "text-xs whitespace-nowrap">
                                            Yesterday's Clicks
                                        </div>
                                        <div class = "">
                                            {{$yesterdayClickHistories}}
                                        </div>
                                    </div>
                                    <div class = " flex items-center flex-none text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class = "w-6 h-6">
                                            <path strokeLinecap="round" strokeLinejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                        </svg>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==========Home end============ -->
    </div>
@endsection
