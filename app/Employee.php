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

}
