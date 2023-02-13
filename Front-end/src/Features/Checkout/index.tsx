import React from "react";
import CheckoutLayout from "./Components/CheckoutLayout";
import OrderSummary from "./Components/OrderSummary";
import OrderCheckout from "./Components/OrderCheckout";
import SelectAddressPopUp from "./Components/SelectAddressPopUp";
import SelectPaymentMethodPopUp from "./Components/SelectPaymentMethodPopUp";
import AddAddress from "../../Components/AddAddress";
import { useForm, useWatch } from "antd/es/form/Form";
import { useMutation, useQuery } from "@tanstack/react-query";
import cartApi from "../../Api/cartApi";
import CheckoutBasketList from "./Components/CheckoutBasketList";
import IAddAddress from "../../Model/AddAddress";
import AddAndSelectInput from "../../Components/AddAndSelectInput";
import { useAppDispatch, useAppSelector } from "../../Hooks/redux";
import DisplayValueAddress from "./Components/DisplayValueAddress";
import DisplayValuePayment from "./Components/DisplayValuePayment";
import {
  destroyCheckOut,
  setAddressAction,
  setCheckoutAction,
  setQuoteIdAction,
} from "../../Contexts/slices/checkoutSlice";
import checkoutApi from "../../Api/checkoutApi";
import { useNavigate } from "react-router-dom";
import { notification } from "antd";

interface ICheckout {
  quoteId: number;
  shippingName: string;
  shippingCityId: number;
  shippingDistrictId: number;
  shippingWardId: number;
  shippingAddress: string;
  shippingPhone: string;
  comment?: string;
  paymentMeThodId: number;
}

const Checkout = () => {
  const dispatch = useAppDispatch();
  const navigate = useNavigate();
  const [form] = useForm();
  const [addressForm] = useForm<{ address: string }>();
  const [paymentForm] = useForm<{ payment: string }>();
  const checkoutState = useAppSelector((state) => state.checkout);
  const quoteQuery = useQuery({
    queryKey: ["quote"],
    queryFn: cartApi.getQuotes,
    onSuccess: (data) => {
      dispatch(setQuoteIdAction({ id: data.id }));
    },
  });
  const confirmCheckOut = useMutation({
    mutationKey: ["confirmCheckOut"],
    mutationFn: ({
      quoteId,
      shippingName,
      shippingCityId,
      shippingDistrictId,
      shippingWardId,
      shippingAddress,
      shippingPhone,
      paymentMeThodId,
    }: ICheckout) =>
      checkoutApi.confirmCheckOut(
        quoteId,
        shippingName,
        shippingCityId,
        shippingDistrictId,
        shippingWardId,
        shippingAddress,
        shippingPhone,
        paymentMeThodId
      ),
    onSuccess: () => {
      dispatch(destroyCheckOut());
      navigate("/purchase-success");
    },
    onError: (error: any) => {
      notification.error({
        message: "Error",
        description: error,
        placement: "bottomLeft",
      });
    },
  });
  const address = useWatch("address", addressForm);
  const payment = useWatch("payment", paymentForm);

  const onFinishAddAddress = (values: IAddAddress) => {};

  const onFinishSelectAddress = (values: { address: string }) => {
    const value = JSON.parse(values.address);
    const { name, address, city_id, district_id, ward_id, id } = value;
    dispatch(
      setAddressAction({
        name,
        address,
        city: city_id,
        district: district_id,
        ward: ward_id,
      })
    );
  };

  const onFinishSelectPayment = (values: { payment: string }) => {
    const value = JSON.parse(values.payment);
    const { id } = value;
    dispatch(setCheckoutAction({ paymentMeThodId: id }));
  };

  const handleSubmit = async () => {
    const {
      quoteId,
      shippingName,
      shippingCityId,
      shippingDistrictId,
      shippingWardId,
      shippingAddress,
      shippingPhone,
      paymentMeThodId,
    } = checkoutState.current;
    if (
      quoteId &&
      shippingName &&
      shippingCityId &&
      shippingDistrictId &&
      shippingWardId &&
      shippingAddress &&
      shippingPhone &&
      paymentMeThodId
    ) {
      await confirmCheckOut.mutateAsync({
        quoteId,
        shippingName,
        shippingCityId,
        shippingDistrictId,
        shippingWardId,
        shippingAddress,
        shippingPhone,
        paymentMeThodId,
      });
      await quoteQuery.refetch();
    } else {
      notification.warn({
        message: "Warning",
        description: "Pleas fill all information field",
        placement: "bottomLeft",
      });
    }
  };

  return (
    <CheckoutLayout
      OrderSummary={
        <OrderSummary
          subTotal={quoteQuery.data?.total_price}
          shippingFee={quoteQuery.data?.shipping_fee}
          total={quoteQuery.data?.total}
          handleSubmit={handleSubmit}
          isLoading={confirmCheckOut.isLoading}
        />
      }
      OrderCheckout={
        <OrderCheckout
          CheckOutBasketList={
            <CheckoutBasketList data={quoteQuery.data?.quote_detail} />
          }
          AddressPopUp={
            <AddAndSelectInput
              title="Address"
              label="Choose an address"
              displayValue={<DisplayValueAddress data={address} />}
            >
              <SelectAddressPopUp
                onFinish={onFinishSelectAddress}
                form={addressForm}
                AddAddress={
                  <AddAddress form={form} onFinish={onFinishAddAddress} />
                }
              />
            </AddAndSelectInput>
          }
          SelectPaymentMethodPopUp={
            <AddAndSelectInput
              title="Payment Method"
              label="Add Payment method"
              displayValue={<DisplayValuePayment data={payment} />}
            >
              <SelectPaymentMethodPopUp
                form={paymentForm}
                onFinish={onFinishSelectPayment}
              />
            </AddAndSelectInput>
          }
        />
      }
    />
  );
};

export default Checkout;
