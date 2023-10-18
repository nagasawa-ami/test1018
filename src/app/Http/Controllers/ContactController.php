<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    
   public function index(Request $request)
{
    $contact = $request->old();
    return view('index', compact('contact'));
}



public function confirm(ContactRequest $request)
{
    $contact = $request->only(['first-name', 'last-name', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion']);
    $contact['fullname'] = $contact['first-name'] . ' ' . $contact['last-name'];

    // 性別の処理
    if ($request->input('gender') === '男') {
        $contact['gender'] = 1;
    } else {
        $contact['gender'] = 2;
    }
    
    // セッションにデータを保存
    $request->session()->flashInput($request->input());
    
    return view('confirm', compact('contact'));
}



    public function store(ContactRequest $request)
    {
     
 $contact = [];
    
    $contact['first-name'] = $request->input('first-name', '');
    $contact['last-name'] = $request->input('last-name', '');
    $contact['fullname'] = $request->input('fullname', '');
    $contact['gender'] = $request->input('gender');
    $contact['email'] = $request->input('email', '');
    $contact['postcode'] = $request->input('postcode', '');
    $contact['address'] = $request->input('address', '');
    $contact['building_name'] = $request->input('building_name', '');
    $contact['opinion'] = $request->input('opinion', '');

    // 性別の処理
    if ($request->input('gender') === '男') {
        $contact['gender'] = 1;
    } else {
        $contact['gender'] = 2;
    }

    // fullnameの生成
    $contact['fullname'] = $contact['first-name'] . ' ' . $contact['last-name'];

    Contact::create($contact);

    $request->session()->forget('contact');

    return view('thanks');
}





    }



