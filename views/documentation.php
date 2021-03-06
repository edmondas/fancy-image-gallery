<?php
if (!defined('IN_CMS')) { exit(); }
/**
 * Fancy Image Gallery for Wolf CMS- Create gallery and display images with few clicks
 * Gallery is free for non-profit usage. For commercial usage, please contact one of the authors.
 * @package wolf
 * @subpackage plugin.fancy_image_gallery - documentation
 *
 * @author Sanja Andjelkovic <sanja@medio.com.hr>
 * @author Dejan Andjelkovic <dejan@medio.com.hr>
 * @version 0.8.6
 * @for Wolf version 0.7.0 and above
 * @license http://www.gnu.org/licenses/gpl.html GPL License
 * @copyright medio.com.hr & project79.net, 2009-2011
 */
 
?>

<h1><?php echo __('Documentation'); ?></h1>

<h3>Welcome to the <strong>Fancy Image Gallery</strong> documentation page</h3>

<p>
	This gallery is created for people who have a lot of images and wants to save a lot of time with making thumbnails 
	and descriptions for each image. 
</p>
<h3>1 Folder = 1 Gallery</h3>
<p>
	Gallery uses <strong><em>titles of your images</em></strong> and displays them underneath of each image, so be careful when naming your
	images or you will end up with img1.jpg, img2.jpg etc.
</p>
<p>
	<strong>NOTE:</strong> All folders with images (galleries) <strong>MUST</strong> be created under <strong><em>public/images/</em></strong> folder
	in order to work, or you want be able to call the gallery from the "body" or "page-part" area.
</p>

<h3>1. Setting the Layout</h3>
<p>
	Download latest <a href="http://jquery.com" target="_blank">Jquery</a> library (this plugin is tested and works with version 1.7.x),
	unzip it, put somewhere in public directory and link it between &lt;head&gt;&lt;/head&gt; tags.
</p>
	In your layout, put this code in &lt;head&gt;&lt;/head&gt; tag:<br />
<pre>
&lt;?php fancy_resources(); ?&gt;
&lt;script type="text/javascript"&gt;
    $(function(){
        $(".photo").fancybox({ 
            'speedIn': 500, 
            'speedOut': 500 
        });
    });
&lt;/script&gt;
</pre>
<p>
        Extra options are available. You can play around and see what fits your needs best.:
</p>
<pre>
    'overlayShow': true //choose between true or false
    'overlayOpacity': 0.3, //choose opacity between 0.1 - 1, default is 0.3
    'overlayColor': '#666', //choose any color for overlay, default is #666
    'titleShow': true, //choose between: true or false, default is set to true
    'titlePosition': 'outside', //choose between: 'outside','inside' or 'over', default is 'outside'
    'transitionIn': 'fade', //chose between: 'fade', 'elastic' or 'none', default is 'fade'
    'transitionOut': 'fade' //chose between: 'fade', 'elastic' or 'none', default is 'fade'
</pre>
<p>
	We have added some extra options which you can enable in your Layout. Play with it and see which fits you best.<br />
	<strong>Note:</strong> Some options need to be between single quotation marks ('like this')!!!
</p>

<h3>2. Creating thumbnails</h3>

<p>
	You have 2 options for uploading images. You can either upload images through FTP server or you can do it manually with
	File Manager (by creating folder under "public/images/" and uploading files one by one).
</p>
<p>
	After the upload, click <strong>Fancy Image gallery</strong> tab and type the name of your gallery (actually, it is the name of your folder with images) under
	Gallery Path.
</p>
<p>
	When that's done, specify thumbnail width and height in pixels (just the number, DO NOT WRITE px in the input field). If you did all by book, you
	should get flash message "Thumbnails are successfully created", and now you can call your gallery.
</p>
<p>
	<strong>NOTE: Gallery Path, Thumbnail Width and Thumbnail Height fields are mandatory!!!</strong><br />
</p>

<h3>3. Displaying the gallery</h3>
<p>
	Diplaying one gallery is very easy. All you have to do is to create a page, call the function and type the name of
	the folder where you have uploaded images.
</p>
<ul>
	<li>Create new page,</li>
	<li>Set filter to "none". Paste this code into body part: </li>
	<li><code>&lt;?php fancy('name of the folder/'); ?&gt;</code></li>
	<li>Change the "name of the folder/" to name of your folder with images</li>
	<li><strong>DO NOT FORGET THE TRAILING SLASH!!!</strong></li>
</ul>

<h3>Example :</h3>
<p>
	Example shows how to create gallery.<br />
