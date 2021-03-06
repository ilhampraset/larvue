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
    
	protected $primaryKey = 'EMPLOYEE_ID';
	
	public $timestamps = false;

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['EMPLOYEE_ID', 'FIRST_NAME', 'LAST_NAME', 'EMAIL', 'PHONE_NUMBER', 'HIRE_DATE', 'JOB_ID', 'SALARY', 'COMMISION_PCT', 'MANAGER_ID', 'DEPARTMENT_ID'];

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
				$q->orWhere(
                    \DB::raw('CONCAT('.$this->table.'.FIRST_NAME, " ", '.$this->table.'.LAST_NAME)'), 
                    'LIKE', 
                    '%'.$string.'%'
                );
			});
        }
        else {
            return parent::scopeSearch($query, $string, $field);
        }
    }
    
    public function scopeOrder($query, $field = '', $asc_or_desc = 'asc') {
        if($field == 'Name') {
            return $query->orderBy(\DB::raw('CONCAT('.$this->table.'.FIRST_NAME, " ", '.$this->table.'.LAST_NAME)'), $asc_or_desc);
        }
        else {
            return parent::scopeOrder($query, $field, $asc_or_desc);
        }
	}

}
