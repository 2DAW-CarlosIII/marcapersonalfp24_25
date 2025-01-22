<?php
namespace App\Helpers;

class FilterHelper
{
    public static function applyFilter($request, $filterColumns)
    {
        $modelClassName = $request->route()->controller->modelclass;
        $query = $modelClassName::query();
        $filterValue = $request->q;

        if ($filterValue) {
            $query->where(function ($query) use ($filterValue, $filterColumns) {
                foreach ($filterColumns as $column) {
                    $query->orWhere($column, 'like', '%' . $filterValue . '%');
                }
            });
        }
        return $query;
    }

    public static function applySort($request, $query)
    {
        $sort = $request->_sort ?? 'id';
        $order = $request->_order ?? 'asc';

        if ($sort) {
            $query->orderBy($sort, $order);
        }
        return $query;
    }
}
