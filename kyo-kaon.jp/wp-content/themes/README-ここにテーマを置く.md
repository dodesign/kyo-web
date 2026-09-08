# ここに本番のテーマを置きます

この階層に **`welcart_basic-beldad/`**（kyo-kaon.jp で動いている子テーマ）を丸ごと置いてください。

## ★必ず「本番 → ローカル」の向きで取得すること

2026-09-07 に `front-page.php:91` の修正（`'category_name' => blog,` → `=> 'blog',`）を
**サーバー上のファイルに直接**入れています。手元に古いコピーがあっても、それを使うと修正が消えます。

ゴードンの ebbq で同じ罠を踏んで、危うく本番を古い内容で上書きするところでした。
**一度も動かしていないデプロイworkflowは、いきなり回さない。**

## 取得手順（Dreamweaver）

1. Dreamweaver のサイトを **「京都：かおん」** に切り替える
2. ファイルパネルの表示を **「リモートサーバー」** にする
3. `wp-content/themes/welcart_basic-beldad` を選ぶ
4. **↓（取得）** でこのフォルダにダウンロードする

## 取得後

- このREADMEは消してかまいません
- `サイト同期.bat` で push
- GitHub Actions で `Deploy kyo-kaon theme` を **手動 Run workflow**
- 成功（緑）を確認したら、本番URLで目視確認
