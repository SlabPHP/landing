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
    <h3>What now?</h3>

    <p>
        You can start writing your bundles! Check out the
        <a href="https://github.com/SlabPHP/slabphp/blob/master/docs/installation.md">SlabPHP Installation and User Guide</a> for
        help getting setup (although you're already here).
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
