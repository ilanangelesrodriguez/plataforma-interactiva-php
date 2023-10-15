<?php

namespace View;

interface LoginObserver
{
    public function update($username, $password);
}