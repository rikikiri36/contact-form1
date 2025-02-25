<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
class AdminController extends Controller
{
    public function admin()
    {   
        $contacts = Contact::with('category')->paginate(7);
        $categories = Category::all();
        // dd($contacts);
        return view('admin', compact('contacts', 'categories'));
    }
    
    public function search(Request $request)
    {
        // dd($request);
        $contacts = Contact::with('category')->KeywordSearch($request->keyword)->GenderSearch($request->gender)->CategorySearch($request->category_id)->CreatedAtSearch($request->created_at)->paginate(7);
        // $contacts = Contact::with('category')->KeywordSearch($request->keyword)->GenderSearch($request->gender)->CategorySearch($request->category_id)->CreatedAtSearch($request->created_at)->get();
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }
}
