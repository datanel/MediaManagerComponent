<?php

namespace CanalTP\MediaManager\Category;

use CanalTP\MediaManager\Category\AbstractCategory;

class LineCategory extends AbstractCategory
{
    public function __construct()
    {
        parent::__construct();

        $this->name = 'Line';
    }
}