<?php

namespace App\Http\Controllers\Admin;

use App\Acl\Acl;
use App\Models\CouponCodeEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\CouponCodeEvent\StoreCouponCodeEventRequest;
use App\Http\Requests\CouponCodeEvent\UpdateCouponCodeEventRequest;
use App\Repositories\CouponCode\CouponCodeRepositoryInterface;
use App\Repositories\CouponCodeEvent\CouponCodeEventRepositoryInterface;

class CouponCodeEventController extends Controller
{
    public function __construct(
        CouponCodeRepositoryInterface $couponCodeRepository,
        CouponCodeEventRepositoryInterface $couponCodeEventRepository)
    {
        // Permissions validations
        $this->middleware('permission:' . Acl::PERMISSION_COUPON_LIST)->only(['index', 'show']);
        $this->middleware('permission:' . Acl::PERMISSION_COUPON_ADD)->only(['create', 'store']);
        $this->middleware('permission:' . Acl::PERMISSION_COUPON_EDIT)->only(['edit', 'update']);
        $this->middleware('permission:' . Acl::PERMISSION_COUPON_DELETE)->only('destroy');

        $this->couponCodeRepository = $couponCodeRepository;
        $this->couponCodeEventRepository = $couponCodeEventRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $couponCodeEvents = $this->couponCodeEventRepository->all();
        return view('admin.coupon-code-event.index', compact('couponCodeEvents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupon-code-event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCouponCodeEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCouponCodeEventRequest $request)
    {
        $result = $this->couponCodeEventRepository->create($request->validated());
        session()->flash(NOTIFICATION_SUCCESS, __('success.store', ['resource' => $result->name]));
        return redirect()->route('admin.coupon-code-event.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CouponCodeEvent  $couponCodeEvent
     * @return \Illuminate\Http\Response
     */
    public function show(CouponCodeEvent $couponCodeEvent)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CouponCodeEvent  $couponCodeEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(CouponCodeEvent $couponCodeEvent)
    {
        return view('admin.coupon-code-event.edit', compact('couponCodeEvent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCouponCodeEventRequest  $request
     * @param  \App\Models\CouponCodeEvent  $couponCodeEvent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCouponCodeEventRequest $request, CouponCodeEvent $couponCodeEvent)
    {
        $result = $this->couponCodeEventRepository->update($couponCodeEvent, $request->validated());
        session()->flash(NOTIFICATION_SUCCESS, __('success.update', ['resource' => $result->name]));
        return redirect()->route('admin.coupon-code-event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CouponCodeEvent  $couponCodeEvent
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(CouponCodeEvent $couponCodeEvent)
    {
        $this->couponCodeEventRepository->destroy($couponCodeEvent);
        return redirect()->route('admin.coupon-code-event.index');
    }

}
