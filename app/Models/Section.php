<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $table = 'sections';

    protected $primaryKey = 'id';

    protected $fillable = ['section_name'];

    public function Assign_users_to_sections(){
        return $this->hasMany(Section::class);
    }
}
