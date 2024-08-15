<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PDF;
use Mail;

class HomeController extends Controller

{
    public function menu() {
    $user = Auth::user(); // Fetch the authenticated user

    // Debugging line
    dd($user);

    return view('menu', ['user' => $user]);
}

    
    public function addprofile(Request $request) {
       
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        if ($request->has('name')) {
            $user->name = $request->input('name');
        }

        if ($request->has('email')) {
            $user->email = $request->input('email');
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
            $user->image = $imagePath;
        }
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully');
    }
    public function jobdone()
    {
        $user = Auth::user();
        $invoice = Invoice::where('user_id', $user->id)->get();
    
        if ($invoice->isNotEmpty()) {
            $invoiceData = $invoice->first();
            $items = json_decode($invoiceData->items, true);
        } else {
            $items = ['inde'];
        }
    
        return view('jobdone', compact('user', 'invoice', 'items'));
    }
    
    
    
    
    public function job($id) {
        $users = Auth::user();
        $user = User::find($id);
        $path = public_path('images/pioneers.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/'. $type. ';base64,'. base64_encode($data);
    
        $emailData = []; // Ensure $emailData is defined, even if it's empty.
        
        return view('job', ['user' => $user, 'users' => $users, 'logo' => $logo, 'emailData' => $emailData]);
    }
    
    public function index() {
        $path = public_path('images/pioneers.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/'. $type. ';base64,'. base64_encode($data);
    
        $emailData = []; // Ensure $emailData is defined, even if it's empty.
        
        return view('index', ['logo' => $logo, 'emailData' => $emailData]);
    }
    
    public function indexpost(Request $request)
    {
        $user = Auth::user();
        
        ini_set('max_execution_time', 600);
    
        $path = public_path('images/pioneers.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $pic = 'data:image/' . $type . ';base64,' . base64_encode($data);
    
        // Collecting all input data
        $emailData = [
            "email" => "anashomey@gmail.com",
            "title" => "Invoice Attachment",
            "body" => "Invoice Attachment.",
            "logo" => $pic,
            "companyName" => $request->input('companyName'),
            "ClientsCompanyName" => $request->input('ClientsCompanyName'),
            "AttentionClientsName" => $request->input('AttentionClientsName'),
            "StreetNumberandNameorPOBox" => $request->input('StreetNumberandNameorPOBox'),
            "StateandPostCode" => $request->input('StateandPostCode'),
            "country" => $request->input('country'),
            "invoiceDate" => $request->input('invoiceDate'),
            "invoiceNumber" => $request->input('invoiceNumber'),
            "referencePO" => $request->input('referencePO'),
            "Yourcompanyname" => $request->input('Yourcompanyname'),
            "StreetNumberandName" => $request->input('StreetNumberandName'),
            "StateandPostCode" => $request->input('StateandPostCode'),
            "c" => $request->input('c'),
            "inde" => $request->input("inde", []),
            "inwork" => $request->input("inwork", []),
            "inwage" => $request->input("inwage", []),
            "intotal" => $request->input("intotal", []),
            "total" => $request->input('total'),
            "Hoursworked" => $request->input('Hoursworked'),
            "wageperhour" => $request->input('wageperhour'),
            "admintime" => $request->input('admintime'),
            "planningtime" => $request->input('planningtime'),
            "totalhour" => $request->input('totalhour'),
            "wageowed" => $request->input('wageowed'),
        ];
     
        $invoiceData = new invoice();
        $invoiceData->user_id = Auth::id();
        $invoiceData->company_name = $emailData['companyName'];
        $invoiceData->clients_company_name = $emailData['ClientsCompanyName'];
        $invoiceData->attention_clients_name = $emailData['AttentionClientsName'];
        $invoiceData->street_number_and_name_or_po_box = $emailData['StreetNumberandNameorPOBox'];
        $invoiceData->state_and_post_code = $emailData['StateandPostCode'];
        $invoiceData->country = $emailData['country'];
        $invoiceData->invoice_date = $emailData['invoiceDate'];
        $invoiceData->invoice_number = $emailData['invoiceNumber'];
        $invoiceData->reference_po = $emailData['referencePO'];
        $invoiceData->your_company_name = $emailData['Yourcompanyname'];
        $invoiceData->your_street_number_and_name = $emailData['StreetNumberandName'];
        $invoiceData->your_state_and_post_code = $emailData['StateandPostCode'];
        $invoiceData->total = $emailData['total'];
        $invoiceData->hours_worked = $emailData['Hoursworked'];
        $invoiceData->wage_per_hour = $emailData['wageperhour'];
        $invoiceData->admin_time = $emailData['admintime'];
        $invoiceData->planning_time = $emailData['planningtime'];
        $invoiceData->total_hour = $emailData['totalhour'];
        $invoiceData->wage_owed = $emailData['wageowed'];
        $invoiceData->items = json_encode([
            'inde' => $emailData['inde'],
            'inwork' => $emailData['inwork'],
            'inwage' => $emailData['inwage'],
            'intotal' => $emailData['intotal'],
        ]);
        $invoiceData->save();
   
        $pdf = PDF::setOptions([
            'default_font' => 'arial',
            'font_size' => 12,
            'isHtml5parseEnabled' => true,
            'isRemoteEnabled' => true
        ])->loadView('index', $emailData);

        // Send email
        Mail::raw('Invoice Attachment - ' . $user->name, function($message) use ($emailData, $pdf, $user) {
            $message->to($emailData["email"])
                    ->subject($emailData["title"])
                    ->from($user->email, $user->name)
                    ->attachData($pdf->output(), "invoice.pdf");
        });
    
        
        return redirect()->route('job', ['id' => $user->id])->with('success', 'Mail sent and invoice saved successfully');



    }
    
    public function view(){
        $users = Auth::user();
        return view('view',['user' => $users]);
    }
    public function viewpost(Request $request)
    {
        $data = [
            'companyname' => $request->input('companyname', ''),
            'clients_company_name' => $request->input('clients_company_name', ''),
            'attention_clients_name' => $request->input('attention_clients_name', ''),
            'street_number_and_name_or_po_box' => $request->input('street_number_and_name_or_po_box', ''),
            'state_and_post_code' => $request->input('state_and_post_code', ''),
            'country' => $request->input('country', ''),
            'invoice_date' => $request->input('invoice_date', ''),
            'invoice_number' => $request->input('invoice_number', ''),
            'reference_po' => $request->input('reference_po', ''),
            'your_company_name' => $request->input('your_company_name', ''),
            'your_street_number_and_name' => $request->input('your_street_number_and_name', ''),
            'your_state_and_post_code' => $request->input('your_state_and_post_code', ''),
            'inde' => $request->input('inde', []),
            'inwork' => $request->input('inwork', []),
            'inwage' => $request->input('inwage', []),
            'intotal' => $request->input('intotal', []),
            'total' => $request->input('total', ''),
            'hours_worked' => $request->input('hours_worked', ''),
            'wage_per_hour' => $request->input('wage_per_hour', ''),
            'admin_time' => $request->input('admin_time', ''),
            'planning_time' => $request->input('planning_time', ''),
            'total_hour' => $request->input('total_hour', ''),
            'wage_owed' => $request->input('wage_owed', ''),
        ];
    
        return view('view')->with('data', $data);
    }
    public function logout(Request $request)
    {
        Auth::logout();
      
        return redirect('/login');
    }
    
}
