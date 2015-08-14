# wuilog
Chinachuのwuiログから知らないIPをTwitterのリプライで通知するもの。  
通知された場合にはiptablesか何かでrejectなりしない重複系の処理はしてないので大変なことになります。

## Install
通知の仕方がtwitteroauthを用いたツイートなので<br>
├── twitteroauth<br>
│   ├── OAuth.php<br>
│   └── twitteroauth.php<br>
└── wuilog.php<br>
階層はこんな感じに。
  Linuxコマンドの「whois」を使ってdescrを見てるのでwhoisコマンドを使えるようにしておいて下さい。
  * CentOS なら `yum install jwhois`
  * Ubuntu なら `apt-get install whois`

cronか何かで定期的に実行するようにすればいいかと思います。
