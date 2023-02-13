<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemPersonType;
use App\Repositories\ItemPersonType\ItemPersonTypeRepositoryInterface;
use App\Repositories\ItemSize\ItemSizeRepositoryInterface;
use Illuminate\Http\Request;

class ItemPersonTypeController extends Controller
{
    private $itemPersonTypeRepository;

    public function __construct(ItemPersonTypeRepositoryInterface $itemPersonTypeRepository)
    {
        $this->itemPersonTypeRepository = $itemPersonTypeRepository;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemPersonType  $itemPersonType
     * @return \Illuminate\Http\Response
     */
    public function show(ItemPersonType $itemPersonType)
    {
        $itemPersonType->load('itemSizes');
        return view('admin.item.partials.checkbox_size', compact('itemPersonType'));
    }
}
