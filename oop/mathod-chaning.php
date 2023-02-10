<?php


class methodChaning
{
    public function frist()
    {
        echo "This is a frist method \r\n";
        return $this;
    }
    public function second()
    {
        echo "This is a second method \n";
        return $this;
    }
    public function thrid()
    {
        echo "This is a thrid method \n";
        return $this;
    }
}

$obj = new methodChaning();

$obj->frist()->second()->thrid();
