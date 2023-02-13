<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Order\StoreOrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;
use App\Http\Requests\Order\UpdateOrderStatus;
use App\Http\Requests\Order\UpdatePaymentMethodRequest;
use App\Http\Resources\Order\OrderResource;
use App\Http\Resources\OrderItem\OrderItemResource;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\PaymentMethod;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderItem\OrderItemRepository;
use App\Repositories\OrderItem\OrderItemRepositoryInterface;
use App\Repositories\OrderStatus\OrderStatusRepository;
use App\Repositories\OrderStatus\OrderStatusRepositoryInterface;
use App\Repositories\PaymentMethod\PaymentMethodRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\OrderService;
use App\Models\User;
use Illuminate\Http\Request;
use App\Acl\Acl;
use App\Http\Controllers\Controller;
use App\Models\SysCity;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class OrderController extends Controller
{
    private  $orderRepository, $userRepository, $orderStatusRepository, $orderItemRepository, $paymentMethodRepository;
    protected $orderService;

    /**
     * OrderController constructor.
     * @param \App\Services\OrderService $orderService
     * @param \App\Repositories\Order\OrderRepositoryInterface $orderRepository
     * @param \App\Repositories\User\UserRepositoryInterface $userRepository
     * @param \App\Repositories\OrderStatus\OrderStatusRepositoryInterface $orderStatusRepository
     * @param \App\Repositories\OrderItem\OrderItemRepositoryInterface $orderItemRepository
     * @param \App\Repositories\PaymentMethod\PaymentMethodRepositoryInterface $paymentMethodRepository
     */
    public function __construct(
        OrderService $orderService,
        OrderRepositoryInterface $orderRepository,
        UserRepositoryInterface $userRepository,
        OrderStatusRepositoryInterface $orderStatusRepository,
        OrderItemRepositoryInterface $orderItemRepository,
        PaymentMethodRepositoryInterface $paymentMethodRepository,
    ) {
        $this->orderService = $orderService;
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
        $this->orderStatusRepository = $orderStatusRepository;
        $this->orderItemRepository = $orderItemRepository;
        $this->paymentMethodRepository = $paymentMethodRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (
            auth()->user()->hasRole(Acl::ROLE_SHIPPER) &&
            !auth()->user()->hasAllRoles(Role::all())
        ) {
            $request['shipper_id'] = auth()->id();
        }

        $orders = $this->orderRepository->serverPaginationFilteringFor($request);

        $orderStatuses = collect(OrderStatus::$orderStatusListSort);
        $paymentMethods = $this->paymentMethodRepository->getPaymentMethodActive();

        if ($request->ajax()) {
            return OrderResource::collection($orders);
        }
        return view('admin.order.index', compact(
            'orders',
            'orderStatuses',
            'paymentMethods',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $result = $this->orderService->create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cities = SysCity::all();
        $paymentMethods = $this->paymentMethodRepository->getPaymentMethodActive();
        $order = $this->orderRepository->find($id);
        return view('admin.order.show', compact('order', 'cities', 'paymentMethods'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $data = $request->validated();
        $result = $this->orderRepository->update($order, $data);
        if (!$result) {
            session()->flash(NOTIFICATION_ERROR, __('error.order.update_order_detail'));
        }
        session()->flash(NOTIFICATION_SUCCESS, __('success.order.update_order_detail'));
        return redirect()->route('admin.order.show', $order);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function updateStatusOrder($uuid, UpdateOrderStatus $request)
    {
        $data = $request->validated();

        $user = auth()->user();

        $order = $this->orderRepository->getOrder(['uuid' => $uuid])->first();


        if ($data['order_status_id'] == ORDER_STT_CANCELED) {
            if (!empty($order->id) && !empty($user->id)) {
                if ($order->order_status_id == ORDER_STT_COMPLETED) {
                    return response()->json(['error' => __('error.order.item_cancel_empty')]);
                }

                $data['order_id'] = $order->id;
                $data['user_id'] = $user->id;
                $result = $this->orderService->updateStatus($data);

                if (!empty($result)) {
                    return $result;
                }

                session()->flash(NOTIFICATION_SUCCESS, __('success.order.update_status_success'));

                return response()->json(['success' => __('success.order.update_status_success')]);
            }
        }

        if (request()->input('productCancelIDs')) {
            $data['productCancelIDs'] = request()->input('productCancelIDs');
        }

        if (!empty($order->id) && !empty($user->id)) {
            $data['order_id'] = $order->id;
            $data['user_id'] = $user->id;
            $result = $this->orderService->updateStatus($data);

            if (!empty($result)) {
                return $result;
            }

            session()->flash(NOTIFICATION_SUCCESS, __('success.order.update_status_success'));

            return response()->json(['success' => __('success.order.update_status_success')]);
        }

        session()->flash(NOTIFICATION_SUCCESS, __('error.order.change_status_fail'));

        return response()->json(['error' => __('error.order.change_status_fail')]);
    }

    /**
     * @param \App\Models\Order $order
     * @param \App\Http\Requests\Order\UpdateOrderStatus $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePaymentMethodOrder(Order $order, UpdatePaymentMethodRequest $request)
    {
        $data = $request->validated();
        $user = auth()->user();

        if (!empty($order->id) && !empty($user->id)) {
            $this->orderRepository->update($order, $data);
            return response()->json(['success' => __('success.order.update_payment_method_success')]);
        }

        return response()->json(['error' => __('error.order.change_payment_method_fail')]);
    }
}
