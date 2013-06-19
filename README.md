wptwit
======

WordPress plugin that will push to Twitter posts created or updated with
category name Twitter. Initially, writing the plugin was a way to learn
[OAuth] [1] in practice via *twitteroauth* libraries written by
[Abraham Williams] [2] and has been updated to use Twitter API v1.1
since API v1.0 retired June 2013

* twitteroauth.php (API v1.1): abraham@7d212801ca9049d8e492b2c33e287cc9b4f713b4
* OAuth.php: abraham@7c47dd7c041c105fa59d7b4d8682b768aa98cd2d

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


 
