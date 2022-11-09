<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Shop extends Model
{
    use HasFactory;

    public static function getGroups($parentID)
    {
        $groups = DB::select('SELECT * FROM `groups` ORDER BY `groups`.`id_parent` ASC');
        $path = self::getPath($groups, $parentID);
        $groupsList = [];
        foreach ($groups as $group){
            if ($group->id_parent > 0) {
                break;
            }
            $groupsList[] = $group;
        }

        self::getChildren($groupsList, $path, $groups);
        foreach ($groupsList as $g){
            $g->count = self::getCountProducts($g->id);
        }

        return $groupsList;
    }

    private static function getPath($groups, $parentID)
    {
        $tree = [(int) $parentID];
        while( $parentID > 0) {
            foreach ($groups as $group) {
                if($group->id == $parentID){
                    $parentID = $group->id_parent;
                    break;
                }
            }
            if ($parentID == 0) {
                break;
            }
            $tree[] = $parentID;
        }

        return array_reverse($tree);
    }

    private static function getChildren(&$parents, $path, $groups){
        foreach ($parents as $parent){
            foreach ($path as $key => $p) {
                if ($parent->id == $p) {
                    foreach ($groups as $group){
                        if ($group->id_parent == $p) {
                            $group->count = self::getCountProducts($group->id);
                            $parent->children[] = $group;

                        }
                    }
                }
                if (isset($parent->children)){
                    unset($path[$key]);
                    if (count($path) > 0) {
                        self::getChildren($parent->children, $path, $groups);
                    }
                }
            }
        }
    }

    public static function getProducts($parentID)
    {
        $ids = [];
        $groups = DB::select('SELECT * FROM `groups` ORDER BY `groups`.`id_parent` ASC');
        self::getIDs($ids, $groups, $parentID);
        return DB::table('products')->whereIn('id_group', $ids)->get();
    }

    private static function getCountProducts($parentID){
        $ids = [];
        $groups = DB::select('SELECT * FROM `groups` ORDER BY `groups`.`id_parent` ASC');
        self::getIDs($ids, $groups, $parentID);
        return count(DB::table('products')->whereIn('id_group', $ids)->get());
    }

    private static function getIDs(&$ids, $groups, $parentID)
    {
        $flag = true;
        foreach ($groups as $group) {
            if($group->id_parent == $parentID){
                $ids[] = $group->id;
                $flag = false;
                self::getIDs($ids, $groups, $group->id);
            }
        }
        if ($flag){
            $ids[] = $parentID;
        }
    }
}
