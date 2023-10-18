<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class UserController extends Controller
{
        public function index() {
             $contacts = Contact::paginate(4);
        return view('search', ['contacts' => $contacts]); // このビューは管理画面のHTMLを表示するためのもの
    }

    /**
     * お問い合わせデータの検索
     */
    public function search(Request $request) {
        $query = Contact::query();

        if ($request->filled('name')) {
        $query->where('fullname', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('gender')) {
            switch ($request->gender) {
            case 'male':
            $query->where('gender', 1);
            break;
            case 'female':
            $query->where('gender', 2);
            break;
        }
        }

        if ($request->filled('email')) {
            $query->where('email', $request->email);
        }

        if ($request->filled('opinion-date-start')) {
            $query->whereDate('created_at', '>=', $request->input('opinion-date-start'));
        }

        if ($request->filled('opinion-date-end')) {
            $query->whereDate('created_at', '<=', $request->input('opinion-date-end'));
        }

        $contacts = $query->paginate(4);

        return view('search', ['contacts' => $contacts]);
    }

    /**
     * お問い合わせデータの削除
     */
    public function destroy($id) {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->route('users.index')->with('success', 'データを削除しました。');
    }


}

