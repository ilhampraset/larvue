<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Contracts\MainModelContract;

use App\Traits\MainModelTrait;

class MainModel extends Model implements MainModelContract
{
	use MainModelTrait;

	/**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
	protected $guarded = []; // empty to make all attributes mass assignable

}
