<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Admin Profile</title>
</head>
<body class="bg-slate-500">
@include('partial/navbar-home')
<div class="flex flex-col items-center justify-center px-2 py-4 mx-auto lg:py-10">
    <div class="flex flex-col  lg:h-[700px]  bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl dark:border-gray-700 dark:bg-gray-800">
        <div class="m-4">
            <img class="object-cover rounded-t-lg md:h-60 lg:w-48 lg:h-60 md:w-48 md:rounded-none md:rounded-l-lg" src="/students/{{Auth::guard('register')->user()->image}}" alt="">
            <div class="mt-5">
                <form class="space-y-4 md:space-y-6" action="#" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="image"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                        <input type="file" name="image" id="image"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('image')
                            <small class="text-danger text-yellow-400">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Submit</button>
                </form>
            </div>
        </div>
        <div class=" px-5 py-2 leading-normal w-[400px]">

            {{-- <h5 class="mb-2 text-2xl text-gray-900 dark:text-white"><span class="font-bold">Name: </span>{{Auth::guard('register')->user()->name}}</h5>
            <h6 class="mb-2 text-gray-900 dark:text-white"><span class="font-bold">Email Id: </span>{{Auth::guard('register')->user()->email}}</h6>
            <h6 class="mb-2 text-gray-900 dark:text-white"><span class="font-bold">Phone Number: </span> {{Auth::guard('register')->user()->phone}}</h6>
            <h6 class="mb-2 text-gray-900 dark:text-white"><span class="font-bold">Location: </span> {{Auth::guard('register')->user()->location}}</h6> --}}
            <form class="space-y-4 md:space-y-6" action="#" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name" value="{{Auth::guard('register')->user()->name}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('name')
                            <small class="text-danger text-yellow-400">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" value="{{Auth::guard('register')->user()->email}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('email')
                            <small class="text-danger text-yellow-400">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                        <input type="text" name="phone" id="phone" value="{{Auth::guard('register')->user()->phone}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('phone')
                            <small class="text-danger text-yellow-400">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                        <input type="text" name="location" id="location" value="{{Auth::guard('register')->user()->location}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('location')
                            <small class="text-danger text-yellow-400">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <button type="submit"
                class="w-full text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Submit</button>
            </form>
                <form class="space-y-4 md:space-y-6" action="#" method="post">
                    @csrf
                    <div>
                        <div>
                            <label for="oldpassword"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Old Password</label>
                            <input type="password" name="oldpassword" id="oldpassword" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('oldpassword')
                                <small class="text-danger text-yellow-400">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('password')
                                <small class="text-danger text-yellow-400">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="confirmpassword"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm New Password</label>
                            <input type="password" name="confirmpassword" id="confirmpassword" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('confirmpassword')
                                <small class="text-danger text-yellow-400">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>