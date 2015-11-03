fusion tech casual #2

---

# php

---

## agenda

- phpとは
 - 特徴
 - バージョン
 - php 7とhack
- PHP周辺のエコシステム
 - PSR
 - composer
 - framework
 - phpbrew

---

## phpとは

wikipediaより

```
動的にHTMLデータを生成することによって、動的なウェブページを実現することを主な目的としたプログラミング言語
およびその言語処理系である。
```
---

### 特徴

- Webアプリ開発に特化した言語
- Java/C に似た文法
- 動的型付け, OOP(オブジェクト指向)をサポート
- HTML内にプログラムを埋め込むことができる
- 組み込み関数が豊富(使いやすいとは言ってない)
- 開発者多い
 - 比較的短時間で学習できる
 - CMSとか多い印象
 - 反面フレームワークは乱立気味

---

### 言語と処理系

言語処理系とは、

```
プログラミング言語で記述されたプログラムを計算機上で実行するためのソフトウエア
```

PHPで書かれたプログラムを実行するのが処理系

PHP = プログラミング言語 だが言語処理系は１つではない

--

### PHPの処理系

- Zend Engine
 - OSSのPHP処理系; デファクトスタンダート
- HHVM
 - Facebook製の処理系
 - JIT形式でPHPを実行できる
 - PHPに似た文法のHackという言語もサポート

[他にもたくさん](http://qiita.com/hnw/items/afa7b5ab87c496d42d71)
---

### バージョン(Zend Engine)

- 1.0 (1995/6)
- 5.4(2012/3)
- 5.5(2013/6)
- 5.6(2014/8) : 最新安定版
- 6.x : 7系の開発開始によって黒歴史化
- 7.0(2015末)
  - タイプヒンティングの強化
  - 高速化

---

## PHPを使ったWebアプリの構成

LAMP = Linux Apache MySQL PHP

- 一昔前だと定番といわれたスタック
- 今でも鉄板構成には違いないが選択肢が増えたと思う
- Apacheの代わりに
  - nginx + fastcgi
  - 開発時は組み込みのwebサーバ
- MySQLの代わりにMariaDBやNoSQL DB

---

## demo

- とても簡単なPHPプログラムの例

---

## demo

- とても簡単なPHPプログラムの例
- HTMLの中にプログラムが埋め込んであってシンプル...?
  - プログラム部分が2000行になっても同じこと言えるの？
  - 単体テストどうするの?
  - 画面増やす時には?

---

# PHP周辺のエコシステム

---

今日的なソフトウェア開発では求められる機能/知識が多岐にわたり、1プロジェクトや個人でカバーするのは不可能

- プログラミング
 - 言語の文法
 - デザインパターン
 - テスト
 - プロトコル(HTTP, SSL, OAuth)
 - 外部のAPI
- 運用
 - ネットワーク/HW/OSなどの知識
 - ミドルウェア
    - データベース(RDB, NoSQL)
    - Messaging Queue
    - SDS(Software Designed Storage)

---

エコシステムが重要

- ある言語の周辺で蓄積/開発されたプラクティスやツールを利用することが不可欠
- 例えば
  - 共通の機能を再利用可能な形でまとめたフレームワークやライブラリを使う
  - 定型の作業を自動化するツールを使う
  - 既存の言語やライブラリのグッド/バッドノウハウを知る
- ある言語のエコシステム内で開発されたツールや考え方が他の言語にも移植されることが多い
 - パッケージ管理ツール
 - DIやMVCデザインパターン, ログライブラリ

---

## PSR

(=Proposing a Standards Recommendation)

PHP-fig(PHP Framework Interop Group)

によって定められたコーディング規約

多くのアプリ/ライブラリが採用している

- PSR-0: Autoloading Standard(deprecated)
- PSR-1: Basic Coding Standard
- PSR-2: Coding Style Guide
- PSR-3: Logger Interface
- PSR-4: Autoloader
- PSR-7: HTTP Message Interface

---

PSR-0, 4

- autoloadのための規約
- 名前空間とディレクトリ構成を一致させる

```
<?php
//lumen/app/Http/Controllers/Controller.php
namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //
}
```

---

PSR-1(抜粋)

- PHPコードは「<?php」及び 「<?=」タグを使用しなければなりません。
- 文字コードはUTF-8（BOM無し）を使用しなければなりません。
- 名前空間、クラスについてはPSR-0に準拠しなければなりません。

---

## Composer

= autoloader + ライブラリ管理 ツール

- プロジェクトごとに必要なライブラリ管理
  - どのライブラリのどのバージョンを使うか記述すると自動でダウンロードしてくれる
  - 依存ライブラリが依存する別のライブラリまでインストール
- autoloaderの生成
- psr0, 4に対応

---

### 使い方

インストール

```
$curl -sS https://getcomposer.org/installer | php
```

ライブラリ追加

```
$ php composer.phar require  ライブラリ名
```



---

## framework

- PHPはフレームワークの選択肢が多い
- Rubyで言うRailsのような決定版がない、とも言える
- 基本的な機能や使い方は一緒
- 国内だと多分この辺が有名
 - Laravel
 - CakePHP
 - Yii
 - Symfony

---

f/wよくある機能

- ルーティング
- MVCによるレイヤリング
  - Model: データベースの抽象化やビジネスロジック
  - View: html, 画像などの表現
  - Controller: リクエストを受け取りmodelとviewへの命令に変換する
- 認証機能
- マイグレーション: DBスキーマの世代管理
- Viewテンプレート
- DI
- 非同期処理/メール


---

### よくある？質問

---

Q: ぶっちゃけPHPってどうなの？

A: これから本格的にプログラミングやってくならオススメしない

- 言語設計が古い; 主流になりつつある関数型, 並行/並列処理のサポートが弱いから
- 「とりあえず今あるもののサポート」以外ならもっと良い選択肢があるはず
- とはいえ開発者が集めやすいのも事実なのでしばらくは使われそう

---

Q: PHP始めるのはどんな環境がいいの?

 A: VM上にlinux(centos, ubuntu)入れる

- 圧倒的に情報が多いのはLAMP構成
- VM環境作るのはvagrant/ottoが便利
-  ディトリビュータ標準のパッケージだとPHPのバージョンが古いことがあるので注意
 -  追加のパッケージを入れるかphpenv/phpbrewでインストール
- デプロイ先はサーバ設定いらないのでheroku(PaaS)が楽
   - 無料で18h/day 使える or hobbyプランだと$3/month
   - IaaSならdigitaloceanが安い

---


