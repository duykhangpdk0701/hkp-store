<?php

namespace App\Http\Controllers\Admin;

use App\Acl\Acl;
use App\Models\CouponCode;
use App\Http\Requests\CouponCode\StoreCouponCodeRequest;
use App\Http\Requests\CouponCode\StoreRandomCouponCodeRequest;
use App\Http\Requests\CouponCode\UpdateCouponCodeRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\CouponCodeHistory\CouponCodeHistoryResource;
use App\Repositories\CouponCodeEvent\CouponCodeEventRepositoryInterface;
use App\Repositories\CouponCode\CouponCodeRepositoryInterface;
use App\Repositories\CouponCodeHistory\CouponCodeHistoryRepositoryInterface;
use Illuminate\Http\Request;


class CouponCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $couponCodeRepository;
    private $couponCodeEventRepository;
    private $couponCodeHistoryRepository;

    public function __construct(
        CouponCodeRepositoryInterface $couponCodeRepository,
        CouponCodeEventRepositoryInterface $couponCodeEventRepository,
        CouponCodeHistoryRepositoryInterface $couponCodeHistoryRepository
    ) {
        // Permissions validations
        $this->middleware('permission:' . Acl::PERMISSION_COUPON_LIST)->only(['index', 'show']);
        $this->middleware('permission:' . Acl::PERMISSION_COUPON_ADD)->only(['create', 'store']);
        $this->middleware('permission:' . Acl::PERMISSION_COUPON_EDIT)->only(['edit', 'update']);
        $this->middleware('permission:' . Acl::PERMISSION_COUPON_DELETE)->only('destroy');

        $this->couponCodeRepository = $couponCodeRepository;
        $this->couponCodeEventRepository = $couponCodeEventRepository;
        $this->couponCodeHistoryRepository = $couponCodeHistoryRepository;
    }
    public function index()
    {
        $couponCodes = $this->couponCodeRepository->all();
        return view('admin.coupon-code.index', compact('couponCodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $couponCodes = $this->couponCodeRepository->all();
        $couponCodeEvent = $this->couponCodeEventRepository->all();
        return view('admin.coupon-code.create', compact('couponCodes', 'couponCodeEvent'));
    }

    public function createRandom()
    {
        $couponCodes = $this->couponCodeRepository->all();
        $couponCodeEvent = $this->couponCodeEventRepository->all();
        return view('admin.coupon-code.create_random_code', compact('couponCodes', 'couponCodeEvent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCouponCodeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCouponCodeRequest $request)
    {
        $result = $this->couponCodeRepository->create($request->validated());
        session()->flash(NOTIFICATION_SUCCESS, __('success.store', ['resource' => $result->name]));
        return redirect()->route('admin.coupon-code.edit', $result->id);
    }

    public function storeRandom(StoreRandomCouponCodeRequest $request)
    {
        $this->couponCodeRepository->saveRandomCode($request->validated());
        return redirect()->route('admin.coupon-code.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CouponCode  $couponCode
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = $this->couponCodeRepository->getCoupon($id);
        return view('admin.coupon-code.view', compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CouponCode  $couponCode
     * @return \Illuminate\Http\Response
     */
    public function edit(CouponCode $couponCode)
    {
        $couponCodeEvent = $this->couponCodeEventRepository->all();
        return view('admin.coupon-code.edit', compact('couponCode', 'couponCodeEvent'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCouponCodeHistoryUsed(Request $request)
    {
        $couponCodeHistories = $this->couponCodeHistoryRepository->serverPaginationFilteringFor($request->all());
        if ($request->ajax()) {
            return CouponCodeHistoryResource::collection($couponCodeHistories);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCouponCodeRequest  $request
     * @param  \App\Models\CouponCode  $couponCode
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCouponCodeRequest $request, CouponCode $couponCode)
    {
        $result = $this->couponCodeRepository->update($couponCode, $request->validated());
        return redirect()->route('admin.coupon-code.edit', $result->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CouponCode  $couponCode
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(CouponCode $couponCode)
    {
        $this->couponCodeRepository->destroy($couponCode);
        return redirect()->route('admin.coupon-code.index');
    }

    //Todo create view for used coupon, waiting ShopOrder
    public static function gridHistory($params)
    {
    }
}
