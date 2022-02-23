<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Shop\Product;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class ListProduct extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    public $sortColumnName = 'created_at';

    public $sortDirection = 'desc';

    public function render()
    {
        return view('livewire.admin.list-product', [
            'products' => Product::when($this->search, function($query, $search) {
                return $query->where('pName', 'LIKE', "%$search%");
            })->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate(6)
        ]);
    }

    public function sortBy($name)
    {
        if($this->sortColumnName === $name) {
            $this->sortDirection = $this->swapSortDirection();
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortColumnName = $name;
    }

    public function swapSortDirection()
    {
        return $this->sortDirection === 'desc' ? 'asc' : 'desc';
    }
}
