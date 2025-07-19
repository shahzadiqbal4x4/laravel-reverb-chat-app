<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
                <div id="msg">

                </div>
            </div>
        </div>
    </div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

console.log('test');
document.addEventListener("DOMContentLoaded", function () {

    if (typeof Echo === 'undefined') {
        console.error('Echo is not defined!');
        return;
    }

    Echo.channel('chat')
        .listen('.message.sent', (e) => {
            console.log('Message received:', e.message);
            $('#msg').append('<p>new message: '+e.message+'</p><br>');
        });


});

</script>



</x-app-layout>
