<?php

namespace Yasha\Backend\Models;

//use Backpack\CRUD\ModelTraits\SpatieTranslatable\HasTranslations;
use Backpack\CRUD\CrudTrait;

class LanguageLine extends \Spatie\TranslationLoader\LanguageLine
{
    use CrudTrait;
    //use HasTranslations;

    // public $translatable = [
    //     'text'
    // ];
}
