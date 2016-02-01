<?php

class OldGuy
{
    public function convertToFloat($int)
    {
        return number_format($int, 2);
    }
}

class OldyGuyAdapter extends OldGuy
{
    public function convertToFloat($int)
    {
        return number_format(parent::convertToFloat($int), 4, ',', '.');
    }
}


$oldy = new OldGuy();
echo $oldy->convertToFloat(55);
echo "<br />Addapted:<br/>";
$newy = new OldyGuyAdapter();
echo $newy->convertToFloat(55);
