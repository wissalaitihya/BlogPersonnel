<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="bg-gray-50 text-gray-800">
     <nav class="bg-white shadow mb-8">
        <div class="max-w-4xl mx-auto px-4 py-4 flex justify-between items-center">

            {{-- Blog name/logo --}}
            <a href="{{ route('articles.index') }}" 
               class="text-xl font-bold text-indigo-600">
                {{ config('app.name') }}
            </a>
            <div>
                @auth
                    {{-- Show these links only when logged in --}}
                    <a href="{{ route('admin.index') }}" 
                       class="mr-4 text-gray-600 hover:text-indigo-600">
                        Dashboard
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button class="text-gray-600 hover:text-red-500">
                            Logout
                        </button>
                    </form>
                    @else
                    {{-- Show login link when not logged in --}}
                    <a href="{{ route('login') }}" 
                       class="text-gray-600 hover:text-indigo-600">
                        Login
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    {{-- MAIN CONTENT --}}
    <main class="max-w-4xl mx-auto px-4">

        {{-- Success message (shown after create/edit/delete) --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        {{-- Page content goes here --}}
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="text-center text-gray-400 text-sm mt-16 pb-8">
        © {{ date('Y') }} {{ config('app.name') }}
    </footer>

</body>
</html>