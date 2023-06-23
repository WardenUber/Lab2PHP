<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'category';


    /**
     * @var string|null
     */
    protected ?string $categoryFromRoot = null;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'slug',
        'activity',
        'category_id',
    ];

    /**
     * @var string[]
     */
    protected $dateCaste = [
        'createdTime' => 'datetime:d-m-Y H:i:s',
    ];

    /**
     * One to many Relationship
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Install foreign key
     * @return BelongsTo
     */
    public function parentCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class)
            ->where('activity', true);
    }

    /**
     * One to many Relationship
     * @return HasMany
     */
    public function childCategory(): HasMany
    {
        return $this->hasMany(Category::class)
            ->where('activity', true);
    }

    /**
     * Take activity from child category
     *
     * @return HasMany
     */
    public function childCategoryRec(): HasMany
    {
        return $this->childCategory()
            ->with('childCategoryRec');
    }


}
