<h2>Introduction</h2>

Plugin implement [github] tag.<br/> 

<h2>Tag attributes</h2>

url	- your code url (for example: SebastianPozoga/WP-Github-Plugin/blob/master/errors/noUrl.js)<br/>
baseurl	- (optional) use as base url (defaul: https://raw.github.com/)<br/>
section	- (optional) text on begin (example: interface ClassFilter)<br/>

<h3>Section</h3>

support for c++, java and javascript.

Regexp:
<ul>
<li>$   - a world
<li>' ' - will be replacy with spaces or tabulator
</ul>

<h2>Usage examples</h2>

[github url="SebastianPozoga/WP-Github-Plugin/blob/master/examples/ClassFilter.java"]

[github url="SebastianPozoga/WP-Github-Plugin/blob/master/examples/ClassFilter.java" section="interface ClassFilter"]

[github url="SebastianPozoga/WP-Github-Plugin/blob/master/examples/ClassDesc.java" section="for (Method m : methods)"]
