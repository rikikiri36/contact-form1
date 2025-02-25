<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable =[
        'category_id',
        'last_name',
        'first_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail'
    ];

    // 性別の定数を定義
    const GENDER_NUMBER_MALE = 1;
    const GENDER_NUMBER_FEMALE = 2;
    const GENDER_NUMBER_OTHER = 3;

    // 性別の表示名を定数で定義
    const GENDER_NAME_MALE = '男性';
    const GENDER_NAME_FEMALE = '女性';
    const GENDER_NAME_OTHER = 'その他';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // 性別の数値を表示名に変換
    public function getGenderName()
    {
        switch($this->gender) {
            case self::GENDER_NUMBER_MALE:
                return self::GENDER_NAME_MALE;
            case self::GENDER_NUMBER_FEMALE:
                return self::GENDER_NAME_FEMALE;
            case self::GENDER_NUMBER_OTHER:
                return self::GENDER_NAME_OTHER;
            default:
                return '-';
        }
    }

    // キーワード検索
    public function scopeKeywordSearch($query, $keyword){
        if(!empty($keyword)){
            $query->where(function($q) use ($keyword) {
                $q->where('first_name', 'like', '%'.$keyword.'%')
                  ->orWhere('last_name', 'like', '%'.$keyword.'%')
                  ->orWhere('email', 'like', '%'.$keyword.'%');
            });
        }
    }

    // 性別検索
    public function scopeGenderSearch($query, $gender){
        if(!empty($gender)){
            $query->where('gender', $gender);
        }
    }

    // お問い合わせの種類検索
    public function scopeCategorySearch($query, $category_id){
        if(!empty($category_id)){
            $query->where('category_id', $category_id);
        }
    }

    // 日付検索
    public function scopeCreatedAtSearch($query, $created_at){
        if(!empty($created_at)){
            $query->whereDate('created_at', $created_at);
        }
    }
}


