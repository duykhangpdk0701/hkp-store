<?php

namespace App\Http\Controllers\Admin;

use App\Acl\Acl;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderItem\OrderItemResource;
use App\Models\OrderStatus;
use App\Models\User;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderStatus\OrderStatusRepositoryInterface;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    private $orderStatusService, $orderRepository;

    /**
     * OrderStatusController constructor.
     * @param \App\Repositories\OrderStatus\OrderStatusRepositoryInterface $orderStatusService
     * @param \App\Repositories\Order\OrderRepositoryInterface $orderRepository
     */
    public function __construct(
        OrderStatusRepositoryInterface $orderStatusService,
        OrderRepositoryInterface $orderRepository
    ) {
        $this->orderStatusService = $orderStatusService;
        $this->orderRepository = $orderRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function show(OrderStatus $orderStatus)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderStatus $orderStatus)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderStatus $orderStatus)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderStatus $orderStatus)
    {
        //
    }

    /**
     * @param $id
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStatusOrder($id, Request $request)
    {
        $orderItems = [];
        $orderStatuses = OrderStatus::getStatusWithCurrentStatus($id);

        $order = $this->orderRepository->getOrder(['uuid' => $request->input('uuid')])->first();
        $collection = collect(OrderStatus::$orderStatusShowItem);

        $shippers = User::role(Acl::ROLE_SHIPPER)->with(['userProfile'])->get();

        if (!empty($order->order_status_id) && $collection->contains('id', $order->order_status_id)) {
            $orderItems = OrderItemResource::collection($order->orderItems);
        }

        return response()->json([
            'order_status' => $orderStatuses,
            'order_items' =>  $orderItems,
            'shippers' => $shippers
        ]);
    }
}
