<?php

namespace WPStaging\Core\Forms\Elements;

use WPStaging\Core\Forms\Elements;

/**
 * Class Text
 * @package WPStaging\Core\Forms\Elements
 */
class Text extends Elements
{

    /**
     * @return string
     */
    protected function prepareOutput()
    {
        return "<input id='{$this->getId()}' name='{$this->getName()}' type='text' {$this->prepareAttributes()} value='{$this->default}' />";
    }

    /**
     * @return string
     */
    public function render()
    {
        return ($this->renderFile) ? @file_get_contents($this->renderFile) : $this->prepareOutput();
    }
}
