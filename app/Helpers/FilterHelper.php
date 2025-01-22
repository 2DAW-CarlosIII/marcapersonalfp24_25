<?php
namespace App\Helpers;

class FilterHelper
{
    public static function applyFilter($request, $filterColumns)
    {
        $modelClassName = $request->route()->controller->modelclass;
        $query = $modelClassName::query();

        $filtterValue = $request->q;

        if ($filtterValue) {
            $query->where(function ($query) use ($filtterValue, $filterColumns) {
                foreach ($filterColumns as $column) {
                    $query->orWhere($column, 'like', '%' . $filtterValue . '%');
                }
            });
        }
        return $query;
    }

    public static function applySort($request, $query)
    {
        return $query->orderBy($request->_sort ?? 'id', $request->_order ?? 'asc');
    }
}
