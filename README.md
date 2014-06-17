# Dokuwiki Plugin Skype

<table>
  <tr>
    <th align="left">Description</th>
    <td>The Skype plugin let you add an Skype contact button easily</td>
  </tr>
  <tr>
    <th align="left">Author</th>
    <td>Zahno Silvan</td>
  </tr>
  <tr>
    <th align="left">Email</th>
    <td>zaswiki@gmail.com</td>
  </tr>
  <tr>
    <th align="left">Type</th>
    <td>syntax</td>
  </tr>
  <tr>
    <th align="left">Lastupdate</th>
    <td>2014-06-16</td>
  </tr>
  <tr>
    <th align="left">Tags</th>
    <td>button, skype, embed</td>
  </tr>
</table>

## Download
* Download to Dokuwiki plugin folder
* File     : https://github.com/tschinz/dokuwiki_skype_plugin/zipball/master

## Versions
* **2011-02-25**
  * Init version 
* **2012-06-14**
  * Added function in command, every button can have a different function now.
* **2012-10-22**
  * Moved Repo to github
* **2014-06-16**
  * Use new Skype button, works now with Mircdosoft accounts

## Syntax
```
{{skype>username}}
{{skype>username,function}}
```

You can see the official Skype button wizard here: [Official Skype Button Wizard](http://www.skype.com/intl/en/tell-a-friend/wizard/)

<table>
  <tr>
    <th>Admin setting</th>
    <th>Default value</th>
    <th>Description</th>
  </tr>
  <tr>
    <th align="left">Function</th>
    <td>chat</td>
    <td>click function (chat, call, dropbdown)</td>
  </tr>
  <tr>
    <th align="left">Size</th>
    <td>24</td>
    <td>size of icon in pixel (10, 12, 14, 16, 24, 32)</td>
  </tr>
  <tr>
    <th align="left">Style</th>
    <td>white</td>
    <td>White or Blue design</td>
  </tr>
</table>

## Example
```
{{skype>username}}
{{skype>username,call}}
{{skype>username,chat}}
{{skype>username,dropdown}}
```
or different Design

![screenshot 1](https://raw.githubusercontent.com/tschinz/dokuwiki_skype_plugin/master/screenshot/skype_screenshot_1.jpg)
![screenshot 2](https://raw.githubusercontent.com/tschinz/dokuwiki_skype_plugin/master/screenshot/skype_screenshot_2.jpg)
![screenshot 3](https://raw.githubusercontent.com/tschinz/dokuwiki_skype_plugin/master/screenshot/skype_screenshot_3.jpg)

## Possible Problems
### Status always "offline"
Then you need to change your privacy settings in Skype: `Options` -> `Privacy` -> `Allow Net Status`

## Documentation

All documentation for the Skype Plugin is available online at:

  * [Dokuwiki Plugin Page](http://dokuwiki.org/plugin:skype)
  * [ZaWiki Plugin Page](http://zawiki.zapto.org/doku.php/tschinz:dw_skype)
  * [Github Project Page](https://github.com/tschinz/dokuwiki_skype_plugin)

2014 by Zahno Silvan <zaswiki@gmail.com>
