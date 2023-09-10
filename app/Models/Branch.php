<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{

    use HasFactory;

    public $fillable = [
        'ref_region_id',
        'ref_province_id',
        'ref_municipality_id',
        'ref_barangay_id',
        'branch_address',
    ];

    public function region():BelongsTo{
        return $this->belongsTo(RefRegion::class);
    }

    public function province():BelongsTo{
        return $this->belongsTo(RefProvince::class);
    }

    public function municipality():BelongsTo{
        return $this->belongsTo(RefMunicipality::class);
    }

    public function users(): HasMany{
        return $this->hasMany(User::class);
    }

}
