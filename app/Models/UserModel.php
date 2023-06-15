<?php

namespace App\Models;

use Petty\Database\Model;

class UserModel extends Model
{
	protected string $table = 'users';
	protected string $primaryKey = 'id';
}