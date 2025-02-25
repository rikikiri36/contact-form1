<div>
    @if($showModal)
        <!-- モーダル背景 -->
        <div class="modal-background">
            <!-- モーダルコンテンツ -->
            <div class="modal-main">
                <div class="modal-close-wrapper">
                    <button class="modal-close" type="button" wire:click="closeModal">&times;</button>
                </div>
                    @if($contact)
                    <div class="modal-detail">
                        <label class="modal-detail-label">お名前</label>
                        <div>{{ $contact->last_name }} {{ $contact->first_name }}</div>
                        <label class="modal-detail-label">性別</label>
                        <div>{{ $contact->getGenderName() }}</div>
                        <label class="modal-detail-label">メールアドレス</label>
                        <div>{{ $contact->email }}</div>
                        <label class="modal-detail-label">電話番号</label>
                        <div>{{ $contact->tel }}</div>
                        <label class="modal-detail-label">住所</label>
                        <div>{{ $contact->address }}</div>
                        <label class="modal-detail-label">建物名</label>
                        <div>{{ $contact->building }}</div>
                        <label class="modal-detail-label">お問い合わせの種類</label>
                        <div>{{ $contact->category->content }}</div>
                        <label class="modal-detail-label">お問い合わせ内容</label>
                        <div>{{ $contact->detail }}</div>
                    </div>
                    @endif
                <!-- 削除ボタン -->
                <div class="contact-delete-wrapper">
                    <button type="button" class="contact-delete" wire:click="deleteContact">削除</button>
                </div>
            </div>
        </div>
    @endif
</div>