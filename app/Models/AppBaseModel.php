<?php

namespace App\Models;

use App\Facades\AppHelper;
use Illuminate\Database\Eloquent\Model;
use ModelHelper;

class AppBaseModel extends Model
{

    /**
     * Stores active Languages data
     *
     * @var
     */
    protected $active_lang;

    /**
     * List Models Having Multi Lang data
     *
     * @var array
     */
    protected $lang_base_models = [
        /*'\\App\\Models\\Tags',*/
    ];


    /**
     * Validate Status
     * Status must only 1 ie. Active or 0 ie. InActive
     *
     * @param $value
     */
    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = $value == 1 ? 1 : 0;
    }

    /**
     * Parse sort_order to integer.
     *
     * @param $value
     */
    public function setSortOrderAttribute($value)
    {
        $this->attributes['sort_order'] = (int)$value;
    }

    /**
     * Scope a query to only include default language data.
     *
     * @param $query
     * @return mixed
     */
    public function scopeByDefaultLang($query)
    {
        return $query->where($query->getModel()->table . '.language_id', session('config.default_language_id'));
    }

    /**
     * Add a condition to filter by active languages
     *
     * @param $query
     * @return mixed
     */
    public function scopeByActiveLang($query)
    {
        return $query->whereIn($query->getModel()->table . '.language_id', ModelHelper::getActiveLanguageId());
    }

    /**
     * Add a condition to filter by language id
     *
     * @param $query
     * @param $language_id
     * @return mixed
     */
    public function scopeByLang($query, $language_id)
    {
        return $query->where($query->getModel()->table . '.language_id', $language_id);
    }

    /**
     * Add a condition to match primary_key value
     *
     * @param $query
     * @param $pk
     * @return mixed
     */
    public function scopePk($query, $pk)
    {
        return $query->where($query->getModel()->table . '.primary_key', $pk);
    }

    /**
     * Add a condition to match id value
     *
     * @param $query
     * @param $id
     * @return mixed
     */
    public function scopeId($query, $id)
    {
        return $query->where($query->getModel()->table . '.id', $id);
    }

    /**
     * Add a condition matching status value
     *
     * @param $query
     * @param int $status
     * @return mixed
     */
    public function scopeByStatus($query, $status = 1)
    {
        return $query->where($query->getModel()->table . '.status', $status);
    }

    /**
     * Clone existing data by Default Language
     * and Add the row with new Language Id for
     * Models which contains Data based on Language
     *
     * @param $new_lang_id
     */
    public function addRowsForNewLanguage($new_lang_id)
    {
        foreach ($this->lang_base_models as $model) {
            // get rows of table by Default Language Id
            $rows = $model::ByLang(AppHelper::getDefaultLanguageId())->get();
            foreach ($rows as $row) {
                $model::create(ModelHelper::getAddableArray($row, $new_lang_id));
            }
        }

    }

}