</p>
<ul>
	<li>Create a folder named "mygallery" and upload some photos.</li>
	<li>Create and Publish page called "My gallery".</li> 
	<li>Type this code in "My gallery" page body with filter set to "none":</li>
	<li><code>&lt;?php fancy('mygallery/); ?&gt;</code></li>
	<li><strong>DO NOT FORGET THE TRAILING SLASH!!!</strong></li>
	<li>Save and View your gallery</li>
</ul>

<h3>4. Display and link gallery on some other page</h3>

<p>For this we use <code>fancy_parent</code> function.</p>

<p>
	The Fancy Image Gallery comes with possibility to display/list of a certain gallery (or few of them) by 
	making a thumb from first image from specified gallery/folder. The thumbnail image is a link to your gallery.
</p>
<ul>
	<li>Create new page,</li>
	<li>Paste this code into body part with filter set to "none": </li>
	<li><code>&lt;?php fancy_parent('name of the folder/', 'slug from page/'); ?&gt;</code></li>
	<li>Change the "name of the folder/" to name of your folder with images</li>
	<li>Change "slug from page/" to fit slug from your newly created page</li>
	<li>DO NOT FORGET THE TRAILING SLASH!!!</li>
	<li>Note: watch for levels, as you'll need to update gallery code to fit path.</li>
</ul>
<h3>Example :</h3>
<p>
	Example shows how to create and link gallery when the page is on the second level.<br />
</p>
<ul>
	<li>Create a folder named "mygallery" and upload some photos.</li>
	<li>Create and Publish page called "Gallery".</li> 
	<li>Then create child page under Gallery page, and call it "Gallery One".</li>
	<li>Type this code in "Gallery One" body with filter set to "none":</li>
	<li><code>&lt;?php fancy_parent('mygallery/, gallery/gallery-one/'); ?&gt;</code></li>
	<li>DO NOT FORGET THE TRAILING SLASH!!!</li>
	<li>Save and View your gallery</li>
</ul>

<h3>5. Display all existing galleries</h3>

<p>For this we use <code>fancy_list</code> function.</p>

<p>
    Before you can even use this function, you <strong>need to set the name for your gallery</strong>. Default is "gallery" which means, if you have slug named "gallery" it will work out of the box, otherwise you should do:
</p>

<ol>
    <li>Create Page which will act as main gallery and copy its slug</li>
    <li>Open <code>index.php</code> file from the <code>/wolf/plugins/fancy_image_gallery</code></li>
    <li>On line 101 change: <code>$galleryname = 'gallery';</code> into your copied/created slug</li>
    <li>Save</li>
    <li>Go to your main gallery page (container) and paste:</li>
    <li><code>&lt;?php fancy_list(); ?&gt;</code></li>
    <li>set filter to <strong>none</strong>, page to Published and Save</li>
    <li>Done</li>
</ol>

<p>
    <strong>A note:</strong> In order for this function to work properly, you can't have any hidden files within <code>/public/images/</code> folder or it will break your page.
</p>

<h3>Uninstalling the plugin</h3>
<ul>
	<li>Go to Administration->Plugins and <strong>uncheck</strong> the Fancy Image Gallery checkbox.</li>
	<li>Go to Layouts and delete <strong>fancy_resources function and javascript below it</strong>.</li>
	<li><strong>Remove</strong> any "fancy" and "fancy_parent" functions from your Pages.</li>
	<li>That should be it! If you encounter in any problems, double check if you have deleted everything above mentioned.</li>
</ul>
<h3>Styles</h3>
<p>
	Below you can find styles for gallery. Copy them to your default CSS file. You can change it to fit your 
	website layout. The whole css is well commented and has only couple of classes, so that shouldn't be a problem to
	adopt.
</p>
<pre>
/* Class for the "fancy_parent" function 
 * It gives a thick 1px grey border around image
*/
.link img { 
	border: 1px solid #999; 
	outline:none;
	padding:5px;
	margin:5px;
}

.link img:hover {
	border:1px solid #ccc;
}

/* Class for single image listing (fancy function) 
 * It gives a grey 1px border around image
*/
.photo { 
	padding: 5px; 
	margin: 5px; 
	border: 1px solid #999; 
	display: block; 
	float: left; 
}

.photo:hover	{ border-color: #ccc; }
</pre>
<h3>Languages</h3>
<p>
	Fancy Image Gallery has support for different languages. The plugin itself comes with these languages: 
</p>
<ul>
    <li>English (common sense!),</li> 
    <li>Croatian (that's ours),</li>
    <li>French (thanks to oweb),</li>
    <li>Spanish (thanks to rafaguilarsol),</li>
    <li>Dutch (thanks to Fortron),</li>
    <li>Russian (thanks to Konstantin Baev),</li>
    <li>Polish (thanks to nowotny).</li>
</ul>
<p>If you want, you can contribute by translating plugin into your language and send the file via e-mail below.</p>


<h3>Notes</h3>
<p>
	This gallery is tested and works with Wolf version 0.7.+, and should work with future releases too. If you need this plugin for lower
	version of Wolf (v.0.6.0), please download version 0.7.3. (or below). Gallery supports ,jpg, .png and .gif image file formats and it's tested for each of them. 
	Creating thumbnails works with various sizes of width and height (tested: 100/100, 125/150, 250/300 etc.).
</p>

<h3>Licence</h3>
<p>
	Fancy Image Gallery is free for personal, non-profit and commercial use. If you encounter an error, please drop a line by e-mail or post a topic on Wolf's
	forum under Third-party / User contributed Plugins.
</p>

<h3>Authors</h3>
<p>
        Developer and leading math brain: Sanja Andjelkovic (sanja@medio.com.hr)<br />
	Coder and wannabe developer: Dejan Andjelkovic (dejan@medio.com.hr)<br />
        Many thanks to our man from the shadow for his help: Martijn van der Kleijn (martijn.niji@gmail.com)<br />
        Project website: <a href="http://project79.net/projects/fancy-image-gallery" target="_blank">Fancy Image Gallery</a><br />
        Company website: <a href="http://medio.com.hr" target="_blank">medio com hr</a>
</p>
