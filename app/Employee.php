<?php

namespace App;

use App\MainModel as Model;

class Employee extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'employees';

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['Name'];


	/**
	 * =========================
	 * ACCESSORS
	 * ---------
	**/
	public function getNameAttribute() {
		return $this->FIRST_NAME.' '.$this->LAST_NAME;
	}

	/**
	 * =========================
	 * SCOPES
	 * ---------
	**/
	public function scopeSearch($query, $string, $field = '') {
		if( ! empty($field) && $field == 'Name' ) {
			return $query->where(function($q) use ($string, $field) {
				$q->orWhere(\DB::raw("CONCAT(FIRST_NAME, ' ', LAST_NAME)"), 'LIKE', '%'.$string.'%');
			});
        }
        else {
            return parent::scopeSearch($query, $string, $field);
        }
	}
}
