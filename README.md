# wuilog
Chinachuのwuiログから知らないIPを通知するもの<br>
通知された場合にはiptablesか何かでrejectなりしない重複系の処理は
してないので大変なことになります。

# How to use
通知の仕方がtwitteroauthを用いたツイートなので<br>
├── twitteroauth<br>
│   ├── OAuth.php<br>
│   └── twitteroauth.php<br>
└── wuilog.php<br>
階層はこんな感じに。<br>
Linuxコマンドの「whois」を使ってdescrを見てるのでwhoisコマンドを使えるようにしておいて下さい。CentOSならjwhois<br>
cronか何かで定期的に実行するようにすればいいかと思います。<br>
