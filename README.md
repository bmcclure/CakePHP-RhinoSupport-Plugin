CakePHP Rhino Support Plugin
================

A CakePHP 2.x plugin to make it simple to integrate Rhino Support into your CakePHP site.


Why?
====

Rhino Support is a new, affordable alternative to many of the other support ticketing systems out there.

Their integration options, however, are fairly basic. I thought I would start to expand those options
by contributing my own CakePHP plugin for Rhino Support.


Background
==========

This started out as a very simple helper I used to avoid repeating a lot of similar code in my sites
which were going to utilize Rhino Support.

From there I decided I just implement all of the available integration options and make it useful to
anyone who uses Rhino Support and CakePHP together.

It is being distributed as a plugin to separate it from your application, and to allow for other related assets to be
included in the future, such as customizable elements to include in your views.


Requirements
============

*   CakePHP 2.0
*   PHP 5.2+
*   A Rhino Support account (Get one from http://rhinosupport.com)


Installation
============

Manual
------

1.   Download the plugin: http://github.com/bmcclure/CakePHP-RhinoSupport-Plugin/zipball/master
2.   Unzip the downloaded file to your CakePHP app's 'Plugin' folder
3.   Rename the unzipped folder to 'RhinoSupport'


Directly From GitHub
--------------------

Simply clone this repository to your CakePHP application under app\Plugin\RhinoSupport


For CakePHP 2.0 users
---------------------

No matter how you install the plugin, if you are using CakePHP 2.0 you need to make sure it is enabled in
your app/Config/bootstrap.php file.

Either use:

    CakePlugin::load('RhinoSupport'); //Loads just this plugin

Or:

    CakePlugin::loadAll(); // Loads all plugins at once


Usage
=====


Loading the helper
------------------

In the controller you wish to integrate Rhino Support with (or in your AppController), add the 
RhinoSupport helper to your $helpers array. It might look like this:

    public helpers = array(
        'RhinoSupport.RhinoSupport' => array('username' => 'mysite')
    );

'username' is the only option implemented, and it is required for any of the functionality to work properly.


Adding Rhino Support to your views
----------------------------------

There are several ways to integrate Rhino Support (or to use the helper to create your own integration), such as:


    $this->RhinoSupport->mailLink($text = null, $options = array())

This function will create a basic mail link for your visitors to send mail to your Rhino Support site.

*  $text can be set to the link text you wish to use, or left null to use the email address as the link text.
*  The email address defaults to [username]@rhinosupport.com. To set your own address set $options['address'].
*  You can set any other link options you want in the $options array and they will be used for the link element.


    $this->RhinoSupport->link($text = 'Contact Us', $options = array())

This function will create a link which will open up a popup window to create a ticket at your Rhink Support
site.

*  $text can be set to the link text to use, or left as the default to use 'Contact Us'.
*  $options will be passed directly to the link element.


    $this->RhinoSupport->scroller($type = 'feedback', $color = 'blue')

This function will attach a fixed 'scroller' to the edge of your pages that customers can use to submit a new ticket
to your Rhino Support site.

* $type can be 'contact' or 'feedback' which will change the text of the scroller.
* $color can be 'blue', 'red', 'green', 'yellow', 'orange', or 'black' which will change the color of the scroller.


    $this->RhinoSupport->iframe($options = array())

This will add an iframe to your page including your Rhino Support system directly in your layout.

$options provided will override any defaults of the same name. The default options are:

*  width: 400
*  height: 600
*  frameborder: 0
*  scrolling: 'no'
*  src: [your ticket system URL]


    $this->RhinoSupport->ticketUrl($params = array())

This will simply return the full URL to your ticket creation page, adding any parameters that you supply to the end.

$params can be supplied as a mixed array and will be built into a query string and added to the URL.


Final Notes
===========

More to come!