<?php
/**
 * Landing Homepage Controller
 *
 * This is an interim controller structure until we migrate controllers from the proprietary framework.
 *
 * @package SlabLanding
 * @subpackage Controllers
 * @author Eric
 */
namespace SlabLanding\Controllers;

class Homepage extends \Slab\Controllers\Page
{
    /**
     * @var string
     */
    protected $title = 'Welcome to SlabPHP';

    /**
     * @var string
     */
    protected $description = 'Your SlabPHP system is working but may need to be configured.';

}