wptwit
======

WordPress plugin that will push to Twitter posts created or updated with
category name Twitter. Initially, writing the plugin was a way to learn
[OAuth] [1] in practice via *twitteroauth* libraries written by
[Abraham Williams] [2]

* twitteroauth.php: abraham@76446fa719466c09b20fe021bf9e92f54afc43e1
* OAuth.php: abraham@e161de3b3f8789bc4979fc0a8fed0b6ab49e0b68

I use it in combination with *iMatt* [bandono/iMatt] [3], a microblogging
theme serving like Twitter archive except that it push content to the
opposite side. The theme and plugin is deployed in [lakm.us/bookit] [4].

The plugin expects category name to be `cat_name == "Twitter"` when pushing
the WordPress post.

It also use [YOURLS] [5] URL shortener API for pushing longer tweet with
short URL reference to original WordPress post in full length.
note: version used is a modification of YOURLS@4581c73e8f831c769062aa4575ee81dc1702e67f

  [1]: http://oauth.net/ "OAuth"
  [2]: http://abrah.am "Abraham Williams"
  [3]: https://github.com/bandono/iMatt "bandono/iMatt"
  [4]: http://lakm.us/bookit "lakm.us/bookit"
  [5]: https://github.com/YOURLS/YOURLS "YOURLS"


 
