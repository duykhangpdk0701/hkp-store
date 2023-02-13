import IPayment from "../Interfaces/Payment";
import axiosClient from "./axiosClient";

const checkoutApi = {
  getListPaymentMethod: async (): Promise<IPayment[]> => {
    const url = "/api/v1/cart/payment-method";
    const res = await axiosClient.get(url);
    return res.data;
  },

  confirmCheckOut: async (
    quoteId: number,
    shippingName: string,
    shippingCity: number,
    shippingDistrict: number,
    shippingWard: number,
    shippingAddress: string,
    shippingPhone: string,
    paymentMeThodId: number
  ): Promise<any> => {
    const url = "/api/v1/cart/confirm-checkout";
    const reqData = {
      quote_id: quoteId,
      shipping_name: shippingName,
      shipping_city_id: shippingCity,
      shipping_district_id: shippingDistrict,
      shipping_ward_id: shippingWard,
      shipping_address: shippingAddress,
      shipping_phone: shippingPhone,
      payment_method_id: paymentMeThodId,
    };
    const res = await axiosClient.post(url, reqData);
    return res.data;
  },
};

export default checkoutApi;
