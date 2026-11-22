<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Service extends Model
{
    protected $fillable = [
        'name',
        'category',
        'price_master',
        'price_top_master',
        'description'
    ];
	public function translations(): HasMany
{
    return $this->hasMany(ServiceTranslation::class, 'service_id');
}
}