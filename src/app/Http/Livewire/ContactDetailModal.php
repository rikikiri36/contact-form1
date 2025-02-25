<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContactDetailModal extends Component
{
    public $contact;         // 選択された連絡先
    public $showModal = false;  // モーダル表示フラグ

    // Livewire のイベントリスナー設定
    protected $listeners = ['loadContact'];

    // 指定されたIDの連絡先をロードしてモーダルを表示
    public function loadContact($id)
    {

        //  dd("loadContact called with id: " . $id);

        $this->contact = Contact::with('category')->find($id);
        $this->showModal = true;
    }

    // モーダルを閉じる
    public function closeModal()
    {
        $this->showModal = false;
    }

    // 対象の連絡先を削除する
    public function deleteContact()
    {
        if ($this->contact) {
            // 削除実行
            $this->contact->delete();

            // モーダルを閉じる
            $this->showModal = false;
        }
    }

    public function render()
    {
        return view('livewire.contact-detail-modal');
    }
}
