# ここに kyo-itakura.com のテーマを置きます

この階層に、本番で動いている **`onepress/`** をフォルダごと置いてください（2026-11-02 時点で OnePress 1.3.5 を直接カスタマイズしたもの。子テーマは無い）。

## 取得手順（Dreamweaver）

1. Dreamweaver で kyo-itakura.com のサイトを開く
   （無ければ「京都：かおん」と同じFTPアカウントで新規作成し、**リモートルートを `/kyo-itakura/`** にする）
2. ファイルパネルを「リモートサーバー」にする
3. `wp-content/themes/onepress` を選び、**↓（取得）** でこのフォルダにダウンロードする

## ★必ず「本番 → ローカル」の向きで取得すること

本番の onepress には直接手が入っている（front-page.php、common/css/styles.min.css は 2024-11-20 更新など）。
取得前に手元のファイルで本番を上書きすると、それが消える。

## 取得後

`サイト同期.bat` で push → GitHub Actions の **Deploy kyo-itakura theme** を手動で Run（最初は手動のみ）。
詳細は `.github/workflows/deploy-kyoitakura.yml` の冒頭。
