# temp-rbcgi
PHPを経由してRuby CGIを実行するファイルです。<br>
かなりの欠陥品です。<br>
**完全なRubyのCGI実行(開発)環境を用意するのが面倒くさい人向け**<br>
## 利用方法
### インストール
XAMPP等のDocmentRootにこのリポジトリのファイルを置きます。<br>
プロジェクトディレクトリに配置しても結構です。<br>
WindowsではRuby InstallerかWSL上のRubyを利用します。<br>
各種GNU/Linuxディストリビューションでは公式パッケージリポジトリかサードパーティーリポジトリからRubyをインストールします。<br>
### 実行
`php -S 127.0.0.0:8080` 等のように組み込みPHP 開発サーバー<br>
XAMPPやApache等のサービスの実行(Fast-CGI版PHPだとPHPサービスも起動してください)。<br>
で起動できます。
### テスト
サーバー内の`index.php`に対してパスを打ちます。<br>
ex1. `http://localhost:8080/index.php/index.rb` -> `/index.rb` の実行<br>
ex2. `http://localhost:8080/project/index.php/index.rb` -> `/project/index.rb` の実行<br>
ex3. `http://localhost:8080/index.php/project/index.rb` -> `/project/index.rb` の実行<br>
## 設定
`p-r_runtime.ini` で実行するRubyコマンドのベース(ex.`ubuntu1804 run ruby`)を設定できます(現在はそれだけ)
