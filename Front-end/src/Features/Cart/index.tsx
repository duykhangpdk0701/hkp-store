import { useMutation, useQuery } from "@tanstack/react-query";
import React, { useEffect, useState } from "react";
import cartApi from "../../Api/cartApi";
import { useAppSelector } from "../../Hooks/redux";
import CartLayout from "./Components/CartLayout";
import CartList from "./Components/CartList";
import OrderSummary from "./Components/OrderSummary";

const Cart = () => {
  const cartState = useAppSelector((state) => state.cart);

  const cartQuery = useQuery({
    queryKey: ["cart"],
    queryFn: cartApi.getQuotes,
  });

  const refresh = async () => {
    await cartQuery.refetch();
  };

  return (
    <CartLayout
      CartList={
        <CartList
          cartData={cartQuery.data?.quote_detail}
          refresh={refresh}
          isLoading={cartQuery.isLoading}
        />
      }
      OrderSummary={
        <OrderSummary
          total={cartQuery.data?.total}
          totalPrice={cartQuery.data?.total_price}
          totalShipping={cartQuery.data?.total_shipping}
        />
      }
    />
  );
};

export default Cart;
