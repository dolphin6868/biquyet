=== Opt-In Front Page ===
Contributors: Denis-de-Bernardy, Mike_Koepke
Donate link: http://www.semiologic.com/partners/
Tags: asides, opt-in-front-page, opt-in front page, opt-in, blog page, blog, semiologic
Requires at least: 3.1
Tested up to: 3.8
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Lets you add posts to your front page on an opt-in basis.


== Description ==

The Opt-In Front Page plugin lets you add posts to your front page on an opt-in basis, rather than remove posts on an opt-out basis. This allows you to manage any number of asides categories.

In short, only posts in your "Blog" (or "News") category will appear on your front page and its RSS feed when you use this plugin.

It changes your main category's url as relevant, and it fallbacks to normal blog mode when no 'blog' (or 'news') category exists or when the latter is empty.

You can safely change your "Blog" or "News" category's name after it is created: The opt-in front page plugin looks for the category with a slug of "blog" or "news".

If no posts can be found in the blog or news category then all posts will be displayed.


= Auto-installer =

Please note that Opt-in front page automatically creates/fills in the needed main category when it activates. You can always browse Posts / Categories to delete it.


= Help Me! =

The [Semiologic forum](http://forum.semiologic.com) is the best place to report issues. Please note, however, that while community members and I do our best to answer all queries, we're assisting you on a voluntary basis.

If you require more dedicated assistance, consider using [Semiologic Pro](http://www.getsemiologic.com).


== Installation ==

1. Upload the plugin folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Create a WordPress Category called 'Blog' or 'News'. You can safely rename it afterwards -- what really counts is a slug of 'blog' or 'news'.
4. Set the Front page displays setting under Settings->Ready to 'Your latest posts'.


== Change Log ==

= 4.2.1 =

- WP 3.8 compat

= 4.2 =

- WP 3.6 compat
- PHP 5.4 compat

= 4.1.3 =

- Fix non static calling warning

= 4.1.2 =

- WP 3.5 compat

= 4.1.1 =

- Enhance memcached support
- Apply filters to permalinks
- Fix the main category cache on new sites

= 4.1 =

- Implement an auto-installer

= 4.0 =

- Use the taxonomy API to fetch the main category
- Support the use of "News" in addition to "Blog"
- Localization
- Code enhancements and optimizations