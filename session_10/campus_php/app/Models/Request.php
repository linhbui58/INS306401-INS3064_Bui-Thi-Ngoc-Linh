<?php

class Request
{
    public int $id;
    public string $title;
    public string $status;

    public function __construct(int $id, string $title, string $status)
    {
        $this->id = $id;
        $this->title = $title;
        $this->status = $status;
    }
}