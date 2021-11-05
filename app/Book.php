<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Book extends Model
{
    use Sortable;
    protected $table = 'books';
    protected $fillable = ['title', 'isbn', 'pages', 'author_id'];
    public $sortable = ['id', 'title', 'isbn', 'pages', 'author_id'];
    public function bookAuthor() {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }

}
