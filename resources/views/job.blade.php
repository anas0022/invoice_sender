<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/all.css">
    <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome" href="/css/app-wa-54e7be3a62ca9b7580d7f8c669f59e74.css?vsn=d">
    <link rel="stylesheet" href="{{ asset('CSS/job.css') }}">
    <title>Document</title>
</head>

<body>
@include('menu')
@if(session('success'))
<div id="success">
    <div id="close">X</div>
    <p style="color: green;">{{ session('success') }}</p>
</div>
  @endif

<form action="{{ route('pdf.post') }}" method="POST">
    @csrf
    <section  id="invoice-section"  >
    <div class="logo-container">
      <div class="logo">
     <img src="{{asset('images/Pioneers.png')}}" alt="" srcset="">
    <p class="text">INVOICE</p></div>
  </div>
    <div class="company_tagname">
   <input type="text" placeholder="Your company name" name="companyName" required>
    </div>

    <div class="input-invoice">
     <div class="invoice-input">
       <div class="items-left">
         <input type="text" placeholder="Client's Company Name" name="ClientsCompanyName" required>
         <input type="text" placeholder="Attention: Client's Name" name="AttentionClientsName" required>
         <input type="text" placeholder="Street Number & Name or PO Box" name="StreetNumberandNameorPOBox" required>
         <input type="text" placeholder="State & Post Code" name="StateandPostCode" required>
         <input type="text" placeholder="Country" name="country" required>
       </div>
       <div class="items-right">
         <div class="itmes1">
           <div class="date">
             <label for="invoiceDate">Invoice Date</label>
             <input type="date"  id="invoiceDate" name="invoiceDate" required>
           </div>
           <div class="date">
             <label for="invoiceDate">Invoice Number</label>
             <input type="text"  id="invoiceNumber" name="invoiceNumber" required>
           </div>
           <div class="date">
             <label for="invoiceDate">Reference/PO #</label>
             <input type="text" id="referencePO" name="referencePO" required>
           </div>
         </div>
         <div class="itmes2">
           <div class="date2">
             <div class="items">
               <input type="text" id="referencePO" placeholder="Your company name" name="Yourcompanyname" required>
               <input type="text" id="referencePO" placeholder="Street Number and Name" name="StreetNumberandName" required> 
               <input type="text" id="referencePO" placeholder="State & Post Code" name="StateandPostCode" required>
               <input type="text" id="referencePO" placeholder="Country" name="c" required>
             </div>
           </div>
         </div>
       </div>
     </div>
    </div>
     <div class="table-headers">
     <span class="trose">
       <p class="head1" style="width: 700px;  display: flex; justify-content: start; padding: 10px; ">Description</p>
       <p>Hours Worked</p>
       <p>Wage Per Hour</p>
       <p>Total Wage AUD</p>
     </span>
   </div>
   <div class="table-all">
     <div class="table">
   <div class="data1">
     <input type="text" class="in1" name="inde[0]" >
    
   </div>
   <div class="data2">
   <input type="number" id="qty1" onchange="calculateTotal('1')" class="in1" name="inwork[0]">


   </div>
   <div class="data3">
   <input type="number" id="price1" onchange="calculateTotal('1')" class="in1" name="inwage[0]">
     
   </div>
   <div class="data4">
     <input type="text" class="in1" value="$0.00" id="total1" readonly onchange="calculateTotal(1)" name="intotal[0]"> 

   </div>
   <div class="add-row"><i class="fa-solid fa-circle-plus" onclick="addRow()" ></i></div>
     </div>
     
   </div>

   <div class="total">
  <div class="total-item">
    <p>TOTAL AUD <input type="text" value="$0.00" id="totalAUD" readonly name="total"></p>
  </div>
</div>
   <div class="Admin-head">
    <div class="head">
   <p>Hours Worked</p> 
   <p>Wage per Hour</p>
      <p>Admin-time</p>
      <p>Planning-time</p>
      <p>Total Hour</p>
    <p>Wage Owed</p>
    </div>
  </div>
  <div class="Admin-head">
  <div class="head2">
  <input type="number" id="Hours-worked" oninput="calculateWages()"  style="border: none;" name="Hoursworked" step="0.01">
  <input type="number" id="wage-per-hour"  style="border: none;"   oninput="calculateWages()" name="wageperhour" step="0.01">
  <input type="number" id="admin-time" oninput="calculateWages()"  style="border: none;" name="admintime" step="0.01">
