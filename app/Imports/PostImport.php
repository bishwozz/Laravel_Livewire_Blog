<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Post;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Post([
            'title' => $row['title'],
            'content' => $row['content'],
            'image' => $row['image'],
            'user_id' => $row['user_id'],
            'category_id' => $row['category_id'],
            'tag_id' => $row['tag_id'],
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString(),
            // Map additional columns as needed
        ]);
    }
    public function headingRow(): int
    {
        return 1; // Adjust if your header row is different
    }
}
