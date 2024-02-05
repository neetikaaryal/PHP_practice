
<link rel="stylesheet" href="{{asset('mystyle.css')}}">
<x-app-layout>
    <x-slot name="header">
    <body>

<ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="/home">Blog</a></li>
  <li><a href="/type">Type</a></li>
  <li><a href="/tag">Tag</a></li>
</ul>

</body>
</html>
    </x-slot>
    @yield('main-section')
    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> -->
</x-app-layout>
