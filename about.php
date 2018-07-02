<html>

<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/filo.css"></link>

</head>

<body>
<div class="topbar">
<h2> Projectkit </h2>
</div>
<div class="content">
<div class="tekst">
<br/>
<h3> What is projectkit </h3>

Projectkit is a site interface for project metadata.

<h3> Introduction </h3>

A project consist of : <br/>
<ul>
    <li> Project metadata - stored in info.xml </li>
    <li> Several custom HTML files </li>
    <li> The project files itself </li>
</ul>

<h3> The project kit - why? </h3>

The project kit is here te support writing tasks. Instead of having some directory structure with lots of handwritten data, writing tasks now can be wrapped up and categorized. <br/>
I had lots and lots of libreoffice and LaTeX files on the hard drive of my computer. It started lacking overview. <br/>
I developed the project kit, so any writing task is managed in it's own chunk of relevant material. Also, support for some HTML views on the project is included.

<h3> The project kit - how? </h3>

The project kit assumes you have basic knowledge on Linux system administration, and some scripting (namely, XML).
The active project directory is defined in a global variable in config.php.
The project kit reads all subdirecties of this project directory and assumes there is an info.xml file present.

<h4> The <span style="color:red;">info.xml</span> </h4>

A general <span style="color:red;">info.xml</span> looks like:

<pre>
&lt;project&gt;
  &lt;title&gt; Project title &lt;/title&gt;
  &lt;description&gt; Project description &lt;/description&gt;
  &lt;date&gt;03-07-2017&lt;/date&gt;
  &lt;author&gt; John Doe &lt;/author&gt;
  &lt;items&gt;
    &lt;item&gt; 
      &lt;id&gt;1&lt;/id&gt;
      &lt;title&gt;Tree item 1 &lt;/title&gt;
      &lt;href&gt;tree1.html&lt;/href&gt;
    &lt;/item&gt;
    &lt;item&gt; 
      &lt;id&gt;2&lt;/id&gt;
      &lt;title&gt;Tree item 2 &lt;/title&gt;
      &lt;href&gt;tree2.html&lt;/href&gt;
    &lt;/item&gt;
    &lt;item&gt;
    &lt;title&gt;subitems&lt;/title&gt;
      &lt;subitems&gt;
      &lt;item&gt;
        &lt;id&gt;4&lt;/id&gt;
        &lt;title&gt; subTree item 1  &lt;/title&gt;
        &lt;href&gt;stree1.html&lt;/href&gt;
      &lt;/item&gt;
      &lt;item&gt;
        &lt;id&gt;5&lt;/id&gt;
        &lt;title&gt; subTree item 2  &lt;/title&gt;
        &lt;href&gt;stree2.html&lt;/href&gt;
      &lt;/item&gt;
      &lt;/subitems&gt;
    &lt;/item&gt;
  &lt;/items&gt;
  &lt;files&gt;
    &lt;file&gt; 
      &lt;path&gt; README.txt &lt;/path&gt;
      &lt;description&gt; Dit is the project README file &lt;/description&gt;
    &lt;/file&gt;
  &lt;/files&gt;
&lt;/project&gt;
</pre>

In your project subdirectory put the <span style="color:red;">info.xml</span>. <br>

Script the data for: 
<ul>
<li> Project title</li>
<li> Project description</li>
<li> Project date</li>
<li> Project author</li>
<li> Project items</li>
<ul>
<li> unique item id </li>
<li> item title </li>
<li> the path where the item is stored, after the project working directory </li>
</ul>
<li> Project files</li>
<ul>
<li> the file path </li>
<li> the file description </li>
</ul>
</ul>

<br/><br/>

<h4> The <span style="color:red;">config.php</span> </h4>

The config.php sets global variables. <br/>

The $project_dir global variable sets where the main project directory is. <br/>
The $publish_dir global variable sets where to publish the project site. <br/>
<br/>


<h3> Publishing </h3>

The <span style="color: red;">info.xml</span> holds fields for files. Of course the project may contain files not described in the <span style="color: red;">info.xml</span> file. <br/>
By publishing, projectkit publish a site in a given subdirectory. <br/>
This should give a total and comprehensive view of all project details that are important. <br/>
I use <b>git</b> for versions of projects on the backend. After the final commit, i use projectkit to sort out my product and give it a clever look.<br/>
<br/>

<h3> Final note </h3>

Projectkit is licenced <a href="https://www.gnu.org/licenses/old-licenses/gpl-2.0.html"> GPLv2 <a>

<br/>

<br/>
<br/>
<br/>



</div>
</div>
</div>
</body>
</html>



