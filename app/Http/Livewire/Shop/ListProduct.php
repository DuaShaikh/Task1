<?php

namespace App\Http\Livewire\Shop;

use Livewire\Component;
use App\Models\Shop\Product;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class ListProduct extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $search;

    public $sortBy;

    public $showDiv = 'true';

    public $perPage = '6';

    protected $paginationTheme = 'bootstrap';

    public $sortColumnPrice = 'productPrice';

    public function mount()
    {
        $this->sortBy = "default";
    }

    public function render()
    {
        if ($this->sortBy === 'low')   
        {
            return view('livewire.shop.list-product', [
                'products'=> Product::when($this->search, function($query, $search) {
                    return $query->where('pName', 'LIKE', "%$search%");
                })->orderBy($this->sortColumnPrice, 'asc')->paginate($this->perPage)
            ]);
        } 
        else if ($this->sortBy === 'high')
        {
            return view('livewire.shop.list-product', [
                'products'=> Product::when($this->search, function($query, $search) {
                    return $query->where('pName', 'LIKE', "%$search%");
                })->orderBy($this->sortColumnPrice, 'desc')->paginate($this->perPage)
            ]); 
        } 
        return view('livewire.shop.list-product', [
            'products' => Product::when($this->search, function($query, $search) {
                return $query->where('pName', 'LIKE', "%$search%");
            })->latest()->paginate($this->perPage)
        ]);
    }

    public function closeCardDiv()
    {
        if ($this->showDiv =! $this->showDiv) {
             $this->showDiv = $this->openTableDiv();
        } else {
            $this->showDiv === $this->showDiv;
        }

    }

    public function openTableDiv()
    {
        return $this->showDiv === 'true' ? 'false' : 'true';
    }
}
