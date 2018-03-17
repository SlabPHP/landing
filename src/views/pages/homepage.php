<style type="text/css">
    .welcome { margin-top: 60px; }
</style>

<div class="jumbotron">
    <div class="container">
        <h1 class="display-3">You're Setup!</h1>
        <p>SlabPHP is a lightweight PHP web framework built with an emphasis on integrity.</p>
    </div>
</div>

<div class="container welcome">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">We ❤ Open Source</h4>
                    <p class="card-text">
                        SlabPHP is open source software released under the <a href="https://www.apache.org/licenses/LICENSE-2.0">Apache 2.0 license</a>.
                        Feel free to contribute or open tickets!
                    </p>
                    <a href="https://github.com/SlabPHP" class="card-link">on Github</a>
                    <a href="https://packagist.org/packages/slabphp/slabphp" class="card-link">on Packagist</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">⭐ Standards</h4>
                    <p class="card-text">
                        We leveraged many of PHP 7's newer features, follow many
                        <a href="https://www.php-fig.org/psr/">PHP-FIG standards</a> and rely on industry standard
                        <a href="https://getcomposer.org/">Composer</a>,
                        <a href="https://packagist.org/">Packagist</a>,
                        <a href="https://travis-ci.org/">TravisCI</a>, and
                        <a href="https://phpunit.de/">PHPUnit</a>.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">📦 Features</h4>
                    <p class="card-text">
                        Pluggable Bundle and external interface-based architecture, database and cache provider libraries, and low memory and cpu footprints.
                        SlabPHP is designed for re-use and multi-site installations. No bloat!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container welcome">
    <h3>Getting Started!</h3>
    <p>
        From here you'll want to start building your own bundle to insert into your SlabPHP bundle stack. Here's probably how you got to this point:
    </p>
    <pre>
$ mkdir myproject
$ cd myproject
$ composer init --require slabphp/slabphp
</pre>
    <p>
        This will run the slabphp initialization in your project which basically just copies a sample docroot to ~/public. For this document, we'll assume
        you are creating a website called local.slabproject.com.
        You could point an apache vhost to that directory with something similar to this:
    </p>
    <pre>
&lt;VirtualHost *:80&gt;
    DocumentRoot ~/myproject/public
    ServerName local.slabproject.com

    &lt;Directory "~/myproject/public"&gt;
        Options All +MultiViews
        AllowOverride None
        Order allow,deny
        Allow from all
        Require all granted

        RewriteEngine On
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteCond %{REQUEST_URI} !^/server-status
        RewriteRule ^(.*)$ index.php/$1 [L]
    &lt;/Directory&gt;
&lt;/VirtualHost&gt;
</pre>

    <p>or with nginx something like this</p>

    <pre>
server {
    listen 80;
    listen 443 ssl;
    server_name local.slabproject.com;
    rewrite ^(.*)$ /index.php/$1 last;
}
</pre>

    <p>
        Loading this in your browser would then point you at a page that looks just like this.
    </p>

    <h4>Single Website Implementation</h4>

    <p>
        SlabPHP follows the <a href="https://github.com/php-pds/skeleton">standard PHP library skeleton format</a>.
        The easiest way to implement a site is to do the following steps. But before you start, decide on a namespace
        for your application code. For this example, the namespace will be "\MyProject".
    </p>

    <h5>Step 1 - Add Namespace to Composer</h5>

    <p>
        Since SlabPHP relies on the psr4 autoloader in composer, you can add your namespace to it by modifying your
        composer.json with something like as follows and then run <strong>composer dump-autoload</strong> to rebuild the autoloader.
    </p>
    <pre>
...
"autoload": {
    "psr-4": {
        "MyProject\\": "src/"
    }
},
...
</pre>
    <h5>Step 2 - Create/Validate Project Directory Structure</h5>

    <p>
        Your project file structure should look as follows:
    </p>
    <ul>
        <li><strong>~/myproject</strong> - your root project directory, can be anything really
            <ul>
                <li><strong>src</strong> - psr4 root for \MyProject namespace
                    <ul>
                        <li><strong>views</strong> - default location where the display configuration will look for your bundles templates</li>
                    </ul>
                </li>
                <li><strong>configs</strong> - this as a place to store configs for your project</li>
                <li><strong>resources</strong> - this as a location to store css/js/sql etc. resources</li>
                <li><strong>tests</strong> - store your tests for your application here</li>
                <li><strong>docs</strong> - store your markdown documents here</li>
                <li><strong>public</strong> - the public docroot, contains an index.php that boots SlabPHP and any static http assets</li>
                <li><strong>vendor</strong> - automatically created by composer, add to your .gitignore</li>
            </ul>
        </li>
    </ul>

    <h5>Step 3 - Create a Bundle Configuration</h5>

    <p>Create the file <i>~/myprojects/src/Configuration.php</i> and edit the contents to look something like this:</p>

    <pre>
&lt;?php
namespace MyProject;

class Configuration extends \Slab\Bundle\Standard
{
    /**
     * @return string
     */
    protected function getCurrentWorkingDirectory()
    {
        return __DIR__;
    }
}
</pre>
    <p>
        You can override many aspects of the parent class to radically change the behavior and components of the framework on a per-bundle basis.
    </p>

    <h5>Step 4 - Create A Page</h5>

    <p>Create a page by creating a controller, a route configuration file with the route in it, and a template.</p>

    <h6>4a. Creating a Controller</h6>
    <p>
        Create the file <i>~/myprojects/src/Controllers/Homepage.php</i> and edit the contents to look something like this:
    </p>
    <pre>
&lt;?php
namespace MyProject\Controllers;

