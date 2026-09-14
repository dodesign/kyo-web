# kyo-kaon.jp MySQL 5.6 → 8.0 移行 手順書

作成：2026-09-08

## なぜやるか

Image Optimizer が **「The database server version is outdated. Update to MySQL version 5.7 or MariaDB version 10.2.」** で停止しており、
**WebPが1枚も生成されていない**。LPの読み込みが6.5秒（画像1.74MB・WebP 0枚）になっている主因。
MySQLを上げればプラグインが動き出し、表示速度が改善する。

## いまの状態（2026-09-08時点で確認済み）

| 項目 | 値 |
|---|---|
| データベース名 | `LAA0769659-9pnf7p` |
| ホスト | `mysql144.phy.lolipop.lan` |
| ユーザー名 | `LAA0769659` |
| MySQLバージョン | **5.6.23-log** |
| テーブル接頭辞 | `wp14_` |
| 文字セット / 照合順序 | `utf8mb4` / `utf8mb4_unicode_520_ci` |
| max_allowed_packet | 20MB |
| DBのおおよそのサイズ | 約113MB（AIOのDBのみバックアップの実測） |

**パスワードはここに書かない。** ロリポップ！ユーザー専用ページ → サーバーの管理・設定 → データベース →
該当DBの「操作する」で確認できる。

## ★大原則

- **旧DBは絶対に消さない。** 切り戻しは `wp-config.php` を元に戻すだけで1分。最低1か月は残す。
- **移行中に入った注文は消える。** 切り替え後は新DBを見るため、ダンプ〜切替の間の注文が失われる。
  **注文の少ない時間帯（早朝など）にやる**か、作業中はメンテナンスモードにする。
- ブラウザ（phpMyAdmin）からは**できない**。`upload_max_filesize` が20MBなので113MBは通らない。**SSHで行う。**

---

## Phase 0：バックアップの確認（5分）

1. wp-admin → プラグイン → **All-in-One WP Migration を有効化**
2. All-in-One WP Migration → バックアップ
3. `kyo-kaon.jp-20260908-014132-dixzw8.wpress`（113MB）があることを確認
4. **ダウンロードして手元にも保存**（サーバーが飛んだとき用）
5. 終わったら **All-in-One WP Migration を停止**（他サイトで致命的エラーを起こした実績があるため常時有効にしない）

さらに、**`wp-config.php` を Dreamweaver でローカルに取得しておく**。書き換え前の状態が手元にあれば確実に戻せる。

---

## Phase 1：新しいDBを作る（5分）

1. ロリポップ！ユーザー専用ページ → サーバーの管理・設定 → **データベース**
2. **「作成」** をクリック。作成先サーバーは自動で決まる
3. 作成後、一覧でそのDBの **「データベースバージョン」が 8.0 になっているか確認**

> ⚠️ **ここで 5.6 と表示されたら、その先には進まない。**
> ロリポップ側でMySQL 8.0のサーバーに割り当てられなかったということ。
> 別のDBをもう1つ作って確認するか、ロリポップに問い合わせる。

4. 新DBの **データベース名 / ホスト / ユーザー名 / パスワード** を控える

---

## Phase 2：SSHを有効にする（5分）

1. ユーザー専用ページ → サーバーの管理・設定 → **SSH**
2. 「有効にする」
3. 表示される **サーバー / アカウント / ポート** を控える（パスワードはロリポップのパスワード）
4. Windowsのコマンドプロンプトから接続

```
ssh -p ポート番号 アカウント名@サーバー名
```

（PuTTY や Tera Term でも可。どちらもPCに入っている）

---

## Phase 3：ダンプして流し込む（10〜30分）

SSHでつないだ状態で実行する。**パスワードは対話で聞かれるので、コマンドには書かない**（`-p` の後ろに何も書かないのがポイント）。

### 3-1. 現行DBをダンプ

```
mysqldump -h mysql144.phy.lolipop.lan -u LAA0769659 -p \
  --single-transaction --skip-lock-tables \
  --default-character-set=utf8mb4 \
  --max-allowed-packet=16M \
  LAA0769659-9pnf7p > ~/kaon_backup.sql
```

- `--skip-lock-tables` … 共有サーバーは LOCK TABLES 権限が無いことが多いので付ける
- `--single-transaction` … ダンプ中もサイトを止めずに済む

### 3-2. ダンプが完走したか確認する（★飛ばさない）

```
ls -lh ~/kaon_backup.sql
tail -3 ~/kaon_backup.sql
```

- サイズが **100MB前後**あること
- 最後の行が **`-- Dump completed on ...`** で終わっていること

> ⚠️ 途中で切れているダンプを流し込むと、テーブルが虫食いになる。**必ずこの2つを見る。**

