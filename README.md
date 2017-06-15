FocalPoint Background-positioning for Craft CMS
================================================

This plugin provides some Twig functions and filters to use the FocalPoint in [Craft CMS](https://craftcms.com/) templates.
It is useful for background-positioning in responsive designs when the important part of the image is not in the center.

_(It is my first Craft CMS plugin to learn some basics about plugin development in Craft. Besides that fact I just needed the Twig functions :)_  
## Requirements

This plugin requires Craft CMS 3.0.0-beta.1 or later.


## Installation

To install the plugin, follow these instructions.

1. Go to your Craft project in a terminal:

        cd /path/to/project

2. Install the plugin via composer:

        composer require mfeinbier/craft3-fp-backgrounds

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for FocalPoint backgrounds.

## Usage
With the `FocalPoint` you can set in Craft for pictures, it is possible to have the marked area for smaller screen 
sizes always in the center of the screen.
This is especially useful when the **important part of the image is not in the center.**

Imagine you have a fullscreen background image in your template which is defined in CSS like this
```css
.fullpage-bg {
    background: #BADA55 url("images/fallback-background") no-repeat 50% 50%;
    background-size: cover;
}
```

Setting the `background-size` to `cover` is important to automatically fill the whole div for all screen-sizes.

In your Craft Template you now want to use a linked asset to fill the background and use the new functions provided by 
this plugin to position your image
```twig
{% set image = entry.backgroundImage[0] ?? null %} // or whatever you use to get the image
    <div class="fullpage-bg"
         {%- if image -%}
            style="background-image: url('{{ image.url }}');
                   {{ renderBackgroundPosition(image) }}"
        {%- endif -%}>
    </div>
```
This will output the correct CSS settings for positioning the image based on the `FocalPoint`
```html
    <div class="fullpage-bg"style="background-image: url('/slider-images/slider-04.jpg');
                                   background-position-x: 65.29%; background-position-y: 29.66%;">
    </div>
```

If you need more control over the `x` or `y` positions you can use the `|focalXPosition` and `|focalYPosition` filters:
```twig
<div class="fullpage-bg"
         {%- if image -%}
            style="background-image: url('{{ image.url }}');
                   background-position-x: {{ image|focalXPosition }}";
                   background-position-y: {{ image|focalYPosition }}";
        {%- endif -%}>
    </div>
```
