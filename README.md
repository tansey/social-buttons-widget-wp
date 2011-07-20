# Social Buttons Wordpress Widget
This is a really simple, "Hello World"-style wordpress widget. It creates a sidebar widget with Twitter, Facebook, and LinkedIn buttons.

## Install Instructions

1. Icons should be downloaded from [here](http://www.reign7.com/80-free-facebook-twitter-and-social-networking-icons/) and extracted into your theme's images folder. If none exists, create one.

2. Copy the widgets-social-buttons.php file into your theme's "functions" folder. If none exists, create one.

3. Open your theme's functions.php file. Add the following snippet:

```PHP
// Add the Social Buttons Widget
include("functions/widget-social-buttons.php");
```

This has been tested successfully on the [Premium Pixels](http://themeforest.net/item/premium-pixels-fancy-pants-blog-magazine-theme/232838?ref=tansey) theme.