### 3-3. 新DBへ流し込む

```
mysql -h 新ホスト -u LAA0769659 -p \
  --default-character-set=utf8mb4 \
  新DB名 < ~/kaon_backup.sql
```

エラーが1行も出なければ成功。

### 3-4. 件数を突き合わせる（★飛ばさない）

旧DBと新DBで、同じ数字になることを確認する。

```
# 旧
mysql -h mysql144.phy.lolipop.lan -u LAA0769659 -p -N -e \
 "SELECT (SELECT COUNT(*) FROM wp14_posts), (SELECT COUNT(*) FROM wp14_usces_order), (SELECT COUNT(*) FROM wp14_usces_member), (SELECT COUNT(*) FROM wp14_options);" \
 LAA0769659-9pnf7p

# 新
mysql -h 新ホスト -u LAA0769659 -p -N -e \
 "SELECT (SELECT COUNT(*) FROM wp14_posts), (SELECT COUNT(*) FROM wp14_usces_order), (SELECT COUNT(*) FROM wp14_usces_member), (SELECT COUNT(*) FROM wp14_options);" \
 新DB名
```

**4つの数字が完全に一致していなければ、先に進まない。**
（`wp14_usces_order` = 受注、`wp14_usces_member` = 会員。ここが命）

---

## Phase 4：接続先を切り替える（5分）

Dreamweaver（サイト「京都：かおん」）で `/web/kaon/wp-config.php` を開き、4行を書き換える。

```php
define( 'DB_NAME',     '新DB名' );
define( 'DB_USER',     'LAA0769659' );
define( 'DB_PASSWORD', '新DBのパスワード' );
define( 'DB_HOST',     '新ホスト' );
```

**ついでに、この行も足しておく**（今は子テーマの functions.php で代用している設定を、より確実な場所へ移すため）。

```php
define( 'WP_MEMORY_LIMIT', '256M' );
```

保存してアップロード。**この瞬間に切り替わる。**

---

## Phase 5：確認（10分）

1. **サイトヘルス → 情報 → データベース → サーバーバージョンが `8.0.x`**
2. フロント（ログアウト状態で）
   - トップ / ワークショップLP / 商品一覧 / 商品詳細 / カート / 会員ページ / お問い合わせ
3. Welcart管理画面
   - **受注リストの件数が移行前と同じか**
   - 会員リストの件数が同じか
   - 商品マスターが表示されるか
4. エラーログ `https://kyo-kaon.jp/wp-content/kaon-fatal-8f3a.log` に新しい記録が出ていないか
5. **Image Optimizer の警告が消えているか**（wp-admin上部の黄色い帯）

---

## Phase 6：切り戻し（何かあったら1分）

`wp-config.php` の4行を**元の値に戻してアップロードするだけ**。

```php
define( 'DB_NAME',     'LAA0769659-9pnf7p' );
define( 'DB_USER',     'LAA0769659' );
define( 'DB_PASSWORD', '元のパスワード' );
define( 'DB_HOST',     'mysql144.phy.lolipop.lan' );
```

旧DBは触っていないので、そのまま元の状態に戻る。

---

## Phase 7：後片付け（移行が落ち着いてから）

- **Image Optimizer で既存画像を一括最適化 → WebP生成。** ここで表示速度が変わる
- サーバー上の `~/kaon_backup.sql` を削除（ディスクを食う）
- `wp-content/ai1wm-backups/` の古いフルバックアップ2つ（**3.46GB + 4.21GB**）を削除
- 1か月ほど様子を見て、問題なければ**旧DB `LAA0769659-9pnf7p` を削除**
- 一時ファイル `wp-content/mu-plugins/kaon-fatal-logger.php` と `kaon-fatal-8f3a.log` も削除

---

## つまずきそうなところ

| 症状 | 原因と対処 |
|---|---|
| `mysqldump: Got error: 1044` | 権限不足。`--skip-lock-tables` を付けているか確認 |
| 流し込みで `Unknown collation: 'utf8mb4_unicode_520_ci'` | MySQL 8.0 は対応しているので通常出ない。出たらダンプを `sed` で `utf8mb4_unicode_ci` に置換 |
| `MySQL server has gone away` | パケット超過。`--max-allowed-packet=16M` を付けているか確認。それでも出るなら `--skip-extended-insert` を追加してダンプし直す |
| 切替後に真っ白 | `wp-config.php` の書き間違い。Phase 6 で戻す |
| 切替後に「データベース接続確立エラー」 | ホスト名かパスワードの間違い。Phase 6 で戻して確認し直す |
| 受注件数が合わない | **絶対に切り替えない。** ダンプからやり直す |
