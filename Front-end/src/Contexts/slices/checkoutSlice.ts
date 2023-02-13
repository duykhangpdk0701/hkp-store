import { createSlice, PayloadAction } from "@reduxjs/toolkit";
import ICheckout from "../../Interfaces/Checkout";
import {
  ICheckoutAddAddress,
  ICheckoutAddPayment,
  ICheckoutAddPhone,
} from "../actionTypes/checkoutActionType";

export interface ICheckoutState {
  isFulFill: boolean;
  current: ICheckout;
  fullfil: {
    address: boolean;
    payment: boolean;
    phone: boolean;
  };
  error?: any;
}

const initialState: ICheckoutState = {
  isFulFill: false,
  fullfil: {
    address: false,
    payment: false,
    phone: false,
  },
  current: {
    quoteId: null,
    shippingName: null,
    shippingCityId: null,
    shippingDistrictId: null,
    shippingWardId: null,
    shippingAddress: null,
    shippingPhone: null,
    comment: undefined,
    paymentMeThodId: null,
  },
};

export const CheckoutSlice = createSlice({
  name: "checkout",
  initialState,
  reducers: {
    setQuoteIdAction: (state, action: PayloadAction<{ id: number }>) => {
      state.current.quoteId = action.payload.id;
    },

    setAddressAction: (state, action: PayloadAction<ICheckoutAddAddress>) => {
      state.current.shippingName = action.payload.name;
      state.current.shippingCityId = action.payload.city;
      state.current.shippingDistrictId = action.payload.district;
      state.current.shippingWardId = action.payload.ward;
      state.current.shippingAddress = action.payload.address;
      state.fullfil.address = true;
      const { address, payment, phone } = state.fullfil;
      if (address && payment && phone) {
        state.isFulFill = true;
      }
    },

    setPhoneAction: (state, action: PayloadAction<ICheckoutAddPhone>) => {
      state.current.shippingPhone = action.payload.phone;
      state.fullfil.phone = true;
      const { address, payment, phone } = state.fullfil;
      if (address && payment && phone) {
        state.isFulFill = true;
      }
    },

    setCheckoutAction: (state, action: PayloadAction<ICheckoutAddPayment>) => {
      state.current.paymentMeThodId = action.payload.paymentMeThodId;
      state.fullfil.payment = true;
      const { address, payment, phone } = state.fullfil;
      if (address && payment && phone) {
        state.isFulFill = true;
      }
    },

    destroyCheckOut: (state) => {
      state.current.shippingName = null;
      state.current.shippingCityId = null;
      state.current.shippingDistrictId = null;
      state.current.shippingWardId = null;
      state.current.shippingAddress = null;
      state.current.paymentMeThodId = null;
      state.current.shippingPhone = null;
      state.fullfil.phone = false;
      state.fullfil.payment = false;
      state.fullfil.address = false;
      state.isFulFill = false;
    },
  },
});

export const {
  setAddressAction,
  setPhoneAction,
  setCheckoutAction,
  setQuoteIdAction,
  destroyCheckOut,
} = CheckoutSlice.actions;
export default CheckoutSlice.reducer;
