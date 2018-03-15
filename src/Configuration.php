<?php
/**
 * Default Landing Configuration
 *
 * @package SlabLanding
 * @author Eric
 */
namespace SlabLanding;

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