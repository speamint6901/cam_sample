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
