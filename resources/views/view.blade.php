<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/all.css">
    <link rel="stylesheet" href="{{ asset('CSS/view.css') }}">
</head>
<body>

    <div class="pdf">
        <div class="pdf-items">
            <div class="image">
                <img src="images/pioneers.png" alt="">
            </div>
            <div class="head1">
                <p style=" border-bottom: 2px solid ; display:flex; justify-content:end; align-items:end; height:95%; padding:5px;    ">INVOICE</p>
            </div>
            <div class="head-company">
                <p>{{ $data['companyname'] }}</p>
            </div>
            <div class="invoice-details">
                <div class="items">
                    <div class="grid1">
                        <p>{{ $data['clients_company_name'] }}</p>
                        <p>{{ $data['attention_clients_name'] }}</p>
                        <p>{{ $data['street_number_and_name_or_po_box'] }}</p>
                        <p>{{ $data['state_and_post_code'] }}</p>
                        <p>{{ $data['country'] }}</p>
                    </div>
                    <div class="grid2">
                        <p class="p1">Invoice Date</p>
                        <p class="p2">{{ $data['invoice_date'] }}</p>
                        <p class="p1">Invoice Number</p>
                        <p class="p2">{{ $data['invoice_number'] }}</p>
                        <p class="p1">Reference/PO #</p>
                        <p class="p2">{{ $data['reference_po'] }}</p>
                    </div>
                    <div class="grid3">
                        <p>{{ $data['your_company_name'] }}</p>
                        <p>{{ $data['your_street_number_and_name'] }}</p>
                        <p>{{ $data['your_state_and_post_code'] }}</p>
                        <p>{{ $data['country'] }}</p>
                    </div>
                </div>
            </div>
            <div class="head-table">
                <div class="items">
                    <div class="p1">Description</div>
                    <div class="p2">Hours Worked</div>
                    <div class="p2">Wage Per Hour</div>
                    <div class="p2">Total Wage Aud</div>
                </div>
            </div>

            <div class="table">
           
               
               
            <table>
            @for ($i = 0; $i < count($data['inde']); $i++)
    <tr>
        <td style="background-color: {{ $i % 2 == 0 ? 'rgb(204, 221, 228)' : 'rgb(214, 213, 213)' }}; width:40%;">
        {{ $data['inde'][$i] }}
        </td>
        <td style="background-color: {{ $i % 2 == 0 ? 'rgb(204, 221, 228)' : 'rgb(214, 213, 213)' }}; ">
        {{ $data['inwork'][$i] }}
        </td>
        <td style="background-color: {{ $i % 2 == 0 ? 'rgb(204, 221, 228)' : 'rgb(214, 213, 213)' }}; ">
        {{ $data['inwage'][$i] }}
        </td>
        <td style="background-color: {{ $i % 2 == 0 ? 'rgb(204, 221, 228)' : 'rgb(214, 213, 213)' }}; ">
        {{ $data['intotal'][$i] }}
        </td>
    </tr>
@endfor
</table>
          
</div>
<div class="total">
    <div class="total-items">
    <p style="   border-top: 2px solid ;">Total AUD <span style="  visibility: hidden;">feggg</span>{{ $data['total'] }}</p></div>
</div>
<div class="admin">
    <div>
        <p style="width:100%; height:60%;    display: flex;
    justify-content: center;
    align-items: end;">Hours Worked</p>
        <div class="divspan" style="width:100%; height:40%;">
            {{$data['hours_worked']}}
        </div>
    </div>
    <div>
    <p style="width:100%; height:60%;    display: flex;
    justify-content: center;
    align-items: end;">Wage per Hour</p>
        <div class="divspan" style="width:100%; height:40%;">
        {{ $data['wage_per_hour'] }}
        </div>
    </div>
    <div>
    <p style="width:100%; height:60%;    display: flex;
    justify-content: center;
    align-items: end;">Admin-time</p>
        <div class="divspan" style="width:100%; height:40%;">
        {{ $data['admin_time'] }}
        </div>
     
    </div>
  
    <div>
    <p style="width:100%; height:60%;    display: flex;
    justify-content: center;
    align-items: end;">Planning-time</p>
        <div class="divspan" style="width:100%; height:40%;">
            {{ $data['planning_time'] }}
        </div>
    </div>
    <div>
    <p style="width:100%; height:60%;    display: flex;
    justify-content: center;
    align-items: end;">Total Hour</p>
        <div class="divspan" style="width:100%; height:40%;">
            {{ $data['total_hour'] }}
        </div>
    </div>
    <div>
    <p style="width:100%; height:60%;    display: flex;
    justify-content: center;
    align-items: end;">Wage Owed</p>
        <div class="divspan" style="width:100%; height:40%;">
            {{ $data['wage_owed'] }}
        </div>
    </div>
</div>
</div>
        <div class="zoom">
            <i class="fa-duotone fa-solid fa-magnifying-glass-plus" id="plus"></i>
            <i class="fa-duotone fa-solid fa-magnifying-glass-minus" id="minus"></i>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let scale = 1;
            const scaleStep = 0.1; // Adjust the zoom step as needed
            const pdfItems = document.querySelector('.pdf-items');
            const plusButton = document.getElementById('plus');
            const minusButton = document.getElementById('minus');

            plusButton.addEventListener('click', () => {
                scale += scaleStep;
                pdfItems.style.transform = `scale(${scale})`;
            });

            minusButton.addEventListener('click', () => {
                if (scale > scaleStep) {
                    scale -= scaleStep;
                    pdfItems.style.transform = `scale(${scale})`;
                }
            });
        });
    </script>
</body>
</html>
