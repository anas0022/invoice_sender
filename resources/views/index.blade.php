<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice</title>
</head>
<body style="font-family: Arial, sans-serif;  margin: 0; padding: 10px;">
  <section>
    <div style="width: 100%; border: none; position: relative; height:180px;">
      <div style="width: 95%; height: 150px; position:relative;  top:50%; left:50%; transform:translate(-50%,-50%);">
        <img src="{{ $logo }}" alt="Pioneers Tutoring Logo" style="height: 80%; width: 30%; display: block; margin: 0 auto;">
        <div style="width:100%; border-bottom: 2px solid; height: 20%; position: relative; padding:5px;">
          <p style="position: absolute; right: 0; font-size: 30px; margin: 0; padding: 0;">INVOICE</p>
        </div>
      </div>
    </div>
    <div style="width:100%; height:40px;  position: relative;">
      <div style="width:95%; height:90%; position:relative; color: black; top:50%; left:50%; display: flex; justify-content: start; align-items: center; padding: 5px; transform:translate(-50%,-50%); font-size:20px;"><p style="position:relative; margin:auto; padding:5px; width:100%; height:80%; top:50%; left:50%; transform:translate(-50%,-50%); background-color: rgb(204, 221, 228);">{{ $companyName }}</p></div>
    </div>
    <div style="width: 100%; height: 250px; position: relative; margin-top:50px;">
      <table style="width: 95%; height: 100%; position: absolute; left: 50%; top: 50%; transform: translate(-50%,-50%); padding:5px; display:flex;">
        <div style="width: 35%; height: 100%;  margin-top: 10px;">
          <div style="margin-top: 5px; color: black; background-color: rgb(204, 221, 228); height: 25px;display: flex; justify-content: start; align-items: center; position:relative;"> <p style="position:relative; margin:auto; padding:5px; width:90%; height:95%; font-size:15px;">{{ $ClientsCompanyName }}</p></div>
          <div style="margin-top: 5px; color: black; background-color: rgb(204, 221, 228); height: 25px;display: flex; justify-content: start; align-items: center;"><p style="position:relative; margin:auto; padding:5px; width:90%; height:95%; font-size:15px;">{{ $AttentionClientsName }}</p></div>
          <div style="margin-top: 5px; color: black; background-color: rgb(204, 221, 228); height: 25px; display: flex; justify-content: start; align-items: center; "><p style="position:relative; margin:auto; padding:5px; width:90%; height:95%; font-size:15px;">{{ $StreetNumberandNameorPOBox }}</p></div>
          <div style="margin-top: 5px; color: black; background-color: rgb(204, 221, 228); height: 25px; display: flex; justify-content: start; align-items: center;"><p style="position:relative; margin:auto; padding:5px; width:90%; height:95%; font-size:15px;">{{ $StateandPostCode }}</p></div>
          <div style="margin-top: 5px; color: black; background-color: rgb(204, 221, 228); height: 25px; display: flex; justify-content: start; align-items: center;"><p style="position:relative; margin:auto; padding:5px; width:90%; height:95%; font-size:15px;">{{ $country }}</p></div>
          </div>
          <div style="width: 25%; height: 100%; margin-left:280px; margin-top: -250px;">
            <div style="display: flex; justify-content: start; align-items: end; height: 18px; width: 100%; font-weight: 600; font-size:15px;">Invoice Date</div>
            <div style="margin-top: 5px; color: black; background-color: rgb(204, 221, 228); height:25px; display: flex; justify-content: start; align-items: center;"><p style="position:relative; margin:auto; padding:5px; width:90%; height:95%; font-size:15px;">{{ $invoiceDate }}</p></div>
            <div style="display: flex; justify-content: start; align-items: end; height: 18px; width: 100%; font-weight: 600; font-size:15px;">Invoice Number</div>
            <div style="margin-top: 5px; color: black; background-color: rgb(204, 221, 228); height: 25px; display: flex; justify-content: start; align-items: center;"><p style="position:relative; margin:auto; padding:5px; width:90%; height:95%; font-size:15px;">{{ $invoiceNumber }}</p></div>
            <div style="display: flex; justify-content: start; align-items: end; height: 18px; width: 100%; font-weight: 600; font-size:15px;">Reference/PO #</div>
            <div style="margin-top: 5px; color: black; background-color: rgb(204, 221, 228); height: 25px; display: flex; justify-content: start; align-items: center;"><p style="position:relative; margin:auto; padding:5px; width:90%; height:95%; font-size:15px;">{{ $referencePO }}</p></div>
        
            </div>
            <div style="width: 25%; height: 100%; margin-left:480px; margin-top: -550px;">

            <div style="margin-top: 5px; color: black; background-color: rgb(204, 221, 228); height: 25px; display: flex; justify-content: start; align-items: center;"><p style="position:relative; margin:auto; padding:5px; width:90%; height:95%; font-size:15px;">{{ $Yourcompanyname }}</p></div>
            
            <div style="margin-top: 5px; color: black; background-color: rgb(204, 221, 228); height: 25px; display: flex; justify-content: start; align-items: center;"><p style="position:relative; margin:auto; padding:5px; width:90%; height:95%; font-size:15px;">{{ $StreetNumberandName }}</p></div>
            
            <div style="margin-top: 5px; color: black; background-color: rgb(204, 221, 228); height: 25px; display: flex; justify-content: start; align-items: center;"><p style="position:relative; margin:auto; padding:5px; width:90%; height:95%; font-size:15px;">{{ $StateandPostCode }}</p></div>
            <div style="margin-top: 5px; color: black; background-color: rgb(204, 221, 228); height: 25px; display: flex; justify-content: start; align-items: center;"><p style="position:relative; margin:auto; padding:5px; width:90%; height:95%; font-size:15px;">{{ $c }}</p></div>
        
            </div>
      </table>
    </div>
    <div style="width: 100%; height: auto; position: relative;">
  <table style="width: 100%; height: auto; border-collapse: collapse;">
    <tr style="height: 30px; border-bottom: 2px solid black;">
      <th style="height: 30px; width: 40%; font-size: 15px; font-weight: 600; text-align: left; ">Description</th>
      <th style="height: 30px; width: 20%; font-size: 15px; font-weight: 600; text-align: left; ">Hours Worked</th>
      <th style="height: 30px; width: 20%; font-size: 15px; font-weight: 600; text-align: left;">Wage Per Hour</th>
      <th style="height: 30px; width: 20%; font-size: 15px; font-weight: 600; text-align: left;">Total Wage AUD</th>
    </tr>
    </table>
    <table style="width: 100%; height: auto; border-collapse: collapse; margin-top: 10px;">
    @for ($i = 0; $i < count($inde); $i++)
    <tr style="height: 20px; border-bottom: 2px solid transparent;">
        <td style="height: 20px; padding: 5px; width: 40%; font-size: 15px; text-align: left; border:2px solid white; background-color: {{ $i % 2 == 0 ? 'rgb(204, 221, 228)' :  'rgb(214, 213, 213)'}}; 	text-transform: capitalize;">
            {{ $inde[$i] }}
        </td>
        <td style="height: 20px; padding: 5px; width: 20%; font-size: 15px; text-align: left; border:2px solid white; background-color: {{ $i % 2 == 0 ? 'rgb(204, 221, 228)' : 'rgb(214, 213, 213)' }}; 	text-transform: capitalize;">
            {{ $inwork[$i] }}
        </td>
        <td style="height: 20px; padding: 5px; width: 20%; font-size: 15px; text-align: left; border:2px solid white; background-color: {{ $i % 2 == 0 ? 'rgb(204, 221, 228)' : 'rgb(214, 213, 213)' }}; 	text-transform: capitalize;">
            {{ $inwage[$i] }}
        </td>
        <td style="height: 20px; padding: 5px; width: 20%; font-size: 15px; text-align: left; border:2px solid white; background-color: {{ $i % 2 == 0 ? 'rgb(204, 221, 228)' : 'rgb(214, 213, 213)' }}; 	text-transform: capitalize;">
            {{ $intotal[$i] }}
        </td>
    </tr>
