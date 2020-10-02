<?php

namespace App\Exceptions;


class RejectTags
{
    public static function check($tag)
    {
        $common = ['up', 'way', 'becomes', 'you', 'like', 'it', 'the', 'during', 'pilot', 'his', 'her', 'control', 'take', 'their', 'lets', 'on', 'and', 'gets', 'with', 'to', 'the', 'from', 'a', 'out', '', ' ', 'w', 'be', 'i', 'my', 'likes', 'at', 'in', 'your', 'for', 'the', 'night', 'by'];
        return !in_array($tag, $common);
    }
}
