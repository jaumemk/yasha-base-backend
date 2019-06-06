<?php

namespace Yasha\Backend\Models;

use Backpack\CRUD\ModelTraits\SpatieTranslatable\HasTranslations;
use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use CrudTrait;
    use HasTranslations;

    protected $table = 'menu_items';
    
    public $translatable = [
       'name',
       'link', 
    ];

    protected $fillable = [
        'name', // t
        'type',
        'link', // t
        'page_id',
        'parent_id'
    ];

    public function parent()
    {
        return $this->belongsTo('Yasha\Backend\Models\MenuItem', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('Yasha\Backend\Models\MenuItem', 'parent_id');
    }

    public function page()
    {
        return $this->belongsTo('Yasha\Backend\Models\Page', 'page_id');
    }

    public function getPageAttribute()
    {
        return $this->page()->firstOrFail();
    }

    /**
     * Get all menu items, in a hierarchical collection.
     * Only supports 2 levels of indentation.
     */
    public static function getTree()
    {
        $menu = self::orderBy('lft')->get();

        if ($menu->count()) {
            foreach ($menu as $k => $menu_item) {
                $menu_item->children = collect([]);

                foreach ($menu as $i => $menu_subitem) {
                    if ($menu_subitem->parent_id == $menu_item->id) {
                        $menu_item->children->push($menu_subitem);

                        // remove the subitem for the first level
                        $menu = $menu->reject(function ($item) use ($menu_subitem) {
                            return $item->id == $menu_subitem->id;
                        });
                    }
                }
            }
        }

        return $menu;
    }

    public function url()
    {
        switch ($this->type) {
            case 'external_link':
                return $this->link;
                break;

            case 'internal_link':
                return is_null($this->link) ? '#' : url($this->link);
                break;

            default: //page_link
                if ($this->page) {
                    return url($this->page->slug);
                }
                break;
        }
    }
}