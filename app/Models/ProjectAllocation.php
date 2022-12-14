<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectAllocation extends Model{
    use HasFactory;

    protected $table = "tbl_project_allocation";
    protected $fillable = [
        'id',
        'project_id',
        'project_name',
        'fiscal_year',
        'alloc_date',
        'alloc_amount',
        'currency_id',
        'currency',
        'foreign_alloc_amount',
        'status',
        'created_by',
        'updated_by'
    ];
}
