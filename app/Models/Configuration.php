<?php

namespace App\Models;

use App\Facades\AppHelper;
use Auth;

class Configuration extends AppBaseModel {

    protected $table = 'site_info';
    /**
     * @var array
     */
    protected $fillable = ['option_name', 'option_value', 'remarks', 'status'];

    protected $username;

    // Constructor
    public function __construct(array $attributes = [])
    {
        // pass construct params to Parent Model
        parent::__construct($attributes);

        if(auth()->check()){
            $this->username = Auth::user()->username;
        }
    }


    /**
     * @return bool
     */
    public function isAddableBy()
    {
        // Protect the root user from editing
        if ('root' == $this->username) {
            return true;
        }

        // Otherwise
        return false;
    }


    /**
     * @return bool
     */
    public function isEditableBy()
    {
        // Protect the root user from editing
        if ('root' == $this->username) {
            return true;
        }

        // Otherwise
        return false;
    }

    /**
     * @return bool
     */
    public function isDeletableBy()
    {
        // Protect the root user from deletion.
        if ('root' == $this->username) {
            return true;
        }

        // Otherwise
        return false;
    }



}
