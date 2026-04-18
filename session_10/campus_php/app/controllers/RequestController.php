<?php

require_once "../app/Models/RequestRepository.php";

class RequestController
{
    private RequestRepository $repo;

    public function __construct()
    {
        $this->repo = new RequestRepository();
    }

    public function index()
    {
        $requests = $this->repo->all();
        require "../app/Views/requests/index.php";
    }

    public function show(int $id)
    {
        $request = $this->repo->find($id);
        require "../app/Views/requests/show.php";
    }

    public function create()
    {
        require "../app/Views/requests/create.php";
    }

    public function store()
    {
        $title = $_POST['title'] ?? '';
        $this->repo->add($title);

        header("Location: /campus_request/public");
    }
}
