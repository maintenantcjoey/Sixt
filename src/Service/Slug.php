<?php

namespace App\Service;

use Symfony\Component\String\Slugger\AsciiSlugger;

class Slug
{
    public static function slug($string): string
    {
        return (string) (new AsciiSlugger())->slug($string)->lower();
    }
}