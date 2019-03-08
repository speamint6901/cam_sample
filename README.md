# cam_sample

### PHP

バージョン:7.1

# 環境構築手順

### ローカル環境構築

git でcloneする
https://github.com/speamint6901/cam_sample.git

##### 新規イメージ作成（時間がかかります。基本は初回のみで問題ありません。）  
cloneしたディレクトリで下記を実行
```
$ docker-compose build
```

##### コンテナ立ち上げ  
```
$ docker-compose up -d
```

##### 初期構築
```
$ sh containers/app/init.sh
```

##### 管理ツール用のドメイン追加(ローカル)
hostsファイルに以下を追記
```
127.0.0.1	localhost.admin
```

# 運用

### 管理ツールユーザー作成コマンド
```
$ sh containers/app/create_admin_account.sh
```

### ローカル更新

##### 最新の状態に更新(作業開始時毎回）
```
$ sh containers/app/deploy.sh
```

##### フロントエンド監視
```
$ sh containers/app/front_watch.sh
```

##### DBエクスポート,インポート
パスワードは全て secret
###### エクスポート
export先はcontainers/db/dump/
```
$ sh containers/db/db_export.sh
```

###### インポート
```
$ docker-compose exec -T db mysql -uroot -p campbug -e"$(cat containers/db/dump/campbug.sql)"
```

##### DBリフレッシュ(サーバーエラー時などで試す）
```
$ sh containers/app/data_refresh.sh
```

##### 画像ストレージ参照コマンド
```
$ docker-compose exec app php artisan storage:link
```
