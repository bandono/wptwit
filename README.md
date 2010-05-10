wptwit
======

WordPress plugin that will push to Twitter posts created/updated with
category=`Twitter`. Initially, writing the plugin was a way to learn
[OAuth] [1] in practice via `twitteroauth` libraries written by
[Abraham Williams] [2]:

* `twitteroauth.php`: abraham/twitteroauth@76446fa719466c09b20fe021bf9e92f54afc43e1
* `OAuth.php`: abraham/twitteroauth@e161de3b3f8789bc4979fc0a8fed0b6ab49e0b68

I use it in combination with `iMatt` (bandono/iMatt), a microblogging
theme serving like Twitter archive except that it push content to the
opposite side. The theme and plugin is deployed in [lakm.us/bookit] [3].

The plugin expects category name to be:

```cat_name == "Twitter"```

when pushing the WordPress post.

  [1]: http://oauth.net/ "OAuth"
  [2]: http://abrah.am "Abraham Williams"
  [3]: http://lakm.us/bookit "lakm.us/bookit"
 
