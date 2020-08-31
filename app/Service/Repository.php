<?php

namespace App\Service;

interface Repository
{
    public function store($obj);


    public function destroy($id);
}