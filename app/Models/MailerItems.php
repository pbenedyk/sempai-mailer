<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailerItems extends Model
{
    use HasFactory;
    protected $fillable = ['send_to', 'title', 'content'];

    public function createNew($send_to, $title, $content)
    {
        return $this->create([
            'send_to' => $send_to,
            'title' => $title,
            'content' => $content
        ]);
    }

    public function deleteItem($id)
    {
        return $this->where('id', $id)->delete();
    }
}