<input type="number" id="planning-time" oninput="calculateWages()"  style="border: none;" name="planningtime" step="0.01">
<input type="number" id="total-hour" oninput="calculateWages()" readonly  style="border: none;" name="totalhour" step="0.01">
 <input type="text" id="wage-owed" style="border: none;" readonly  oninput="calculateWages()" name="wageowed" step="0.01">
</div>

  </div>
  
   <div class="bottom">
<div class="bottom-items">
<p>Pioneers Tutoring Australia Pty Ltd as Trustee for G & A FAMILY TRUST</p><p>ABN: 32 354 089 794</p><p style="border: none;">ACN: 664 467 823</p>
</div>
   </div>
  
  </section>
   <div class="button">


   <div class="pdfsender">
    <button id="download-pdf">Submit</button> 
   </div>   </div>



    


</div>
 
  
<script>
var close = document.getElementById('close');
close.onclick = function() {
    document.getElementById('success').style.display = 'none';
};

 
function calculateTotal(itemId) {
  var qty = document.getElementById("qty" + itemId).value;
  var price = document.getElementById("price" + itemId).value;
  var total = qty * price;
  document.getElementById("total" + itemId).value = "$" + total.toFixed(2); 

  var totalAUD = 0;
  var rows = document.querySelectorAll('.table .data4 input');
  rows.forEach(function(row) {
    var totalValue = row.value.replace("$", "");
    totalAUD += parseFloat(totalValue) || 0;
  });
  document.getElementById("totalAUD").value = "$" + totalAUD.toFixed(2); // Ensure two decimal places
}
  
function addRow() {
    
    const table = document.querySelector('.table');
    const rowCount = table.querySelectorAll('.data1 input').length / 1 + 1;

    const newInput1 = document.createElement('input');
    newInput1.type = 'text';
    newInput1.className = 'in1';
    newInput1.name = `inde[${rowCount - 1}]`;

    const newInput2 = document.createElement('input');
    newInput2.type = 'number';
    newInput2.className = 'in1';
    newInput2.id = 'qty' + rowCount;
    newInput2.name = `inwork[${rowCount - 1}]`;
    newInput2.setAttribute('onchange', `calculateTotal(${rowCount})`);

    const newInput3 = document.createElement('input');
    newInput3.type = 'number';
    newInput3.className = 'in1';
    newInput3.id = 'price' + rowCount;
    newInput3.name = `inwage[${rowCount - 1}]`;
    newInput3.setAttribute('onchange', `calculateTotal(${rowCount})`);

    const newInput4 = document.createElement('input');
    newInput4.type = 'text';
    newInput4.className = 'total in1';
    newInput4.value = "$0.00";
    newInput4.id = 'total' + rowCount;
    newInput4.name = `intotal[${rowCount - 1}]`;
    newInput4.readOnly = true;

    // Append new inputs to their respective divs
    document.querySelector('.data1').appendChild(newInput1);
    document.querySelector('.data2').appendChild(newInput2);
    document.querySelector('.data3').appendChild(newInput3);
    document.querySelector('.data4').appendChild(newInput4);

    // Alternate background color class
    const altClass = (rowCount % 2 === 0) ? 'in2' : 'in1';
    newInput1.className = altClass;
    newInput2.className = altClass;
    newInput3.className = altClass;
    newInput4.className = altClass;
    calculateTotal(rowCount);
}

document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.add-row i').addEventListener('click', addRow);
});
 
function calculateWages() {
            var hours_worked = parseFloat(document.getElementById('Hours-worked').value) || 0;
            var wage_hour = parseFloat(document.getElementById('wage-per-hour').value) || 0;

            var admin_time = (hours_worked / 1.5) * (1 / 3);
            admin_time = Math.round(admin_time * 100) / 100;

            var planning_time = hours_worked / 10;
        

            var total_hour =admin_time + planning_time;
            total_hour = Math.round(total_hour * 100) / 100;

            var wage_owed = total_hour * wage_hour;
            wage_owed = Math.round(wage_owed * 100) / 100;

            document.getElementById('admin-time').value = admin_time.toFixed(2);
            document.getElementById('planning-time').value = planning_time.toFixed(2);
            document.getElementById('total-hour').value = total_hour.toFixed(2);
            document.getElementById('wage-owed').value = '$' + wage_owed.toFixed(2);
        }
</script>

</body>
</html>