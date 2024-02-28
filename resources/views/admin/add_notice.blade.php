@extends("admin.layout")
@section("title", "Add New Notice")
@section("content")
  <!-- CONTENT -->
  <div class = "content ml-12 transform ease-in-out duration-500 pt-20 px-2 pb-4 ">
    <!-- ===============add main content here============== -->
    <!-- ==========Add new notice start=============== -->
    <section class="py-4">
        <div class="container max-w-screen-xl mx-auto px-4">
            <div class="row">
                <div class="w-full px-4">
                    <div class=" p-4 rounded-lg">
                        @include("message")
                        <form action="{{ isset($notice) ? route('notices.update', ['notice' => $notice->id]) : route('notices.store') }}" method="POST">

                            @isset($notice)
                                @method("PUT")
                            @endisset

                            <div class=" space-y-4">
                                <div class="space-y-1">
                                    <label for="info" class="block text-sm font-medium leading-6 text-gray-900">Enter Info</label>
                                    <input id="info" name="info" type="info" autocomplete="info" placeholder="Enter your info" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-sky-600 sm:text-sm sm:leading-6" required value="{{ old('info') !== null ? old('info') : (isset($notice) ? $notice->info : '')
                                }}"/>
                                    @error('info')
                                        <div class="pt-1 mb-2 text-sm text-red-800 rounded-lg bg-red-50 dark:text-red-400"
                                            role="alert">
                                            <span class="font-medium">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                                <div class="space-y-1">
                                    <label for="enabled" class="block text-sm font-medium text-gray-700">Status</label>
                                    <select name="enabled" id="enabled" class="default-font-1 px-2 py-1.5 bg-white block w-full rounded-md border-sky-300 shadow-sm focus:border-sky-300 ring-1 ring-inset ring-gray-300">
                                        <option value="1" class="font-medium text-gray-700" {{ isset($notice) && $notice->enabled == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" class="font-medium text-gray-700" {{ isset($notice) && $notice->enabled == 0 ? 'selected' : '' }}>Deactive</option>
                                    </select>

                                    @error('enabled')
                                        <div class="pt-1 mb-2 text-sm text-red-800 rounded-lg bg-red-50 dark:text-red-400"
                                            role="alert">
                                            <span class="font-medium">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-8">
                                <main class=" pb-8 flex flex-wrap gap-4 w-full items-center justify-center">



                                    <button type="submit" class="flex w-44 justify-center rounded-md bg-sky-700 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-700">{{isset($notice) ? "Update" : "Submit"}}</button>

                                    <a href="javascript:;" class="group relative px-4 py-2 overflow-hidden rounded-lg bg-green-500 text-sm font-bold text-white">Create New Notice
                                        <div class="absolute inset-0 h-full w-full scale-0 rounded-lg transition-all duration-300 group-hover:scale-100 group-hover:bg-white/30"></div>
                                    </a>
                                </main>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========Add new notice end=============== -->
</div
@endsection

