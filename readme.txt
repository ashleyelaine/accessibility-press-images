=== AccessibilityPress: Images ===
Author: fjorge Digital, AccessibilityPress
Author URI: http://fjorgedigital.com/
Tags: 508 compliance, accessibility, accessible, alt, alt text, alternative text, compliance, images, screen reader, Section 508, section508, wcag, WCAG 2.0, wordpress, wordpress accessibility
Version: 1.0

Creates an interface you can use to scan your website for images missing alternative text.

AccessibilityPress is focused on building products that help websites achieve high accessibility standards including:

    -508 compliance
    -WCAG (Web Content Accessibility Guidelines) 2.0 A, AA or AAA level of conformance

== Description ==

The #1 issue websites have with meeting guidelines for an accessible website is not providing alternative text for images. 

This WordPress plugin will evaluate each page of your website and produce a page-by-page report of which images are missing alt text. 

It will help you easily and quickly identify where there are image accessibility issues. It displays these in a clean table in the WordPress admin.

After running the scan if you have a row that has a red background it is completely missing the alt attribute. Such as: <img src="http://website.com">

If you have a row that has a yellow background it has a blank alt attribute. Sometimes these are intentional. Such as: <img alt="" src="http://website.com">

If you have a row that has a green background it has an alt attribute. Such as: <img alt="This is a website image" src="http://website.com">


= How it Works: =

The plugin uses a combination of PHP and javascript to scan each page of your site for images missing the alternative text attribute. 

An example is <img src="http://google.com/thisimagedoesntexist.jpg"> VS <img alt="This is a website image" src="http://google.com/thisimagedoesntexist.jpg">


= Installation: =
UPLOAD ZIP FILE OF PLUGIN TO WORDPRESS ADMIN
1. In the WordPress admin click on "plugins" in the left hand menu.
2. At the top click "Add New".
3. On the following screen, at the top click "Upload Plugin".
4. Browse to the zip file "accessibility-press-images.zip".
5. Click "Install Now".

VIA FTP (MANUAL INSTALL)
1. Download AccessibilityPress: Images to your desktop.
2. Unzip the file "accessibility-press-images.zip"
3. With your FTP program, upload the Plugin folder to the wp-content/plugins folder in your WordPress directory online.
4. Go to your WordPress admin plugins screen and activate the plugin.


= Usage: =
1. Once activated, you should see AccessibilityPress has been added to your admin menu.
2. Click "Images"
3. Click "Start Image Scan"
4. Wait until finished
5. Review the errors
6. Fix the errors (this plugin does not do this part, you will need to either do this yourself or contact a developer to add the necessary code for fixes)
7. Rescan to see if all good, with the goal being all green or some yellow that you have intentionally left blank for visual purposes.



== Changelog ==

= 1.0 =
* Original version.
