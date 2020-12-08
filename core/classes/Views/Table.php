<?php

namespace Core\Views;

use Core\View;

class Table extends View
{
    public function render($template_path = ROOT . '/core/templates/table.tpl.php')
    {
        return parent::render($template_path);
    }

    public function getTable()
    {
        var_dump($this->data);
        return $this->data;
    }

    public function updateTableData($new_data)
    {
        $this->data['data'] = $new_data;
    }
}
