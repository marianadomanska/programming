<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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

public function blogs(): BelongsToMany
{
    return $this->belongsToMany(
        Blog::class,
        'blog_service',
        'service_id',
        'blog_id'
    );
}

}