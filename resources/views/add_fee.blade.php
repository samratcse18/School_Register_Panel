<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Admission</title>
</head>

<body class="bg-slate-500">
    @include('partial/navbar-home')
    @if (Session::has('success'))
        <div class="bg-blue-600 text-center text-white">
            <p>{{Session::get('success')}}</p>
        </div>
    @endif
    @if (Session::has('error'))
        <div class="bg-red-600 text-center text-white">
            <p>{{Session::get('error')}}</p>
        </div>
    @endif
    <section class="">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto  md:h-screen lg:py-0">
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Add New Fee
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('add_fee.student') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="fee_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fee Type</label>
                                <select type="text" name="fee_type" id="fee_type" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Select Fee Type</option>
                                    <option value="Admission">Admission</option>
                                    <option value="Midturm">Midturm</option>
                                    <option value="Final">Final</option>
                                </select>
                            @error('fee_type')
                                <small class="text-danger text-yellow-400">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="fee_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fee Title</label>
                            <input type="text" name="fee_title" id="fee_title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('fee_title')
                                <small class="text-danger text-yellow-400">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class</label>
                                <select type="text" onchange="handleSelection(this)" name="class" id="class" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Select Class</option>
                                    <option value="class 6">Class 6</option>
                                    <option value="class 7">Class 7</option>
                                    <option value="class 8">Class 8</option>
                                    <option value="class 9">Class 9</option>
                                    <option value="class 10">Class 10</option>
                                </select>
                            @error('class')
                                <small class="text-danger text-yellow-400">{{ $message }}</small>
                            @enderror
                        </div>
                        <div id="allGroup" class="hidden">
                            <label for="group" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Group</label>
                                <select type="text" name="group" id="group" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected value="null">Select group</option>
                                    <option value="science">Science</option>
                                    <option value="commerce">Commerce</option>
                                    <option value="arts">Arts</option>
                                </select>
                            @error('group')
                                <small class="text-danger text-yellow-400">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year</label>
                            <input type="text" name="year" id="year"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('year')
                                <small class="text-danger text-yellow-400">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="fee" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fee</label>
                            <input type="text" name="fee" id="fee"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('fee')
                                <small class="text-danger text-yellow-400">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
<script>

    function handleSelection(selectElement) {
    const show=document.getElementById("allGroup");
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    console.log('Selected option: ' + selectedOption.value);
    if(selectedOption.value == "class 9" || selectedOption.value == "class 10")
    {
            show.style.display="block";
    }
    else
    {
        show.style.display="";
    }
  }
</script>

</html>