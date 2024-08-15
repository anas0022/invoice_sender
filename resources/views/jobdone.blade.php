<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.6.0/css/all.css">
    <link rel="stylesheet" href="{{ asset('CSS/jobdone.css') }}">
    <title>Job Done</title>
</head>
<body>
    @include('menu')
    
    @if($invoice->isEmpty())
        <div class="error">
            <p>No Invoices</p>
        </div>
    @else
        <section>
            <div class="pdf-files">
                @foreach($invoice as $invoices)
                
                    <form class="pdf-items" action="{{route('view.post')}}" method="post" style="margin-top:20px;">
                        <div class="details" style="display:flex; width:100%;">
                        <p style="float:left; width:50%; font-size:10px; display:flex; padding:3px;">{{$invoices->invoice_date}}</p>
                        <p style="float:right; width:50%; font-size:10px; padding:3px; text-align:end; text-transform:capitalize;"> {{$invoices->clients_company_name}}</p>
                        </div>
                   
                        @csrf
                        <div class="image">
                            <div class="img">
                                <img src="{{ asset('images/pioneers.png') }}" alt="Logo" height="100%">
                            </div>
                        </div>
                        <div class="head">
                            <p>INVOICE</p>
                        </div>
                        <div class="company-name">
                            <p>{{$invoices->company_name}}</p>
                        </div>
                        
                        <!-- Hidden Inputs for Invoice Details -->
                        <input type="hidden" name="companyname" value="{{$invoices->company_name}}">
                        <input type="hidden" name="clients_company_name" value="{{$invoices->clients_company_name}}">
                        <input type="hidden" name="attention_clients_name" value="{{$invoices->attention_clients_name}}">
                        <input type="hidden" name="street_number_and_name_or_po_box" value="{{$invoices->street_number_and_name_or_po_box}}">
                        <input type="hidden" name="state_and_post_code" value="{{$invoices->state_and_post_code}}">
                        <input type="hidden" name="country" value="{{$invoices->country}}">
                        <input type="hidden" name="invoice_date" value="{{$invoices->invoice_date}}">
                        <input type="hidden" name="invoice_number" value="{{$invoices->invoice_number}}">
                        <input type="hidden" name="reference_po" value="{{$invoices->reference_po}}">
                        <input type="hidden" name="your_company_name" value="{{$invoices->your_company_name}}">
                        <input type="hidden" name="your_street_number_and_name" value="{{$invoices->your_street_number_and_name}}">
                        <input type="hidden" name="your_state_and_post_code" value="{{$invoices->your_state_and_post_code}}">
                        
                        <!-- Hidden Inputs for Total and Admin Wage -->
                        <input type="hidden" name="total" value="{{$invoices->total}}">
                        <input type="hidden" name="hours_worked" value="{{$invoices->hours_worked}}">
                        <input type="hidden" name="wage_per_hour" value="{{$invoices->wage_per_hour}}">
                        <input type="hidden" name="admin_time" value="{{$invoices->admin_time}}">
                        <input type="hidden" name="planning_time" value="{{$invoices->planning_time}}">
                        <input type="hidden" name="total_hour" value="{{$invoices->total_hour}}">
                        <input type="hidden" name="wage_owed" value="{{$invoices->wage_owed}}">

                       
                        @php
                            $items = json_decode($invoices->items, true);
                        @endphp
                        @if (!empty($items))
                            @for ($i = 0; $i < count($items['inde']); $i++)
                                <input type="text" name="inde[{{$i}}]" id="" value="{{ $items['inde'][$i] }}" hidden>
                                <input type="text" name="inwork[{{$i}}]" id="" value="{{ $items['inwork'][$i] }}" hidden>
                                <input type="text" name="inwage[{{$i}}]" id="" value="{{ $items['inwage'][$i] }}" hidden>
                                <input type="text" name="intotal[{{$i}}]" id="" value="{{ $items['intotal'][$i] }}" hidden>
                            @endfor
                        @endif
                        
                  

                        <div class="else">
                            <div class="div1">
                                <p>{{$invoices->clients_company_name}}</p>
                                <p>{{$invoices->attention_clients_name}}</p>
                                <p>{{$invoices->street_number_and_name_or_po_box}}</p>
                                <p>{{$invoices->state_and_post_code}}</p>
                                <p>{{$invoices->country}}</p>
                            </div>
                            <div class="div2">
                                <p>Invoice Date</p>
                                <p class="p1">{{$invoices->invoice_date}}</p>
                                <p>Invoice Number</p>
                                <p class="p1">{{$invoices->invoice_number}}</p>
                                <p>Reference/PO #</p>
                                <p class="p1">{{$invoices->reference_po}}</p>
                            </div>
                            <div class="div3">
                                <p>{{$invoices->your_company_name}}</p>
                                <p>{{$invoices->your_street_number_and_name}}</p>
                                <p>{{$invoices->your_state_and_post_code}}</p>
                                <p>{{$invoices->country}}</p>
                            </div>
                        </div>
                        
                        <div class="button">
                            <button type="submit">View</button>
                        </div>
                    </form>
                @endforeach
            </div>
        </section>
    @endif
</body>
</html>
