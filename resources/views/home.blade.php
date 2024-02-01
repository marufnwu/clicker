@extends('layout')
@section('body')
    <div class="py-10 bg-gray-300/25">
        <div class="container max-w-screen-xl mx-auto px-4 py-4">
            <div class="row ">

                @isset($links)
                    @foreach ($links as $link)
                        <div class="px-4 py-4 w-full  md:w-1/2 lg:w-1/4  bg-transparent">
                            <div class=" px-4 py-10 rounded text-center shadow-lg hover:shadow-sky-200 ">
                                <p class="py-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                </p>
                                <div class="flex justify-center pt-2">
                                    @if ($link->is_clicked == 1)
                                        <button class="cursor-not-allowed rounded bg-gray-700 text-white font-medium px-6 py-1">
                                            Clicked
                                        </button>
                                    @else
                                        <button onclick="handleClick({{ $link->id }}, this)"
                                            class="click-button hover:scale-110 hover:bg-sky-400 transition ease-in-out duration-300 rounded bg-sky-700 text-white font-medium px-6 py-1">
                                            Click
                                        </button>
                                    @endif

                                </div>
                            </div>
                        </div>
                    @endforeach
                @endisset

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        // Add a class to identify click buttons
        const clickButtons = document.querySelectorAll('.click-button');
        const clickedButtons = new Set();

        // Function to handle button click
        function handleClick(linkId, button) {
            // Check if the button has already been clicked
            if (clickedButtons.has(button)) {
                return;
            }

            // Disable all buttons
            clickButtons.forEach(button => {
                if (!clickedButtons.has(button)) {
                    button.innerHTML = "Wait...";
                    button.className = 'cursor-not-allowed rounded bg-gray-400 text-white font-medium px-6 py-1';
                }
                button.disabled = true;

            });


            // Make the AJAX request to the route
            axios.post(`/link/${linkId}/click`, {
                    linkId
                })
                .then(response => {

                    if (!response.data.error) {
                        getClickBalance();
                        window.open(response.data.link, '_blank');

                        setTimeout(() => {
                            clickedButtons.add(button);

                            clickButtons.forEach(button => {
                                if (!clickedButtons.has(button)) {
                                    button.disabled = false;
                                    // Change the clicked button's appearance
                                    button.innerHTML = "Click";
                                    button.className =
                                        'click-button hover:scale-110 hover:bg-sky-400 transition ease-in-out duration-300 rounded bg-sky-700 text-white font-medium px-6 py-1';
                                }
                            });


                            button.innerHTML = 'Clicked';
                            button.className =
                                'cursor-not-allowed rounded bg-gray-700 text-white font-medium px-6 py-1';
                            button.classList.remove("click-button");

                        }, 10000);
                    } else {
                        clickButtons.forEach(button => {
                            if (!clickedButtons.has(button)) {
                                button.disabled = false;
                                // Change the clicked button's appearance
                                button.innerHTML = "Click";
                                button.className =
                                    'click-button hover:scale-110 hover:bg-sky-400 transition ease-in-out duration-300 rounded bg-sky-700 text-white font-medium px-6 py-1';
                            }
                        });
                    }

                    // Handle the response (open link in a new tab, etc.)

                    // Add the clicked button to the set


                    // Enable all buttons after 30 seconds, except the clicked buttons

                })
                .catch(error => {
                    console.error('Error:', error);

                    // Enable buttons in case of an error
                    clickButtons.forEach(button => {
                        button.disabled = false;
                    });
                });


        }
    </script>
@endsection
