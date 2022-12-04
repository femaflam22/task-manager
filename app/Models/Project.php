<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    // menyambungkan antar table
    // syaratnya, didalam table yang mau disambunginnya harus ada column yang bercungsi sebagai foreign key (column yg nyimpen value dr column primary key table awal : contoh project_id ditable tasks)
    // penamaan method nya diambil dr nama table yang mau disambungin
    // untuk dapat mengambil data dari table task melalui table project
    public function tasks()
    {
        // hasMany untuk relasi one to many atau many to many
        // hasOne untuk relasi one to one
        // isi argument nya diambil dr nama model dr table yang mau disambungin
        return $this->hasMany(Task::class);
    }
}