class Homepage extends \Slab\Controllers\Page
{
    /**
     * @var string
     */
    protected $title = 'My Controller';

    /**
     * @var string
     */
    protected $description = 'This is my website!';
}
</pre>

    <h6>4b. Create the Route</h6>
    <p>
        Create/edit the file <i>~/myprojects/configs/routes.xml</i> and make the contents look something like this.
    </p>
    <pre>
&lt;?xml version="1.0" encoding="UTF-8" ?&gt;
&lt;routes&gt;
    &lt;route&gt;
        &lt;path&gt;/&lt;/path&gt;
        &lt;name&gt;Homepage&lt;/name&gt;
        &lt;class&gt;\MyProject\Controllers\Homepage&lt;/class&gt;
    &lt;/route&gt;
&lt;/routes&gt;
</pre>

    <h6>4c. Create the Template</h6>
    <p>
        Create/edit the file <i>~/myprojects/src/views/pages/homepage.php</i>, notice this is all lowercase where the controller class name was capitalized.
        This is by design. Put whatever html contents you want in it, we'll pretend it says:
    </p>

    <pre>
&lt;h1&gt;Hi there!&lt;/h1&gt;
</pre>

    <h5>Step 5 - Put Your Namespace In The Bundle Hierarchy</h5>

    <p>
        Open <i>~/myproject/public/index.php</i> and add your namespace to the bootstrap loader to make it look like something that follows:
    </p>

    <pre>
...
$bootstrap = new \Slab\Bootstrap(__DIR__);
$bootstrap->pushNamespace('MyProject');

$bootstrap->bootSystem();
...
</pre>
    <p>
        At this point your homepage controller should respond to http://local.slabproject.com/
    </p>

    <h4>Multiple Site Implementations</h4>

    <p>
        You can create individual repositories for your bundles and include them via composer. As long as they have
        the configuration object you can just make your modified bootstrap index.php push or add namespaces to the domain list.
        See the core SlabPHP library Bootstrap component documentation for more information.
    </p>
</div>

<div class="container welcome">
    <div class="row">
        <div class="col-md-8">
            <h3>Components</h3>
            <p>
                SlabPHP is made of a bunch of atomic components that can be used separately or together. The components
                rely on a shared library of interfaces. You can use the pre-built components or even write your own. Some
                libraries are also optional so feel free to bring your own logger, database, session handler, etc.
            </p>
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="https://github.com/SlabPHP/slabphp">Core SlabPHP Library</a> &ndash;
                    includes all of these via composer and provides structure for using the framework.
                </li>
                <li class="list-group-item">
                    <a href="https://github.com/SlabPHP/display">Templating and Display Library</a> &ndash;
                    SlabPHP's output and templating library
                </li>
                <li class="list-group-item">
                    <a href="https://github.com/SlabPHP/router">Router</a> &ndash;
                    light-weight web router with validators for routes.
                </li>
                <li class="list-group-item">
                    <a href="https://github.com/SlabPHP/component-interfaces">Component Interface Library</a> &ndash;
                    external interface library with shareable testing mocks
                </li>
                <li class="list-group-item">
                    <a href="https://github.com/SlabPHP/debug">Debug Utility</a> &ndash;
                    the debug utility displays a helpful debug bar at the bottom of default SlabPHP pages.
                </li>
                <li class="list-group-item">
                    <a href="https://github.com/SlabPHP/controllers">Base Controller Library</a> &ndash;
                    some base controllers to help you get started
                </li>
                <li class="list-group-item">
                    <a href="https://github.com/SlabPHP/bundle-stack">Bundle Stack Library</a> &ndash;
                    manage a hierarchy of bundles so you can easily share code between them
                </li>
                <li class="list-group-item">
                    <a href="https://github.com/SlabPHP/landing">Landing Page Bundle</a> &ndash;
                    this page's source code and an example SlabPHP bundle
                </li>
                <li class="list-group-item">
                    <a href="https://github.com/SlabPHP/sequencer">Sequencer Library</a> &ndash;
                    this library helps you write re-usable controllers by extending controller sequences
                </li>
                <li class="list-group-item">
                    <a href="https://github.com/SlabPHP/database">Database Library</a> &ndash;
                    a simple relational database wrapper with token binding
                </li>
                <li class="list-group-item">
                    <a href="https://github.com/SlabPHP/cache-manager">Cache Manager Library</a> &ndash;
                    a simple cache manager wrapper with memcache and redis providers
                </li>
                <li class="list-group-item">
                    <a href="https://github.com/SlabPHP/configuration-manager">Configuration Library</a> &ndash;
                    a configuration library that loads files from a hierarchy of bundles
                </li>
                <li class="list-group-item">
                    <a href="https://github.com/SlabPHP/session-manager">Session Library</a> &ndash;
                    provides flash data capabilities and session handlers that work in both native and the slabphp session system
                </li>
                <li class="list-group-item">
                    <a href="https://github.com/SlabPHP/input-manager">Input Manager Library</a> &ndash;
                    a small input manager library that sanitizes input to the application
                </li>
                <li class="list-group-item">
                    <a href="https://github.com/SlabPHP/concatenator">Concatenator Library</a> &ndash;
                    a simple library that provides concatenation of files, urls, etc. for use in controllers
                </li>
            </ul>
        </div>
        <div class="col-md-4">
            <h3>Feedback</h3>
            <p>
                Feel free to open tickets on github, <a href="https://www.salernolabs.com/contact">email Salerno Labs LLC</a>
                staff directly, or most preferably create pull requests for any changes you'd like in the codebase.
            </p>
        </div>
    </div>
</div>
