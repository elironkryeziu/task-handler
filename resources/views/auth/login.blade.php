@extends('layouts.app')

@section('content')
<body class="bg-grey-lighter text-base text-grey-darkest font-normal relative">
    <div class="h-2 bg-primary"></div>

    <div class="container mx-auto p-8">
        <div class="mx-auto max-w-sm">
            <div class="py-10 text-center">
            </div>
            <div class="bg-white rounded shadow">
                <div class="bg-blue-500 border-b py-8 font-bold text-white text-center text-xl tracking-widest uppercase">
                    WELCOME 
                </div>

                <form class="bg-grey-lightest px-10 py-10">

                    <div class="mb-3">
                        <input class="border w-full p-3" name="email" type="text" placeholder="E-Mail">
                    </div>
                    
                    <div class="mb-3">
                        <input class="border w-full p-3" name="password" type="password" placeholder="**************">
                    </div>
                    <div class="flex">
                      <!-- sm:w-full rounded p-2   -->
                        <button class="bg-blue-500 hover:bg-teal-300 w-full p-4 text-sm text-white uppercase font-bold tracking-wider">
                            Login
                        </button>
                    </div>
                </form>

                <div class="border-t px-10 py-6">
                    <div class="flex justify-between">
                        <a href="register" class="font-bold text-primary hover:text-primary-dark no-underline">Don't have an account?</a>
                        <a href="#" class="text-grey-darkest hover:text-black no-underline">Forgot Password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
