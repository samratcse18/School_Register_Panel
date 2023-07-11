<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Student Profile</title>
</head>
<body class="bg-slate-500">
@include('partial.navbar-home')
@foreach ($data as $item)
    <div class="flex flex-col items-center justify-center px-2 py-4 mx-auto lg:py-10">
        <div class="flex flex-col  lg:h-[400px]   bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl dark:border-gray-700 dark:bg-gray-800">
            <div class="m-4">
                <img class="object-cover rounded-t-lg md:h-60 lg:w-48 lg:h-60 md:w-48 md:rounded-none md:rounded-l-lg" src="/students/{{$item->image}}" alt="">
                <div class="flex justify-around space-x-5 m-4 ">
                    <a href='edit_student/{{ $item->id }}'>
                        <button class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Edit</button>
                    </a>
                    <a href='delete_student/{{ $item->id }}'>
                        <button class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Delete</button>
                    </a>
                </div>
            </div>
            <div class=" relative px-5 py-2 leading-normal w-[400px]">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Name: {{$item->fname}} {{$item->lname}}</h5>
                <h6 class="mb-2 tracking-tight text-gray-900 dark:text-white">Class: {{$item->class}}</h6>
                <h6 class="mb-2 tracking-tight text-gray-900 dark:text-white">Group: {{$item->group}}</h6>
                <h6 class="mb-2 tracking-tight text-gray-900 dark:text-white">Roll: {{$item->roll}}</h6>
                <h6 class="mb-2 tracking-tight text-gray-900 dark:text-white">Year: {{$item->year}}</h6>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Father Name: {{$item->father}}<br>Mother Name: {{$item->mother}}<br>Phone Number: {{$item->phone}}</p>
                <small class="text-white">Address: {{$item->address}}</small>
                <div class="lg:absolute pt-[40px] lg:pt-0 flex justify-between lg:space-x-2 lg:bottom-5">
                    <a href='admission_fee/{{ $item->id }}'>
                        <button id="admission_fee" class="text-xs text-black bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg px-2 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Admission Fee</button>
                    </a>
                    <a href='midturm_fee/{{ $item->id }}'>
                        <button id="midturm_fee" class="text-xs text-black bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg px-2 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Midturm Fee</button>
                    </a>
                    <a href='final_fee/{{ $item->id }}'>
                        <button id="final_fee" class="text-xs text-black bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg px-2 py-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Final Fee</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach


<script>
    const data1 = '{{ $item->admission_fee }}';
    const data2 = '{{ $item->midturm_fee }}';
    const data3 = '{{ $item->final_fee }}';
    const admission_fee = document.getElementById('admission_fee');
    const midturm_fee = document.getElementById('midturm_fee');
    const final_fee = document.getElementById('final_fee');
    if(data1 === 'paid'){
        admission_fee.setAttribute('disabled', true);
        admission_fee.innerText = "Admission Paid";
        admission_fee.style.backgroundColor = 'gray';
    }
    if(data2 === 'paid'){
        midturm_fee.setAttribute('disabled', true);
        midturm_fee.innerText = "Midturm Paid";
        midturm_fee.style.backgroundColor = 'gray';
    }
    if(data3 === 'paid'){
        final_fee.setAttribute('disabled', true);
        final_fee.innerText = "Final Paid";
        final_fee.style.backgroundColor = 'gray';
    }
    
</script>
</body>
</html>