import IOrder from "../Interfaces/Order";
import axiosClient from "./axiosClient";

const orderApi = {
  getAllOrder: async (): Promise<IOrder[]> => {
    const url = "api/v1/order";
    const res = await axiosClient.get(url);
    return res.data;
  },

  getOrderPending: async (): Promise<IOrder[]> => {
    const url = "api/v1/order?order_status=1";
    const res = await axiosClient.get(url);
    return res.data;
  },
  getAllProcessing: async (): Promise<IOrder[]> => {
    const url = "api/v1/order?order_status=2";
    const res = await axiosClient.get(url);
    return res.data;
  },

  getAllShipped: async (): Promise<IOrder[]> => {
    const url = "api/v1/order?order_status=3";
    const res = await axiosClient.get(url);
    return res.data;
  },

  getAllComplete: async (): Promise<IOrder[]> => {
    const url = "api/v1/order?order_status=4";
    const res = await axiosClient.get(url);
    return res.data;
  },

  getAllCancel: async (): Promise<IOrder[]> => {
    const url = "api/v1/order?order_status=5";
    const res = await axiosClient.get(url);
    return res.data;
  },
  getOrderDetail: async (orderCode: string): Promise<IOrder> => {
    const url = `api/v1/order/${orderCode}`;
    const res = await axiosClient.get(url);
    return res.data;
  },
};

export default orderApi;
