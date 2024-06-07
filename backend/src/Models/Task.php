<?php

namespace Models;

class Task
{
    public $id;
    public $title;
    public $description;
    public $status;
    public $due_date;

    public function __construct()
    {
    }
}
