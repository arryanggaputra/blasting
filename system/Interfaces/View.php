<?php

namespace Systemblast\Interfaces;

/**
 * This is an interface so that the view is coupled to a specific template engine
 */
interface View
{
    /**
     * Render to html or string
     *
     * @param  string $path view filename
     * @param  array  $data data to represent to the client
     * @return string
     */
    public function render(string $path, array $data = []);
}
