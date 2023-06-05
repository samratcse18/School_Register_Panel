<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>All-Student</title>
</head>
<body class="bg-slate-500">
@include('partial.navbar-home')
<form action="{{ route('search.student') }}" method="post">
    @csrf
    <div class="flex justify-center space-x-2 mt-5">
        <div>
            <label for="class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class</label>
                <select type="text" name="class" id="class" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
        <div>
            <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year</label>
            <input type="text" name="year" id="year" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('year')
                <small class="text-danger text-yellow-400">{{ $message }}</small>
            @enderror
        </div>
      <button type="submit" name="search" id="search" class="mx-2 mt-7 bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 rounded">Search</button>
    </div>
  </form>
<div class="relative overflow-x-auto shadow-md mt-5">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Serial
                </th>
                <th scope="col" class="px-6 py-3">
                    Class
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Roll
                </th>
                <th scope="col" class="px-6 py-3">
                    Phone Number
                </th>
                <th scope="col" class="px-6 py-3">
                    Year
                </th>
                <th scope="col" class="px-6 py-3">
                    Details
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admissions as $admission)
            @if (($admission->class==$class)&&($admission->year==$year))
                @php
                    $seial=1;
                @endphp
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $serial }}
                </th>
                <td class="px-6 py-4">
                {{ $admission->class }}
                </td>
                <td class="px-6 py-4">
                {{ $admission->fname }}  {{ $admission->lname }}
                </td>
                <td class="px-6 py-4">
                {{ $admission->roll }}
                </td>
                <td class="px-6 py-4">
                {{ $admission->phone }}
                </td>
                <td class="px-6 py-4">
                {{ $admission->year }}
                </td>
                <td class="px-6 py-4">
                    <a href="student_profile/{{$admission->id}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                </td>
            </tr>
                @php
                   $serial= $serial+1;
                @endphp
            @endif
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>