<?php

class FileDB
{

    private $file_name;
    private $data;

    public function __construct(string $file_name)
    {
        $this->file_name = $file_name;
    }

    public function getData(): array
    {
        return $this->data ?? [];
    }

    public function setData(array $data_array): void
    {
        $this->data = $data_array;
    }

    public function save(): bool
    {
        $bytes_written = file_put_contents($this->file_name, json_encode($this->getData()));

        return $bytes_written !== false;
    }

    public function load(): bool
    {
        if (file_exists($this->file_name)) {
            if (file_get_contents($this->file_name) !== false) {
                $this->setData(json_decode(file_get_contents($this->file_name), true) ?? []);
            }
        } else {
            $this->setData([]);

            return true;
        }

        return false;
    }

    public function createTable(string $table_name): bool
    {
        if (!$this->tableExists($table_name)) {
            $this->data[$table_name] = [1, 2, 3, 4, 5, 6, 78, 9];

            return true;
        }
        var_dump('jau yra');

        return false;
    }

    public function tableExists(string $table_name): bool
    {
        return isset($this->data[$table_name]);
    }

    public function dropTable(string $table_name): bool
    {
        if ($this->tableExists($table_name)) {
            unset($this->data[$table_name]);
            var_dump('istryniau');

            return true;
        }
        var_dump('nera tokio');

        return false;
    }

    public function truncateTable(string $table_name): bool
    {
        if ($this->tableExists($table_name)) {
            $this->data[$table_name] = [];
            var_dump('istustinau');

            return true;
        }
        var_dump('nera tokio');

        return false;
    }

    public function insertRow(string $table_name, $row, $row_id = null)
    {
        if ($this->rowExists($table_name, $row_id)) {

            return false;
        }
        if ($row_id) {
            $this->data[$table_name][$row_id] = $row;
        } else {
            $this->data[$table_name][] = $row;
            $row_id = array_key_last($this->data[$table_name]);
        }

        return $row_id;
    }

    public function rowExists(string $table_name, $row_id): bool
    {
        return array_key_exists($row_id, $this->data[$table_name]);
    }

    public function updateRow(string $table_name, $row_id, $row): bool
    {
        if ($this->rowExists($table_name, $row_id)) {
            $this->data[$table_name][$row_id] = $row;
            
            return true;
        }

        return false;
    }
}
