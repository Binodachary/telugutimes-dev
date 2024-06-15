<?php

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

function shortText($data, $limit = 10): \Illuminate\Support\Stringable
{
    return Str::of(html_entity_decode(strip_tags($data)))->words($limit);
}

function formatDate($dateTime): string
{
    return Carbon::parse($dateTime)->format('D, M j Y');
}

function sqlDate($dateTime): string
{
    return Carbon::parse($dateTime)->format('Y-m-d');
}

function menuActiveHelper($item): bool
{
    if (request()->is($item['url'])) return true;
    else if (isset($item['dropdown']) && $item['dropdown']) return in_array(request()->path(), array_column($item['items'], 'url'));
    return false;
}

function getCategories($cats)
{
    if(!empty($cats)) {
        $categories = json_decode($cats, true);
        return Category::whereIn('id', $categories)->get()->implode('name', ' , ');
    }else
        return '';
}

function yThumb($video): string
{
    return ($video instanceof \App\Models\Video) ? "https://img.youtube.com/vi/{$video->video_id}/hqdefault.jpg" : "https://img.youtube.com/vi/{$video}/hqdefault.jpg";
}

/*
 * @returns Array | String
 * */
function getFiles($directory, $single = false)
{
    $files = Storage::files($directory);
    if ($single)
        return $files[0] ?? '';
    return $files;
}

function un_slug($str){
    return str_replace('-',' ',ucfirst($str));
}
function paginateArray($items, $currentPage = 1, $perPage = 2) {
    // Include last items as first item
    $lastItem = array_pop($items);
    array_unshift($items, $lastItem);
    //pagination logic
    $totalItems = count($items);
    $totalPages = ceil($totalItems / $perPage);
    $startIndex = ($currentPage - 1) * $perPage;

    $pageItems = array_slice($items, $startIndex, $perPage);
    $previousPage = ($currentPage > 1) ? $currentPage - 1 : null;
    $nextPage = ($currentPage < $totalPages) ? $currentPage + 1 : null;
    $previousUrl = ($previousPage !== null) ? '?page=' . $previousPage : null;
    $nextUrl = ($nextPage !== null) ? '?page=' . $nextPage : null;

    return [
        'items' => $pageItems,
        'currentPage' => $currentPage,
        'perPage' => $perPage,
        'totalItems' => $totalItems,
        'totalPages' => $totalPages,
        'previousUrl' => $previousUrl,
        'nextUrl' => $nextUrl,
    ];
}


