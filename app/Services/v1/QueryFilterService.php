<?php


namespace App\Services\v1;


class QueryFilterService
{
    public function applyFilter($model, $params)
    {
        $perPage = $params['per_page'] ?? 10;

        return $this->prepareQuery($model, $params)->paginate($perPage);
    }

    private function prepareQuery($model, $params)
    {
        $query = $model::select('*');
        $query = $this->queryApplyFilter($query, $params);
        $query = $this->queryApplyOrderBy($query, $params);

        return $query;
    }

    private function queryApplyFilter($query, $params)
    {
        foreach ($params as $key => $value) {
            if ($key === 'order' || $key === 'sort' || $key === 'per_page' || $key === 'page') {
                continue;
            }

            if (is_array($params[$key])) {
                $query->whereIn($key, $value);
            } else $query->where($key, 'LIKE', '%' . $value . '%');
        }

        return $query;
    }

    private function queryApplyOrderBy($query, $params)
    {
        $order = 'asc';
        if (isset($params['order']) && $params['order'] == 'desc') {
            $order = 'desc';
        }

        if (isset($params['sort'])) {
            $query->orderBy($params['sort'], $order);
        }
        return $query;
    }
}
