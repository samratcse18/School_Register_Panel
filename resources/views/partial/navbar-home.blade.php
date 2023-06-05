
<nav class=" bg-white border-gray-200 px-2 sm:px-4 py-1 dark:bg-gray-900">
  
  <div class="flex justify-between">
    <div>
    <img src="home_image/logo.png" height="60" width="60" alt="">
    </div>
    <div class="container flex flex-wrap items-center justify-end mx-auto">
      <div class="flex md:order-2">
        <button data-collapse-toggle="navbar-search" type="button" onclick="showMenu()" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-search" aria-expanded="false">
          <span class="sr-only">Open menu</span>
          <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>
      </div>
      <div id="menu"  class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
        <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <li>
            <a href="{{ route('user.dashboard') }}" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">Home</a>
          </li>
          <li>
            <div class="relative">
              <button id="dropdown" class=" flex items-center justify-between py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                <a href="{{ route('user.admission.page') }}">Admission</a>
                {{-- <svg class="w-5 h-5 ml-1 mt-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg> --}}
              </button>
              {{-- <div id="show" class="z-10 absolute bg-white mt-2 py-2 w-48 shadow-lg rounded-lg hidden">
                <a href="{{ route('user.admission.page') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Class 6</a>
                <a href="{{ route('user.admission.page') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Class 7</a>
                <a href="{{ route('user.admission.page') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Class 8</a>
                <a href="{{ route('user.admission.page') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Class 9</a>
                <a href="{{ route('user.admission.page') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Class 10</a>
              </div> --}}
            </div>
          </li>
          <li>
            <a href="{{ route('add_fee_page.student') }}" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Add Fee</a>
          </li>
          <li>
            <a href="{{ route('fee_list_page.student') }}" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Fee List</a>
          </li>
          <li>
            <a href="{{ route('user.student') }}" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Student</a>
          </li>
          <li>
            <a href="{{ route('admin.profile') }}" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Admin Profile</a>
          </li>
          <li>
          <a href="{{ route('user.logout') }}" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Logout</a>
        </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<script>
  function showMenu(){
    const show=document.getElementById("menu");
    if(show.style.display=="block")
    {
      show.style.display="";
    }
    else{
      show.style.display="block";
    }
  }
  // const dropdownButton = document.getElementById("dropdown");
  // const dropdownMenu = document.getElementById("show");

  // dropdownButton.addEventListener("click", function() {
  // dropdownMenu.classList.toggle("hidden");
  // });

</script>