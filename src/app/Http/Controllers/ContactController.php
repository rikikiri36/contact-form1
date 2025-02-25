<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;
class ContactController extends Controller
{
    // お問い合わせ画面表示
    public function index(Request $request){

        $categories = Category::all();
        return view('index',['categories'=>$categories]);
    }

    // 確認画面表示
    public function confirm(ContactRequest $request){
        // カテゴリ名称を取得
        $category = Category::find($request->category_id);

        $form = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'email' => $request->email,
            'tel1' => $request->tel1,
            'tel2' => $request->tel2,
            'tel3' => $request->tel3,
            'address' => $request->address,
            'building' => $request->building,
            'category_id' => $request->category_id,
            'category_content' => $category->content,
            'detail' => $request->detail,
        ];

    //   dd($form);
        return view('confirm',['form'=>$form]);
    }
    // お問い合わせ登録処理
    public function create(Request $request){
        $form = $request->all();
        // 不要な項目は除去
        unset(
            $form['_token'],
            $form['category_content'],
            $form['tel1'],
            $form['tel2'],
            $form['tel3']
        );
        // dd($form);
        Contact::create($form);
        return view('thanks');
    }

    // 確認画面から修正ボタンで戻ったとき
    public function back(Request $request){

        session()->flashInput($request->all());

        $categories = Category::all();
        return view('index',['categories'=>$categories]);
    }
}