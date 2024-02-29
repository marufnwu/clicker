@extends("admin.layout")
@section("title", "Notices")
@section("content")
<!-- =======notice start========= -->
<section class="py-4">
    <div class="container max-w-screen-xl mx-auto px-4">
        <div class="row">
            <div class="w-full px-0 sm:px-4">
                @include("message")

                        <div class="pt-16 pb-4 flex w-full items-center justify-end">
                            <button onclick="addNewNotice()" class="group relative px-4 py-2 overflow-hidden rounded-lg bg-green-500 text-sm font-bold text-white">Add New Notice
                            </button>
                            <div class="absolute inset-0 h-full w-full scale-0 rounded-lg transition-all duration-300 group-hover:scale-100 group-hover:bg-white/30"></div>
                            
                        </div>
                
                <div class="min-w-full overflow-auto align-middle border-b border-gray-200 shadow rounded-md sm:rounded-lg">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th
                                    class="px-1 sm:px-3 lg:px-6 py-2 sm:py-3 text-[10px] sm:text-xs font-bold leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Id</th>

                                <th
                                    class="px-1 sm:px-3 lg:px-6 py-2 sm:py-3 text-[10px] sm:text-xs font-bold leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Info</th>
                                <th
                                    class="px-1 sm:px-3 lg:px-6 py-2 sm:py-3 text-[10px] sm:text-xs font-bold leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Status</th>
                                <th
                                    class="px-1 sm:px-3 lg:px-6 py-2 sm:py-3 text-[10px] sm:text-xs font-bold leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Last Update</th>
                                <th class="px-1 sm:px-3 lg:px-6 py-2 sm:py-3 border-b border-gray-200 bg-gray-50"></th>
                                <th class="px-1 sm:px-3 lg:px-6 py-2 sm:py-3 border-b border-gray-200 bg-gray-50"></th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">

                            @foreach ($notices as $notice)

                                <tr>
                                    <td class="px-1 sm:px-3 lg:px-6 py-2 sm:py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                            <div class="text-[10px] sm:text-sm font-medium leading-5 text-gray-900">#{{$notice->id}}</div>
                                        </div>
                                    </td>


                                    <td class="px-1 sm:px-3 lg:px-6 py-2 sm:py-4 whitespace-no-wrap border-b border-gray-200">
                                        <a href="javascript:;" class="text-[10px] sm:text-sm leading-5 text-gray-900">{{$notice->info}}</a>
                                    </td>



                                    <td class="px-1 sm:px-3 lg:px-6 py-0 sm:py-2 md:py-4 whitespace-no-wrap border-b border-gray-200">
                                        <span class="inline-flex px-1 sm:px-2 py-0 sm:py-1 text-[10px] sm:text-xs font-semibold leading-5 {{$notice->enabled ? "text-green-800 bg-green-100" : "text-red-800 bg-red-100" }} rounded-full">{{$notice->enabled ? "Active" : "Deactive"}}</span>
                                    </td>

                                    <td class="px-1 sm:px-3 lg:px-6 py-2 sm:py-4 whitespace-no-wrap border-b border-gray-200">
                                        <a href="javascript:;" class="text-[10px] sm:text-sm leading-5 text-gray-900">{{$notice->updated_at}}</a>
                                    </td>

                                    <td id="edit"  class="px-1 sm:px-3 lg:px-6 py-2 sm:py-4 text-[10px] sm:text-sm font-medium leading-5 text-right whitespace-no-wrap border-b border-gray-200">
                                        <a href="{{route("notices.edit", ["notice"=>$notice->id])}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    </td>
                                    <td class="px-1 sm:px-3 lg:px-6 py-2 sm:py-4 text-[10px] sm:text-sm font-medium leading-5 text-right whitespace-no-wrap border-b border-gray-200">
                                        <form action="{{ route('notices.destroy', ['notice' => $notice->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this notice?');">
                                            @method('DELETE')

                                            <button type="submit" class="text-indigo-600 hover:text-indigo-900 pt-2">Delete</button>
                                        </form>
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
<!-- =======notice end========= -->

<!-- =======notice modal start========= -->
<section>
    <div id="authentication-modal" tabindex="-1" aria-hidden="true" class=" glass hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-screen max-h-full">
        <div class="relative p-4 w-full h-full">
            <!-- Modal content -->
            <div class=" absolute w-full md:w-1/2 transform -translate-x-4 md:translate-x-2/3 md:-left-16  translate-y-1/3 -top-16 bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Edit notice
                    </h3>
                    <button id="close" type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="authentication-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form method="POST" id="updateForm">
                        @method("PUT")
                        <!-- Hidden input for notice ID -->
                        <div class=" space-y-4">
                            <div class="space-y-1">
                                <label for="modal-url" class="block text-sm font-medium leading-6 text-gray-900">Enter URL</label>
                                <input id="modal-url" name="modal-url" type="url" autocomplete="url" placeholder="Enter your url" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6" required/>
                            </div>
                            <div class="space-y-1">
                                <label for="modal-point" class="block text-sm font-medium leading-6 text-gray-900">Enter Point</label>
                                <input id="modal-point" name="modal-point" type="tel" autocomplete="point" placeholder="Enter point" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6" required/>
                            </div>
                            <div class="space-y-1">
                                <label for="modal-status" class="block text-sm font-medium text-gray-900">Status</label>
                                <select name="modal-status" id="modal-status" class=" default-font-1 px-2 py-1.5 bg-white block w-full rounded-md border-sky-300 shadow-sm focus:border-sky-300 ring-1 ring-inset ring-gray-300">
                                    <option value="1" class=" font-medium text-gray-700">Active</option>
                                    <option value="0" class=" font-medium text-gray-700">Deactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-8">
                            <div class=" pb-8 flex flex-wrap gap-4 w-full items-center justify-center">
                                <button type="submit" class="flex w-44 justify-center rounded-md bg-sky-700 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-700">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- =======notice modal end========= -->
@endsection

@section("js")
<script>
    // =====================modal open close============
    // document.getElementById("edit").addEventListener('click', () => {document.getElementById("authentication-modal").classList.remove("hidden")})
    document.getElementById("close").addEventListener('click', () => {document.getElementById("authentication-modal").classList.add("hidden")})

    function edit(notice){
        document.getElementById("modal-url").value = notice.value;
        document.getElementById("modal-point").value = 0;
        document.getElementById("modal-status").value = notice.active;
        document.getElementById("authentication-modal").classList.remove("hidden");
        var newAction = "{{ route('notices.update', ['notice' => ':linkId']) }}".replace(':linkId', notice.id);
        document.getElementById("updateForm").setAttribute("action", newAction);

    }

    // ================open add new notice page================

    function addNewNotice() {
        window.location.href = "{{route("notices.create")}}";
    }
</script>
@endsection
