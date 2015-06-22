# wuilog
Chinachuのwuiログから知らないIPを通知するもの<br>
通知された場合にはiptablesか何かでrejectなりしない重複系の処理は
してないので大変なことになります。

# How to use
通知の仕方がtwitteroauthを用いたツイートなので
├── twitteroauth
│   ├── OAuth.php
│   └── twitteroauth.php
└── wuilog.php
階層はこんな感じに。
cronか何かで定期的に実行するようにすればいいかと思います。<br>
