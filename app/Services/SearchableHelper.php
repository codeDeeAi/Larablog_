<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

class SearchableHelper
{
    /**
     * Create a new model searchable instance.
     *
     * @param \App\Models\Model Model instance
     * @param \Illuminate\Http\Request; Model instance
     * @param String Default search column
     * @return void
     */
    public function __construct(Model $model, $request, string $default)
    {
        $this->model = $model;
        $this->request = $request;
        $this->default = $default;
    }

    /**
     * Returns filtered model based on the search queries.
     *
     * @param \App\Models\Model Model instance
     * @param \Illuminate\Http\Request; Model instance
     * @return void
     */
    public function search(): Object
    {

        if ($this->request->has('filter') && $this->request->has('search')) {
            $this->request->validate(['filter' => 'nullable|array', 'search' => 'string']);
            $filters = [];
            foreach($this->request->filter as $key => $new_filter_value){
                $filters[] = $key;
            }

            for ($i = 0; $i < count($filters); $i++) {
                if ($i == 0) {
                    $this->model = $this->model->where($filters[$i], 'like', '%' . $this->request->search . '%');
                } else {
                    $this->model = $this->model->orWhere($filters[$i], 'like', '%' . $this->request->search . '%');
                }
            }
            
        } else if ($this->request->has('search')) {
            $this->request->validate(['search' => 'string']);
            $this->model = $this->model->where($this->default, 'like', '%' . $this->request->search . '%');
        } else {
        }

        return $this->model;
    }
}
