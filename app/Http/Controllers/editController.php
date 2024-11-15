<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\editModel;


class editController
{
    public function edit($id)
    {
    // IDでレコードを取得
    $record = editModel::find($id);

    // 該当データがない場合は404エラーを返す
    if (!$record) {
        abort(404, 'レコードが見つかりません');
    }

    // 費目のリストを取得（仮に m_category テーブルから取得する場合）
    $categories = DB::table('m_category')->get();

    // 'edit' ビューにレコードデータと費目のリストを渡す
    return view('edit', compact('record', 'categories'));    }

    public function update(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'editType' => 'required|string|max:255', // editTypeを使う
            'editAmount' => 'required|integer', // editAmountを使う
        ]);
    
        // レコードを取得して更新
        $record = editModel::find($id);
    
        if (!$record) {
            abort(404, 'レコードが見つかりません');
        }
    
        $record->category_id = $request->input('editType'); // カテゴリIDを設定
        $record->amount = $request->input('editAmount'); // 金額を設定
        $record->description = $request->input('editDescription'); // 備考（オプショナル）
        $record->update_date = time(); // 現在のタイムスタンプを設定
        $record->save();
    
        // ダッシュボードにリダイレクト
        return redirect()->route('dashboard')->with('success', 'データが更新されました');
    }
    }