@endfor
</table>
</div>

<div style="width:100%; height:150px; position:relative; ">
  <div style="width:50%; height:50%; position:absolute; right:0; bottom:0; border-top:2px solid; text-align: right; ">
    <span style="width:50%; text-align:left;">TOTAL AUD</span><span style="visibility:hidden;">fvhkjfghkdfghkfhgkfhg</span>
    <span style="width:120px; height:80px;  ">{{$total}}</span>
  </div>
</div>

<div style="height:100px; width:100%; position:relative;">
<table style="height:100%; width:90%; position:absolute; left:50%; top:50%; padding:5px; transform:translate(-50%,-50%); border-collapse: separate; border-spacing: 10px;">
  <tr>
    <th style="padding: 5px; border-bottom:2px solid; font-size:12px; width:100px;">Hours Worked</th>
    <th style="padding: 5px; border-bottom:2px solid; font-size:12px; width:100px;">Wage per Hour</th>
    <th style="padding: 5px; border-bottom:2px solid; font-size:12px; width:100px;">Admin-time</th>
    <th style="padding:5px; border-bottom:2px solid; font-size:12px; width:100px;">Planning-time</th>
    <th style="padding: 5px; border-bottom:2px solid; font-size:12px; width:100px;">Total Hour</th>
    <th style="padding: 5px; border-bottom:2px solid; font-size:12px; width:100px;">Wage Owed</th>
  </tr>
  <tr>
    <td style="padding: 5px; height:20px; font-size:12px; width:100px; background-color: rgb(204, 221, 228);">{{$Hoursworked}}</td>
    <td style="padding: 5px; height:20px; font-size:12px; width:100px; background-color: rgb(204, 221, 228);">{{$wageperhour}}</td>
    <td style="padding: 5px; height:20px; font-size:12px; width:100px; background-color: rgb(204, 221, 228);">{{$admintime}}</td>
    <td style="padding: 5px; height:20px; font-size:12px; width:100px; background-color: rgb(204, 221, 228);">{{$planningtime}}</td>
    <td style="padding: 5px; height:20px;font-size:12px; width:100px; background-color: rgb(204, 221, 228);">{{$totalhour}}</td>
    <td style="padding: 5px; height:20px; font-size:12px; width:100px; background-color: rgb(204, 221, 228);">{{$wageowed}}</td>
  </tr>
</table>
</div>
<div style="height:100px; width:100%; position:relative;">
  <div style="font-size:10px; font-weight:600; height:50px; width:90%; position:absolute; left:50%; top:50%; transform:translate(-50%, -50%);">
    <span style="padding:10px;">Pioneers Tutoring Australia Pty Ltd as Trustee for G & A FAMILY TRUST</span>
    <span style="border-left:2px solid; border-right:2px solid; padding:10px;">ABN: 32 354 089 794</span>
    <span style="border: none; padding:10px;">ACN: 664 467 823</span>
  </div>
</div>

</section>
 
</body>
</html>
