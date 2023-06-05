<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admission Fee</title>
	<script src="js/jquery.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  @include('partial.navbar-home')

  <div class="m-[10px]" id="invoice">
      <header >
          <h1 class="bg-[#e40101] py-2 uppercase text-center text-white">Invoice</h1>
          <h1 class="py-2 text-[20px]  text-center">Bangabandhu Sheikh Mujibur Rahman Science and Technology University</h1>
          <div class="py-2 text-[20px] text-white  mx-auto flex justify-center">
              <h1 class="bg-blue-500 p-1">{{$student_fee_type}} Fee</h1>
          </div>
          <address class="pt-2">
        @foreach ($data as $item)
        <p>Name: {{$item->fname}} {{$item->lname}}  </p>
        <p>Class: {{$item->class}} </p> 
        <p>Roll: {{$item->roll}} </p>
        <p>Year: {{$item->year}} </p>
        <p>Group: {{$item->group}} </p>
        @endforeach
      </address>
    </header>     
      
<div class="flex justify-center items-center">
  <table class="w-[70%]  text-left">
      <thead class="">
          <tr>
              <th class="">
                  Fee Title
              </th>
              <th class="">
                  Fee
              </th>
          </tr>
      </thead>
      <tbody>
        @php
            $total=0;
        @endphp
        @foreach ($fees as $fee)
            @if(($fee->class == $item->class) && ($fee->year == $item->year) && ($student_fee_type == $fee->fee_type) )
                <tr class="">
                    <td class="">
                        {{$fee->fee_title}}
                    </td>
                    <td class="">
                        {{$fee->fee}}
                    </td>
                </tr>
                @php
                    $total = $total + intval($fee->fee);
                @endphp
            @endif
        @endforeach
                <tr class="border-t-[1px] border-solid border-black">
                    <td class="">
                        Total
                    </td>
                    <td class="">
                        {{$total}}
                    </td>
                </tr>
      </tbody>
  </table>
</div>
    <aside>
      <h1 class="pt-5"><span >Additional Notes</span></h1>
      <div class="flex justify-between">
        <p>This document generates by Electricaly</p>
        <p>{{ now()->format('d-m-Y h:i A'); }}</p>
      </div>
    </aside>
</div>
<div class="flex justify-center items-center">
  <a  href="javascript:void(0)" onclick="pdf()"><button type="button" class="text-[16px] text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Download PDF</button></a>
</div>


<script src="{{ asset('js/jspdf.debug.js') }}"></script>
<script src="{{ asset('js/html2canvas.min.js') }}"></script>
<script src="{{ asset('js/html2pdf.min.js') }}"></script>


<script>
function pdf(){

  var options = {
          margin: 5,
          filename: "invoice.pdf", // Specifies the filename for the downloaded PDF
          format: "a4", // Sets the page format, e.g., "a3", "letter", "legal", etc.
          orientation: "portrait", // Sets the page orientation: "portrait" or "landscape"
          unit: "px", // Sets the measurement unit: "mm", "cm", "in", or "px"
          compress: true, // Enables or disables PDF compression
          precision: 2, // Sets the number of decimal places for dimensions, e.g., width, height
          quality: 0.7, // Sets the compression quality: a value between 0 and 1
        };
      
      // $('.btn-download').click(function(e){
        // e.preventDefault();
        const element = document.getElementById('invoice');
        html2pdf().from(element).set(options).save();
      // });
  
  
      function printDiv(divName) {
}
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
    </script>



</body>
</html>