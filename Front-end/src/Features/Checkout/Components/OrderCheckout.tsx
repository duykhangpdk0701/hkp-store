import { Form, Input } from "antd";
import React, { FC, ReactNode, useState } from "react";
import AddAndSelectInput from "../../../Components/AddAndSelectInput";
import AddPromoCode from "../../../Components/AddPromoCode";
import { setPhoneAction } from "../../../Contexts/slices/checkoutSlice";
import { useAppDispatch } from "../../../Hooks/redux";
import CheckoutBasketList from "./CheckoutBasketList";

interface IOrderCheckout {
  AddressPopUp: ReactNode;
  SelectPaymentMethodPopUp: ReactNode;
  CheckOutBasketList: ReactNode;
}

const OrderCheckout: FC<IOrderCheckout> = (props) => {
  const { AddressPopUp, SelectPaymentMethodPopUp, CheckOutBasketList } = props;
  const dispatch = useAppDispatch();
  const [value, setValue] = useState("");

  const handleOnChangePhoneNumber = (
    e: React.ChangeEvent<HTMLInputElement>
  ) => {
    const valueString = e.target.value;
    if (valueString) {
      setValue(valueString);
      dispatch(setPhoneAction({ phone: valueString }));
    }
  };

  return (
    <div className="mt-6">
      <div className="font-semibold mx-6 mb-4">Đơn hàng của bạn</div>
      {/* select Address */}
      <div className="mx-6 mt-6">
        <Form.Item label="Phone Number">
          <Input value={value} onChange={handleOnChangePhoneNumber} />
        </Form.Item>
      </div>

      <div className="mx-6 mt-6">{AddressPopUp}</div>

      <div className="mx-6 mt-6">{SelectPaymentMethodPopUp}</div>

      <div className="mx-6 mt-6">
        <AddPromoCode />
      </div>

      <div className="mx-6 mt-6">{CheckOutBasketList}</div>
    </div>
  );
};

export default OrderCheckout;
