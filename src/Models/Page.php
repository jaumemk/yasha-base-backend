<?php

namespace Yasha\Backend\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Backpack\CRUD\ModelTraits\SpatieTranslatable\HasTranslations;


class Page extends Model
{
    use CrudTrait;
    use Sluggable;
    use SluggableScopeHelpers;
    use HasTranslations;

    protected $table = 'pages';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'template',
        'name',
        'title', // t
        'slug', // t
        'content', // t
        'extras' // t
    ];

    protected $translatable = [
        'title',
        'slug',
        'content',
        'extras'
    ];
    

    protected $fakeColumns = [
        'extras'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'slug_or_title',
            ],
        ];
    }

    public function getTemplateName()
    {
        return str_replace('_', ' ', title_case($this->template));
    }

    public function getPageLink()
    {
        return url($this->slug);
    }

    public function getOpenButton()
    {
        return '<a class="btn btn-default btn-xs" href="'.$this->getPageLink().'" target="_blank">'.
            '<i class="fa fa-eye"></i> '.trans('yasha/backend::pagemanager.open').'</a>';
    }
 
    // The slug is created automatically from the "name" field if no slug exists.
    public function getSlugOrTitleAttribute()
    {
        if ($this->slug != '') {
            return $this->slug;
        }
        return $this->title;
    }

}