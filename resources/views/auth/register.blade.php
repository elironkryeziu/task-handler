@extends('layouts.app')

@section('content')
<body class="bg-grey-lighter text-base text-grey-darkest font-normal relative">
    <div class="h-2 bg-primary"></div>

    <div class="container mx-auto p-8">
        <div class="mx-auto max-w-sm">
            <div class="py-10 text-center">
            </div>
            <div class="bg-white rounded shadow">
                <div class="bg-teal-400 border-b py-8 font-bold text-white text-center text-xl tracking-widest uppercase">
                    REGISTER 
                </div>

                <form class="bg-grey-lightest px-10 py-10">

                    <div class="mb-3">
                        <input class="border w-full p-3" name="name" type="name" placeholder="Full Name">
                    </div>
                    <div class="mb-3">
                        <input class="border w-full p-3" name="email" type="text" placeholder="E-Mail">
                    </div>
                    
                    <div class="mb-3">
                        <input class="border w-full p-3" name="password" type="password" placeholder="**************">
                    </div>
                    <div class="mb-6">
                        <input class="border w-full p-3" name="confirm_password" type="password" placeholder="**************">
                    </div>
                    <div class="flex">
                      <!-- sm:w-full rounded p-2   -->
                        <button class="bg-teal-400 hover:bg-teal-300 w-full p-4 text-sm text-white uppercase font-bold tracking-wider">
                            Register
                        </button>
                    </div>
                </form>

                <div class="border-t px-10 py-6">
                    <div class="flex justify-between">
                        <a href="/login" class="font-bold text-primary hover:text-primary-dark no-underline">Already have an account?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
