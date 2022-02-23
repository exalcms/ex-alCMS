<?php

namespace App\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Product extends Model implements Transformable, TableInterface
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'estoque',
        'ativo',
        'price',
        'photo_id',
        'category_id',
        ];

    public function getTableHeaders()
    {
        return ['Categoria'];
    }

    public function getValueForHeader($header)
    {
        switch ($header){
            case 'Categoria':
                return $this->category->name;
            case 'Nome':
                return $this->name;
            case 'Descrição':
                return $this->description;
            case 'Estoque':
                return $this->estoque;
            case 'Preço':
                return $this->price;
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function photos()
    {
        return $this->belongsToMany(Photo::class, 'photo_products', 'product_id', 'photo_id');
    }

}
