<?php

namespace App\Http\Controllers\Admin;

use App\Acl\Acl;
use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\StoreBrandRequest;
use App\Http\Requests\Brand\UpdateBrandRequest;
use App\Models\Brand;
use App\Repositories\Brand\BrandRepositoryInterface;
use Illuminate\Http\Request;
use Spatie\Permission\Exceptions\UnauthorizedException;

class BrandController extends Controller
{

    private $brandRepository;

    public function __construct(BrandRepositoryInterface $brandRepository)
    {
        // Permissions validations
        $this->middleware('permission:' . Acl::PERMISSION_BRAND_LIST)->only(['index', 'show']);
        $this->middleware('permission:' . Acl::PERMISSION_BRAND_ADD)->only(['create', 'store']);
        $this->middleware('permission:' . Acl::PERMISSION_BRAND_EDIT)->only(['edit', 'update']);
        $this->middleware('permission:' . Acl::PERMISSION_BRAND_DELETE)->only('destroy');

        $this->brandRepository = $brandRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = $this->brandRepository->all();
        return view('admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {
        $result = $this->brandRepository->create($request->validated());
        session()->flash(NOTIFICATION_SUCCESS, __('success.brand.store', ['brand' => $result->name]));
        return redirect()->route('admin.brand.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return view('admin.brand.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $result = $this->brandRepository->update($brand, $request->validated());
        session()->flash(NOTIFICATION_SUCCESS, __('success.brand.update', ['brand' => $brand->name]));
        return redirect()->route('admin.brand.index');
    }

    /**
     * Update the specified resource status in storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function toggleStatus(Brand $brand)
    {
        $result = $this->brandRepository->toggleStatus($brand);
        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $this->brandRepository->destroy($brand);
        return redirect()->route('admin.brand.index');
    }
}
