<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

// Migrationクラスを継承して、テーブル作成処理を定義
class CreateInquiriesTable extends Migration
{
    // マイグレーション実行時に呼ばれるメソッド
    public function up(): void
    {
        // inquiriesテーブルを新規作成
        Schema::create('inquiries', function (Blueprint $table) {
            // 主キーid
            $table->id();

            // 名前
            $table->string('name');

            // メールアドレス
            $table->string('email');

            // 件名（NULLを許容する場合は ->nullable() を追加）
            $table->string('subject');

            // メッセージ本文
            $table->text('message');

            // created_at, updated_at の自動カラムを追加
            $table->timestamps();
        });
    }

    // マイグレーションをロールバックする時に呼ばれるメソッド
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
}
