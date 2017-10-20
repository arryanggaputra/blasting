<?php

namespace Systemblast\Interfaces;

/**
 * This is an interface so that the view is coupled to a specific template engine
 */
interface View
{
    /**
     * Render view
     */
    public function render(string $path, array $data = []);
}
