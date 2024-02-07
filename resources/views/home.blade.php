@extends('layout')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
@endsection
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>
        // Add a class to identify click buttons
        const clickButtons = document.querySelectorAll('.click-button');
        const clickedButtons = new Set();

        function waitAndDisable(button) {
            clickButtons.forEach(button => {
                if (!clickedButtons.has(button)) {
                    button.innerHTML = "Wait...";
                    button.className = 'cursor-not-allowed rounded bg-gray-400 text-white font-medium px-6 py-1';
                }
                button.disabled = true;

            });
        }

        function enableAllButton() {
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

        // Function to handle button click
        function handleClick(linkId, button) {
            // Check if the button has already been clicked
            if (clickedButtons.has(button)) {
                return;
            }

            waitAndDisable(button);


            // Make the AJAX request to the route
            axios.post(`/link/${linkId}/click`, {
                    linkId
                })
                .then(response => {

                    if (!response.data.error) {
                        getClickBalance();
                        window.open(response.data.link, '_blank');
                        clickedButtons.add(button);
                        setTimeout(() => {

                            enableAllButton();

                            button.innerHTML = 'Clicked';
                            button.className =
                                'cursor-not-allowed rounded bg-gray-700 text-white font-medium px-6 py-1';
                            button.classList.remove("click-button");

                        }, 30000);
                    } else {
                        enableAllButton(button)
                        Toastify({
                            text: response.data.message,
                            duration: 3000,
                            newWindow: false,
                            close: true,
                            gravity: "bottom", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            style: {
                                background: "linear-gradient(to right, #F7320A, #F7320A)",
                            },
                            onClick: function() {} // Callback after click
                        }).showToast();
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
